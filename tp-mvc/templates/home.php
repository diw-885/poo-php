<?php require __DIR__.'/partials/header.php'; ?>

<div class="container py-4">
    <h1>Bienvenue sur le Mini Framework POO 🚧👷‍♂️</h1>

    <p>L'objectif de cette structure est de comprendre la logique MVC sans devoir tout créer de zéro.</p>
    <p>Vous avez une structure d'intégration Bootstrap de base dans le dossier <code>templates/</code>.</p>
    <p>Vous pouvez créer de nouvelles pages dans le fichier <code>public/index.php</code>.</p>
    <p>Il y a une base de données d'exemple à importer du dossier <code>database/</code>.</p>

    <h2>TP1 - Avec formateur</h2>

    <p>Faire la modification / suppression des films</p>
    <p>La première chose va être de créer une page qui liste les catégories de la même manière que les films.</p>
    <p>Il faudra ensuite créer un formulaire permettant d'ajouter une catégorie.</p>
    <p>Il faudra pouvoir modifier et supprimer une catégorie.</p>
    <p>Créer un modèle avec l'héritage</p>

    <h2>TP2 - Avec formateur</h2>

    <p>Association des films avec les catégories.</p>
    <p>Upload des images pour les films.</p>

    <h2>TP3 - Sans formateur</h2>

    <p>Créer une base de données contenant des super héros</p>
    <p>La table <code>superheroes</code> contient les colonnes</p>
    <ul>
        <li>id INT PK AI</li>
        <li>name VARCHAR</li>
        <li>power VARCHAR</li>
        <li>identity VARCHAR</li>
        <li>universe VARCHAR</li>
        <li>image VARCHAR NULL</li>
    </ul>
    <p>La table <code>supernaughties</code> contient les colonnes</p>
    <ul>
        <li>id INT PK AI</li>
        <li>name VARCHAR</li>
        <li>hobby VARCHAR</li>
        <li>identity VARCHAR</li>
        <li>universe VARCHAR</li>
        <li>image VARCHAR NULL</li>
    </ul>
    <p>La table <code>superheroe_supernaughty</code> contient les colonnes</p>
    <ul>
        <li>superheroe_id INT FK</li>
        <li>supernaughty_id INT FK</li>
    </ul>

    <h2>TP4 - Sans formateur</h2>

    <p>Créer un formulaire permettant d'ajouter un super héros</p>
    <p>Faites la même chose pour les super méchants</p>

    <img class="img-fluid" src="<?= BASE_URL; ?>img/creer.png" alt="TP4">

    <p>Ajouter la possibilité de modifier / supprimer un super héros</p>
    <p>Faites la même chose pour les super méchants</p>

    <img class="img-fluid" src="<?= BASE_URL; ?>img/modifier.png" alt="TP4">

    <h2>TP5 - Sans formateur</h2>

    <p>Créer une page qui liste les super héros sous forme de tableau</p>
    <p>Faites la même chose pour les super méchants</p>

    <img class="img-fluid" src="<?= BASE_URL; ?>img/liste.png" alt="TP5">

    <h2>TP6 - Sans formateur</h2>

    <p>Créer un formulaire qui permet d'associer un super héros à un ou plusieurs super méchants</p>

    <img class="img-fluid" src="<?= BASE_URL; ?>img/associer.png" alt="TP6">

    <p>Créer une page qui liste les super héros ainsi que le/les super méchants liés</p>
    <p>Sur la liste des super héros, afficher le nombre de super héros</p>
    <p>Sur une page, afficher les ennemis de Batman</p>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
