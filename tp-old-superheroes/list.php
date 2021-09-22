<?php

/**
 * Reprendre le header (de !DOCTYPE jusque <body>) de create.php et l'ajouter dans un fichier partials/header.php
 * Reprendre le footer (de la première balise <script> à </html>) de create.php et l'ajouter dans un fichier partials/footer.php
 * 
 * Dans le fichier list.php, inclure le header et inclure le footer.
 * Entre le header et le footer, on créera un tableau HTML avec Bootstrap.
 * Dans ce tableau, on affichera la liste des super héros présents dans la base de données.
 * 
 * Une fois le fichier list.php terminé, on ajoutera une navbar dans le partials/header.php. La navbar permettra de naviguer entre la page list.php (Les héros) et la page create.php (Créer un héros). Il faudra bien inclure le header et le footer dans create.php
 */

require_once 'config/autoload.php';
require_once 'partials/header.php';

// Récupèrer les héros
$query = Database::get()->query('SELECT * FROM `superheroe`');
$superHeroes = $query->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="card shadow">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Pouvoir</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Univers</th>
                    <th scope="col">Ennemis</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($superHeroes as $superHeroe) {

                    // On récupère les ennemis du super héros
                    $enemies = Database::get()->query(
                       'SELECT * FROM superheroe sh
                        INNER JOIN superheroe_has_supernaughty shs ON shs.superheroe_id = sh.id
                        INNER JOIN supernaughty sn ON shs.supernaughty_id = sn.id
                        WHERE sh.id = '.$superHeroe->id)->fetchAll(PDO::FETCH_OBJ);

                    ?>

                    <tr>
                        <td scope="row"><?= $superHeroe->id; ?></td>
                        <td>
                            <img width="50" src="./img/<?= $superHeroe->image; ?>" alt="<?= $superHeroe->name; ?>">
                        </td>
                        <td><?= $superHeroe->name; ?></td>
                        <td><?= $superHeroe->power; ?></td>
                        <td><?= $superHeroe->identity; ?></td>
                        <td><?= $superHeroe->universe; ?></td>
                        <td>
                            <?php foreach ($enemies as $enemy) {
                                echo $enemy->name.', ';
                            } ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-secondary">Révéler</a>
                            <!--
                                Créer un fichier edit.php
                                Dans ce fichier, on doit pouvoir récupérer l'id du héros à modifier via $_GET...
                                On se connecte à la base de données avec PDO. (Utiliser un fichier commun)
                                On affiche un formulaire identique à celui de création de héros et on pré remplit les champs du formulaire avec le héros à modifier (SELECT...).
                                Quand on soumet le formulaire, on exécute la bonne requête (UPDATE...) pour modifier le héro concerné.
                            -->
                            <a href="./edit.php?id=<?= $superHeroe->id ?>" class="btn btn-info">Modifier</a>
                            <!--
                                Créer un fichier delete.php
                                Dans ce fichier, on doit pouvoir récupérer l'id du héros à supprimer via $_GET...
                                On se connecte à la base de données avec PDO. (Utiliser un fichier commun)
                                On exécute la bonne requête (DELETE...) pour supprimer le héros concerné.
                                A la fin, on redirige l'utilisateur vers la liste des héros.
                            -->
                            <a href="./delete.php?id=<?= $superHeroe->id ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'partials/footer.php';
