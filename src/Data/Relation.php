<?php

namespace Kicken\OSMParser\Data;

class Relation extends TaggedEntity {
    public function getId() : string{
        return $this->attributes['id'];
    }

    public function getMembers() : \Generator{
        foreach ($this->childEntities as $childEntity){
            if ($childEntity->name === 'member'){
                yield $childEntity;
            }
        }
    }
}
