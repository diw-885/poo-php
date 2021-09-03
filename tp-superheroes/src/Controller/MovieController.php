<?php

namespace Controller;

class MovieController
{
    public function index()
    {
        $movies = \Database::select('select * from movies');

        require __DIR__.'/../../templates/movies/index.php';
    }
}
