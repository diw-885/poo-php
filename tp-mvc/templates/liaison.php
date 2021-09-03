<?php require __DIR__.'/partials/header.php'; ?>

<div class="container py-4">
    <h1>Lier un film à des catégories</h1>

    <form method="post">
        <div class="form-group">
            <label for="movie">Film</label>
            <select name="movie" id="movie" class="form-control">
                <?php foreach ($movies as $movie) { ?>
                    <option value="<?= $movie->id; ?>"><?= $movie->title; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Catégories</label>
            <?php foreach ($categories as $category) { ?>
                <!-- Quand on a plusieurs checkboxes, on rajoute [] au name pour pouvoir
                    récupèrer un tableau dans $_POST -->
                <input type="checkbox" name="categories[]" id="category-<?= $category->id; ?>" value="<?= $category->id; ?>">
                <label for="category-<?= $category->id; ?>"><?= $category->name; ?></label>
            <?php } ?>
        </div>

        <button class="btn btn-primary btn-block">Lier</button>
    </form>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
