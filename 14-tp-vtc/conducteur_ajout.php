<?php

// Autoload de classes
spl_autoload_register(function ($class) {
    // Pour Linux et macOS (Unix)
    // Transforme Vtc\Conducteur() en Vtc/Conducteur
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // $class = Vtc/Conducteur
    require_once __DIR__.'/src/'.$class.'.php';
});

// Je veux créer un conducteur
$conducteur = new Vtc\Conducteur();

// J'utilise les setters
$conducteur->setNom('Avigny');
$conducteur->setPrenom('Julien');

// Sauvegarder en base
$conducteur->save();

// On teste le rendu de la variable
// var_dump nous aide à debugger en tant que développeur
var_dump($conducteur);
