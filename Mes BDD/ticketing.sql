-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 jan. 2024 à 10:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ticketing`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `mail`, `tel`) VALUES
(1, 'Sop', 'Alain', 'sop.alain@gmail.com', '06.25.14.87.15'),
(2, 'Potter', 'Harry', 'harry.potter@poudlard.net', '06.25.14.87.16'),
(3, 'Who', 'Doctor', 'who@bbc.net', '06.25.14.87.17'),
(4, 'Smith', 'Matt', 'msmith@acteur.com', '06.25.14.87.18'),
(5, 'Rival', 'Louis', 'louis.rival@gmail.com', '06.25.14.87.19');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `nom_equipement` varchar(30) NOT NULL,
  `type_equipement` varchar(30) NOT NULL,
  `description_equiement` varchar(30) NOT NULL,
  `date_achat` date NOT NULL,
  `date_garantie` date NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `nom_equipement`, `type_equipement`, `description_equiement`, `date_achat`, `date_garantie`, `client_id`) VALUES
(1, 'pc1', 'ordinateur', 'alienware', '2022-10-06', '2023-10-06', 1),
(2, 'nul1', 'imprimante', 'hplaserjet', '2023-06-07', '2024-06-07', 1),
(3, 'tplink1', 'routeur', 'tplink', '2022-01-01', '2023-01-01', 2),
(4, 'Ip1', 'telephone', 'iphone48', '2022-05-05', '2023-05-05', 2),
(5, 'srv1', 'serveur', 'DellServeur', '2022-05-23', '2023-05-23', 2),
(6, 'nka1', 'telephone', 'nokia3310', '1900-02-01', '1901-02-01', 1),
(7, 'pc2', 'ordinateur', 'alienware', '1970-12-18', '1971-12-18', 3),
(8, 'nul2', 'imprimante', 'hplaserjet', '2022-12-12', '2023-12-12', 3),
(9, 'tplink2', 'routeur', 'tplink', '2023-01-21', '2024-01-21', 3),
(10, 'Ip2', 'telephone', 'iphone48', '2021-10-02', '2022-10-02', 4),
(11, 'srv2', 'serveur', 'DellServeur', '2021-10-02', '2022-10-02', 4),
(12, 'nka2', 'telephone', 'nokia3310', '2021-10-02', '2022-10-02', 4),
(13, 'pc3', 'ordinateur', 'alienware', '2023-01-30', '2024-01-30', 5),
(14, 'nul3', 'imprimante', 'hplaserjet', '2023-01-30', '2024-01-30', 5),
(15, 'tplink3', 'routeur', 'tplink', '2022-11-04', '2024-01-30', 5),
(16, 'tplink4', 'routeur', 'tplink', '2022-11-04', '2024-01-30', 5),
(17, 'pc_4', 'ordinateur', 'alienware', '2022-11-23', '2023-11-23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `nom_statut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom_statut`) VALUES
(1, 'en_cours'),
(2, 'termine'),
(3, 'attente_client');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`id`, `nom`, `mail`) VALUES
(1, 'segara', 'j.segara@gmail.com'),
(2, 'bouhey', 'sac.bouhey@gmail.com'),
(3, 'pichon', 'm.pichon@gmail.com'),
(4, 'jobs', 's.jobs@riche.com');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `technicien_id` int(11) NOT NULL,
  `cloture` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date_creation` date NOT NULL,
  `date_cloture` date NOT NULL,
  `equipement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `client_id`, `technicien_id`, `cloture`, `statut`, `type`, `description`, `date_creation`, `date_cloture`, `equipement_id`) VALUES
(1, 1, 1, 0, 1, 'materiel', 'RNM', '2023-11-06', '0000-00-00', 1),
(2, 1, 1, 0, 1, 'materiel', 'RNM', '2023-06-07', '0000-00-00', 2),
(3, 2, 1, 1, 2, 'logiciel', 'RNM', '2022-01-04', '2023-01-04', 3),
(4, 2, 4, 2, 2, 'logiciel', 'RNM', '2022-05-23', '2022-05-24', 4),
(5, 3, 4, 2, 2, 'logiciel', 'RNM', '1970-12-30', '2022-12-30', 7),
(6, 3, 3, 0, 1, 'logiciel', 'RNM', '2023-02-01', '0000-00-00', 8),
(7, 4, 3, 0, 1, 'logiciel', 'RNM', '2023-05-14', '0000-00-00', 10),
(8, 4, 3, 3, 2, 'logiciel', 'RNM', '2023-01-07', '2023-05-07', 10),
(9, 5, 2, 0, 3, 'logiciel', 'RNM', '2023-10-09', '0000-00-00', 15),
(10, 5, 2, 4, 2, 'materiel', 'RNM', '2023-08-22', '2023-08-24', 15),
(11, 1, 2, 4, 2, 'materiel', 'RNM', '2023-02-27', '2023-03-02', 3),
(12, 1, 3, 4, 2, 'materiel', 'RNM', '1900-03-01', '1900-03-02', 6),
(13, 1, 2, 1, 1, 'logiciel', 'gofeizhagofehza', '2023-11-01', '2023-11-06', 1),
(14, 3, 1, 1, 1, 'logiciel', 'ejhgkfazef', '2022-05-04', '2022-05-04', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `technicien`
--
ALTER TABLE `technicien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
