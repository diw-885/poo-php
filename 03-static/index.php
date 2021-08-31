<?php

require 'Cat.php';

$cat1 = new Cat();
$cat2 = new Cat();
$cat3 = new Cat();

var_dump($cat1, $cat2, $cat3, Cat::$count);
echo '<br />';

var_dump(Cat::$litter);
echo '<br />';
var_dump($cat1->litter2);
echo '<br />';
var_dump($cat2->litter2);
echo '<br />';
var_dump($cat3->litter2);
echo '<br />';
