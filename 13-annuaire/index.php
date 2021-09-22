<?php

/**
 * On veut réaliser un annuaire de contacts.
 * On aura une classe Annuaire qui pourra contenir des contacts. On pourra compter
 * le nombre de contacts.
 * On aura une classe Contact qui représentera quelqu'un dans notre annuaire. Un contact 
 * posséde un nom, un prénom, un téléphone et un email.
 * On peut ajouter des contacts dans notre annuaire.
 */

require_once 'Contact.php';
require_once 'Annuaire.php';

$annuaire = new Annuaire();
echo 'Notre annuaire contient ' . $annuaire->compter() . ' contacts.'; // 0
$contact1 = new Contact('Mota', 'Matthieu', '0600000000', 'matthieu@boxydev.com');
$contact2 = new Contact('Doe', 'John', '0600000000', 'john@boxydev.com');
$annuaire
    ->addContact($contact1)
    ->addContact($contact2)
;
echo 'Notre annuaire contient ' . $annuaire->compter() . ' contacts.'; // 2
echo $annuaire->afficher();

// - Mota Matthieu, Tel: 0600000000, Mail: matthieu@boxydev.com
// - Doe John, Tel: 0600000000, Mail: john@boxydev.com
