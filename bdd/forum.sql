-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 juil. 2020 à 13:50
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
(3, 'moderateur'),
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
  PRIMARY KEY (`id`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `id_utilisateur`, `id_topic`, `titre`, `description`, `date`, `id_confidentialite`) VALUES
(4, 1, 5, 'Bienvenue', 'A LIRE', '2020-07-03 15:14:32', 1),
(5, 1, 4, 'Dispo', 'disponibilitÃ©s de chacun', '2020-07-03 15:15:54', 3),
(6, 2, 2, 'Recherche team mates', 'qui veux jouer ?', '2020-07-03 15:18:33', 2),
(8, 1, 2, 'How to : aÃ©riennes', 'PILIZE ALED', '2020-07-03 15:21:31', 2),
(9, 1, 6, 'Bienvenue', 'Welcom', '2020-07-03 15:22:50', 1),
(10, 1, 6, 'Espace Membre', 'RÃ©servez aux memebres', '2020-07-03 15:23:10', 2),
(11, 1, 2, 'Trade', 'Qui veut trade', '2020-07-04 12:00:28', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_message`, `id_utilisateur`) VALUES
(5, 12, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_message`, `id_utilisateur`) VALUES
(1, 4, 1),
(2, 5, 2),
(3, 4, 2),
(4, 7, 3),
(5, 8, 2),
(14, 11, 1),
(13, 9, 1),
(15, 4, 5),
(16, 21, 9);

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
  PRIMARY KEY (`id`),
  KEY `id_conversation` (`id_conversation`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_conversation`, `id_utilisateur`, `message`, `date`) VALUES
(4, 4, 1, 'Suivez les rÃ¨gles du forum, sinon C\'est CIAO !', '2020-07-03 15:14:54'),
(5, 5, 1, 'Salut, je peux vendredi', '2020-07-03 15:16:06'),
(6, 5, 2, 'ok pour moi', '2020-07-03 15:16:37'),
(7, 4, 2, 'Ouais on est sans pitiÃ© !', '2020-07-03 15:17:02'),
(8, 4, 3, 'MÃªme pas peur ', '2020-07-03 15:17:40'),
(9, 6, 2, 'Qui veut jouer ?', '2020-07-03 15:20:35'),
(10, 8, 1, 'J\'ai pas d\'aile, je peux pas voler', '2020-07-03 15:22:08'),
(11, 6, 1, 'Moi moi moi', '2020-07-04 12:06:52'),
(12, 6, 1, 'Pas moi', '2020-07-04 14:26:49'),
(21, 9, 1, 'Aurevoir', '2020-07-04 17:06:38'),
(23, 9, 9, 'C\'est coool :D ', '2020-07-05 13:25:23');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements`
--

INSERT INTO `signalements` (`id`, `id_utilisateur`, `id_message`) VALUES
(5, 1, 12),
(6, 1, 24),
(7, 1, 25),
(8, 1, 26);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `id_utilisateur`, `titre`, `description`, `id_confidentialite`, `date`) VALUES
(2, 1, 'Rocket League', 'On parle du jeu', 1, '2020-07-03 15:05:13'),
(4, 1, 'Le coin des modos', 'C\'est pour vous', 3, '2020-07-03 15:14:07'),
(5, 1, 'RÃ©glement', 'A LIRE !', 1, '2020-07-03 15:14:19'),
(6, 1, 'CommunautÃ©', 'Rapprochez vous', 1, '2020-07-03 15:22:32'),
(8, 2, 'Test', 'rrrr', 1, '2020-07-04 15:58:21');

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
  `avatar` varchar(255) DEFAULT 'img/avatar/avatarfilm.png',
  `id_confidentialite` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`, `nom`, `prenom`, `mail`, `avatar`, `id_confidentialite`) VALUES
(1, 'Martin', '$2y$10$5GU/SRg8vAVqLue4gAhB6.ADJRTlXI1zrKMbDZ.nHWikR0Gwxxe5q', 'admin', 'admin', 'admin@admin.admin', 'img/avatar/1.jpg', 4),
(2, 'modo', '$2y$10$FqHAw9fgVWsfmua9HemdX.UK39GMTEeSESbUn.3zRuDD/KhUcU6eG', 'modo', 'modo', 'modo@modo.modo', 'img/avatar/2.png', 3),
(3, 'membre', '$2y$10$4Xml92LJOVacwuwrtYdfr.GBWgNhK4qNrH0ircv4ln8QYPwJmyntS', 'membre', 'membre', 'membre@membre.membre', 'img/avatar/3.png', 2),
(9, 'Mathou', '$2y$10$/WRT11r70NZkImX0ID6TNecWIStAL4YpFwU3Y4M0TlD8lRoRBCOnW', 'Roussier', 'Mathilde', 'mathilde.roussier@laplateforme.io', 'img/avatar/9.jpg', 2),
(8, 'Maxime', '$2y$10$r5JLu6O9SgkXsi.6Omw9yeRuAh1lzEus001VvQseb.AJU/kMXXURe', 'admin', 'admin', 'admin@admin.admin', 'img/avatar/8.jpg', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `sup_conv` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `sup_msg` FOREIGN KEY (`id_conversation`) REFERENCES `conversations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
