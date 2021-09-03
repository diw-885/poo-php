<?php require __DIR__.'/partials/header.php'; ?>

<div class="container py-4">
    <h1>Oops ! 404 not found !</h1>

    <p>
        Si vous vous retrouvez sur cette page, vérifiez que vous avez bien créer la route actuelle
        <code><?php
            $basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
            $route = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
            echo $route;
        ?></code>
        dans <code>public/index.php</code>.
    </p>
    <p>
        Vérifiez également que vous avez configuré la constante
        <code>BASE_URL</code> du projet dans <code>public/index.php</code>.
    </p>
    <p>
        Il devrait sûrement ressembler à cela : <br />
        <code>define('BASE_URL', '<?= str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']); ?>');</code> <br />
        <code>$router->setBasePath(rtrim(BASE_URL, '/'));</code>.
    </p>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
