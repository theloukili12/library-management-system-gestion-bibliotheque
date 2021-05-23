-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 23 mai 2021 à 13:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lpabd_loukili_jaouani`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `cinadm` varchar(15) NOT NULL,
  `nomadm` varchar(15) NOT NULL,
  `prenomadm` varchar(15) NOT NULL,
  `codbar` varchar(30) NOT NULL,
  PRIMARY KEY (`cinadm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`cinadm`, `nomadm`, `prenomadm`, `codbar`) VALUES
('CB318188', 'LOUKILI', 'SOUFIANE', 'FSE001052221');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `codemp` int(11) NOT NULL AUTO_INCREMENT,
  `dateemp` date NOT NULL,
  `cin` varchar(15) DEFAULT NULL,
  `cne` varchar(15) DEFAULT NULL,
  `codexp` int(11) NOT NULL,
  PRIMARY KEY (`codemp`),
  KEY `cne` (`cne`,`cin`),
  KEY `fk` (`codexp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `cne_etd` varchar(15) NOT NULL,
  `CIN` varchar(15) NOT NULL,
  `nometd` varchar(15) NOT NULL,
  `prenometd` varchar(15) NOT NULL,
  `codfil` int(11) DEFAULT NULL,
  `codbar` varchar(30) NOT NULL,
  PRIMARY KEY (`cne_etd`,`CIN`),
  KEY `codfil` (`codfil`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cne_etd`, `CIN`, `nometd`, `prenometd`, `codfil`, `codbar`) VALUES
('H1243', '1234', '1234', '1234', 15, ''),
('N139272893', 'CB31818', 'LOUKILI', 'SOUFIANE', 1, 'FSE002052221');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `codexp` int(11) NOT NULL AUTO_INCREMENT,
  `dateexp` date NOT NULL,
  `etat` tinyint(1) DEFAULT '0',
  `codliv` varchar(50) DEFAULT NULL,
  `nomedt` varchar(50) DEFAULT NULL,
  `langue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codexp`),
  KEY `codliv` (`codliv`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`codexp`, `dateexp`, `etat`, `codliv`, `nomedt`, `langue`) VALUES
(1, '1998-02-02', 1, '9781234567897', 'LOUKILI ', 'En'),
(2, '2021-05-11', 1, '9781234567897', 'KHALIL', 'fr'),
(3, '1998-08-02', 0, '9781234567897', 'LOUKILI ', 'Deu');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `Codfil` int(11) NOT NULL,
  `intitulefil` varchar(15) NOT NULL,
  PRIMARY KEY (`Codfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`Codfil`, `intitulefil`) VALUES
(1, 'LP-ABD'),
(2, 'STU'),
(3, 'SMP'),
(4, 'SMC'),
(5, 'GETED'),
(6, 'MS-AMCQ'),
(7, 'MS-BAVIA'),
(8, 'MS-MACS'),
(9, 'MS-MGG'),
(10, 'MS-ACSD'),
(11, 'MS-GMPAI'),
(12, 'MS-GMPAI'),
(13, 'MF'),
(14, 'M-BIBDA'),
(15, 'M-CHIMIE'),
(16, 'LF-SMA'),
(17, 'LF-SMI'),
(18, 'LF-SVI'),
(19, 'LP-EII'),
(20, 'LP-MESVT'),
(21, 'LP-CAQ');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `codliv` varchar(50) NOT NULL,
  `titreliv` varchar(50) NOT NULL,
  `nbrpages` int(11) NOT NULL,
  `codouv` int(11) DEFAULT NULL,
  `nomaut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codliv`),
  KEY `codouv` (`codouv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`codliv`, `titreliv`, `nbrpages`, `codouv`, `nomaut`) VALUES
('9780137081073', 'The Hitchhikers Guide to Python', 338, 1, 'JK'),
('9781234567897', 'CLEAN CODE', 462, 1, 'Robert C.Martin'),
('9782100072057', 'MERISE ET UML', 300, 1, 'JOSEPH GRAPHY'),
('9782100576210', 'ALGORITHMIQUE', 1146, 1, 'CORMEN - LEISERN - RIVEST - STEIN');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `Codeouv` int(11) NOT NULL,
  `intituleouv` varchar(15) NOT NULL,
  PRIMARY KEY (`Codeouv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`Codeouv`, `intituleouv`) VALUES
(1, 'Informatique'),
(2, 'Biologie'),
(3, 'Giologie'),
(4, 'Physique'),
(5, 'Chimie'),
(6, 'Mathematique');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `codexp` int(11) NOT NULL,
  `cinadm` varchar(15) NOT NULL,
  `dateretour` date DEFAULT NULL,
  `dateaccord` date NOT NULL,
  `cne_etd` varchar(15) NOT NULL,
  `id_emp` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_emp`),
  KEY `codexp` (`codexp`),
  KEY `fk_cne` (`cne_etd`),
  KEY `fk_adm` (`cinadm`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`codexp`, `cinadm`, `dateretour`, `dateaccord`, `cne_etd`, `id_emp`) VALUES
(1, 'CB318188', '2021-05-23', '2021-05-23', 'N139272893', 6),
(1, 'CB318188', '2021-05-23', '2021-05-25', 'N139272893', 7),
(2, 'CB318188', '2021-05-23', '2021-05-25', 'N139272893', 8),
(1, 'CB318188', NULL, '2021-05-27', 'N139272893', 9),
(2, 'CB318188', NULL, '2021-05-27', 'N139272893', 10);

-- --------------------------------------------------------

--
-- Structure de la table `puner`
--

DROP TABLE IF EXISTS `puner`;
CREATE TABLE IF NOT EXISTS `puner` (
  `codpun` int(11) NOT NULL AUTO_INCREMENT,
  `cneetd` varchar(15) NOT NULL,
  PRIMARY KEY (`codpun`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `puner`
--

INSERT INTO `puner` (`codpun`, `cneetd`) VALUES
(12, 'H1234'),
(13, 'H1234'),
(14, 'N139272893');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`cne`,`cin`) REFERENCES `etudiant` (`cne_etd`, `CIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk` FOREIGN KEY (`codexp`) REFERENCES `exemplaire` (`codexp`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`codfil`) REFERENCES `filiere` (`Codfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `fk_exp` FOREIGN KEY (`codliv`) REFERENCES `livre` (`codliv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`codouv`) REFERENCES `ouvrage` (`Codeouv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `exp_fk` FOREIGN KEY (`codexp`) REFERENCES `exemplaire` (`codexp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adm` FOREIGN KEY (`cinadm`) REFERENCES `administrateur` (`cinadm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cne` FOREIGN KEY (`cne_etd`) REFERENCES `etudiant` (`cne_etd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
