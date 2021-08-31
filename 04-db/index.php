<?php

require 'DB.php';

// Utilisation d'une classe DB "non" statique
$db = new DB();
$movies = $db->query('select * from movie');
$movie = $db->query('select * from movie where id = :id', ['id' => 1]);

$db->postQuery(
    'insert into movie (title, description) values (:title, :description)',
    ['title' => 'Titi', 'description' => 'Un film']
);

var_dump($db->query('select * from movie'));
echo '<br />';
var_dump($db->query('select * from movie'));
echo '<br />';
var_dump($db->query('select * from movie where id = :id', ['id' => 1]));
