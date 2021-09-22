<?php

class Database
{
    private static $pdo;

    public static function get()
    {
        if (null === self::$pdo) { // On s'assure que la connexion à la BDD se fait une seule fois
            self::$pdo = new PDO('mysql:host=localhost;dbname=superheroes', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // Activer les erreurs MySQL
            ]);
        }

        return self::$pdo;
    }
}
