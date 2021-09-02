<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Modifier le film <?= $movie->title; ?></h1>

    <form method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $movie->title; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $movie->description; ?></textarea>
        </div>

        <button class="btn btn-primary btn-block">Modifier</button>
    </form>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
