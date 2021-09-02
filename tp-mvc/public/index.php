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
    require __DIR__.'/../templates/movies/list.php';
});

// Cette page représente un formulaire permettant d'ajouter un élément dans une BDD
$router->map('GET|POST', '/film/creer', function () {
    $errors = [];
    // Si la requête HTTP est en POST, le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // On "sanitize" les données
        // htmlspecialchars('<h1>a</h1>') => &lt;h1&gt;a&lt;/h1&gt;
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

            // Message de succès
            $success = 'Le film a été ajouté';

            // ou Redirection vers la liste des films
            header('Location: '.BASE_URL.'films');
        }

        // TODO: On peut créer un modèle...
    }

    require __DIR__.'/../templates/movies/create.php';
});

// Cette page permet de modifier un film
$router->map('GET|POST', '/film/[i:id]/modifier', function ($id) {
    // requête sql pour récupèrer le film qu'on modifie
    $movie = Database::selectOne('select * from movies where id = :id', ['id' => $id]);

    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            // Modification en base de données
            Database::query('update movies set title = :title, description = :description where id = :id', [
                'id' => $id,
                'title' => $title,
                'description' => $description,
            ]);

            // Message de succès
            $success = 'Le film a été modifié';

            // ou Redirection vers la liste des films
            header('Location: '.BASE_URL.'films');
        }
    }

    require __DIR__.'/../templates/movies/edit.php';
});

// Cette page permet de supprimer un film de la base de données
$router->map('GET', '/film/[i:id]/supprimer', function ($id) {
    // $id est comme un $_GET['id']
    // Requête SQL pour supprimer le film concerné
    Database::query('delete from movies where id = :id', ['id' => $id]);
    // Après la suppression, on redirige vers la liste des films
    header('Location: '.BASE_URL.'films');
});

// Voici une route avec un exemple de Controller
$router->map('GET', '/controller', 'MovieController@index');

/**
 * Permet d'exécuter l'application.
 * Ce code doit être la dernière ligne du fichier.
 */
$router->run();
