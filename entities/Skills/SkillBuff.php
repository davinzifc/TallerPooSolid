<?php

namespace entities\Skills;

class SkillBuff extends \entities\Skills\Skill {
    private $stats = ["str" => null, "intl" => null, "agi" => null,
                      "pdef" => null, "mdef" => null];

     public function __construct($name, $description, $type, $subType, 
                                 $str, $intl, $agi, $pdef, $mdef)
     {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->subType = $subType;
        $this->stats["str"] = $str;
        $this->stats["intl"] = $intl;
        $this->stats["agi"] = $agi;
        $this->stats["pdef"] = $pdef;
        $this->stats["mdef"] = $mdef;
     }

     public function getStats() {
         return $this->stats;
     }

     public function setStats($stats, $key): void {
         $this->stats[$key] = $stats;
     }




}