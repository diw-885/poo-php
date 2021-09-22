<?php

/**
 * Création de véhicules
 * 
 * Ici, on va faire la même chose que dans le fichier conducteur_ajout.php
 * On doit créer une instance de véhicule (attention de  bien reprendre l'autoload). On déclarera les propriétés et getters/setters nécessaires en fonction de la BDD.
 * On crée la méthode save qui définit une instance de PDO et qui exécute la requête permettant d'ajouter le véhicule dan s la BDD.
 */

// Autoload de classes
spl_autoload_register(function ($class) {
    // Pour Linux et macOS (Unix)
    // Transforme Vtc\Conducteur() en Vtc/Conducteur
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // $class = Vtc/Conducteur
    require_once __DIR__.'/src/'.$class.'.php';
});

$vehicule = new Vtc\Vehicule();

$vehicule->setMarque('Peugeot');
$vehicule->setModele('807');
$vehicule->setCouleur('noir');
$vehicule->setImmatriculation('AB-355-CA');

$vehicule->save();
