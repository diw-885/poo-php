<?php

class DB
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=movies', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($sql, $bindings = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($bindings);

        return $query->fetchAll();
    }

    public function postQuery($sql, $bindings = [])
    {
        $query = $this->pdo->prepare($sql);

        return $query->execute($bindings);
    }
}
