<?php

require_once 'config/autoload.php';

// Récupérer l'id du vilain à supprimer
$id = $_GET['id'] ?? null;

// On supprimer le vilain
$superNaughty = new SuperNaughty();
$superNaughty->delete($id);

// Redirection vers la liste
header('Location: list-naughty.php');
exit;
