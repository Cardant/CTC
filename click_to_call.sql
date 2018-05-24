-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 24 Mai 2018 à 08:26
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
-- Structure de la table `cdr`
--

CREATE TABLE `cdr` (
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL DEFAULT '',
  `src` varchar(80) NOT NULL DEFAULT '',
  `dst` varchar(80) NOT NULL DEFAULT '',
  `dcontext` varchar(80) NOT NULL DEFAULT '',
  `channel` varchar(80) NOT NULL DEFAULT '',
  `dstchannel` varchar(80) NOT NULL DEFAULT '',
  `lastapp` varchar(80) NOT NULL DEFAULT '',
  `lastdata` varchar(80) NOT NULL DEFAULT '',
  `duration` int(11) NOT NULL DEFAULT '0',
  `billsec` int(11) NOT NULL DEFAULT '0',
  `disposition` varchar(45) NOT NULL DEFAULT '',
  `amaflags` int(11) NOT NULL DEFAULT '0',
  `accountcode` varchar(20) NOT NULL DEFAULT '',
  `uniqueid` varchar(32) NOT NULL DEFAULT '',
  `userfield` varchar(255) NOT NULL DEFAULT '',
  `peeraccount` varchar(20) NOT NULL DEFAULT '',
  `linkedid` varchar(32) NOT NULL DEFAULT '',
  `sequence` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `cdr`
--

INSERT INTO `cdr` (`calldate`, `clid`, `src`, `dst`, `dcontext`, `channel`, `dstchannel`, `lastapp`, `lastdata`, `duration`, `billsec`, `disposition`, `amaflags`, `accountcode`, `uniqueid`, `userfield`, `peeraccount`, `linkedid`, `sequence`) VALUES
('2018-05-23 16:35:59', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-0000001c', 'SIP/12-0000001d', 'Dial', 'SIP/12,10,tT', 3, 3, 'ANSWERED', 3, '', '1527086159.44', '', '', '', 0),
('2018-05-23 16:36:09', '\"Bob\" <5813>', '5813', '14', 'base', 'SIP/13-0000001e', 'SIP/14-0000001f', 'Dial', 'SIP/14,10,tT', 0, 0, 'NO ANSWER', 3, '', '1527086169.47', '', '', '', 0),
('2018-05-23 16:36:09', '\"Bob\" <5813>', '5813', '14', 'base', 'SIP/13-0000001e', '', 'Dial', 'Sip/Patton/4,5813', 10, 10, 'ANSWERED', 3, '', '1527086169.47', '', '', '', 0),
('2018-05-23 16:39:13', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-00000024', 'SIP/12-00000025', 'Dial', 'SIP/12,10,tT', 2, 2, 'ANSWERED', 3, '', '1527086353.57', '', '', '', 0),
('2018-05-23 16:42:46', '\"Bob\" <5813>', '5813', '14', 'base', 'SIP/13-00000026', 'SIP/14-00000027', 'Dial', 'SIP/14,10,tT', 1, 1, 'NO ANSWER', 3, '', '1527086566.60', '', '', '', 0),
('2018-05-23 16:44:59', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-0000002e', 'SIP/12-0000002f', 'Dial', 'SIP/12,10,tT', 2, 2, 'ANSWERED', 3, '', '1527086699.72', '', '', '', 0),
('2018-05-23 17:13:49', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-00000000', 'SIP/12-00000001', 'Dial', 'SIP/12,10,tT', 3, 3, 'ANSWERED', 3, '', '1527088429.0', '', '', '', 0),
('2018-05-23 17:14:36', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-00000002', 'SIP/12-00000003', 'Dial', 'SIP/12,10,tT', 3, 3, 'ANSWERED', 3, '', '1527088476.3', '', '', '', 0),
('2018-05-23 17:14:58', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000004', 'SIP/Trunk-00000005', 'Dial', 'SIP/Trunk/7719,5811', 19, 19, 'ANSWERED', 3, '', '1527088495.6', '', '', '', 0),
('2018-05-23 17:18:19', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000006', 'SIP/Trunk-00000007', 'Dial', 'SIP/Trunk/7719,5811', 14, 14, 'ANSWERED', 3, '', '1527088697.9', '', '', '', 0),
('2018-05-23 17:20:19', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000008', 'SIP/Trunk-00000009', 'Dial', 'SIP/Trunk/7719,5811', 7, 7, 'ANSWERED', 3, '', '1527088817.12', '', '', '', 0),
('2018-05-23 17:28:14', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000014', 'SIP/Trunk-00000015', 'Dial', 'SIP/Trunk/7719,5811', 4, 4, 'ANSWERED', 3, '', '1527089292.30', '', '', '', 0),
('2018-05-23 17:31:36', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000016', 'SIP/Trunk-00000017', 'Dial', 'SIP/Trunk/7719,5811', 4, 4, 'ANSWERED', 3, '', '1527089494.33', '', '', '', 0),
('2018-05-23 17:32:05', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-00000018', 'SIP/Trunk-00000019', 'Dial', 'SIP/Trunk/7719,5811', 11, 11, 'ANSWERED', 3, '', '1527089522.36', '', '', '', 0),
('2018-05-23 17:36:08', '\"Alexis (Solea1)\" <5811>', '5811', '07719', 'base', 'SIP/11-0000001c', 'SIP/Trunk-0000001d', 'Dial', 'SIP/Trunk/7719,5811', 4, 4, 'ANSWERED', 3, '', '1527089766.42', '', '', '', 0);

--
-- Déclencheurs `cdr`
--
DELIMITER $$
CREATE TRIGGER `timer update` AFTER INSERT ON `cdr` FOR EACH ROW update worktime
set timer = timer + new.duration
where id_technicien = (
    select id from users
    where CONCAT('58',users.telephone) = new.src
    )
$$
DELIMITER ;

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
(1, 2, '23/05/2018 - 11:48:18', 1, ''),
(2, 1, '23/05/2018 - 15:15:30', 0, NULL),
(3, 1, '23/05/2018 - 15:35:00', 0, NULL),
(4, 1, '23/05/2018 - 15:36:30', 0, NULL),
(5, 1, '23/05/2018 - 15:39:26', 0, NULL),
(6, 1, '23/05/2018 - 15:43:32', 0, NULL),
(7, 1, '23/05/2018 - 15:50:38', 0, NULL),
(8, 1, '23/05/2018 - 15:55:58', 0, NULL),
(9, 1, '23/05/2018 - 16:01:38', 0, NULL),
(10, 1, '23/05/2018 - 16:03:10', 0, NULL),
(11, 1, '23/05/2018 - 16:09:27', 0, NULL),
(12, 1, '23/05/2018 - 16:43:46', 0, NULL),
(13, 1, '23/05/2018 - 17:18:23', 0, NULL),
(14, 1, '23/05/2018 - 17:20:23', 0, NULL),
(15, 1, '23/05/2018 - 17:22:49', 0, NULL),
(16, 1, '23/05/2018 - 17:23:02', 0, NULL),
(17, 1, '23/05/2018 - 17:23:36', 0, NULL),
(18, 1, '23/05/2018 - 17:25:27', 0, NULL),
(19, 1, '23/05/2018 - 17:25:49', 0, NULL),
(20, 1, '23/05/2018 - 17:27:32', 0, NULL),
(21, 1, '23/05/2018 - 17:28:12', 0, NULL),
(22, 1, '23/05/2018 - 17:28:17', 0, NULL),
(23, 1, '23/05/2018 - 17:31:39', 0, NULL),
(24, 1, '23/05/2018 - 17:32:09', 0, NULL),
(25, 1, '23/05/2018 - 17:33:58', 0, NULL),
(26, 1, '23/05/2018 - 17:36:11', 0, NULL),
(27, 1, '23/05/2018 - 17:38:18', 0, NULL);

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
(2, 'pleblanc', 'f4099326f72d0709eb4e6caf19c889ed7213793d', 'Leblanc', 'Pierre', 'pierre.leblanc@gmail.com', '12', 0),
(3, 'arochelle', '86b9008bc58fb68a861efcebcec874ec8f7f0bf7', 'Rochelle', 'Alexis', 'alexis.rochelle@solea1.fr', '11', 1),
(4, 'adubois', '4a19e95460d109802da5eef4981cd51319e02b77', 'Dubois', 'Alice', 'alice.dubois@solea1.fr', '12', 1);

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
(1, 3, 23, 0),
(2, 4, 19, 0);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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

DELIMITER $$
--
-- Événements
--
CREATE DEFINER=`admin`@`%` EVENT `reset_timer` ON SCHEDULE EVERY 1 DAY STARTS '2018-05-23 23:59:59' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Reset le timer des techniciens à minuit chaque jour' DO UPDATE worktime SET timer = 0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
