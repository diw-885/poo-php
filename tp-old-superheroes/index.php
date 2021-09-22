<?php

/**
 * 1/ Créer une classe SuperHeroe avec les attributs name, power, identity et universe.
 */

require_once 'SuperHeroe.php';

$ironMan = new SuperHeroe();
$ironMan->name = 'Iron Man';
$ironMan->power = 'Riche';
$ironMan->identity = 'Tony Stark';
$ironMan->universe = 'Marvel';

$captainAmerica = new SuperHeroe('Captain America', 'Force', 'Steve Rogers', 'Marvel');
$hulk = new SuperHeroe('Hulk', 'Force', 'Bruce Banner', 'Marvel');
$batman = new SuperHeroe('Batman', 'Riche', 'Bruce Wayne', 'DC');
$spiderMan = new SuperHeroe('Spider-man', 'Souple', 'Peter Parker', 'Marvel');

echo $hulk->getRealIdentity(); // L'identité réelle de Hulk est Bruce Banner
echo $hulk->getUniverse(); // Hulk fait partie de l'univers Marvel

//$heroes = [$ironMan, $captainAmerica, $hulk, $batman, $spiderMan];
//var_dump($heroes);

var_dump(SuperHeroe::all());

/**
 * 2/
 * Créer la base de données : superheroes
 * Créer la table : superheroe
 * Créer les colonnes : id (INT), name (VARCHAR), power (VARCHAR), identity (VARCHAR) et universe (VARCHAR)
 * 
 * 3/
 * Créer une connexion avec la base de données en utilisant PDO.
 * Faire une première requéte pour insérer le héros suivant : Iron Man
 */

// Connexion avec PDO
$db = new PDO('mysql:host=localhost;dbname=superheroes', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // Activer les erreurs MySQL
]);

// La requête (préparée) pour insérer le héros
// $db->query('INSERT INTO `superheroe` (`name`, `power`, `identity`, `universe`) VALUES ("Iron Man", "Riche", "Tony Stark", "Marvel")');
$query = $db->prepare('INSERT INTO `superheroe` (`name`, `power`, `identity`, `universe`) VALUES (:name, :power, :identity, :universe)');

$query->bindValue(':name', 'Iron Man');
$query->bindValue(':power', 'Riche');
$query->bindValue(':identity', 'Tony Stark');
$query->bindValue(':universe', 'Marvel');

$query->execute(); // executer la requête préparée
