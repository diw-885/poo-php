<?php require __DIR__.'/../partials/header.php'; ?>

<div class="container py-4">
    <h1>Héros</h1>

    <div class="card shadow">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Pouvoir</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Univers</th>
                    <th scope="col">Ennemis</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($heroes as $heroe) {
                    $naughties = Database::select('
                        select * from supernaughties sn
                        inner join superheroe_supernaughty sr on sr.supernaughty_id = sn.id
                        where sr.superheroe_id = :heroeId
                    ', ['heroeId' => $heroe->id]);
                ?>
                    <tr>
                        <td scope="row"><?= $heroe->id; ?></td>
                        <td>
                            <img width="50" src="<?= BASE_URL.'img/'.$heroe->image; ?>" alt="<?= $heroe->image; ?>">
                        </td>
                        <td><?= $heroe->name; ?></td>
                        <td><?= $heroe->power; ?></td>
                        <td><?= $heroe->identity; ?></td>
                        <td><?= $heroe->universe; ?></td>
                        <td>
                            <?= implode(', ', array_map(function ($naughty) {
                                return $naughty->name;
                            }, $naughties)); ?>
                        </td>
                        <td>
                            <a href="<?= BASE_URL; ?>hero/<?= $heroe->id; ?>/modifier" class="btn btn-info">Modifier</a>
                            <a href="<?= BASE_URL; ?>hero/<?= $heroe->id; ?>/supprimer" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>

                <?php if (empty($heroes)) { ?>
                    <tr>
                        <td colspan="7">
                            Il n'y a pas de héros.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>

<?php require __DIR__.'/../partials/footer.php'; ?>
