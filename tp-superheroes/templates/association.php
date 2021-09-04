<?php require __DIR__.'/partials/header.php'; ?>

<div class="container py-4">
    <h1>Associer un héros à des méchants</h1>

    <form method="post">
        <div class="form-group">
            <label for="heroe">Héros</label>
            <select name="heroe" id="heroe" class="form-control">
                <?php foreach ($heroes as $heroe) { ?>
                    <option value="<?= $heroe->id; ?>"><?= $heroe->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Méchants</label>
            <?php foreach ($naughties as $naughty) { ?>
                <input type="checkbox" name="naughties[]" id="naughty-<?= $naughty->id; ?>" value="<?= $naughty->id; ?>">
                <label for="naughty-<?= $naughty->id; ?>"><?= $naughty->name; ?></label>
            <?php } ?>
        </div>

        <button class="btn btn-primary btn-block">Lier</button>
    </form>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
