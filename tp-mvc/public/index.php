<?php

/**
 * La configuration du projet. L'URL de base change en fonction de votre projet, de votre machine...
 * Les accès à la base de données doivent également être configurés pour qu'elle fonctionne correctement.
 * 
 * BASE_URL va servir à générer correctement les liens du menu ou du site.
 */

define('BASE_URL', '/poo-php/tp-mvc/public/');
define('DB_DATABASE', 'webflix');
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

$router->map('GET', '/nous-contacter', function () {
    // __DIR__ => C:\xampp\htdocs\poo-php\tp-mvc\public
    require __DIR__.'/../templates/contact.php';
});

// Cette page représente une liste de films provenant d'une base de données
$router->map('GET', '/films', function () {
    // Ici on prépare les variables et les requêtes.
    // Ces variables seront accessibles dans la vue.
    $movies = Database::select('select * from movies');

    // On peut créer un modèle...
    // $movies = Model\Movie::all();

    // Ce fichier représente la vue.
    require __DIR__.'/../templates/movies/index.php';
});

// Cette page représente un formulaire permettant d'ajouter un élément dans une BDD
$router->map('GET|POST', '/film/creer', function () {
    $errors = [];
    // Si la requête HTTP est en POST, le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // On "sanitize" les données
        $title = trim(htmlspecialchars($_POST['title']));
        $description = trim(htmlspecialchars($_POST['description']));

        // Vérification des erreurs
        if (empty($title)) {
            $errors['title'] = 'Le titre est vide.';
        }

        if (empty($description)) {
            $errors['description'] = 'La description est vide.';
        }

        if (empty($errors)) {
            // Insertion en base de données
            Database::query('insert into movies (title, description) VALUES (:title, :description)', [
                'title' => $title,
                'description' => $description,
            ]);

            $success = 'Le film a été ajouté';
        }

        // TODO: On peut créer un modèle...
    }

    require __DIR__.'/../templates/movies/create.php';
});

// Voici une route avec un exemple de Controller
$router->map('GET', '/controller', 'MovieController@index');

/**
 * Permet d'exécuter l'application.
 */
$router->run();
