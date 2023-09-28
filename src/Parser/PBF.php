<?php

namespace Kicken\OSMParser\Parser;

use ArrayIterator;
use Exception;
use Google\Protobuf\Internal\RepeatedField;
use Iterator;
use Kicken\OSMParser\Data\Entity;
use Kicken\OSMParser\Data\Node;
use Kicken\OSMParser\Data\Relation;
use Kicken\OSMParser\Data\Way;
use OSMPBF\Blob;
use OSMPBF\BlobHeader;
use OSMPBF\DenseNodes;
use OSMPBF\Node as OSMNode;
use OSMPBF\PrimitiveBlock;
use OSMPBF\PrimitiveGroup;
use OSMPBF\Relation as OSMRelation;
use OSMPBF\Way as OSMWay;
use RuntimeException;

class PBF implements \IteratorAggregate {
    private $fp;
    private RepeatedField $currentStringTable;
    private int $currentGranularity;
    private int $currentLatOffset;
    private int $currentLonOffset;
    private const NANO_DEGREES = 0.000000001;

    public function __construct(string $file){
        if (!class_exists('Google\Protobuf\Any')){
            throw new RuntimeException('Package google/protobuf is required for Protobuf parsing.');
        }

        set_error_handler(function(){
        });
        try {
            $this->fp = fopen($file, 'rb');
            if (!$this->fp){
                throw new RuntimeException('Unable to open file ' . $file);
            }
        } finally {
            restore_error_handler();
        }
    }

    public function __destruct(){
        fclose($this->fp);
    }

    /**
     * @return Iterator<Entity>
     */
    public function getIterator() : Iterator{
        foreach ($this->extractBlobs() as $type => $blob){
            $uncompressedData = match ($blob->getData()) {
                'raw' => $blob->getRaw(),
                'zlib_data' => zlib_decode($blob->getZlibData()),
                default => throw new RuntimeException('Unsupported compression type')
            };

            //Currently only interested in the data blocks to extract entities.
            if ($type === 'OSMData'){
                foreach ($this->parseOSMData($uncompressedData) as $entity){
                    yield $entity;
                }
            }
        }

        return new ArrayIterator([]);
    }

    /**
     * @return Iterator<string,Blob>
     */
    private function extractBlobs() : Iterator{
        do {
            $data = fread($this->fp, 4);
            if (strlen($data) !== 4){
                break;
            }

            try {
                $length = unpack('Nlength', $data)['length'];
                $header = new BlobHeader();
                $header->mergeFromString(fread($this->fp, $length));

                $data = fread($this->fp, $header->getDatasize());
                $blob = new Blob();
                $blob->mergeFromString($data);

                yield $header->getType() => $blob;
            } catch (Exception){
                break;
            }
        } while (!feof($this->fp));
    }

    private function parseOSMData(string $data) : Iterator{
        try {
            $currentBlock = new PrimitiveBlock();
            $currentBlock->mergeFromString($data);
            $this->currentStringTable = $currentBlock->getStringtable()->getS();
            $this->currentGranularity = $currentBlock->hasGranularity() ? $currentBlock->getGranularity() : 100;
            $this->currentLatOffset = $currentBlock->hasLatOffset() ? $currentBlock->getLatOffset() : 0;
            $this->currentLonOffset = $currentBlock->hasLonOffset() ? $currentBlock->getLonOffset() : 0;

            /** @var PrimitiveGroup $group */
            foreach ($currentBlock->getPrimitivegroup() as $group){
                foreach ($group->getNodes() as $node){
                    yield $this->processNode($node);
                }
                foreach ($group->getWays() as $way){
                    yield $this->processWay($way);
                }
                foreach ($group->getRelations() as $relation){
                    yield $this->processRelation($relation);
                }
                if ($group->hasDense()){
                    foreach ($this->processDenseNodes($group->getDense()) as $node){
                        yield $node;
                    }
                }
            }
        } catch (Exception){
            return;
        }
    }

    /**
     * @return Entity[]
     */
    private function processTags(RepeatedField $keyList, RepeatedField $valueList) : array{
        return $this->mapRepeatable(function($keyId, $valueId){
            return new Entity('tag', [
                'k' => $this->currentStringTable[$keyId]
                , 'v' => $this->currentStringTable[$valueId]
            ]);
        }, $keyList, $valueList);
    }

    private function processNode(OSMNode $node) : Node{
        $attributes = [
            'id' => $node->getId()
            , 'lat' => $this->calculateLatitude($node->getLat())
            , 'lon' => $this->calculateLongitude($node->getLon())
        ];
        $children = $this->processTags($node->getKeys(), $node->getVals());

        return new Node('node', $attributes, $children);
    }

    private function processWay(OSMWay $way) : Way{
        $tags = $this->processTags($way->getKeys(), $way->getVals());
        $nodeList = $this->mapRepeatable(function($id){
            return new Entity('nd', ['ref' => $id]);
        }, $way->getRefs());

        return new Way('way', [
            'id' => $way->getId()
        ], array_merge($tags, $nodeList));
    }

    private function processRelation(OSMRelation $relation) : Relation{
        $tags = $this->processTags($relation->getKeys(), $relation->getVals());
        $lastId = 0;
        $memberList = $this->mapRepeatable(function($id, $type, $role) use (&$lastId){
            $entity = new Entity('member', [
                'type' => OSMRelation\MemberType::name($type)
                , 'role' => $this->currentStringTable[$role]
                , 'ref' => $id - $lastId
            ]);
            $lastId = $id;

            return $entity;
        }, $relation->getMemids(), $relation->getTypes(), $relation->getRolesSid());

        return new Relation('relation', [
            'id' => $relation->getId()
        ], array_merge($tags, $memberList));
    }

    private function mapRepeatable(callable $mapFunction, ...$repeatableList){
        $repeatableList = array_map('iterator_to_array', $repeatableList);

        return array_map($mapFunction, ...$repeatableList);
    }

    /**
     * @return Node[]
     */
    private function processDenseNodes(DenseNodes $denseNodes) : array{
        $id = $lat = $lon = 0;
        $keyIndex = 0;
        $kvList = $denseNodes->getKeysVals();

        return $this->mapRepeatable(function($idDelta, $latDelta, $lonDelta) use (&$id, &$lat, &$lon, &$keyIndex, $kvList){
            $id += $idDelta;
            $lat += $latDelta;
            $lon += $lonDelta;
            $children = [];

            if ($kvList->count() > 0){
                $keyId = $kvList[$keyIndex];
                if ($keyId === 0){
                    $keyIndex += 1;
                } else {
                    do {
                        $children[] = new Entity('tag', [
                            'k' => $this->currentStringTable[$keyId],
                            'v' => $this->currentStringTable[$kvList[$keyIndex + 1]]
                        ]);
                        $keyId = $kvList[$keyIndex += 2];
                    } while ($keyId !== 0);
                }
            }

            return new Node('node', [
                'id' => $id
                , 'lat' => $this->calculateLatitude($lat)
                , 'lon' => $this->calculateLatitude($lon)
            ], $children);
        }, $denseNodes->getId(), $denseNodes->getLat(), $denseNodes->getLon());
    }

    private function calculateDegrees(int $offset, int $value) : float{
        $nanoDegrees = $offset + ($this->currentGranularity * $value);

        return self::NANO_DEGREES * $nanoDegrees;
    }

    private function calculateLatitude(int $lat) : float{
        return $this->calculateDegrees($this->currentLatOffset, $lat);
    }

    private function calculateLongitude(int $lon) : float{
        return $this->calculateDegrees($this->currentLonOffset, $lon);
    }
}
