<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities;

/**
 * Description of GameAnnouncer
 *
 * @author pabhoz
 */
class GameAnnouncer {
    
    public static function presentCharacter(\entities\Character $character){ 
        echo SYS."</br>".$character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP Max: ".$character->getMaxHealtPoints()."</br>";
        echo "Class: ".$character->getPlayableClass()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br>";
        echo "Equipamento</br>";
        if(!is_null($character->getHand()["two"])){
            echo "Weapon two hands: ".$character->getHand()["two"]->getName()."</br></br>";
        }else{
            echo "Weapon right: ".$character->getHand()["right"]->getName()."</br>";
            echo "Weapon left: ".$character->getHand()["left"]->getName()."</br></br>";
        }
    }

    public static function notEquipped(\entities\Character $character, $weapon){
        echo "</br>".SYS."El arma ".$weapon->getName()." No es compatible con tu personaje ".$character->getName()."</br></br>";
    }

    public static function equipWeapon(\entities\Character $character, $weapon){
        echo SYS.$character->getName()." se ha equipado ".$weapon->getName()."</br>";
        if(!is_null($character->getHand()["two"])){
            echo SYS."Weapon two hands: ".$character->getHand()["two"]->getName()."</br></br>";
        }else if(!is_null($character->getHand()["right"]) && !is_null($character->getHand()["left"])){
            echo SYS."Weapon right: ".$character->getHand()["right"]->getName()."</br>";
            echo SYS."Weapon left: ".$character->getHand()["left"]->getName()."</br>";
        }
    }

    public static function notLearnSkill(\entities\Character $character, $skill){
        echo SYS.$character->getName()." no puede aprender ".$skill->getName()."</br></br>";
    }

    public static function learnSkill(\entities\Character $character, $skill){
        echo SYS.$character->getName()." aprendio ".$skill->getName()."</br></br>";
    }

    public static function attack(\entities\Character $character, $skill, \entities\Character $targetCharacter){
        echo SYS.$character->getName()." ataco a ".$targetCharacter->getName()." con la habilidad ".$skill->getName()."</br>";
    }
    
    public  static function buff(\entities\Character $character, \entities\Skills\SkillBuff $skill, \entities\Character $targetCharacter) {
        echo SYS.$character->getName()." lanzo ".$skill->getName()." sobre ".$targetCharacter->getName()."</br></br>";
        
    }

    public static function damage($targetCharacter, $damage){
        echo SYS.$targetCharacter->getName()." sufrio ".$damage." puntos de dano.</br>";
    }

    public static function Health(\entities\Character $character){
        echo SYS.$character->getName()." tiene ".$character->getHealtPoints()." / ".$character->getMaxHealtPoints()." puntos de vida</br></br>";
    }

    public static function critical(){
        echo SYS."[Golpe critico]</br>";
    }

    public static function lvlup(\entities\Character $character){
        echo SYS.$character->getName()." Subio de nivel: ".$character->getLevel()."</br>";
    }
    
    public  static function equipMan(\entities\Character $character, \entities\Weapon $weapon, string $hand) {
        echo SYS.$character->getName()." se equipo ".$weapon->getName()." en la mano ".$hand."</br></br>";
    }
    
    public  static function alert() {
        echo "[INADEQUATE OR FORCED ACTION!!]";
    }
    
    public  static function die(\entities\Character $character) {
        echo SYS.$character->getName()." murio</br></br>";
    }

}
