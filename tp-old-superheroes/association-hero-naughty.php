<?php
require_once 'config/autoload.php';
require_once 'partials/header.php'; ?>

<!--
    Créer un formulaire avec 2 champs select.
    Le premier select propose la liste de tous les supers héros.
    Le second propose la liste des supers vilains.
    Au clic sur "Associer", on ajoute la relation entre le héro et le vilain dans la BDD.
    (On doit récupèrer l'id du héro et du vilain)
-->

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // On récupère les ids du select
        $heroe = $_POST['heroe'];
        $naughty = $_POST['naughty'];

        // On crée la relation entre les 2 tables
        $query = Database::get()
            ->prepare('INSERT INTO superheroe_has_supernaughty (superheroe_id, supernaughty_id)
                       VALUES (:superheroe_id, :supernaughty_id)');
        $query->bindValue('superheroe_id', $heroe);
        $query->bindValue('supernaughty_id', $naughty);
        $query->execute();
    }

    $superHeroes = Database::get()->query('SELECT * FROM `superheroe`')->fetchAll(PDO::FETCH_OBJ);
    $superNaughties = SuperNaughty::findAll();
?>

<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label for="heroe">Super héros</label>
            <select name="heroe" id="heroe" class="form-control">
                <?php foreach ($superHeroes as $superHeroe) { ?>
                    <option value="<?= $superHeroe->id; ?>"><?= $superHeroe->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="naughty">Super vilain</label>
            <select name="naughty" id="naughty" class="form-control">
                <?php foreach ($superNaughties as $superNaughty) { ?>
                    <option value="<?= $superNaughty->id; ?>"><?= $superNaughty->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <button class="btn btn-primary">Associer</button>
    </form>
</div>

<?php require_once 'partials/footer.php'; ?>
