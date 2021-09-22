<?php
require_once 'config/autoload.php';
require_once 'partials/header.php'; ?>
    <div class="container mt-5">
        <?php
            // On récupère l'id de l'URL
            $id = $_GET['id'] ?? null;
            // On récupère le héros qui va être modifié
            $query = Database::get()->prepare('SELECT * FROM superheroe WHERE id = :id');
            $query->bindValue('id', $id);
            $query->execute();
            // Le setFetchMode ici permet de retourner une instance de SuperHeroe avec fetch plutôt qu'une instance de StdClass
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, SuperHeroe::class);
            $superHeroe = $query->fetch(); // le fetch fait un new SuperHeroe(); grâce à PDO::FETCH_CLASS
            
            // Traitement du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                // On hydrate une instance de SuperHeroe
                //$superHeroe = new SuperHeroe();
                $superHeroe->hydrate($_POST); // On hydrate l'objet avec les données du formulaire

                // Vérification des données...

                // Si la requête SQL a réussi
                if ($superHeroe->update($id)) {
                    echo '<div class="alert alert-success">Le héros a été modifié</div>';
                }
            }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $superHeroe->name ?>">
            </div>
            <div class="form-group">
                <label for="power">Power</label>
                <input type="text" name="power" id="power" class="form-control" value="<?= $superHeroe->power ?>">
            </div>
            <div class="form-group">
                <label for="name">Identity</label>
                <input type="text" name="identity" id="identity" class="form-control" value="<?= $superHeroe->identity ?>">
            </div>
            <div class="form-group">
                <label for="name">Univers</label>
                <select name="universe" id="universe" class="form-control">
                    <option value="Marvel" <?= ($superHeroe->universe === 'Marvel') ? 'selected' : ''; ?>>Marvel</option>
                    <option value="DC" <?= ($superHeroe->universe === 'DC') ? 'selected' : ''; ?>>DC</option>
                </select>
            </div>

            <button class="btn btn-primary btn-block">Modifier</button>
        </form>
    </div>

<?php require_once 'partials/footer.php'; ?>
