<?php

require 'Character.php';
require 'Warrior.php';
require 'Hunter.php';
require 'Magus.php';

$aragorn = new Warrior('Aragorn');
$legolas = new Hunter('Legolas');
$gandalf = new Magus('Gandalf');

var_dump($aragorn);
echo '<br />';
var_dump($legolas);
echo '<br />';
var_dump($gandalf);
echo '<br />';

$aragorn->attack($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
$legolas->attack($aragorn);
//$legolas->rangedAttack($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
//$gandalf->castSpell($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)

var_dump($aragorn);
echo '<br />';
var_dump($legolas);
echo '<br />';
var_dump($gandalf);
echo '<br />';
