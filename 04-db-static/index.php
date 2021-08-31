<?php

require 'DB.php';

// Utilisation d'une classe DB statique
$movies = DB::query('select * from movie');
$movie = DB::query('select * from movie where id = :id', ['id' => 1]);

DB::postQuery(
    'insert into movie (title, description) values (:title, :description)',
    ['title' => 'Titi', 'description' => 'Un film']
);

var_dump(DB::query('select * from movie'));
echo '<br />';
var_dump(DB::query('select * from movie'));
echo '<br />';
var_dump(DB::query('select * from movie where id = :id', ['id' => 1]));
