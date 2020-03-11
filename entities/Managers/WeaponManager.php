<?php

namespace entities\Managers;

class WeaponManager {

    /*
     * La funcion equipAuto() recibe como parametros ($character, $weapon) que
     * se encarga de equipar de manera automatica al personaje el arma seleccionada
     * respectivamente.
     */
    public static function equipAuto(\entities\Character $character, \entities\Weapon $weapon){
        if($weapon->getClassEquip() == $character->getPlayableClass() || $weapon->getClassEquip() == ALL){
            switch($weapon->getHand()){
                case TWO_HANDS:
                    $character->setHand("right", null);
                    $character->setHand("left", null);
                    $character->setHand("two", $weapon);
                break;
                case ONE_HAND:
                    $character->setHand("two", null);
                    if($weapon->getType() == DEFENSIVE){
                        if(is_null($character->getHand()["right"]) && is_null($character->getHand()["left"])){
                            $character->setHand("right", $weapon);
                            $character->setHand("left", new \entities\Weapon(ALL, "Fist", "Are... fists...", 5, ONE_HAND, OFFENSIVE));
                        }else{
                            $character->setHand("left", $character->getHand()["right"]);
                            $character->setHand("right", $weapon);
                        }
                    }else if(!is_null($character->getHand()["right"])){
                        if($character->getHand()["right"]->getType() == DEFENSIVE){
                            $character->setHand("left", $weapon);
                        }else if($weapon->getDamage() > $character->getHand()["right"]->getDamage()){
                                 $character->setHand("left", $character->getHand()["right"]);
                                 $character->setHand("right", $weapon);
                        }else{
                            $character->setHand("left", $weapon);
                        }
                        
                    }else{
                        $character->setHand("right", $weapon);
                        $character->setHand("left", new \entities\Weapon(ALL, "Fist", "Are... fists...", 5, ONE_HAND, OFFENSIVE));
                    }
                break;
            }
            \entities\GameAnnouncer::equipWeapon($character, $weapon);
        }else{
            \entities\GameAnnouncer::notEquipped($character, $weapon);
        }
    }
    
    /*
     * La funcion equiManual() recibe como parametro ($character, $weapon, $hand)
     * que equipa el arma seleccionada en la mano seleccionada del personaje seleccionado
     * right, left, two.
     */ 
    public static function equipManual(\entities\Character $character, \entities\Weapon $weapon, string $hand){
        if($weapon->getClassEquip() == $character->getPlayableClass() || $weapon->getClassEquip() == ALL){
            switch ($weapon->getHand()){
                case TWO_HANDS:
                    $character->setHand($hand, $weapon);
                    $character->setHand("right", null);
                    $character->setHand("left", null);
                break;
                case ONE_HAND:
                    $character->setHand($hand, $weapon);
                    $character->setHand("two", null);
                break;
                
            }
            \entities\GameAnnouncer::equipMan($character, $weapon, $hand);
        }else{
            \entities\GameAnnouncer::notEquipped($character, $weapon);
        }
    }
    /*
     * La funcion equipFore() recibe como parametro ($character, $weapon, $hand)
     * que equipa el arma seleccionada en la mano seleccionada del personaje seleccionado
     * right, left, two sin importar restricciones.
     */
    public static function equipForce(\entities\Character $character, \entities\Weapon $weapon, string $hand) {
        \entities\GameAnnouncer::alert();
        \entities\GameAnnouncer::equipMan($character, $weapon, $hand);
        $character->setHand($hand, $weapon);
    }
}