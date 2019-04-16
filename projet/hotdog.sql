-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 24 jan. 2019 à 03:18
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotdog`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail_post` varchar(25) NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `prix` int(10) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `id_race` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `nom`, `mail_post`, `sexe`, `age`, `prix`, `ville`, `id_race`, `id_user`, `photo`) VALUES
(2, 'Idefix', 'asterix@gmail.com', 'Male', 5, 0, 'Erquy', 2, 2, 'idefix.jpg'),
(1, 'Milou', 'milou@gmail.com', 'Male', 2, 0, 'Lyon', 1, 1, 'milou.png'),
(12, 'Lucky', 'Cruelladenfer@gmail.com', 'male', 1, 1000, 'Londres', 16, 9, 'dal.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `notation_annonce`
--

CREATE TABLE `notation_annonce` (
  `note` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notation_annonce`
--

INSERT INTO `notation_annonce` (`note`, `id_user`, `id_annonce`) VALUES
(3, 1, 2),
(3, 9, 12),
(1, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `nom_race` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id_race`, `nom_race`) VALUES
(2, 'inderterminee'),
(1, 'Fox Terrier'),
(16, 'Dalmatien');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `mdp`, `email`) VALUES
(2, 'Asterix', 'stxqNZ48BD4hU', 'asterix@gmail.com'),
(1, 'Tintin', 'st17ZQB2FxpgA', 'TintinMilou@gmail.com'),
(9, 'Cruella', 'stV6DDIO3QZPE', 'Cruelladenfer@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_race` (`id_race`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `notation_annonce`
--
ALTER TABLE `notation_annonce`
  ADD PRIMARY KEY (`id_user`,`id_annonce`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
