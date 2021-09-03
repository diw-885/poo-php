-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 03 sep. 2021 à 13:02
-- Version du serveur : 10.6.4-MariaDB
-- Version de PHP : 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super`
--

-- --------------------------------------------------------

--
-- Structure de la table `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `universe` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `superheroe_supernaughty`
--

CREATE TABLE `superheroe_supernaughty` (
  `superheroe_id` int(11) NOT NULL,
  `supernaughty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `supernaughties`
--

CREATE TABLE `supernaughties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `universe` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `superheroe_supernaughty`
--
ALTER TABLE `superheroe_supernaughty`
  ADD KEY `superheroe_id` (`superheroe_id`),
  ADD KEY `supernaughty_id` (`supernaughty_id`);

--
-- Index pour la table `supernaughties`
--
ALTER TABLE `supernaughties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supernaughties`
--
ALTER TABLE `supernaughties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `superheroe_supernaughty`
--
ALTER TABLE `superheroe_supernaughty`
  ADD CONSTRAINT `superheroe_supernaughty_ibfk_1` FOREIGN KEY (`superheroe_id`) REFERENCES `superheroes` (`id`),
  ADD CONSTRAINT `superheroe_supernaughty_ibfk_2` FOREIGN KEY (`supernaughty_id`) REFERENCES `supernaughties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
