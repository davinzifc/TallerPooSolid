<?php
define('INTERFACES',__DIR__.'/interfaces/');
define('ENTITIES',__DIR__.'/entities/');

define('BASE_HP',100);
define('BASE_STR',10);
define('BASE_INTL',10);
define('BASE_AGI',10);
define('BASE_PDEF',5);
define('BASE_MDEF',2);
define('BASE_CRITI', 10);//Se lo queria agregar al personaje pero... es una variable universal con todos los ataques
define('PHYSICAL', 1);
define('MAGICAL', 0);

/*    Clases    */

define('WIZARD', 0);
define('WARRIOR', 1);
define('ROGUE', 2);
define('BASIC', 3);
define('ADVANCED', 4);
define('ALL', 5);

/*    Weapons   */
define('OFFENSIVE', 1);
define('DEFENSIVE', 0);
define('ONE_HAND', 0);
define('TWO_HANDS', 1);

define('SYS', "[SYSTEM]: ");



require "./loader.php";
