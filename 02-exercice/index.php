<?php

/**
 * On va créer une classe Car dans un fichier à part.

 * Une voiture possède 4 roues, une couleur, une marque et un modèle.
 * Une voiture peut être construite avec tous ses attributs.
 * Une voiture peut rouler et klaxonner.
 * Vous implémenterez un getter et un setter pour la couleur (uniquement la couleur en private). On instanciera au moins 2 voitures.

 * En bonus, une voiture a une jauge d'essence (50 pour 50L).
 * On réduit la jauge de 2L à chaque fois qu'on appelle la méthode rouler.
 */

require 'Car.php';

$car = new Car();
$car->brand = 'Renault';
$car->model = 'Mégane';
$car2 = new Car('Alfa Roméo', '147', 'Gris');

echo $car->drive().'<br />';
echo $car->drive().'<br />';
echo $car->drive().'<br />';

while ($car->fuel >= 2) {
    echo $car->drive().'<br />';
}

echo $car->setColor('Noire')->klaxon().'<br />';

var_dump($car, $car2);
