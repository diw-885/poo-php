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
// On récupérer un tableau de conducteurs
// $conducteur = new Vtc\Conducteur();
$conducteurs = (new Vtc\Conducteur())->findAll();
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
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
            <!-- Parcourir le tableau -->
            <?php foreach ($conducteurs as $conducteur): ?>
                <!-- Je fais mon HTML -->
                <tr>
                    <td><?= $conducteur->id_conducteur; ?></td>
                    <td><?= $conducteur->nom; ?></td>
                    <td><?= $conducteur->prenom; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
