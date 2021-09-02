<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Créer un film</h1>

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
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary btn-block">Ajouter</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
