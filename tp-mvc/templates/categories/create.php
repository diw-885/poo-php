<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Créer une catégorie</h1>

    <?php if (! empty($errors)) { ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $field => $error) { ?>
                <li>
                    <?= $field; ?>: <?= $error; ?>
                </li>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (isset($success)) { ?>
        <div class="alert alert-success">
            <?= $success; ?>
        </div>
    <?php } ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="title" class="form-control">
        </div>

        <button class="btn btn-primary btn-block">Ajouter</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
