<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Modifier la catégorie <?= $category->name; ?></h1>

    <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $category->name; ?>">
        </div>

        <button class="btn btn-primary btn-block">Modifier</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
