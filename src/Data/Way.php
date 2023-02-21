<?php

namespace Kicken\OSMParser\Data;

class Way extends TaggedEntity {
    public function getNodeReferences() : \Generator{
        foreach ($this->childEntities as $childEntity){
            if ($childEntity->name === 'nd'){
                yield $childEntity->getAttribute('ref');
            }
        }
    }
}