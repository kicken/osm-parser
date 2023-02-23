# PHP OSM Data file parser

Parse Open Street Map XML or PBF files with a simple iterator interface.

## Example

Extract all named nodes from the [Austin, TX dump](https://download.bbbike.org/osm/bbbike/Austin/).

    $iter = new Kicken\OSMParser\Parser\XML('Austin.osm');
    foreach ($iter as $entity){
        if ($entity instanceof Kicken\OSMParser\Data\Node && $entity->getTag('name')){
            echo "\t", $entity->getTag('name'), ' @ (', $entity->getLat(), ',', $entity->getLon(), ')', PHP_EOL;
        }
    }

## Resource requirements

While PBF files are much smaller on disk, they require **significantly** more resources to parse. I tested both parsers using the example code above using PHP 8.2.3 on a Intel i7-1260P laptop and had the following results:

| Parser       |   Time | Peak memory usage |
|--------------|-------:|------------------:|
| XML          | 1m 01s |            4.1 MB |
| PBF (Native) | 0m 41s |            3.1 GB |
| PBF (PHP)    | 3m 23s |            3.9 GB |

XML format is quick and uses the least amount of memory since it can stream as they are found rather than loading a bunch into memory.  PBF format is quick if you use the native extension, but requires much more memory as many nodes must be loaded into memory first then output.  PBF without the native extension is slow and uses a lot of memory and thus should be avoided.
