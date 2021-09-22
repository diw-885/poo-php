<?php

/**
 * Ce script va nous permettre de créer la base de données
 */

// Première étape: créer un objet PDO qui se connecte à la BDD vtc
$db = new PDO('mysql:host=localhost', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
]);

// On crée la base de données
$db->query('CREATE DATABASE vtc');

// Créér la table conducteur
$db->query('CREATE TABLE vtc.conducteur (
    id_conducteur INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL
)');

// Créer la table véhicule
$db->query('CREATE TABLE vtc.vehicule (
    id_vehicule INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    marque VARCHAR(255) NOT NULL,
    modele VARCHAR(255) NOT NULL,
    couleur VARCHAR(255) NOT NULL,
    immatriculation VARCHAR(255) NOT NULL
)');

// Créer la table d'association
$db->query('CREATE TABLE vtc.association_vehicule_conducteur (
    id_association INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_vehicule INT UNSIGNED NOT NULL,
    id_conducteur INT UNSIGNED NOT NULL,
    CONSTRAINT fk_id_vehicule FOREIGN KEY (id_vehicule) REFERENCES vtc.vehicule (id_vehicule) ON DELETE CASCADE,
    CONSTRAINT fk_id_conducteur FOREIGN KEY (id_conducteur) REFERENCES vtc.conducteur (id_conducteur) ON DELETE CASCADE
)');
