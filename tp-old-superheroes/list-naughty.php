<?php

require_once 'config/autoload.php';
require_once 'partials/header.php';

// Récupèrer les vilains
$superNaughties = SuperNaughty::findAll();

?>

<div class="container mt-5">
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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($superNaughties as $superNaughty) { ?>
                    <tr>
                        <td scope="row"><?= $superNaughty->id; ?></td>
                        <td>
                            <img width="50" src="./img/<?= $superNaughty->image; ?>" alt="<?= $superNaughty->name; ?>">
                        </td>
                        <td><?= $superNaughty->name; ?></td>
                        <td><?= $superNaughty->hobby; ?></td>
                        <td><?= $superNaughty->identity; ?></td>
                        <td><?= $superNaughty->universe; ?></td>
                        <td>
                            <a href="#" class="btn btn-secondary">Révéler</a>
                            <a href="./edit-naughty.php?id=<?= $superNaughty->id ?>" class="btn btn-info">Modifier</a>
                            <a href="./delete-naughty.php?id=<?= $superNaughty->id ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
		</table>
	</div>
</div>

<?php require_once 'partials/footer.php';
