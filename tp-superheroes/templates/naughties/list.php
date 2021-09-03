<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Vilains</h1>

    <div class="card shadow">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Passe temps</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Univers</th>
                    <th scope="col">Ennemis</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($naughties as $naughty) { ?>
                    <tr>
                        <td scope="row"><?= $naughty->id; ?></td>
                        <td>
                            <img width="50" src="<?= BASE_URL.'img/'.$naughty->image; ?>" alt="<?= $naughty->image; ?>">
                        </td>
                        <td><?= $naughty->name; ?></td>
                        <td><?= $naughty->hobby; ?></td>
                        <td><?= $naughty->identity; ?></td>
                        <td><?= $naughty->universe; ?></td>
                        <td>???</td>
                        <td>
                            <a href="<?= BASE_URL; ?>vilain/<?= $naughty->id; ?>/modifier" class="btn btn-info">Modifier</a>
                            <a href="<?= BASE_URL; ?>vilain/<?= $naughty->id; ?>/supprimer" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>

                <?php if (empty($naughties)) { ?>
                    <tr>
                        <td colspan="7">
                            Il n'y a pas de vilains.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
