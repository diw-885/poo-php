<?php

require 'Animal.php';
require 'Cat.php';
require 'Dog.php';
require '../05-bankaccount/print_r.php';

$cat = new Cat('Bianca');
$unknown = new Animal('Toto');
$dog = new Dog('Medor', true);

super_print_r($dog);

echo $cat->move().'<br />';
echo $cat->climbsOnRoof().'<br />';

echo $dog->move().'<br />';
echo $dog->cry().'<br />';

echo '<br /> Bianca est une instance de Cat ? => '.($cat instanceof Cat);
echo '<br /> Bianca est une instance de Dog ? => '.($cat instanceof Dog ? '1' : '0');
echo '<br /> Bianca est une instance de Animal ? => '.($cat instanceof Animal);
echo '<br /> Toto est une instance de Cat ? => '.($unknown instanceof Cat ? '1' : '0');
echo '<br /> Toto est une instance de Animal ? => '.($unknown instanceof Animal);

super_print_r($cat);
