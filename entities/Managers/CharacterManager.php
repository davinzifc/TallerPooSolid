<?php

namespace entities\Managers;

class CharacterManager{

    public static function create($name, $sex, $bodyType,$race, $playableClass){
        

        [$maxHealtPoints, $str,$intl,$agi,$pDef,$mDef] = $race::getStats();
        
        $xp = 1;
        // Al ser creado el personaje tiene tantos puntos de vida actuales
        // como el máximo que puede tener
        $healtPoints = $maxHealtPoints;
        $level = 1;
        $hand = ["right" => new \entities\Weapon(ALL, "Fist", "Are... fists...", 5, ONE_HAND, OFFENSIVE),
                 "left" => new \entities\Weapon(ALL, "Fist", "Are... fists...", 5, ONE_HAND, OFFENSIVE),
                 "two" => null];             
        $character = new \entities\Character($name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,
                $mDef ,$xp, $healtPoints,$maxHealtPoints, $level, $hand);
        
        \entities\GameAnnouncer::presentCharacter($character);
        return  $character;
    }
}
