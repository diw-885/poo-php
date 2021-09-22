<?php

namespace Vtc;

class Conducteur extends Model
{
    // On ajoute en tant que propriétés les colonnes de la BDD
    private $nom;
    private $prenom;

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function save()
    {
        // Ici on va faire la connexion à la BDD
        $db = $this->getDatabase();
        // Je vais faire le INSERT INTO
        $query = $db->prepare('INSERT INTO conducteur (nom, prenom) VALUES(?, ?)');
        $query->execute([
            $this->getNom(),
            $this->getPrenom()
        ]);
    }

    public function findAll()
    {
        $db = $this->getDatabase();

        return $db->query('SELECT * FROM conducteur')->fetchAll(\PDO::FETCH_OBJ);
    }
}
