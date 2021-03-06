-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 15 Juin 2017 à 15:37
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

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `civilite`, `nom`, `prenom`, `identifiant`, `mot_de_passe`, `date_naissance`, `nationalite`, `pays`, `mail`, `telephone`, `nb_user`) VALUES
(1, 'monsieur', 'Jalabert', 'Tom', 'tom', '96835dd8bfa718bd6447ccc87af89ae1675daeca', '1996-02-15', 'Française', 'france', 'tomjaja@gmail.com', '0123654789', 0);

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
-- Structure de la table `dispositif`
--

CREATE TABLE `dispositif` (
  `id` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `type_dispositif` varchar(255) NOT NULL,
  `etat` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dispositif`
--

INSERT INTO `dispositif` (`id`, `id_piece`, `type_dispositif`, `etat`) VALUES
(19, 1, 'Capteur de température', 'off'),
(18, 1, 'Capteur de luminosité', 'off'),
(30, 4, 'Capteur de luminosité', 'off'),
(31, 4, 'Détecteur de mouvement', 'off'),
(33, 1, 'Capteur d\'humidité', 'off'),
(53, 15, 'Actionneur fenêtre', 'off'),
(20, 1, 'Capteur de température', 'off'),
(54, 15, 'Capteur de température', 'off'),
(22, 1, 'Caméra', 'off'),
(23, 1, 'Détecteur de fumée', 'off'),
(32, 1, 'Capteur d\'humidité', 'off'),
(40, 1, 'Actionneur portail', 'off'),
(41, 1, 'Actionneur climatisation', 'off'),
(42, 1, 'Actionneur climatisation', 'off'),
(55, 15, 'Actionneur chauffage', 'off');

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
(1, 1, '69 rue Balard', 75015, 'Paris', 'France', 6, 3, 98),
(2, 2, '1 rue de Tours', 75014, 'Paris', 'France', 2, 1, 45),
(4, 4, '55 rue Ici', 75116, 'Paris', 'France', 5, 0, 68),
(5, 5, '10 rue des michtos', 75116, 'Paris', 'France', 3, 0, 56),
(6, 6, '11 rue des Michtos', 75007, 'Lisbonne', 'Portugal', 17, 0, 40);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `mail_receveur` varchar(255) NOT NULL,
  `type_receveur` varchar(255) NOT NULL,
  `mail_envoyeur` varchar(255) NOT NULL,
  `type_envoyeur` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_envoi` datetime NOT NULL,
  `lecture` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `mail_receveur`, `type_receveur`, `mail_envoyeur`, `type_envoyeur`, `objet`, `contenu`, `date_envoi`, `lecture`) VALUES
(2, 'eliottdes@gmail.com', 'Utilisateur', 'tomjaja@gmail.com', 'Administrateur', 'de Tom pour Eliott', 'ihbpze', '2017-06-15 15:33:00', 'oui'),
(3, 'tomjaja@gmail.com', 'Administrateur', 'tomjaja@gmail.com', 'Administrateur', 'De Tom pour Tom', 'hv lh', '2017-06-15 15:33:36', 'oui'),
(4, 'tomjaja@gmail.com', 'Administrateur', 'tomjaja@gmail.com', 'Administrateur', 'RE : De Tom pour Tom', 'Ok', '2017-06-15 15:33:49', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `id` int(11) NOT NULL,
  `id_dispositif` int(11) NOT NULL,
  `mesure` varchar(255) NOT NULL,
  `date_mesure` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `piece` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id`, `id_logement`, `piece`) VALUES
(1, 1, 'Salon'),
(4, 1, 'Chambre'),
(15, 1, 'Bureau');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
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

INSERT INTO `utilisateur` (`id`, `id_admin`, `civilite`, `nom`, `prenom`, `identifiant`, `mot_de_passe`, `date_naissance`, `nationalite`, `pays`, `mail`, `telephone`, `info_paiement`, `date_connexion`, `date_inscription`) VALUES
(1, 1, 'Monsieur', 'de Séguier', 'Eliott', 'eliott', 'fdcc008c5a13011d7470010f3f572b80fe4b47c2', '1995-06-29', 'Française', 'France', 'eliottdes@gmail.com', '0123456789', 'Prélèvement automatique mensuel', '2017-05-24 18:17:28', '2017-05-24'),
(2, 1, 'Monsieur', 'Robic', 'Alan', 'alan', '91e38e63b890fbb214c8914809fde03c73e7f24d', '4562-06-29', 'Française', 'France', 'alan@gmail.com', '0123456789', 'prélèvement_mensuel', '2017-05-28 16:58:38', '2017-05-28'),
(4, 1, 'Madame', 'Romani', 'Manal', 'manal', 'd7534d59281a979f11a0e4bc4c2735d635bf3b07', '2000-12-12', 'Marocaine', 'France', 'manal@gmail.com', '0123456789', 'prélèvement_mensuel', '2017-06-04 22:56:22', '2017-06-04'),
(6, 1, 'Monsieur', 'Oliveira', 'Dylan', 'dylan', 'dd378c4ca75f71f527acddef5b43fc35b68d5b7a', '2017-06-01', 'Portuguaise', 'Portugal', 'dylan@gmail.com', '0123654987', 'Chèque annuel', '2017-06-14 09:44:17', '2017-06-14');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dispositif`
--
ALTER TABLE `dispositif`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_envoyeur` (`mail_envoyeur`,`mail_receveur`),
  ADD KEY `mail_envoyeur_2` (`mail_envoyeur`,`mail_receveur`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dispositif`
--
ALTER TABLE `dispositif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
