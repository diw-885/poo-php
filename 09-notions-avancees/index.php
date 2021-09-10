<?php

spl_autoload_register(); // Je require automatiquement toutes mes classes

$bianca = new Cat();
$bianca->name = 'toto';
$mina = new Cat();
$mina->name = 'toto';
$milou = $bianca; // $milou est une référence à $bianca
var_dump($bianca === $milou); // Renvoie true
$milou = clone $bianca; // $milou est un nouvel objet sans référence à $bianca
var_dump($bianca === $milou); // Renvoie false
$milou->name = 'tata'; // Si je modifie $milou, je modifie $bianca

$a = [1, 2, 3];
$b = $a; // $b n'est pas une référence à a
// $b = &$a; // $b est une référence à a

// & permet de faire une référence donc de modifier un tableau
// dans une boucle
// foreach ($a as &$item) {
//    $item *= 2;
// }

$b[] = 4;
var_dump($a, $b); // $a vaut [1,2,3] et $b vaut [1,2,3,4]

var_dump($bianca, $mina, $milou);

var_dump($bianca === $mina); // False car non identique
var_dump($bianca == $mina); // True car égaux

$mina->name = 'titi';
var_dump($bianca == $mina); // False car non égaux

$class = $_GET['animal'] ?? 'Cat';
$animal = new $class();
echo $animal->cry();
echo $animal->walk();
echo $animal->eat();
