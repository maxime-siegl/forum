-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 juil. 2020 à 12:22
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `confidentialite`
--

DROP TABLE IF EXISTS `confidentialite`;
CREATE TABLE IF NOT EXISTS `confidentialite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `confidentialite`
--

INSERT INTO `confidentialite` (`id`, `rang`) VALUES
(1, 'public'),
(2, 'membres'),
(3, 'modÃ©rateurs'),
(4, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `titre` varchar(140) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `id_confidentialite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `id_utilisateur`, `id_topic`, `titre`, `description`, `date`, `id_confidentialite`) VALUES
(1, 1, 1, 'Recherche team mates', 'tout est dans le titre', '2020-06-30 17:36:06', 2),
(2, 1, 1, 'How to toucher la balle', 'pilize aled', '2020-06-30 17:36:28', 2),
(3, 1, 2, 'A LIRE', 'rÃ©glement du forum', '2020-06-30 17:38:11', 1),
(4, 1, 3, 'Flagelation', 'on se dÃ©foule', '2020-06-30 17:39:31', 3),
(5, 1, 4, 'Modifiaction Ã  faire', 'suggestion de modifs', '2020-06-30 17:42:12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_message` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_message`, `id_utilisateur`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_message` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_message`, `id_utilisateur`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_conversation` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_conversation`, `id_utilisateur`, `message`, `date`) VALUES
(1, 1, 1, 'Bonjour je cherche du monde pour jouer', '2020-06-30 17:36:46'),
(2, 2, 1, 'Je touche pas un ballon, comment faire ? ', '2020-06-30 17:37:31'),
(3, 3, 1, 'RÃ¨gle numÃ©ro 1 : JE SUIS VOTRE MAITRE A TOUS\r\nRÃ¨gle numÃ©ro 2 : voir rÃ¨gle numÃ©ro 1', '2020-06-30 17:38:56'),
(4, 4, 1, 'J\'en ai marre des canards qui nagent dans la marre alors qui Ã  la marÃ©e ! ', '2020-06-30 17:41:37'),
(5, 5, 1, 'Je pense qu\'il faut changer le visuel', '2020-06-30 17:42:23'),
(6, 1, 1, 'Joue en 1v1 ! ', '2020-07-01 15:46:50'),
(7, 2, 2, 'Ben faut le toucher\r\n', '2020-07-02 10:10:23');

-- --------------------------------------------------------

--
-- Structure de la table `signalements`
--

DROP TABLE IF EXISTS `signalements`;
CREATE TABLE IF NOT EXISTS `signalements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements`
--

INSERT INTO `signalements` (`id`, `id_utilisateur`, `id_message`) VALUES
(1, 1, 2),
(2, 2, 7),
(3, 2, 1),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `titre` varchar(140) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_confidentialite` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `id_utilisateur`, `titre`, `description`, `id_confidentialite`, `date`) VALUES
(1, 1, 'Rocket League', 'discutons autours du jeu', 2, '2020-06-30 17:31:11'),
(2, 1, 'RÃ©glement', 'A LIRE !', 1, '2020-06-30 17:31:23'),
(3, 1, 'Coin des modos', 'c\'est pour vous', 3, '2020-06-30 17:34:42'),
(4, 1, 'Administration', 'pas touche ! ', 4, '2020-06-30 17:34:58'),
(5, 1, 'Pour des test', 'test', 1, '2020-06-30 17:35:16'),
(8, 1, 'A supprimer', 'refaire un topic aprÃ¨s', 1, '2020-07-01 15:14:24'),
(7, 1, 'Heloo', 'test', 1, '2020-07-01 10:32:01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(80) NOT NULL,
  `mdp` varchar(80) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `id_confidentialite` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `nom`, `prenom`, `mail`, `avatar`, `id_confidentialite`) VALUES
(1, 'admin', '$2y$10$5GU/SRg8vAVqLue4gAhB6.ADJRTlXI1zrKMbDZ.nHWikR0Gwxxe5q', 'admin', 'admin', 'admin@admin.admin', NULL, 4),
(2, 'modo', '$2y$10$FqHAw9fgVWsfmua9HemdX.UK39GMTEeSESbUn.3zRuDD/KhUcU6eG', 'modo', 'modo', 'modo@modo.modo', NULL, 3),
(3, 'membre', '$2y$10$4Xml92LJOVacwuwrtYdfr.GBWgNhK4qNrH0ircv4ln8QYPwJmyntS', 'membre', 'membre', 'membre@membre.membre', NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
