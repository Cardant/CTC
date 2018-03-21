-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 fév. 2018 à 10:59
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `click_to_call`
--

-- --------------------------------------------------------

--
-- Structure de la table `ctc_request`
--

DROP TABLE IF EXISTS `ctc_request`;
CREATE TABLE IF NOT EXISTS `ctc_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `etat` int(2) NOT NULL,
  `Commentaire` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ctc_request`
--

INSERT INTO `ctc_request` (`id`, `user_id`, `dates`, `etat`, `Commentaire`) VALUES
(15, 3, '31/01/2018 - 09:27:29', 2, 'Problème au niveau de la conf de la box'),
(16, 3, '31/01/2018 - 09:29:57', 2, 'Le dépannage a été réalisé sans problème.'),
(53, 1, '07/02/2018 - 08:36:07', 0, NULL),
(52, 3, '07/02/2018 - 07:28:40', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `rang` int(1) NOT NULL DEFAULT '0',
  `disponible` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `telephone`, `rang`, `disponible`) VALUES
(1, 'client', 'cb2f30af04a929457b1b14a3319dab0c5e0e811a', 'nomclient', 'prenomclient', 'mailclient@client.fr', '102030405', 0, NULL),
(2, 'technicien', '86cdf77364e5a43aa8d89a9bd17869e1c24f13f4', 'tech', 'tech', 'tech@tech.tech', '5801', 1, 1),
(3, 'client2', '0cf3a452af4baf920c5e381be5f542007639a275', 'client2', 'client2', 'client2', '5802', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
