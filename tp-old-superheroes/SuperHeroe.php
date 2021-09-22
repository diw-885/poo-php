<?php

class SuperHeroe
{
    public $name;
    public $power;
    public $identity;
    public $universe;
    // Un attribut statique est conservé par toute les instances
    public static $heroes = [];

    public function __construct($name = null, $power = null, $identity = null, $universe = null)
    {
        $this->name = $name;
        $this->power = $power;
        $this->identity = $identity;
        $this->universe = $universe;
        // $this représente le SuperHeroe qui vient d'être
        // crée
        self::$heroes[] = $this;
    }

    public function getRealIdentity()
    {
        return 'L\'identité réelle de '.$this->name.' est '.$this->identity;
    }

    public function getUniverse()
    {
        return $this->name.' fait partie de l\'univers '.$this->universe;
    }

    /**
     * La fonction doit être appelée sans avoir une instance de SuperHeroe
     */
    public static function all()
    {
        // self est la même chose que SuperHero
        // les :: permettent d'accéder à un attribut statique
        return self::$heroes;
    }

    /**
     * Cette fonction permet d'assigner des valeurs aux
     * attributs de l'objet
     */
    public function hydrate($data)
    {
        $this->name = trim($data['name']);
        $this->power = trim($data['power']);
        $this->identity = trim($data['identity']);
        $this->universe = trim($data['universe']);
    }

    /**
     * Permet d'enregistrer le héros en base de données
     */
    public function save()
    {
        // Ici ma requête SQL...
        // Prépare la requête pour insérer le héros
        $query = Database::get()->prepare('INSERT INTO `superheroe` (`name`, `power`, `identity`, `universe`) VALUES (:name, :power, :identity, :universe)');

        // On associe les données récupérées à la requête
        $query->bindValue(':name', $this->name);
        $query->bindValue(':power', $this->power);
        $query->bindValue(':identity', $this->identity);
        $query->bindValue(':universe', $this->universe);

        return $query->execute(); // executer la requête préparée
    }

    /**
     * Permet de modifier le héros en base de données
     */
    public function update($id)
    {
        // Ici ma requête SQL...
        // Prépare la requête pour insérer le héros
        $query = Database::get()->prepare('UPDATE `superheroe` SET `name` = :name, `power` = :power, `identity` = :identity, `universe` = :universe WHERE id = :id');

        // On associe les données récupérées à la requête
        $query->bindValue(':name', $this->name);
        $query->bindValue(':power', $this->power);
        $query->bindValue(':identity', $this->identity);
        $query->bindValue(':universe', $this->universe);
        $query->bindValue(':id', $id);

        return $query->execute(); // executer la requête préparée
    }
}
