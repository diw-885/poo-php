<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Créer un super héros</h1>

    <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="power">Pouvoir</label>
            <input type="text" id="power" name="power" class="form-control">
        </div>

        <div class="form-group">
            <label for="identity">Identité</label>
            <input type="text" id="identity" name="identity" class="form-control">
        </div>

        <div class="form-group">
            <label for="universe">Univers</label>
            <input type="text" id="universe" name="universe" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <div class="custom-file">
                <label class="custom-file-label">Image</label>
                <input type="file" id="image" name="image" class="custom-file-input">
            </div>
        </div>

        <button class="btn btn-primary btn-block">Ajouter</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
