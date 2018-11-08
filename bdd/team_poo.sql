-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 08 nov. 2018 à 16:39
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `team_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `name`, `position`, `team_id`) VALUES
(1, 'Neymar', 'gardien', 1),
(2, 'MbappÃ©', 'dÃ©fenseur', 1),
(3, 'Dybala', 'dÃ©fenseur', 1),
(8, 'p', 'gardien', 2),
(9, 'hello', 'gardien', 1),
(10, 'toto', 'gardien', 2),
(11, 'tcharles', 'defenseur', 2),
(12, 'bobbbbbbo', 'defenseur', 2),
(14, 'motta', 'milieu', 1),
(31, 'jbhjk', 'gardien', 3);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `yearFoundation` int(11) NOT NULL,
  `league` varchar(255) NOT NULL,
  `stadium` varchar(255) NOT NULL,
  `coach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `name`, `yearFoundation`, `league`, `stadium`, `coach`) VALUES
(1, 'Paris', 1850, 'Ligue 1', 'stade lyon', 'Tomas tuchel'),
(2, 'lyon', 1200, 'Ligue 1', 'ddd', 'fff'),
(3, 'marseille', 1900, 'Ligue 1', 'ddf', 'edff'),
(4, 'barcelone', 1970, 'liga', 'camp nu', 'toto');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_player` (`team_id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
