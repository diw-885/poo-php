<?php

require 'Admin.php';

$nassim = new Admin('Nassim');
$vincent = new Admin('Vincent');
$mariam = new Admin('Mariam');
$loubna = new Admin('Loubna');
$aline = new Admin('Aline');
$matthieu = new Admin('Matthieu');

$loubna->setBan(['Matthieu', 'Nassim']);
$aline->setBan(['Mariam']);

$loubna->getBan(); // Afficher les utilisateurs bannis
$aline->getBan();
$matthieu->getBan();
