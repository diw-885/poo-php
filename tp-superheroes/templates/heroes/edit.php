<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Modifier le super héros <?= $heroe->name; ?></h1>

    <?php if (! empty($errors)) { ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) { ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php } ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $heroe->name; ?>">
        </div>

        <div class="form-group">
            <label for="power">Pouvoir</label>
            <input type="text" id="power" name="power" class="form-control" value="<?= $heroe->power; ?>">
        </div>

        <div class="form-group">
            <label for="identity">Identité</label>
            <input type="text" id="identity" name="identity" class="form-control" value="<?= $heroe->identity; ?>">
        </div>

        <div class="form-group">
            <label for="universe">Univers</label>
            <select id="universe" name="universe" class="form-control">
                <option value="Marvel">Marvel</option>
                <option value="DC">DC</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <div class="custom-file">
                <label class="custom-file-label">Image</label>
                <input type="file" id="image" name="image" class="custom-file-input">
            </div>
        </div>

        <button class="btn btn-primary btn-block">Modifier</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
