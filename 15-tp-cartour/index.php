<?php

require 'src/Autoloader.php';

use CarTour\Car;
use CarTour\Player;
use CarTour\Tour;

$bmw = new Car('BMW X6');
$renault = new Car('Ferrari Modena');
$porsche = new Car('Porsche Cayenne Turbo');
$maserati = new Car('Maserati Ghibli');

$fiorella = new Player('Fiorella', 'Boxydev', $bmw, 3);
$matthieu = new Player('Matthieu', 'Boxydev', $renault, 3);
$marina = new Player('Marina', 'Boxydev', $porsche, 3);
$nino = new Player('Nino', 'Boxydev', $maserati, 3);

$tour1 = new Tour('Monza', 3, 5793);
$tour1->addPlayer($fiorella);
$tour1->addPlayer($matthieu);
$tour1->addPlayer($marina);

$tour2 = new Tour('Monaco', 6, 3337);
$tour2->addPlayer($fiorella);
$tour2->addPlayer($nino);

$tour1->start();
$tour2->start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Tour</title>
</head>
<body>
    <h1>Car Tour</h1>

    <p>
        Il y a <?php echo Player::getCounter(); ?> personnes <br>
        Dont <?php echo Player::getCounter() - $tour1->countPlayers(); ?> spectateur(s) à <?php echo $tour1->location; ?> <br>
        Dont <?php echo Player::getCounter() - $tour2->countPlayers(); ?> spectateur(s) à <?php echo $tour2->location; ?>
    </p>

    <h2>Résultats : <?php echo $tour1->location; ?></h2>
    <ul>
        <?php foreach ($tour1->getRanking() as $position => $rank) { ?>
            <li><?php echo $rank->getIdentity(); ?> en <?php echo $rank->getCar(); ?> (<?php echo $position; ?>)</li>
        <?php } ?>
    </ul>

    <h2>Résultats : <?php echo $tour2->location; ?></h2>
    <ul>
        <?php foreach ($tour2->getRanking() as $position => $rank) { ?>
            <li><?php echo $rank->getIdentity(); ?> en <?php echo $rank->getCar(); ?> (<?php echo $position; ?>)</li>
        <?php } ?>
    </ul>

    <a href="index.php">Lancer les courses</a>
</body>
</html>
