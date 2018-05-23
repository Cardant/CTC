-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 23 Mai 2018 à 10:35
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `asterisk`
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
('2018-05-23 09:05:51', '\"John\" <5811>', '5811', '14', 'base', 'SIP/11-00000000', 'SIP/14-00000001', 'Dial', 'SIP/14,10,tT', 12, 12, 'ANSWERED', 3, '', '1527059151.0', '', '', '', 0),
('2018-05-23 09:06:47', '\"John\" <5811>', '5811', '14', 'base', 'SIP/11-00000002', 'SIP/14-00000003', 'Dial', 'SIP/14,10,tT', 15, 15, 'ANSWERED', 3, '', '1527059207.3', '', '', '', 0),
('2018-05-23 09:13:48', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-00000004', 'SIP/14-00000005', 'Dial', 'SIP/14,10,tT', 6, 6, 'NO ANSWER', 3, '', '1527059628.6', '', '', '', 0),
('2018-05-23 09:22:45', '\"Nathalie\" <5812>', '5812', '11', 'base', 'SIP/12-00000006', 'SIP/11-00000007', 'Dial', 'SIP/11,10,tT', 4, 4, 'NO ANSWER', 3, '', '1527060165.9', '', '', '', 0),
('2018-05-23 09:22:52', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-00000008', 'SIP/14-00000009', 'Dial', 'SIP/14,10,tT', 10, 10, 'NO ANSWER', 3, '', '1527060172.12', '', '', '', 0),
('2018-05-23 09:23:03', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-00000008', '', 'Dial', 'SIP/17,10,tT', 17, 17, 'ANSWERED', 3, '', '1527060172.12', '', '', '', 0),
('2018-05-23 09:23:27', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-0000000a', 'SIP/14-0000000b', 'Dial', 'SIP/14,10,tT', 10, 10, 'NO ANSWER', 3, '', '1527060207.16', '', '', '', 0),
('2018-05-23 09:23:37', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-0000000a', '', 'Dial', 'SIP/17,10,tT', 8, 8, 'ANSWERED', 3, '', '1527060207.16', '', '', '', 0),
('2018-05-23 09:23:48', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-0000000c', 'SIP/14-0000000d', 'Dial', 'SIP/14,10,tT', 10, 10, 'NO ANSWER', 3, '', '1527060228.20', '', '', '', 0),
('2018-05-23 09:23:59', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-0000000c', '', 'Dial', 'SIP/17,10,tT', 14, 14, 'ANSWERED', 3, '', '1527060228.20', '', '', '', 0),
('2018-05-23 09:24:31', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-0000000e', 'SIP/14-0000000f', 'Dial', 'SIP/14,10,tT', 1, 1, 'NO ANSWER', 3, '', '1527060271.24', '', '', '', 0),
('2018-05-23 09:24:42', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-00000010', 'SIP/14-00000011', 'Dial', 'SIP/14,10,tT', 10, 10, 'NO ANSWER', 3, '', '1527060282.27', '', '', '', 0),
('2018-05-23 09:24:52', '\"Nathalie\" <5812>', '5812', '14', 'base', 'SIP/12-00000010', '', 'Dial', 'SIP/17,10,tT', 13, 13, 'ANSWERED', 3, '', '1527060282.27', '', '', '', 0),
('2018-05-23 09:44:36', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-00000012', '', 'Dial', 'SIP/12,10,tT', 2, 2, 'ANSWERED', 3, '', '1527061476.31', '', '', '', 0),
('2018-05-23 10:04:20', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-00000013', '', 'Dial', 'SIP/12,10,tT', 4, 4, 'ANSWERED', 3, '', '1527062660.33', '', '', '', 0),
('2018-05-23 10:04:36', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-00000014', '', 'Dial', 'SIP/12,10,tT', 1, 1, 'ANSWERED', 3, '', '1527062676.35', '', '', '', 0),
('2018-05-23 10:04:39', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-00000015', '', 'Dial', 'SIP/12,10,tT', 1, 1, 'ANSWERED', 3, '', '1527062679.37', '', '', '', 0),
('2018-05-23 10:04:54', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-00000016', '', 'Dial', 'SIP/12,10,tT', 1, 1, 'ANSWERED', 3, '', '1527062694.39', '', '', '', 0),
('2018-05-23 10:04:58', '\"Alice\" <5814>', '5814', '19', 'orig', 'SIP/14-00000017', '', 'AGI', 'googletts.agi,\"L\'extension 19. n\'existe pas\",fr', 3, 3, 'ANSWERED', 3, '', '1527062698.41', '', '', '', 0),
('2018-05-23 10:05:29', '\"Standard\" <5819>', '5819', '14', 'base', 'SIP/19-00000018', 'SIP/14-00000019', 'Dial', 'SIP/14,10,tT', 10, 10, 'NO ANSWER', 3, '', '1527062729.43', '', '', '', 0),
('2018-05-23 10:05:39', '\"Standard\" <5819>', '5819', '14', 'base', 'SIP/19-00000018', '', 'Dial', 'SIP/17,10,tT', 5, 5, 'ANSWERED', 3, '', '1527062729.43', '', '', '', 0),
('2018-05-23 10:05:51', '\"Alice\" <5814>', '5814', '19', 'orig', 'SIP/14-0000001a', '', 'AGI', 'googletts.agi,\"L\'extension 19. n\'existe pas\",fr', 1, 1, 'ANSWERED', 3, '', '1527062751.47', '', '', '', 0),
('2018-05-23 10:06:39', '\"Alice\" <5814>', '5814', '19', 'base', 'SIP/14-0000001b', 'SIP/19-0000001c', 'Dial', 'SIP/19,10,tT', 2, 2, 'NO ANSWER', 3, '', '1527062799.49', '', '', '', 0),
('2018-05-23 10:06:46', '\"Alice\" <5814>', '5814', '12', 'base', 'SIP/14-0000001d', '', 'Dial', 'SIP/12,10,tT', 2, 2, 'ANSWERED', 3, '', '1527062806.52', '', '', '', 0),
('2018-05-23 10:07:45', '\"Alice\" <5814>', '5814', '13', 'base', 'SIP/14-0000001e', '', 'Dial', 'SIP/13,10,tT', 1, 1, 'ANSWERED', 3, '', '1527062865.54', '', '', '', 0),
('2018-05-23 10:08:54', '\"Alice\" <5814>', '5814', '13', 'base', 'SIP/14-0000001f', '', 'Dial', 'SIP/13,10,tT', 0, 0, 'ANSWERED', 3, '', '1527062934.56', '', '', '', 0),
('2018-05-23 10:08:58', '\"Standard\" <5819>', '5819', '13', 'base', 'SIP/19-00000020', '', 'Dial', 'SIP/13,10,tT', 1, 1, 'ANSWERED', 3, '', '1527062938.58', '', '', '', 0),
('2018-05-23 10:16:07', '\"Web Call 12\" <5811>', '5811', '12', 'base', 'SIP/11-00000023', '', 'Dial', 'SIP/12,10,tT', 12, 12, 'ANSWERED', 3, '', '1527063361.62', '', '', '', 0),
('2018-05-23 10:24:37', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-0000002a', '', 'Dial', 'SIP/12,10,tT', 7, 7, 'ANSWERED', 3, '', '1527063869.70', '', '', '', 0),
('2018-05-23 10:29:51', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-0000002d', '', 'Dial', 'SIP/12,10,tT', 2, 2, 'ANSWERED', 3, '', '1527064190.74', '', '', '', 0),
('2018-05-23 10:30:48', '\"John\" <5811>', '5811', '12', 'base', 'SIP/11-0000002e', '', 'Dial', 'SIP/12,10,tT', 5, 5, 'ANSWERED', 3, '', '1527064246.76', '', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
