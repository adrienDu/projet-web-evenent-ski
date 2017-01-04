-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Janvier 2017 à 23:41
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetski`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idInscript` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `dateNais` date NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `CP` int(5) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `glisse` tinyint(1) NOT NULL,
  `pointure` int(2) NOT NULL,
  `taille` int(3) NOT NULL,
  `niveau` int(1) NOT NULL,
  `etatInscription` int(3) NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`idInscript`, `nom`, `prenom`, `dateNais`, `sexe`, `mail`, `tel`, `rue`, `CP`, `ville`, `glisse`, `pointure`, `taille`, `niveau`, `etatInscription`, `dateInscription`) VALUES
('2ff223a8-13fd-26bb-997e-c2eb3604f8f5', 'Foyres', 'Jules', '1993-10-17', 0, 'foyresj@gmail.Com', 678243333, '33 avenue du faubourg saint antoine', 75011, 'Paris', 0, 41, 175, 2, 1, '2017-01-02'),
('6994e0a1-bedd-de92-e642-b039ef519b10', 'Laures', 'Etienne', '1992-10-10', 0, 'etienne.laures@gmail.com', 678243365, '4 rue de la butte', 75019, 'Paris', 0, 42, 175, 1, 1, '2017-01-02'),
('dc2ff7ac-4d64-ee91-5b1f-04f7a49d1238', 'Dujardin', 'Jean', '1997-02-02', 0, 'j.dujardin@gmail.com', 632584521, '25 rue des rosier', 75018, 'Paris', 0, 34, 160, 1, 0, '2016-12-28'),
('dfaf4908-9414-272d-5e49-c9e395f63681', 'Ridenne', 'Taha', '1993-07-08', 0, 'taha.ridene@gmail.com', 678345423, '5 rue Jean Racine', 75003, 'Paris', 0, 43, 175, 0, 0, '2017-01-02'),
('e2456bb3-3ca6-9d85-c4bc-dc002935c9b2', 'Fourcade', 'Léa', '1993-12-17', 1, 'fourcade.lea@gmail.com', 678341149, '21 avenue Foch', 75016, 'Paris', 1, 38, 175, 1, 0, '2017-01-02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idInscript`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
