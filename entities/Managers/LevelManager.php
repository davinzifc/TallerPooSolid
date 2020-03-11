<?php

namespace entities\Managers;

class LevelManager {
    private static $baseExp = 100;
    private static $maxLevel = 100;
    private static $minLevel = 1;

    /*
     * La funcion levelUp() compara el nivel del personaje y si es menor al nivel maximo
     * el personaje sube sube de nivel. 
     */
    public static function levelUp($character) {
        if($character->getLevel() < self::$maxLevel){
            $character->setLevel( $character->getLevel() + 1 );
            \entities\GameAnnouncer::lvlup($character);
        }
    }

    /*
     * La funcion forceLevelUp() aumenta N cantidad de niveles al personaje objetivo.
     */
    public static function forceLevelUp($character, $cantidad) {
        if($character->getLevel() < self::$maxLevel){
            $character->setLevel( $character->getLevel() + $cantidad );
            $character->setXp(0);
        }
    }

    /*
     * La funcion levelDown() disminulle N cantidad de niveles al personaje objetivo.
     */
    public static function levelDown($character) {
        if($character->getLevel() > 0){
            $character->setLevel( $character->getLevel() - 1 );
            $character->setXp(0);
        }
    }
    


}
