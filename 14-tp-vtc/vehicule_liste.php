<?php

/**
 * Ici, on va devoir afficher la liste des véhicules
 */

spl_autoload_register(function ($class) {
    // Pour Linux et macOS (Unix)
    // Transforme Vtc\Conducteur() en Vtc/Conducteur
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // $class = Vtc/Conducteur
    require_once __DIR__.'/src/'.$class.'.php';
});
// On récupérer un tableau de véhicules
// $vehicule = new Vtc\Vehicule();
$vehicules = (new Vtc\Vehicule())->findAll();
// On va devoir créer cette méthode en statique

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Lien Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Immatriculation</th>
                <th>Actions</th>
            </tr>
            <!-- Parcourir le tableau -->
            <?php foreach ($vehicules as $vehicule): ?>
                <!-- Je fais mon HTML -->
                <tr>
                    <td><?= $vehicule->id_vehicule; ?></td>
                    <td><?= $vehicule->marque; ?></td>
                    <td><?= $vehicule->modele; ?></td>
                    <td><?= $vehicule->couleur; ?></td>
                    <td><?= $vehicule->immatriculation; ?></td>
                    <td>
                        <a href="?edit=<?= $vehicule->id_vehicule; ?>">Modifier</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php // Si $_GET['edit'] alors on affiche un formulaire
            if (isset($_GET['edit'])) {
                // Ici, on doit récupérer le véhicule à modifier ?
                $vehicule = (new Vtc\Vehicule())->find($_GET['edit']); // On va devoir créer cette méthode
                // $vehicule nous donnera le véhicule à modifier

                // Vérification du formulaire ?
                if (!empty($_POST)) {
                    $vehiculeEdit = new Vtc\Vehicule();
                    $vehiculeEdit->setMarque($_POST['marque']);
                    $vehiculeEdit->setModele($_POST['modele']);
                    $vehiculeEdit->setCouleur($_POST['couleur']);
                    $vehiculeEdit->setImmatriculation($_POST['immatriculation']);

                    // On fait l'update
                    $vehiculeEdit->update($_GET['edit']);
                    // ON redirige
                    header('Location: vehicule_liste.php');
                }
            ?>

            <form action="" method="post">
                <div>
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" id="marque" value="<?= $vehicule->marque ?>">
                </div>
                <div>
                    <label for="modele">Modèle</label>
                    <input type="text" name="modele" id="modele" value="<?= $vehicule->modele ?>">
                </div>
                <div>
                    <label for="couleur">Couleur</label>
                    <input type="text" name="couleur" id="couleur" value="<?= $vehicule->couleur ?>">
                </div>
                <div>
                    <label for="immatriculation">Immatriculation</label>
                    <input type="text" name="immatriculation" id="immatriculation" value="<?= $vehicule->immatriculation ?>">
                </div>

                <button>Modifier</button>
            </form>

        <?php } ?>
    </body>
</html>
