<?php

namespace entities\Managers;

class DamageManager{
        /*
         * Compara la cantidad de puntos de vida del personaje y si es menor a 
         * 0 anuncia que murio.
         * 
         */
        public static function die(\entities\Character $character) {
            if($character->getHealtPoints() <= 0){
                \entities\GameAnnouncer::die($character);
            }
        }
        
        public static function revive(\entities\Character $character) {
            if($character->getHealtPoints() == 0){
                $character->setHealtPoints($character->getMaxHealtPoints() * 0.1);
            }
        }
        
        /*
         * La funcion buff() aplica los aumentos o -aumentos de la habilidades 
         * del personaje.
         * 
         */
        public static function buff(\entities\Skills\SkillBuff $skill, \entities\Character $targetCharacter) {
            $targetCharacter->setStr($targetCharacter->getStr() * $skill->getStats()["str"]);
            $targetCharacter->setIntl($targetCharacter->getIntl() * $skill->getStats()["intl"]);
            $targetCharacter->setAgi($targetCharacter->getAgi() * $skill->getStats()["agi"]);
            $targetCharacter->setPDef($targetCharacter->getPDef() * $skill->getStats()["pdef"]);
            $targetCharacter->setMDef($targetCharacter->getMDef() * $skill->getStats()["mdef"]);
        }
        
        /*
         * Realiza los calculos del dano.
         * 
         * 
         */
        public  static function attc(\entities\Skills\SkillAtt $skill, \entities\Character $character, \entities\Character $targetCharacter) {
            $buffDamage = self::typeDamage($skill, $character);
            $criticalDamage = self::criticDamage($character->getAgi());
            if(!is_null($character->getHand()["two"])){
                $totalDamage = ($skill->getDamage() * $character->getHand()["two"]->getDamage()) * $buffDamage * $criticalDamage;
            }else if($character->getHand()["right"]->getType() == 0){
                $totalDamage = ($skill->getDamage() * $character->getHand()["left"]->getDamage()) * $buffDamage * $criticalDamage;            
            }else{
                $totalDamage = ($skill->getDamage() * $character->getHand()["right"]->getDamage()) * $buffDamage * $criticalDamage;
            }
            \entities\GameAnnouncer::attack($character, $skill, $targetCharacter);
            self::takeDamage($targetCharacter, $totalDamage, $skill->getType());
        }

        // verifica el tipo de habilidad y realiza las acciones pertinentes.
        public static function attack(\entities\Character $character, $skill, \entities\Character $targetCharacter) {
            switch (explode('\\',get_class($skill))[count(explode('\\',get_class($skill))) - 1]){
                case "SkillBuff":
                    \entities\GameAnnouncer::buff($character, $skill, $targetCharacter);
                    self::buff($skill, $character);
                    break;
                case "SkillAtt":
                    self::attc($skill, $character, $targetCharacter);
                    break;
            }
        }
        
        // realiza el dano ._.
        public static function takeDamage($targetCharacter, $damage, $type ) {
                switch($type){
                        case PHYSICAL:
                                $calDamage = round($damage * ( 1 - ( ( $targetCharacter->getPDef()/10 )/100 ) ));
                        break;
                        case MAGICAL:
                                $calDamage = round($damage * ( 1 - ( ( $targetCharacter->getMDef()/10 )/100 ) ));
                        break;
                }
                $targetCharacter->setHealtPoints($targetCharacter->getHealtPoints() - $calDamage);
                \entities\GameAnnouncer::damage($targetCharacter, $calDamage);
                \entities\GameAnnouncer::Health($targetCharacter);    
                self::die($targetCharacter);
        }

        public static function criticDamage($agi){
                if((BASE_CRITI + ($agi/10)) > rand(1,100)){
                        \entities\GameAnnouncer::critical();
                        return 1.5;
                }else{
                        return 1;
                }
        }

        public static function typeDamage($skill, $character){
                switch($skill->getType()){
                        case PHYSICAL:
                                return ((($character->getStr() / 5) + 100)/100);
                        break;
                        case MAGICAL:
                                return ((($character->getIntl() / 5) + 100)/100);
                        break;
                }
        }
        
}
