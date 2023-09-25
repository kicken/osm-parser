<?php

namespace Kicken\OSMParser\Parser;

use Kicken\OSMParser\Data\Entity;
use Kicken\OSMParser\Data\Node;
use Kicken\OSMParser\Data\Relation;
use Kicken\OSMParser\Data\TaggedEntity;
use Kicken\OSMParser\Data\Way;

class EntityBuilder {
    private array $attributes = [];
    private array $children = [];

    public function __construct(private string $name){
    }

    public function addAttribute(string $name, string $value) : void{
        $this->attributes[$name] = $value;
    }

    public function addChild(Entity $entity) : void{
        $this->children[] = $entity;
    }

    public function getEntity() : Entity{
        $class = match ($this->name) {
            'node' => Node::class,
            'relation' => Relation::class,
            'way' => Way::class,
            default => Entity::class
        };

        return new $class($this->name, $this->attributes, $this->children);
    }
}
