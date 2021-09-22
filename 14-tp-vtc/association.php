<?php

// Autoload de classes
spl_autoload_register(function ($class) {
    // Pour Linux et macOS (Unix)
    // Transforme Vtc\Conducteur() en Vtc/Conducteur
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // $class = Vtc/Conducteur
    require_once __DIR__.'/src/'.$class.'.php';
});

/**
 * Ici, on doit afficher les véhicules liés aux conducteurs
 * Et on doit aussi pouvoir lier un véhicule à un conducteur
 */

// On récupère d'abord les véhicules
$vehicules = (new Vtc\Vehicule())->findAll();
// Ensuite les conducteurs
$conducteurs = (new Vtc\Conducteur())->findAll();

// Traitement du formulaire
if (!empty($_POST)) {
    // Il faudrait pouvoir écrire ce code ?
    (new Vtc\Association())->save($_POST['id_conducteur'], $_POST['id_vehicule']);
}
?>

<form action="" method="post">
    <label for="id_vehicule">Véhicule</label>
    <select name="id_vehicule" id="id_vehicule">
        <?php foreach ($vehicules as $vehicule): ?>
            <option value="<?= $vehicule->id_vehicule; ?>">
                <?= $vehicule->immatriculation; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="id_conducteur">Conducteur</label>
    <select name="id_conducteur" id="id_conducteur">
        <?php foreach ($conducteurs as $conducteur): ?>
            <option value="<?= $conducteur->id_conducteur; ?>">
                <?= $conducteur->prenom; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button>Associer</button>
</form>
