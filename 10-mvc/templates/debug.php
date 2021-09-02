<?php require __DIR__.'/partials/header.php'; ?>

<div class="container py-4">
    <h1>Oops ! La base de données ne fonctionne pas !</h1>

    <div class="d-flex">
        <img src="<?= BASE_URL; ?>img/travolta.gif" alt="Confused" />

        <h3>
            <code><?= $e->getMessage(); ?></code> <br />
            Veuillez vérifier vos accès de base de données dans le fichier <code>public/index.php</code>.
        </h3>
    </div>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
