<?php
/** @noinspection PhpComposerExtensionStubsInspection */

namespace Kicken\OSMParser\Parser;

use Iterator;
use IteratorAggregate;
use Kicken\OSMParser\Data\Entity;
use XMLReader;

class XML implements IteratorAggregate {
    private XMLReader $reader;
    /** @var EntityBuilder[] */
    private array $stack = [];
    private ?Entity $nextYield = null;

    public function __construct(string $xmlFile){
        if (!class_exists('XMLReader')){
            throw new \RuntimeException('XMLReader class is required.');
        }

        $this->reader = new XMLReader();
        $this->reader->open($xmlFile);
        $this->reader->setParserProperty(XMLReader::VALIDATE, false);
    }

    /**
     * @return Iterator<Entity>
     */
    public function getIterator() : Iterator{
        for (; !$this->eof(); $this->reader->read()){
            switch ($this->reader->nodeType){
                case XMLReader::ELEMENT:
                    $this->handleElementStart();
                    break;
                case XMLReader::END_ELEMENT:
                    $this->handleElementEnd();
                    break;
            }

            if ($this->nextYield){
                yield $this->nextYield;
                $this->nextYield = null;
            }
        }
    }

    private function eof() : bool{
        return $this->reader->nodeType === XMLReader::END_ELEMENT && $this->reader->name === 'osm';
    }

    private function handleElementStart(){
        $nodeName = $this->reader->name;
        if ($nodeName === 'osm'){
            //Ignore top level element
            return;
        }

        //Must cache the value now since the reader will advance when OSMElement parses attributes.
        $nodeEmpty = $this->reader->isEmptyElement;

        $element = new EntityBuilder($nodeName);
        for ($valid = $this->reader->moveToFirstAttribute(); $valid; $valid = $this->reader->moveToNextAttribute()){
            $element->addAttribute($this->reader->name, $this->reader->value);
        }

        $this->stack[] = $element;
        if ($nodeEmpty){
            $this->handleElementEnd();
        }
    }

    private function handleElementEnd(){
        $element = array_pop($this->stack);
        if (!$this->stack){
            $this->nextYield = $element->getEntity();
        } else {
            $parent = array_pop($this->stack);
            $parent->addChild($element->getEntity());
            $this->stack[] = $parent;
        }
    }
}
