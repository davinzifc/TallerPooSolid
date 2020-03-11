<?php

namespace entities\Managers;

class SkillManager {
    /*
     * La funcion learnSkill() agregrega a la lista de habilidades del personaje seleccionado
     * una habilidad.
     */ 
    public static function learnSkill ($character, $skill) {
        if(self::validSkill($character, $skill)){
            $character->setSkills(count($character->getSkills()), $skill);
            \entities\GameAnnouncer::learnSkill($character, $skill);
        }else{
            \entities\GameAnnouncer::notLearnSkill($character, $skill);
        }
    }
    /*
     * La funcion forgetSkill() elimina la habilidad objetivo del personaje seleccionado
     */
    public static function forgetSkill ($character, $skillpos) {
        
    }

    /*
     * La funcion skillList() lista las habilidades que posee el personaje objetivo.
     */ 
    public static function skillsList ($character) {
        echo SYS."Las habilidades de ".$character->getName()." son:</br>";
        for($i = 0; $i < count($character->getSkills()); $i ++){
        echo SYS.$character->getSkills()[$i]->getName()."</br>";
        }
        echo "</br>";
    }

    /*
     * La funcion validSkill() recibe como parametros ($character, $skill)
     * se encarga de validar si el tipo de skill es compatible con el personaje.
     */ 
    public static function validSkill($character, $skill){
        switch($character->getPlayableClass()){
            case WARRIOR:
                if($skill->getType() == PHYSICAL && ($skill->getSubType() == BASIC || $skill->getSubType() == ADVANCED || $skill->getSubType() == WARRIOR)){
                    return true;
                }else{
                    return false; 
                }
            break;
            case WIZARD:
                if(($skill->getType() == PHYSICAL && $skill->getSubType() == BASIC) || ($skill->getType() == MAGICAL && ($skill->getSubType() == BASIC || $skill->getSubType() == WIZARD))){
                    return true;
                }else{
                    return false; 
                }
            break;
            case ROGUE:
                if(($skill->getType() == PHYSICAL && ($skill->getSubType() == BASIC)) || ($skill->getType() == MAGICAL && ($skill->getSubType() == BASIC)) || (($skill->getType() == PHYSICAL || $skill->getType() == PHYSICAL) && ($skill->getSubType() == ROGUE))){
                    return true;
                }else{
                    return false; 
                }
            break;
        }
    }

}
