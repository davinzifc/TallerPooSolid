<?php

namespace entities\Managers;

class XpManager {


    /*
     * La funcion getExpForLevel() calcula y retorna la xp que el jugador debe
     * conseguir para subir de nivel cada nivel.
     */
    public static function getExpForLevel($character) {
        return (pow((3 * ($character->getLevel())), 3) + 73);
    }

    /*
     * La funcion giveXp() recibe como parametros ($character, $cantidadXp)
     * que corresponde al jugador que recibe xp y la cantidad de xp que
     * recibe respectivamente.
     */
    public static function giveXp($character, $cantidadXp){
        $character->setXp($cantidadXp);
        self::xpComparer($character);
    }

    /*
     * La funcion xpComparer() recibe como parametros ($character)
     * el cual comparara la xp del personaje con la xp necesaria
     * para subir de nivel.
     */
    public static function xpComparer($character){
        $maxXp = self::getExpForLevel($character);
        if( ($character->getXp() >= $maxXp) && ($character->getLevel()) ){
            $character->setXp($character->getXp() - $maxXp);
            \entities\Managers\LevelManager::levelUp($character);
            if($character->getXp() >= $maxXp){
                self::xpComparer($character);
            }
        }
    }


}