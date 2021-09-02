<?php

namespace Model;

abstract class Model
{
    /**
     * La table doit être définie par la classe enfant qui hérite
     */
    protected static $table;

    /**
     * Permet de récupérer un tableau d'instance du modèle
     */
    public static function all()
    {
        // static:: est la classe appellante et self:: est toujours Model
        $table = static::$table;

        return \Database::select("select * from $table");
    }

    /**
     * Permet de récupérer une instance du modèle
     */
    public static function find($id)
    {
        $table = static::$table;

        return \Database::select("select * from $table where id = :id", ['id' => $id]);
    }

    /**
     * Permet d'enregistrer une instance dans la BDD
     */
    public function save()
    {
        
    }
}
