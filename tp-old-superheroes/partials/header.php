<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Super Heroes</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./list.php">Super heroes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./list.php">Les héros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create.php">Créer un héro</a>
                    </li>
                    <!--
                        On va mettre en place la gestion des supers vilains.
                        1/ Créer une classe SuperNaughty avec les attributs : name, identity, hobby et universe
                        2/ Créer la table supernaughty avec les colonnes : id, name, identity, hobby et universe
                        3/ Créer le formulaire permettant d'ajouter un super vilain (create-naughty.php)
                        4/ Créer le tableau HTML listant les supers vilains (list-naughty.php)
                        5/ Faire le fichier edit-naughty.php et delete-naughty.php (Créer une méthode delete dans la classe SuperNaughty)   
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="./list-naughty.php">Les vilains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create-naughty.php">Créer un vilain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./association-hero-naughty.php">Association</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
