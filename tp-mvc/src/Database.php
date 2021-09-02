<?php

class Database
{
    private static $pdo;

    public static function get()
    {
        // Pour des raisons de performances, on ne se connecte qu'une seule fois à la BDD.
        if (null === self::$pdo) {
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // On active les erreurs MySQL
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);
            } catch (Exception $e) {
                require __DIR__.'/../templates/debug.php';
                die();
            }
        }

        return self::$pdo;
    }

    public static function select($sql, $bindings = [])
    {
        $query = self::get()->prepare($sql);
        $query->execute($bindings);

        return $query->fetchAll();
    }

    public static function selectOne($sql, $bindings = [])
    {
        $query = self::get()->prepare($sql);
        $query->execute($bindings);

        return $query->fetch();
    }

    public static function query($sql, $bindings = [])
    {
        return self::get()->prepare($sql)->execute($bindings);
    }
}
