<?php

/* require_once 'Car.php';
require_once 'Motorcycle.php';
require_once 'Truck.php'; */

// La fonction est appellée à chaque
// fois qu'on se sert d'une classe
spl_autoload_register(function ($class) {
    // Transforme "Toto\Titi\Car" en "Car"
    $classArray = explode('\\', $class);
    $classFile = end($classArray);

    require_once $classFile.'.php';
});

// Importe la classe Parking\Motorcycle
use Parking\Motorcycle;

$car = new Parking\Car();
$motorcycle = new Motorcycle();
$truck = new Parking\Pro\Truck();

var_dump($car);
var_dump($motorcycle);
var_dump($truck);
