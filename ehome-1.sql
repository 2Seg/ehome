-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Mai 2017 à 21:39
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ehome`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id` int(11) NOT NULL,
  `type_abonnement` varchar(30) NOT NULL,
  `nb_dispositif` int(11) NOT NULL,
  `nb_beneficiaire` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_expiration` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

CREATE TABLE `actionneur` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero_serie` varchar(10) NOT NULL,
  `type_actionneur` varchar(20) NOT NULL,
  `valeur` varchar(20) NOT NULL,
  `date_valeur` datetime NOT NULL,
  `etat` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `civilite` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `nb_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero_serie` varchar(10) NOT NULL,
  `type_capteur` varchar(20) NOT NULL,
  `mesure` varchar(20) NOT NULL,
  `date_mesure` datetime NOT NULL,
  `etat` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE `consommation` (
  `id` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `eau` int(11) NOT NULL,
  `electricite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `nb_habitant` int(11) NOT NULL,
  `nb_piece` int(11) NOT NULL,
  `superficie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `id_user`, `adresse`, `code_postal`, `ville`, `pays`, `nb_habitant`, `nb_piece`, `superficie`) VALUES
(1, 1, '69 rue Balard', 75015, 'Paris', 'france', 6, 2, 98),
(2, 2, '45 rue du Swag', 75116, 'Paris', 'france', 15, 4, 250);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `envoyeur` int(11) NOT NULL,
  `receveur` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `lecture` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `numero_serie` varchar(10) NOT NULL,
  `piece` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `piece` varchar(255) NOT NULL,
  `capteur_luminosite` int(11) NOT NULL,
  `capteur_temperature` int(11) NOT NULL,
  `capteur_humidite` int(11) NOT NULL,
  `detecteur_mouvement` int(11) NOT NULL,
  `detecteur_fumee` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `actionneur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_abonnement` int(11) NOT NULL,
  `civilite` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `info_paiement` varchar(255) NOT NULL,
  `date_connexion` datetime NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `id_admin`, `id_logement`, `id_abonnement`, `civilite`, `nom`, `prenom`, `identifiant`, `mot_de_passe`, `date_naissance`, `nationalite`, `pays`, `mail`, `telephone`, `info_paiement`, `date_connexion`, `date_inscription`) VALUES
(1, 1, 1, 1, 'monsieur', 'Eliott', 'de Séguier', 'eliott', 'fdcc008c5a13011d7470010f3f572b80fe4b47c2', '1995-06-29', 'Française', 'placeholder', 'eliott@gmail.com', '0123456789', 'prélèvement_mensuel', '2017-05-19 09:49:14', '2017-05-19'),
(2, 2, 2, 2, 'madame', 'Saad Marzouk', 'Myriam', 'myriam', '2ef4f19de87532afb29e571e9b5fc8fc96a189c3', '1995-08-02', 'Marocaine', 'france', 'myriam@gmail.com', '0123456789', 'chèque_mensuel', '2017-05-19 10:54:01', '2017-05-19');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
