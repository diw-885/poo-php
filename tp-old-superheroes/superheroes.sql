-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 09 août 2019 à 13:42
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `superheroes`
--

-- --------------------------------------------------------

--
-- Structure de la table `superheroe`
--

CREATE TABLE `superheroe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `universe` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superheroe`
--

INSERT INTO `superheroe` (`id`, `name`, `power`, `identity`, `universe`, `image`) VALUES
(1, 'Batman', 'Riche et entraîné', 'Bruce Wayne', 'DC', 'batman.png'),
(2, 'Captain America', 'Immortel', 'Steve Rogers', 'Marvel', 'captain-america.png'),
(3, 'Groot', 'Renaissance', 'Groot', 'Marvel', 'groot.png'),
(4, 'Iron Man', 'Riche', 'Tony Stark', 'Marvel', 'iron-man.png'),
(5, 'Spider man', 'Souple', 'Peter Parker', 'Marvel', 'spider-man.png');

-- --------------------------------------------------------

--
-- Structure de la table `superheroe_has_supernaughty`
--

CREATE TABLE `superheroe_has_supernaughty` (
  `superheroe_id` int(11) NOT NULL,
  `supernaughty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superheroe_has_supernaughty`
--

INSERT INTO `superheroe_has_supernaughty` (`superheroe_id`, `supernaughty_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `supernaughty`
--

CREATE TABLE `supernaughty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `universe` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `supernaughty`
--

INSERT INTO `supernaughty` (`id`, `name`, `hobby`, `identity`, `universe`, `image`) VALUES
(1, 'Joker', 'Embêter Batman', 'Jack Napier', 'DC', 'joker.png'),
(2, 'Thanos', 'Sauver le monde ?', 'Thanos', 'Marvel', 'thanos.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `superheroe`
--
ALTER TABLE `superheroe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `superheroe_has_supernaughty`
--
ALTER TABLE `superheroe_has_supernaughty`
  ADD PRIMARY KEY (`superheroe_id`,`supernaughty_id`),
  ADD UNIQUE KEY `superheroe_id` (`superheroe_id`,`supernaughty_id`),
  ADD KEY `supernaughty_id` (`supernaughty_id`);

--
-- Index pour la table `supernaughty`
--
ALTER TABLE `supernaughty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `superheroe`
--
ALTER TABLE `superheroe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `supernaughty`
--
ALTER TABLE `supernaughty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `superheroe_has_supernaughty`
--
ALTER TABLE `superheroe_has_supernaughty`
  ADD CONSTRAINT `superheroe_has_supernaughty_ibfk_1` FOREIGN KEY (`superheroe_id`) REFERENCES `superheroe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `superheroe_has_supernaughty_ibfk_2` FOREIGN KEY (`supernaughty_id`) REFERENCES `supernaughty` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
