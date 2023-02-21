<?php

namespace Kicken\OSMParser\Data;

class Entity {
    protected string $name;
    protected array $attributes;
    /** @var Entity[] */
    protected array $childEntities;

    public function __construct(string $name, array $attributes, array $childEntities = []){
        $this->name = $name;
        $this->attributes = $attributes;
        $this->childEntities = $childEntities;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getAttribute(string $name) : ?string{
        return $this->attributes[$name] ?? null;
    }

    public function getAttributes() : array{
        return $this->attributes;
    }

    /**
     * @return Entity[]
     */
    public function getChildren() : array{
        return $this->childEntities;
    }
}