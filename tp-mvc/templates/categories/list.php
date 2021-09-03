<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Catégories</h1>

    <div class="card shadow">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td scope="row"><?= $category->id; ?></td>
                        <td><?= $category->name; ?></td>
                        <td>
                            <a href="<?= BASE_URL; ?>categorie/<?= $category->id; ?>/modifier" class="btn btn-info">Modifier</a>
                            <a href="<?= BASE_URL; ?>categorie/<?= $category->id; ?>/supprimer" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>

                <?php if (empty($categories)) { ?>
                    <tr>
                        <td colspan="4">
                            Il n'y a pas de categories.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
