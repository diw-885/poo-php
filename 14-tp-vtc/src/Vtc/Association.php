<?php

namespace Vtc;

class Association extends Model
{
    public function save($idConducteur, $idVehicule)
    {
        // Je dois faire la requête d'association
        $db = $this->getDatabase();

        // On va vérifier si l'association n'existe pas encore
        $query = $db->prepare(
            'SELECT COUNT(*) FROM association_vehicule_conducteur WHERE id_vehicule = ? AND id_conducteur = ?'
        );
        $query->execute([$idVehicule, $idConducteur]);
        $count = $query->fetchColumn();

        if ($count >= 1) {
            return; // On arrête la méthode
        }

        // On crée l'association s'il n'existe pas
        $query = $db->prepare(
            'INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur)
            VALUES (?, ?)'
        );
        $query->execute([$idVehicule, $idConducteur]);
    }
}
