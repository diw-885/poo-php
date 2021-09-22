<?php

namespace Vtc;

class Vehicule extends Model
{
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    public function save()
    {
        // Ici on va faire la connexion à la BDD
        $db = $this->getDatabase();
        // Je vais faire le INSERT INTO
        $query = $db->prepare('INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES(?, ?, ?, ?)');
        $query->execute([
            $this->getMarque(),
            $this->getModele(),
            $this->getCouleur(),
            $this->getImmatriculation()
        ]);
    }

    public function findAll()
    {
        // en instance
        // $vehicule = new Vehicule();
        // $vehicule->findAll();

        // en statique
        // Vehicule::findAll();
        $db = $this->getDatabase();

        return $db->query('SELECT * FROM vehicule')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $db = $this->getDatabase();

        $query = $db->prepare('SELECT * FROM vehicule WHERE id_vehicule = ?');
        $query->execute([$id]);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function update($id)
    {
        // Je récupère la DB
        $db = $this->getDatabase();

        // Je fais la requête UPDATE
        $query = $db->prepare('UPDATE vehicule SET marque = ?, modele = ?, couleur = ?, immatriculation = ? WHERE id_vehicule = ?');
        $query->execute([
            $this->getMarque(),
            $this->getModele(),
            $this->getCouleur(),
            $this->getImmatriculation(),
            $id
        ]);
    }
}
