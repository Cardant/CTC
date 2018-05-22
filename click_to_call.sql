-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 22 Mai 2018 à 07:51
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `ctc_request` (
  `id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `etat` int(2) NOT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ctc_request`
--

INSERT INTO `ctc_request` (`id`, `user_id`, `dates`, `etat`, `commentaire`) VALUES
(15, 3, '31/01/2018 - 09:27:29', 2, 'Problème au niveau de la conf de la box'),
(16, 3, '31/01/2018 - 09:29:57', 2, 'Le dépannage a été réalisé sans problème.'),
(52, 3, '07/02/2018 - 07:28:40', 2, 'terminado'),
(53, 1, '07/02/2018 - 08:36:07', 0, 'bonjour'),
(54, 3, '28/03/2018 - 08:39:47', 1, 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `rang` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `telephone`, `rang`) VALUES
(1, 'client', 'cb2f30af04a929457b1b14a3319dab0c5e0e811a', 'nomclient', 'prenomclient', 'mailclient@client.fr', '102030405', 0),
(2, 'technicien', '86cdf77364e5a43aa8d89a9bd17869e1c24f13f4', 'tech', 'tech', 'tech@tech.tech', '5801', 1),
(3, 'client2', '0cf3a452af4baf920c5e381be5f542007639a275', 'client2', 'client2', 'client2', '5802', 0),
(4, 'technicien2', 'technicien2', 'technicien2', 'technicien2', 'technicien2@tech.com', '5803', 1),
(5, 'technicien3', 'technicien3', 'technicien3', 'technicien3', 'technicien3', '5805', 1),
(6, 'technicien4', 'technicien4', 'technicien4', 'technicien4', 'technicien4', '5806', 1);

-- --------------------------------------------------------

--
-- Structure de la table `worktime`
--

CREATE TABLE `worktime` (
  `id` int(10) NOT NULL,
  `id_technicien` int(10) NOT NULL,
  `nom_technicien` text NOT NULL,
  `prenom_technicien` text NOT NULL,
  `timer` int(10) DEFAULT '0',
  `etat_disponible` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `worktime`
--

INSERT INTO `worktime` (`id`, `id_technicien`, `nom_technicien`, `prenom_technicien`, `timer`, `etat_disponible`) VALUES
(1, 2, 'tech', 'tech', 0, 0),
(2, 4, 'technicien2', 'technicien2', 0, 1),
(3, 5, 'technicien3', 'technicien3', 0, 1),
(4, 6, 'technicien4', 'technicien4', 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ctc_request`
--
ALTER TABLE `ctc_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `worktime`
--
ALTER TABLE `worktime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_technicien` (`id_technicien`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ctc_request`
--
ALTER TABLE `ctc_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `worktime`
--
ALTER TABLE `worktime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `worktime`
--
ALTER TABLE `worktime`
  ADD CONSTRAINT `fk_id_technicien` FOREIGN KEY (`id_technicien`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Événements
--
CREATE DEFINER=`admin`@`%` EVENT `reset_timer` ON SCHEDULE EVERY 1 DAY STARTS '2018-05-22 23:59:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Reset le timer des techniciens à minuit chaque jour.' DO UPDATE worktime SET timer = 0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
