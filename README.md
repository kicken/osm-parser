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

While PBF files are much smaller on disk, they require **significantly** more resources to parse. I tested both parsers using the example
code above and had the following results:

| Parser |   Time | Peak memory usage |
|--------|-------:|------------------:|
| XML    | 2m 41s |           10.8 MB |
| PBF    | 9m 09s |            4.5 GB |

The PBF version was tested without the native protobuf extension. I do not know if that would improve the results again.
