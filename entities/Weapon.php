<?php

namespace entities;

class Weapon {
    private $classEquip;
    private $name;
    private $description;
    private $damage;
    private $hand;
    private $type;

    public function __construct($classEquip, $name, $description, $damage, $hand, $type){
        $this->classEquip = $classEquip;
        $this->name = $name;
        $this->description = $description;
        $this->damage = $damage;
		$this->hand = $hand;
		$this->type = $type;
    }

    public function getClassEquip(){
		return $this->classEquip;
	}

	public function setClassEquip($classEquip){
		$this->classEquip = $classEquip;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDamage(){
		return $this->damage;
	}

	public function setDamage($damage){
		$this->damage = $damage;
	}

	public function getHand(){
		return $this->hand;
	}

	public function setHand($hand){
		$this->hand = $hand;
	}
	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}
}
