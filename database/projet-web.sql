-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 mars 2024 à 11:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-web`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle_categorie`) VALUES
(3, 'Ateliers'),
(1, 'Concerts'),
(2, 'Conférences');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `proprietaire` int(5) NOT NULL,
  `image` varchar(50) NOT NULL,
  `categorie` int(2) NOT NULL,
  `prix` int(5) NOT NULL DEFAULT 0,
  `capacite` int(5) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `date`, `heure`, `lieu`, `description`, `proprietaire`, `image`, `categorie`, `prix`, `capacite`, `date_creation`) VALUES
(21, 'Devoir XML', '2024-03-05', '10:00:00', 'CCOS', 'Le Consortium des Bibliothèques de l’Enseignement Supérieur et de la Recherche (COBESS) s’est réuni du 18 au 20 janvier 2024 à l’Université Gaston Berger de Saint-Louis pour réfléchir sur l’élaboration de syllabus harmonisés destinés aux cours de recherche documentaire dans les universités et les instituts de recherche des universités sénégalaises. Cette deuxième étape du processus d’élaboration du Syllabus a vu la présence du Pr Bernard Dione, Directeur du Centre National de Documentation Scientifique et Technique(CNDST), du Directeur de la Bibliothèque Universitaire de Saint Louis, M. Abdoulaye GUEYE et des Directeurs des Bibliothèques universitaires de L’Université de Thiès, de Bambey, d’Amadou Makhtar MBOW, ainsi que des professionnels de l’information documentaire.\r\n\r\nL’objectif est de consolider et de finaliser les syllabus devant servir de support de cours aux enseignements de la Licence au Doctorat pour permettre aux étudiants de produire des documents de qualité. Ces syllabus ainsi adoptés par les professionnels serviront d’outils pour un plaidoyer auprès des autorités pour institutionnaliser les cours de recherche documentaire dans les établissements d’enseignement supérieur. Parallèlement, l’atelier a permis d’élaborer le plan d’action 2024-2026 et d’échanger avec les autorités universitaires afin de les sensibiliser sur les missions du Consortium et son rôle incontournable dans la conception des politiques et systèmes documentaires pour une recherche et un enseignement supérieur de qualité au Sénégal.\r\n\r\nPrésidée par le Recteur, Pr Magatte NDIAYE, la cérémonie de clôture a été l’occasion de féliciter le Consortium et de revenir sur l’importance de la profession de spécialiste documentaire. De plus, il a affirmé son soutien et son engagement à défendre la cause des bibliothèques universitaires portée par le COBESS. « J’appelle les universités à mutualiser leurs ressources à travers des partenariats interuniversitaires pour un enseignement supérieur de qualité » a-t-il indiqué.\r\n\r\nUne Photo de famille a mis fin à cet atelier.', 1, 'pexels-akil-mazumder-1072824.jpg', 3, 0, 50, '2024-03-02 22:37:34');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `evenement` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `evenement`, `utilisateur`, `date_reservation`) VALUES
(11, 21, 1, '2024-03-03 06:47:35');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `telephone` int(9) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `password`) VALUES
(1, 'Guisse', 'Demba hamet', 'Diamaguene', 771626494, 'demba@gmail.com', 'Demba99'),
(12, 'Ba', 'Ousmane', 'Ziguinchor', 775860664, 'ousmane@gmail.com', 'ousmane');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_categorie` (`libelle_categorie`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lieu` (`lieu`,`date`,`heure`),
  ADD KEY `fk1` (`proprietaire`),
  ADD KEY `fk2` (`categorie`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur` (`utilisateur`,`evenement`),
  ADD KEY `reservation_ibfk_1` (`evenement`),
  ADD KEY `reservation_ibfk_2` (`utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`proprietaire`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`evenement`) REFERENCES `evenements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
