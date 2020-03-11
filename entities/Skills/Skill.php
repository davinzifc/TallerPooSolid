<?php

namespace entities\Skills;

abstract class Skill {
    protected $name;
    protected $description;
    protected $type;
    protected $subType;

    public function __construct($name, $description, $type, $subType)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->subType = $subType;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getType() {
        return $this->type;
    }

    public function getSubType() {
        return $this->subType;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setType($type): void {
        $this->type = $type;
    }

    public function setSubType($subType): void {
        $this->subType = $subType;
    }


    
}
