-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juil. 2020 à 15:21
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wea_demo_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `wea_contact`
--

CREATE TABLE `wea_contact` (
  `id_contact` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `wea_definition`
--

CREATE TABLE `wea_definition` (
  `id_definition` int(10) NOT NULL,
  `mot_id` int(10) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `source` varchar(255) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_definition`
--

INSERT INTO `wea_definition` (`id_definition`, `mot_id`, `titre`, `texte`, `source`, `commentaire`) VALUES
(1, 1, 'citadelle', '« Ce que je reconnus en cette ville [digne] d’estime et de remarque fut la citadelle, des plus belles et des mieux achevées de la chrétienté »', '<i>Mémoires de Marguerite de Valois</i> (1594-?), <a href=\"http://www.elianeviennot.fr/Marguerite/MgV-Memoires.html\">http://www.elianeviennot.fr/Marguerite/MgV-Memoires.html</a>', 'À propos de Cambrai'),
(2, 2, 'faubourgs', '« Soudain qu’ils nous voient approcher les faubourgs avec une troupe grande comme était la mienne, les voilà alarmés. Ils quittent les verres pour courir aux armes, et tout en tumulte, au lieu de nous ouvrir, ils ferment la barrière. »', '<i>Mémoires de Marguerite de Valois</i> (1594-?), <a href=\"http://www.elianeviennot.fr/Marguerite/MgV-Memoires.html\">http://www.elianeviennot.fr/Marguerite/MgV-Memoires.html</a>', 'À propos de Dinant');

-- --------------------------------------------------------

--
-- Structure de la table `wea_image`
--

CREATE TABLE `wea_image` (
  `id_image` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `accueil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_image`
--

INSERT INTO `wea_image` (`id_image`, `nom`, `alt`, `url_image`, `accueil`) VALUES
(1, 'Manuscrit Français 1177 de la Bibliothèque nationale de France - La Cité des dames, Christine de Pizan', 'Manuscrit Français 1177 de la Bibliothèque nationale de France - https://gallica.bnf.fr/ark:/12148/btv1b84497026/f10.item', 'http://citedesdames.hypotheses.org/files/2020/07/btv1b84497026-f10-scaled.jpg', 1),
(2, 'Manuscrit Français 607 de la Bibliothèque nationale de France - La Cité des dames, Christine de Pizan', 'Manuscrit Français 607 de la Bibliothèque nationale de France - https://gallica.bnf.fr/ark:/12148/btv1b6000102v/f11.item', 'http://citedesdames.hypotheses.org/files/2020/07/btv1b6000102v-f11.jpg', 1),
(3, 'Manuscrit Français 607 de la Bibliothèque nationale de France - La Cité des dames, Christine de Pizan', 'Manuscrit Français 607 de la Bibliothèque nationale de France - https://gallica.bnf.fr/ark:/12148/btv1b6000102v-f70/f70.item', 'http://citedesdames.hypotheses.org/files/2020/07/btv1b6000102v-f70.jpg', 1),
(4, 'Manuscrit Français 609 de la Bibliothèque nationale de France - La Cité des dames, Christine de Pizan', 'Manuscrit Français 609 de la Bibliothèque nationale de France - https://gallica.bnf.fr/ark:/12148/btv1b8448962v/f16.item', 'http://citedesdames.hypotheses.org/files/2020/07/btv1b8448962v-f16-scaled.jpg', 1),
(5, 'Manuscrit Français 1177 de la Bibliothèque nationale de France - La Cité des dames, Christine de Pizan', 'Manuscrit Français 609 de la Bibliothèque nationale de France - https://gallica.bnf.fr/ark:/12148/btv1b8448962v/f268.item', 'http://citedesdames.hypotheses.org/files/2020/07/btv1b8448962v-f268.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `wea_lettre`
--

CREATE TABLE `wea_lettre` (
  `id_lettre` int(2) NOT NULL,
  `lettre` varchar(1) NOT NULL,
  `description_lettre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_lettre`
--

INSERT INTO `wea_lettre` (`id_lettre`, `lettre`, `description_lettre`) VALUES
(1, 'a', 'A comme appartement'),
(2, 'b', 'B comme boulevard'),
(3, 'c', 'C comme cité'),
(4, 'd', 'D comme dame'),
(5, 'e', 'E comme enceinte'),
(6, 'f', 'F comme faubourg');

-- --------------------------------------------------------

--
-- Structure de la table `wea_mot`
--

CREATE TABLE `wea_mot` (
  `id_mot` int(10) NOT NULL,
  `lettre_id` int(2) NOT NULL,
  `mot` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mot_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_mot`
--

INSERT INTO `wea_mot` (`id_mot`, `lettre_id`, `mot`, `description`, `mot_ref`) VALUES
(1, 3, 'citadelle', '', ''),
(2, 6, 'faubourgs', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `wea_news`
--

CREATE TABLE `wea_news` (
  `id_news` int(10) NOT NULL,
  `image_id` int(10) DEFAULT NULL,
  `titre_news` varchar(255) NOT NULL,
  `texte_news` text NOT NULL,
  `date_news` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_news`
--

INSERT INTO `wea_news` (`id_news`, `image_id`, `titre_news`, `texte_news`, `date_news`) VALUES
(1, NULL, 'Début du développement de WEA', '<p>Pierre Averty a commencé aujourd’hui son stage au Laboratoire d’informatique Gaspard Monge, pour le projet <a href=\"http://citedesdames.hypotheses.org\"><i>Cité des dames : créatrices dans la cité</i></a> de l’université Gustave Eiffel.</p>\n<p>Ce stage vise à développer un système de gestion de contenu, appelé WEA pour « Web Encyclopedia Application », qui vise à proposer une encyclopédie en ligne dont le contenu est chargé à partir d’un fichier Word structuré. Développé sous licence libre AGPL, dans les langages HTML, CSS, PHP, SQL et Javascript, il est conçu d’après une idée de la créatrice de l’<a href=\"https://www.encyclopediedesfemmes.com/\">Encyclopédie des Femmes</a>, qui sera migré sur le système WEA à l’issue du développement de ce dernier.</p>', '2020-06-30 08:00:00'),
(2, 2, 'Quelques premières images', '<p>Des images tirées de plusieurs manuscrits de <i>La Cité des dames</i> de Christine de Pizan conservés à la bibliothèque nationale de France et mis à disposition sur Gallica ont été ajoutées à ce site.</p>', '2020-07-02 20:00:00'),
(3, NULL, 'Quelques premiers mots', '<p>Des citations sur les mots « cité » et « faubourgs », tirées des <i>Mémoires</i> de Marguerite de Valois, dans l’<a href=\"http://www.elianeviennot.fr/Marguerite/MgV-Memoires.html\">édition en ligne d’Éliane Viennot</a>, ont été ajoutées sur ce site.</p>', '2020-07-03 04:40:02');

-- --------------------------------------------------------

--
-- Structure de la table `wea_parametre`
--

CREATE TABLE `wea_parametre` (
  `id_param` int(10) NOT NULL,
  `titre_site` varchar(255) DEFAULT NULL,
  `titre_home_presentation` varchar(255) DEFAULT NULL,
  `home_presentation` text DEFAULT NULL,
  `url_logo` varchar(255) DEFAULT NULL,
  `plan_site` varchar(255) DEFAULT NULL,
  `titre_mentions_legales` varchar(255) DEFAULT NULL,
  `texte_mentions_legales` text DEFAULT NULL,
  `url_compte_twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wea_parametre`
--

INSERT INTO `wea_parametre` (`id_param`, `titre_site`, `titre_home_presentation`, `home_presentation`, `url_logo`, `plan_site`, `titre_mentions_legales`, `texte_mentions_legales`, `url_compte_twitter`) VALUES
(1, 'L\'encyclopédie de la Cité des dames', 'Présentation de l’encyclopédie de la Cité des dames', '<p>Ce site est conçu comme une démonstration du système de gestion de contenus <a href=\"https://github.com/Shuitaa/WEA\">WEA</a> de Pierre Averty, dans le cadre d’un stage pour le projet <a href=\"http://citedesdames.hypotheses.org\"><i>Cité des dames : créatrices dans la cité</i></a> de l’université Gustave Eiffel.</p>', NULL, NULL, 'Mentions légales du projet WEA', '<ul>\r\n<li>Développement du CMS : Pierre Averty</li>\r\n<li>Contenu (textes et images) : Philippe Gambette</li>\r\n</ul>', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `wea_contact`
--
ALTER TABLE `wea_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `wea_definition`
--
ALTER TABLE `wea_definition`
  ADD PRIMARY KEY (`id_definition`);

--
-- Index pour la table `wea_image`
--
ALTER TABLE `wea_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `wea_lettre`
--
ALTER TABLE `wea_lettre`
  ADD PRIMARY KEY (`id_lettre`);

--
-- Index pour la table `wea_mot`
--
ALTER TABLE `wea_mot`
  ADD PRIMARY KEY (`id_mot`);

--
-- Index pour la table `wea_news`
--
ALTER TABLE `wea_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Index pour la table `wea_parametre`
--
ALTER TABLE `wea_parametre`
  ADD PRIMARY KEY (`id_param`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `wea_contact`
--
ALTER TABLE `wea_contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wea_definition`
--
ALTER TABLE `wea_definition`
  MODIFY `id_definition` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `wea_image`
--
ALTER TABLE `wea_image`
  MODIFY `id_image` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `wea_lettre`
--
ALTER TABLE `wea_lettre`
  MODIFY `id_lettre` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `wea_mot`
--
ALTER TABLE `wea_mot`
  MODIFY `id_mot` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `wea_news`
--
ALTER TABLE `wea_news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `wea_parametre`
--
ALTER TABLE `wea_parametre`
  MODIFY `id_param` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
