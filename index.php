<?php

require './config.php';
// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
$human = \entities\Managers\CharacterManager::create("Gerald",1,1,\entities\Races\Human::class,WARRIOR);
$orc = \entities\Managers\CharacterManager::create("Garrosh",1,1,\entities\Races\Orc::class,WIZARD);
$elf = \entities\Managers\CharacterManager::create("Garrosh",1,1,\entities\Races\Elf::class,ROGUE);

\entities\Managers\DamageManager::die($human);
\entities\Managers\DamageManager::revive($human);
//\entities\Managers\XpManager::giveXp($human, 600000000);
echo "</br></br>";

$espada = new \entities\Weapon(ALL, "Espada", "Es una espada.", 20, ONE_HAND , OFFENSIVE);
$espadaLarga = new \entities\Weapon(ROGUE, "Espada larga", "Es una espada.", 25, ONE_HAND , OFFENSIVE);
$espadon = new \entities\Weapon(ALL, "Espadon", "Es un espadon.", 40, TWO_HANDS , OFFENSIVE);
$escudo = new \entities\Weapon(ALL, "Escudo", "Es un escudo.", 20, ONE_HAND , DEFENSIVE);

$tacCom = new \entities\Skills\SkillBuff("Tacticas de combate", "aca la descripcion", PHYSICAL, ADVANCED, 1.05, 1, 1.05, 1, 1);
$tajMort = new \entities\Skills\SkillAtt("Tajo mortal", "aca la descripcion", PHYSICAL, ADVANCED, 2);

\entities\Managers\WeaponManager::equipAuto($human, $espadon);
\entities\Managers\WeaponManager::equipAuto($human, $espada);
\entities\Managers\WeaponManager::equipAuto($human, $espadaLarga);
\entities\Managers\WeaponManager::equipAuto($human, $escudo);

\entities\Managers\SkillManager::learnSkill($human, $tacCom);
\entities\Managers\SkillManager::learnSkill($human, $tajMort);

$orc->setHealtPoints(61);

\entities\Managers\DamageManager::attack($human, $human->getSkills()[0], $human);
\entities\Managers\DamageManager::attack($human, $human->getSkills()[1], $orc);

\entities\Managers\WeaponManager::equipManual($human, $espada, "right");

\entities\Managers\WeaponManager::equipForce($human, $espada, "right");

//\entities\Managers\LevelManager::forceLevelUp($human, 0);
//echo \entities\Managers\XpManager::getExpForLevel($human);