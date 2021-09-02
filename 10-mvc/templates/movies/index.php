<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Films</h1>

    <div class="card shadow">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Jaquette</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie) { ?>
                    <tr>
                        <td scope="row"><?= $movie->id; ?></td>
                        <td><?= $movie->title; ?></td>
                        <td><?= $movie->description; ?></td>
                        <td><?= $movie->image; ?></td>
                        <td>
                            <a href="<?= BASE_URL; ?>film/<?= $movie->id; ?>/modifier" class="btn btn-info">Modifier</a>
                            <a href="<?= BASE_URL; ?>film/<?= $movie->id; ?>/supprimer" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>

                <?php if (empty($movies)) { ?>
                    <tr>
                        <td colspan="4">
                            Il n'y a pas de films.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
