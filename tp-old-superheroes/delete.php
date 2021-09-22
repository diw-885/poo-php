<?php

require_once 'config/autoload.php';

// Récupérer l'id du héros à supprimer
$id = $_GET['id'] ?? null;

// On supprimer le héros
$query = Database::get()->prepare('DELETE FROM superheroe WHERE id = :id');
$query->bindValue('id', $id);
$query->execute();

// Redirection vers la liste
header('Location: list.php');
exit;
