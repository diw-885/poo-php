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

        return \Database::selectOne("select * from $table where id = :id", ['id' => $id]);
    }

    /**
     * Permet d'enregistrer une instance dans la BDD
     */
    public function save()
    {
        \Database::query(
            'insert into supernaughties (name, hobby, identity, universe) values (:name, :hobby, :identity, :universe)',
            ['name' => $this->name, 'hobby' => $this->hobby, 'identity' => $this->identity, 'universe' => $this->universe]
        );
    }

    /**
     * Permet de mettre à jour une instance dans la BDD
     */
    public function update($id)
    {
        \Database::query(
            'update supernaughties set name = :name, hobby = :hobby, identity = :identity, universe = :universe where id = :id',
            ['id' => $id, 'name' => $this->name, 'hobby' => $this->hobby, 'identity' => $this->identity, 'universe' => $this->universe]
        );
    }

    /**
     * Permet de supprimer une instance de la BDD
     */
    public static function delete($id)
    {
        $table = static::$table;

        return \Database::query("delete from $table where id = :id", ['id' => $id]);
    }
}
