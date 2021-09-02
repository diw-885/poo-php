<?php

function dump($arg)
{
    ob_start(); ?>

    <pre><code style="font-size: 87.5%; color: #e83e8c; word-break: break-word;"><?php print_r($arg); ?></code></pre>

    <?php ob_end_flush();
}

/**
 * Ici, on déclare l'autoload pour les classes PHP.
 *
 * Cela rend disponible les classes PHP "tierces" du dossier vendor
 * ainsi que vos classes spécifiques à notre application web.
 *
 * Vos classes doivent être présentes dans le dossier src et pas ailleurs.
 * Vous ne devez pas modifier le code du dossier vendor sauf si you know what you're doing.
 */

spl_autoload_register(function ($class) {
    // Pour Linux et macOS (Unix)
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    if (file_exists(__DIR__.'/'.$class.'.php')) {
        require __DIR__.'/'.$class.'.php';
    }

    if (file_exists(__DIR__.'/../src/'.$class.'.php')) {
        require __DIR__.'/../src/'.$class.'.php';
    }
});
