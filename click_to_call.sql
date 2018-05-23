-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 23 Mai 2018 à 10:38
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

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
(1, 1, '23/05/2018 - 09:55:46', 0, NULL),
(2, 1, '23/05/2018 - 09:56:14', 0, NULL),
(3, 1, '23/05/2018 - 10:01:16', 0, NULL),
(4, 1, '23/05/2018 - 10:01:27', 0, NULL),
(5, 1, '23/05/2018 - 10:03:48', 0, NULL),
(6, 1, '23/05/2018 - 10:04:27', 0, NULL),
(7, 1, '23/05/2018 - 10:04:47', 0, NULL),
(8, 1, '23/05/2018 - 10:07:39', 0, NULL),
(9, 1, '23/05/2018 - 10:26:26', 0, NULL),
(10, 1, '23/05/2018 - 10:28:52', 0, NULL),
(11, 1, '23/05/2018 - 10:32:46', 0, NULL),
(12, 1, '23/05/2018 - 10:33:06', 0, NULL);

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
(1, 'mdupont', '9e440d827347b7eec48efcd3d577ca5e7f1ba67b', 'Dupont', 'Martin', 'martin.dupont@gmail.com', '7719', 0),
(2, 'pleblanc', 'f4099326f72d0709eb4e6caf19c889ed7213793d', 'Leblanc', 'Pierre', 'pierre.leblanc@gmail.com', '', 0),
(3, 'arochelle', '86b9008bc58fb68a861efcebcec874ec8f7f0bf7', 'Rochelle', 'Alexis', 'alexis.rochelle@solea1.fr', '5815', 1),
(4, 'adubois', '4a19e95460d109802da5eef4981cd51319e02b77', 'Dubois', 'Alice', 'alice.dubois@solea1.fr', '14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `worktime`
--

CREATE TABLE `worktime` (
  `id` int(10) NOT NULL,
  `id_technicien` int(10) NOT NULL,
  `timer` int(10) DEFAULT '0',
  `etat_disponible` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `worktime`
--

INSERT INTO `worktime` (`id`, `id_technicien`, `timer`, `etat_disponible`) VALUES
(1, 3, 50, 1),
(3, 4, 160, 0);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
