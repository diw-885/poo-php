<?php
require_once 'config/autoload.php';
require_once 'partials/header.php'; ?>
    <div class="container mt-5">
        <?php
            // Traitement du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                // On hydrate une instance de SuperNaughty
                $superNaughty = new SuperNaughty();
                $superNaughty->hydrate($_POST); // On hydrate l'objet avec les données du formulaire

                // Vérification des données...

                // Si la requête SQL a réussi
                if ($superNaughty->save()) {
                    echo '<div class="alert alert-success">Le vilain a été ajouté</div>';
                }
            }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="hobby">Hobby</label>
                <input type="text" name="hobby" id="hobby" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Identity</label>
                <input type="text" name="identity" id="identity" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Univers</label>
                <select name="universe" id="universe" class="form-control">
                    <option value="Marvel">Marvel</option>
                    <option value="DC">DC</option>
                </select>
            </div>

            <button class="btn btn-primary btn-block">Ajouter</button>
        </form>
    </div>

<?php require_once 'partials/footer.php'; ?>
