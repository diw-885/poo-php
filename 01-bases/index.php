<?php

require 'Cat.php';

$bianca = new Cat();
// On peut changer la valeur d'une propriété
// $bianca->name = 'Bianca';
$bianca->setName('Bianca');
$bianca->type = 'Chat de gouttière';
$bianca->fur = 'blanc';
$mina = new Cat();
$mina->setName('Mina')->setName('Super Mina');

var_dump($bianca, $mina);

// On peut afficher une propriété
echo '<br /> Le chat s\'appelle '.$bianca->getName().'<br />';

// Le chat peut faire une action
echo $bianca->cry().'<br />';
echo $mina->cry().'<br />';

// Avec le constructeur
$joe = new Cat('Joe', 'Persan'); // $joe->__construct('Joe', 'Persan');
var_dump($joe);
