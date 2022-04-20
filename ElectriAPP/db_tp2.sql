-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 avr. 2022 à 01:40
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_tp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `IdAgent` varchar(25) NOT NULL,
  `Pswd` varchar(25) NOT NULL,
  `IdZone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `Pswd`, `IdZone`) VALUES
('agent1', '123', 1),
('agent2', '123', 2),
('agent3', '123', 3),
('agent4', '123', 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` varchar(20) NOT NULL,
  `Pswd` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `DateDebutCtr` date NOT NULL,
  `IdZone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `Pswd`, `Nom`, `Prenom`, `Mail`, `Tel`, `DateDebutCtr`, `IdZone`) VALUES
('132054764', '123', 'moujene', 'kaoutar', 'kaoutar.moujene@etu.uae.ac.ma', '618044335', '2021-11-14', 1),
('132054762', '123', 'fitian', 'zainab', 'zainab.fitian@etu.uae.ac.ma', '618044336', '2022-07-01', 3),
('132054763', '123', 'ouiggaten', 'abir', 'abir.ouiggaten@etu.uae.ac.ma', '618044334', '2022-06-01', 2);

-- --------------------------------------------------------

--
-- Structure de la table `consommationannuelle`
--

CREATE TABLE `consommationannuelle` (
  `Id` int(11) NOT NULL,
  `IdClient` varchar(50) NOT NULL,
  `IdZone` int(11) NOT NULL,
  `Consommation` decimal(10,0) NOT NULL,
  `DateSaisie` date DEFAULT NULL,
  `Annee` year(4) NOT NULL,
  `comparaison` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consommationannuelle`
--

INSERT INTO `consommationannuelle` (`Id`, `IdClient`, `IdZone`, `Consommation`, `DateSaisie`, `Annee`, `comparaison`) VALUES
(10, '132054764', 1, '1200', '2022-12-21', 2022, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `consommationmensuelle`
--

CREATE TABLE `consommationmensuelle` (
  `Id` int(11) NOT NULL,
  `IdClient` varchar(50) NOT NULL,
  `DateSaisie` date DEFAULT NULL,
  `Consom` decimal(10,0) NOT NULL,
  `statut` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consommationmensuelle`
--

INSERT INTO `consommationmensuelle` (`Id`, `IdClient`, `DateSaisie`, `Consom`, `statut`) VALUES
(40, '132054764', '2022-04-07', '700', 'non validé '),
(37, '132054764', '2022-12-01', '1500', 'non validé'),
(36, '132054764', '2021-12-01', '500', 'validé'),
(39, '132054764', '2023-01-01', '1000', 'non validé');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `IdFacture` int(11) NOT NULL,
  `IdClient` varchar(20) NOT NULL,
  `DateEcheance` date NOT NULL,
  `DateEmission` date NOT NULL,
  `Consom` decimal(10,0) NOT NULL,
  `MontantHT` decimal(10,0) DEFAULT NULL,
  `TVA` decimal(10,0) DEFAULT NULL,
  `MontantTTC` decimal(10,0) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`IdFacture`, `IdClient`, `DateEcheance`, `DateEmission`, `Consom`, `MontantHT`, `TVA`, `MontantTTC`, `Status`) VALUES
(30, '132054764', '2023-02-01', '2023-01-01', '200', '202', '28', '230', 'non-paye'),
(31, '132054764', '2023-02-01', '2023-01-01', '-500', '-455', '-64', '-519', 'non-paye'),
(29, '132054764', '2022-05-01', '2022-04-01', '200', '202', '28', '230', 'non-paye'),
(27, '132054764', '2023-01-01', '2022-12-01', '1000', '1120', '157', '1277', 'non-paye'),
(26, '132054764', '2022-01-01', '2021-12-01', '500', '560', '78', '638', 'paye');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `IdFournisseur` varchar(25) NOT NULL,
  `Pswd` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IdFournisseur`, `Pswd`) VALUES
('fournisseur', '123');

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

CREATE TABLE `pdf` (
  `IdPDF` int(11) NOT NULL,
  `IdClient` varchar(20) NOT NULL,
  `DateEmission` date NOT NULL,
  `DateEcheance` date NOT NULL,
  `PDF` blob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `IdReclamation` int(11) NOT NULL,
  `IdClient` varchar(50) NOT NULL,
  `Objet` varchar(255) DEFAULT NULL,
  `Message` varchar(500) DEFAULT NULL,
  `reponse` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`IdReclamation`, `IdClient`, `Objet`, `Message`, `reponse`) VALUES
(17, '132054764', '345678', '34567890°', 'KJHYGTYHUJIKL'),
(16, '132054764', 'MERCI', 'merci', 'Votre reclamation sera traitée prochainement'),
(14, '132054764', 'URGENT', 'URGENT', NULL),
(15, '132054764', 'TP2', 'TP2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `zonegeographique`
--

CREATE TABLE `zonegeographique` (
  `IdZone` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `zonegeographique`
--

INSERT INTO `zonegeographique` (`IdZone`, `Nom`) VALUES
(1, 'Mhannech'),
(2, 'Boussafou'),
(3, 'Chellal'),
(4, 'Malalien');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`IdAgent`),
  ADD KEY `IdZone` (`IdZone`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`),
  ADD KEY `IdZone` (`IdZone`);

--
-- Index pour la table `consommationannuelle`
--
ALTER TABLE `consommationannuelle`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `IdZone` (`IdZone`);

--
-- Index pour la table `consommationmensuelle`
--
ALTER TABLE `consommationmensuelle`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`IdFacture`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `Consom` (`Consom`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IdFournisseur`);

--
-- Index pour la table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`IdPDF`),
  ADD KEY `DateEmission` (`DateEmission`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `DateEcheance` (`DateEcheance`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`IdReclamation`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Index pour la table `zonegeographique`
--
ALTER TABLE `zonegeographique`
  ADD PRIMARY KEY (`IdZone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consommationannuelle`
--
ALTER TABLE `consommationannuelle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `consommationmensuelle`
--
ALTER TABLE `consommationmensuelle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `IdFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `IdPDF` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `IdReclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `zonegeographique`
--
ALTER TABLE `zonegeographique`
  MODIFY `IdZone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
