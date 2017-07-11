-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 juil. 2017 à 09:47
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bigband`
--

-- --------------------------------------------------------

--
-- Structure de la table `operateur`
--

CREATE TABLE `operateur` (
  `OP_Idoperateur` int(10) UNSIGNED NOT NULL,
  `OP_Civilite` text COLLATE utf8_unicode_ci,
  `OP_Nom` text COLLATE utf8_unicode_ci,
  `OP_Prenom` text COLLATE utf8_unicode_ci,
  `OP_Etiquette_Operateur` text COLLATE utf8_unicode_ci,
  `OP_Adresse_Ligne_1` text COLLATE utf8_unicode_ci,
  `OP_Adresse_Ligne_2` text COLLATE utf8_unicode_ci,
  `OP_Code_Postal` text COLLATE utf8_unicode_ci,
  `OP_Ville` text COLLATE utf8_unicode_ci,
  `OP_Etiquette_Operateur_Complete` text COLLATE utf8_unicode_ci,
  `OP_Telephone_Fixe` text COLLATE utf8_unicode_ci,
  `OP_Telephone_Portable` text COLLATE utf8_unicode_ci,
  `OP_Adresse_Mail` text COLLATE utf8_unicode_ci,
  `OP_Createur` text COLLATE utf8_unicode_ci NOT NULL,
  `OP_Date_De_Creation` date NOT NULL,
  `OP_Modificateur` text COLLATE utf8_unicode_ci NOT NULL,
  `OP_Date_De_Modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Op?rateurs r?alisant des devis ou autres documents administr';

--
-- Déchargement des données de la table `operateur`
--

INSERT INTO `operateur` (`OP_Idoperateur`, `OP_Civilite`, `OP_Nom`, `OP_Prenom`, `OP_Etiquette_Operateur`, `OP_Adresse_Ligne_1`, `OP_Adresse_Ligne_2`, `OP_Code_Postal`, `OP_Ville`, `OP_Etiquette_Operateur_Complete`, `OP_Telephone_Fixe`, `OP_Telephone_Portable`, `OP_Adresse_Mail`, `OP_Createur`, `OP_Date_De_Creation`, `OP_Modificateur`, `OP_Date_De_Modification`) VALUES
(1, 'M.', 'ROULET', 'Olivier', NULL, '7 Rue du Puits Descazeaux', 'Appt.6', '33000', 'BORDEAUX', NULL, '09.51.52.80.35', '06.76.81.88.21', 'contact@olivierroulet.com', '', '0000-00-00', '', '2017-07-11 09:27:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `operateur`
--
ALTER TABLE `operateur`
  ADD PRIMARY KEY (`OP_Idoperateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `operateur`
--
ALTER TABLE `operateur`
  MODIFY `OP_Idoperateur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
