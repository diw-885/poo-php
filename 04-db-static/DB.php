<?php

class DB
{
    private static $pdo;

    public static function getPdo()
    {
        // Si une connexion à la BDD a déjà été faite, on ne la
        // refait pas
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=movies', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        return self::$pdo;
    }

    public static function query($sql, $bindings = [])
    {
        $query = self::getPdo()->prepare($sql);
        $query->execute($bindings);

        return $query->fetchAll();
    }

    public static function postQuery($sql, $bindings = [])
    {
        $query = self::getPdo()->prepare($sql);

        return $query->execute($bindings);
    }
}
