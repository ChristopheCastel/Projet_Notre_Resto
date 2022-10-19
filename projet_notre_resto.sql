-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 oct. 2022 à 14:02
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_notre_resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_categorie_menus`
--

CREATE TABLE `admin_categorie_menus` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_categorie_menus`
--

INSERT INTO `admin_categorie_menus` (`id`, `titre`, `prix`) VALUES
(9, 'Menu pt\'i joueur', 19.9),
(10, 'Menu le bon mangeur', 29.9),
(11, 'Menu le glouton', 34.9);

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id`, `categorie_id`, `titre`, `prix`, `description`) VALUES
(1, 1, 'AOC Brouilly Château des Tours 75cl', 32, NULL),
(2, 1, 'AOP Morgon 75cl', 35, NULL),
(3, 2, 'Le Languedoc 75cl', 29.9, NULL),
(4, 2, 'La Bourgogne75cl', 29.9, NULL),
(5, 3, 'Coca cola 33cl', 5, NULL),
(6, 3, 'Orangina 33cl', 5, NULL),
(7, 3, 'Red Bull 33cl', 6, NULL),
(8, 3, 'Jus et nectar 20cl', 5, NULL),
(9, 3, 'Jus de Fruits frais (orange, citron) 20cl', 7, NULL),
(10, 4, 'Plate 50cl', 5, NULL),
(11, 4, 'Evian 50cl', 7, NULL),
(12, 6, 'Gazeuse 50cl', 5, NULL),
(13, 6, 'Badoit 50cl', 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_boisson`
--

CREATE TABLE `categorie_boisson` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_boisson`
--

INSERT INTO `categorie_boisson` (`id`, `titre`) VALUES
(1, 'vins rouges'),
(2, 'vins blancs'),
(3, 'softs'),
(4, 'eaux minérales'),
(6, 'eaux pétillantes');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE `categorie_produit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `titre`) VALUES
(7, 'Entrées'),
(8, 'Plats'),
(9, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220315101554', '2022-03-15 11:16:09', 65),
('DoctrineMigrations\\Version20220315102028', '2022-03-15 11:20:32', 103),
('DoctrineMigrations\\Version20220315102501', '2022-03-15 11:25:03', 70),
('DoctrineMigrations\\Version20220315102605', '2022-03-15 11:26:08', 69),
('DoctrineMigrations\\Version20220315103138', '2022-03-15 11:31:45', 139),
('DoctrineMigrations\\Version20220315103423', '2022-03-15 11:34:27', 119),
('DoctrineMigrations\\Version20220322115150', '2022-03-22 12:52:11', 147);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `categorie_menus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `titre`, `prix`, `description`, `categorie_id`, `categorie_menus_id`) VALUES
(6, 'L\'oeuf Mayo', 11.9, 'Oeuf bio frais, déclinaison de mayonnaises aux herbes et épices douces, frisée fine et tuiles de pain.', 7, 9),
(7, 'La Tartine', 13.9, 'Tartine de campagne comme un croque-monsieur, jambon de Paris, sauce mornay, copeaux de comtés et sucrine croquante.', 7, 10),
(8, 'Le veloute', 13.9, 'Velouté Parmentier à l\'huile de truffe, fondue de poireaux, croutons dorés et crème montée à la truffe.', 7, 9),
(9, 'Le Céleri', 14.9, 'Céleri en rémoulade, moutarde à l\'ancienne, haddock fumé, compote de pommes allégée, granny smith et noisettes concassées.', 7, 11),
(10, 'L\'assiette Végétarienne', 18.9, 'Falafel de lentilles corail et pois chiches, houmous, crème d\'ail, salade de chou rouge et sauce vierge olives et coriandre.', 8, 9),
(11, 'La volaille façon poule au pot', 24, 'Pilon et suprême de volaille jaune rôties, légumes d\'hiver glacés, crème de volaille au vin jaune, penne et jus réduit.', 8, 9),
(12, 'Les Coquillettes', 23.9, 'Coquillettes infusées à la truffe, dés de jambon rôtis, jaune d\'oeuf et copeaux de parmesan.', 8, 10),
(13, 'Le Saumon', 23, 'Pavé de saumon rôti, endives cuites et crues en salade, crème réduite au bleu, cerneaux de noix, granny smith et jus réduit.', 8, 10),
(14, 'La Daurade', 22.9, 'Filet de daurade snacké, quartiers de céleri rôtis au beurre, biseaux de céleri branche glacés, émulsion d\'un beurre blanc.', 8, 10),
(15, 'La Saucisse purée', 19.9, 'Saucisse de Laguiole de Casimir Conquet, purée maison.', 8, 11),
(16, 'La Bavette de boeuf', 25, 'bavette`` Angus`` (Origine Irlande), environ 300g, frites maison, sauce poivre.', 8, 11),
(17, 'La côte de veau', 24, 'Côte de veau de 350g rôtie au beurre, frites maison, champignons du moment poêlés en persillade et jus réduit.', 8, 10),
(18, 'L\'entrcôte', 29, 'Entrecôte Charolaise de 300gr rôtie au beurre, frites maison, sauce béarnaise.', 8, 11),
(19, 'La pomme au four', 8.9, 'Pomme rôtie, nappage au caramel beurre salé, sablé breton à la cannelle et granny smith.', 9, 9),
(20, 'Le Financier', 8.9, 'Biscuit financier, crémeux à l\'orange, clémentines rôties, streusel à la noisette.', 9, 10),
(21, 'La Mousse au chocolat', 7.9, 'Mousse au chocolat servie à la louche et copeaux de chocolat', 9, 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(1, 'noel.benjamin78@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$g.C1fWJaRuifZF0vbMmSQ.3Qp9oOJQ2R6RlQM.5WhnBIRDLthvG1O', 'Noel', 'benjamin'),
(2, 'chriscastel@hotmail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$oxtJ50AiUrb6cmGZTJ2NmO6hof2Vi/ZYe7nbxQmGUFb454Cxv6R/G', 'Castel', 'Christophe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_categorie_menus`
--
ALTER TABLE `admin_categorie_menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8B97C84DBCF5E72D` (`categorie_id`);

--
-- Index pour la table `categorie_boisson`
--
ALTER TABLE `categorie_boisson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC27BCF5E72D` (`categorie_id`),
  ADD KEY `IDX_29A5EC272C835AEE` (`categorie_menus_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_categorie_menus`
--
ALTER TABLE `admin_categorie_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `categorie_boisson`
--
ALTER TABLE `categorie_boisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD CONSTRAINT `FK_8B97C84DBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_boisson` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC272C835AEE` FOREIGN KEY (`categorie_menus_id`) REFERENCES `admin_categorie_menus` (`id`),
  ADD CONSTRAINT `FK_29A5EC27BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
