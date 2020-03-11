<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities\Skills;

/**
 * Description of SkillAtt
 *
 * @author dfelipe
 */
class SkillAtt extends \entities\Skills\Skill{
    private $damage;
    
    public function __construct($name, $description, $type, $subType, $damage)
     {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->subType = $subType;
        $this->damage = $damage;
     }
    
     public function getDamage() {
         return $this->damage;
     }

     public function setDamage($damage): void {
         $this->damage = $damage;
     }


     
}
