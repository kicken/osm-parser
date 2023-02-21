<?php

namespace Kicken\OSMParser\Data;

class Node extends TaggedEntity {
    public function getId() : string{
        return $this->attributes['id'];
    }

    public function getLat() : float{
        return $this->attributes['lat'];
    }

    public function getLon() : float{
        return $this->attributes['lon'];
    }
}