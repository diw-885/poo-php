<?php

/**
 * La configuration du projet. L'URL de base change en fonction de votre projet, de votre machine...
 * Les accès à la base de données doivent également être configurés pour qu'elle fonctionne correctement.
 * 
 * BASE_URL va servir à générer correctement les liens du menu ou du site.
 */

define('BASE_URL', '/poo-php/tp-superheroes/public/');
define('DB_DATABASE', 'super');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

/**
 * Chargement de l'autoloader 📻 qui s'occupe de rendre disponible nos classes à travers toute
 * l'application. Le dossier src/ contient vos classes. Le dossier vendor/ contient les classes "tierces".
 */
require __DIR__.'/../vendor/autoload.php';

/**
 * Ce fichier est le "front controller" 🏎 de notre application web.
 * Le routeur permet de définir toutes les pages (routes) de notre application web.
 *
 * Pour en savoir plus, https://altorouter.com/
 */
$router = new Router();

/**
 * Pour que le routeur fonctionne, la constante BASE_URL doit être configurée.
 *
 * Par exemple, si vous accédez à votre application via http://localhost/poo-php/tp-mvc/public
 * La variable BASE_URL est "/poo-php/tp-mvc/public"
 */
$router->setBasePath(rtrim(BASE_URL, '/'));

/**
 * Ici, vous allez définir l'ensemble des routes / pages 🛣 de votre application.
 *
 * Une route doit correspondre à une "closure" ou un Controller.
 */
$router->map('GET', '/', function () {
    // On écrit le HTML dans un autre fichier qui représente la vue
    require __DIR__.'/../templates/home.php';
});

/**
 * Ici, on peut créer les pages...
 */

// Création d'un super héros
$router->map('GET|POST', '/heros/nouveau', function () {
    $errors = [];
    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupèration et clean des valeurs du formulaire
        $name = trim(htmlspecialchars($_POST['name']));
        $power = trim(htmlspecialchars($_POST['power']));
        $identity = trim(htmlspecialchars($_POST['identity']));
        $universe = trim(htmlspecialchars($_POST['universe']));

        if (empty($name)) {
            $errors['name'] = 'Le nom est vide.';
        }

        if (empty($power)) {
            $errors['power'] = 'Le pouvoir est vide.';
        }

        if (empty($identity)) {
            $errors['identity'] = 'L\'identité est vide.';
        }

        if (empty($universe)) {
            $errors['universe'] = 'L\'univers est vide.';
        }

        if (empty($errors)) {
            Database::query(
                'insert into superheroes (name, power, identity, universe) values (:name, :power, :identity, :universe)',
                ['name' => $name, 'power' => $power, 'identity' => $identity, 'universe' => $universe]
            );

            header('Location: '.BASE_URL.'heros');
        }
    }

    require __DIR__.'/../templates/heroes/create.php';
});

// Listing des supers héros
$router->map('GET', '/heros', function () {
    $heroes = Database::select('select * from superheroes');
    $batmanEnemies = Database::select('
        select sn.name from supernaughties sn
        inner join superheroe_supernaughty sr on sn.id = sr.supernaughty_id
        inner join superheroes sh on sh.id = sr.superheroe_id
        where sh.name = "Batman"
    ');

    require __DIR__.'/../templates/heroes/list.php';
});

// Modification d'un super héros
$router->map('GET|POST', '/hero/[i:id]/modifier', function ($id) {
    $heroe = Database::selectOne('select * from superheroes where id = :id', ['id' => $id]);

    $errors = [];
    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupèration et clean des valeurs du formulaire
        $name = trim(htmlspecialchars($_POST['name']));
        $power = trim(htmlspecialchars($_POST['power']));
        $identity = trim(htmlspecialchars($_POST['identity']));
        $universe = trim(htmlspecialchars($_POST['universe']));

        if (empty($name)) {
            $errors['name'] = 'Le nom est vide.';
        }

        if (empty($power)) {
            $errors['power'] = 'Le pouvoir est vide.';
        }

        if (empty($identity)) {
            $errors['identity'] = 'L\'identité est vide.';
        }

        if (empty($universe)) {
            $errors['universe'] = 'L\'univers est vide.';
        }

        if (empty($errors)) {
            Database::query(
                'update superheroes set name = :name, power = :power, identity = :identity, universe = :universe where id = :id',
                ['id' => $id, 'name' => $name, 'power' => $power, 'identity' => $identity, 'universe' => $universe]
            );

            header('Location: '.BASE_URL.'heros');
        }
    }

    require __DIR__.'/../templates/heroes/edit.php';
});

// Suppression d'un super héros
$router->map('GET', '/hero/[i:id]/supprimer', function ($id) {
    Database::query('delete from superheroes where id = :id', ['id' => $id]);

    header('Location: '.BASE_URL.'heros');
});

// Version avec Controller pour les super vilains
$router->map('GET|POST', '/vilains/nouveau', 'SuperNaughtyController@create');
$router->map('GET', '/vilains', 'SuperNaughtyController@list');
$router->map('GET|POST', '/vilain/[i:id]/modifier', 'SuperNaughtyController@edit');
$router->map('GET|POST', '/vilain/[i:id]/supprimer', 'SuperNaughtyController@delete');

// Association
$router->map('GET|POST', '/association', function () {
    $heroes = Database::select('select * from superheroes');
    $naughties = Database::select('select * from supernaughties');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $heroeId = trim(htmlspecialchars($_POST['heroe']));
        $naughtiesIds = $_POST['naughties'] ?? [];

        foreach ($naughtiesIds as $naughtyId) {
            Database::query(
                'insert into superheroe_supernaughty (supernaughty_id, superheroe_id) values (:naughtyId, :heroeId)',
                ['naughtyId' => $naughtyId, 'heroeId' => $heroeId]
            );
        }
    }

    require __DIR__.'/../templates/association.php';
});

/**
 * Permet d'exécuter l'application.
 * Ce code doit être la dernière ligne du fichier.
 */
$router->run();
