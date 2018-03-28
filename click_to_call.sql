-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 28 Mars 2018 à 07:11
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

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
  `Commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ctc_request`
--

INSERT INTO `ctc_request` (`id`, `user_id`, `dates`, `etat`, `Commentaire`) VALUES
(15, 3, '31/01/2018 - 09:27:29', 2, 'Problème au niveau de la conf de la box'),
(16, 3, '31/01/2018 - 09:29:57', 2, 'Le dépannage a été réalisé sans problème.'),
(52, 3, '07/02/2018 - 07:28:40', 0, NULL),
(53, 1, '07/02/2018 - 08:36:07', 1, NULL);

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
  `rang` int(1) NOT NULL DEFAULT '0',
  `disponible` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `telephone`, `rang`, `disponible`) VALUES
(1, 'client', 'cb2f30af04a929457b1b14a3319dab0c5e0e811a', 'nomclient', 'prenomclient', 'mailclient@client.fr', '102030405', 0, NULL),
(2, 'technicien', '86cdf77364e5a43aa8d89a9bd17869e1c24f13f4', 'tech', 'tech', 'tech@tech.tech', '5801', 1, 1),
(3, 'client2', '0cf3a452af4baf920c5e381be5f542007639a275', 'client2', 'client2', 'client2', '5802', 0, NULL),
(4, 'technicien2', 'technicien2', 'technicien2', 'technicien2', 'technicien2@tech.com', '5803', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `worktime`
--

CREATE TABLE `worktime` (
  `id` int(10) NOT NULL,
  `id_technicien` int(10) NOT NULL,
  `nom_technicien` text NOT NULL,
  `prenom_technicien` text NOT NULL,
  `timer` int(10) DEFAULT NULL,
  `etat_disponible` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `worktime`
--

INSERT INTO `worktime` (`id`, `id_technicien`, `nom_technicien`, `prenom_technicien`, `timer`, `etat_disponible`) VALUES
(1, 2, 'tech', 'tech', NULL, 1),
(2, 4, 'technicien2', 'technicien2', NULL, NULL);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `worktime`
--
ALTER TABLE `worktime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `worktime`
--
ALTER TABLE `worktime`
  ADD CONSTRAINT `fk_id_technicien` FOREIGN KEY (`id_technicien`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
