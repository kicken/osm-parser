<?php

namespace Kicken\OSMParser\Data;

class TaggedEntity extends Entity {
    public function getTag(string $name) : ?string{
        foreach ($this->childEntities as $child){
            if ($child->name === 'tag' && $child->attributes['k'] === $name){
                return $child->attributes['v'];
            }
        }

        return null;
    }
}
