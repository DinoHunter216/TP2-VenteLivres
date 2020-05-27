-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 26 mai 2020 à 22:58
-- Version du serveur :  8.0.20-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(150) NOT NULL,
  `province` varchar(100) NOT NULL,
  `code_postal` varchar(6) NOT NULL,
  `usager` varchar(50) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `courriel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `adresse`, `ville`, `province`, `code_postal`, `usager`, `mot_passe`, `courriel`) VALUES
(4, 'sdfsdf', 'fsdfsdf', 'sdfsdfsdfsdf', 'Sainte-Foy', 'sdfsdfsd', 'H0H0H0', '67458675856786', '123456', 'masterjim11@gmail.com'),
(5, 'Paul2', 'Houde', 'dasfsdfsad', 'Sainte-Foy', 'sadfsafd', 'H0H0H0', '45634564357465756745647', '123456', 'msdgfsdgsdfgsdfgsdfgm@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `statut` enum('livré','erreur','en cours','') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type_paiement` enum('chèque','comptant','crédit','paypal') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` smallint NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `quantite`, `date`, `image`) VALUES
(3, 'Le Seigneur des Anneaux: La Communauté de l\'Anneau', 'Un jeune et timide \'Hobbit\', Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le \'Seigneur des ténèbres\', de régner sur la \'Terre du Milieu\' et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu\'à la \'Crevasse du Destin\' pour détruire l\'anneau.', '10.00', 10, '1954-07-29', 'lotr1'),
(4, 'Le Seigneur des Anneaux: Les Deux Tours', 'Après la mort de Boromir et la disparition de Gandalf, la \'Communauté\' s\'est scindée en trois. Perdus dans les collines d\'Emyn Muil, Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'anneau magique. Gollum promet de conduire les \'Hobbits\' jusqu\'à la \'Porte Noire\' du \'Mordor\'. À travers la \'Terre du Milieu\', Aragorn, Legolas et Gimli font route vers le \'Rohan\', le royaume assiégé de Theoden.', '10.00', 10, '1954-11-11', 'lotr2'),
(5, 'Le Seigneur des Anneaux: Le Retour du Roi', 'Les armées de Sauron ont attaqué \'Minas Tirith\', la capitale de \'Gondor\'. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Cependant, Aragorn trouvera-t-il en lui la volonté d\'accomplir sa destinée ? Tandis que Gandalf s\'efforce de soutenir les forces brisées de Gondor, Theoden exhorte les guerriers de Rohan à se joindre au combat. Cependant, malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d\'ennemis.', '10.00', 10, '1955-10-20', 'lotr3'),
(6, 'Rainbow Six', 'Rainbow Six est un roman d\'espionnage, doublé d\'un techno-thriller, de Tom Clancy, paru en 1998. Il fait partie de la saga Ryan, le personnage de Jack Ryan étant très brièvement mentionné. John Clark, héros de divers autres romans de Clancy, est le personnage principal du roman.', '15.00', 10, '1998-08-01', 'r6'),
(7, 'Sans Aucun Remords', 'Sans aucun remords est un roman policier, appartenant au genre du techno-thriller, de l\'écrivain américain Tom Clancy paru en 1993. Il s\'agit du premier titre dans l\'ordre chronologique de la saga Ryan qui a pour héros Jack Ryan.', '20.00', 15, '1993-08-11', 'sar'),
(8, 'Le Hobbit', 'Le Hobbit ou Bilbo le Hobbit est un roman de fantasy de l’écrivain britannique J. R. R. Tolkien. Il narre les aventures du hobbit Bilbo, entraîné malgré lui par le magicien Gandalf et une compagnie de treize nains dans leur voyage vers la Montagne Solitaire, à la recherche du trésor gardé par le dragon Smaug.', '7.99', 7, '1937-09-21', 'hobbit'),
(9, 'Les Aventures de Tom Bombadil', 'Les Aventures de Tom Bombadil est un recueil de poèmes de J. R. R. Tolkien paru en 1962. Il se compose de seize poèmes, dont seuls les deux premiers ont véritablement à voir avec le personnage de Tom Bombadil. ', '5.00', 0, '1962-01-01', 'tom'),
(10, 'Le Silmarillion', 'Le Silmarillion est une œuvre de J. R. R. Tolkien, publiée à titre posthume en 1977 par son fils Christopher avec l\'aide de Guy Gavriel Kay. Il retrace la genèse et les premiers Âges de l\'univers de la Terre du Milieu, cadre des romans Le Hobbit et Le Seigneur des anneaux.', '30.00', 5, '1977-09-15', 'silmarillion'),
(11, 'Une Étude en Rouge', 'Au n° 3 de Lauriston Gardens près de Londres, dans une maison vide, un homme est trouvé mort. Assassiné ? Aucune blessure apparente ne permet de le dire, en dépit des taches de sang qui maculent la pièce. Sur le mur, griffonnée à la hâte, une inscription : « Rache ! » . Vengeance ! en allemand. Vingt ans plus tôt, en 1860, dans les gorges du Nevada, en Utah, Jean Ferrier est exécuté par des mormons sanguinaires chargés de faire respecter la loi du prophète. Sa fille, Lucie, est séquestrée dans le harem du fils de l’Ancien. Quel lien entre ces deux événements aussi insolites que tragiques ? Un fil ténu, un fil rouge que seul Sherlock Holmes est capable de dérouler. Une intrigue toute en subtilités où, pour la première fois, Watson découvre le maître.', '6.99', 23, '1887-01-01', 'sherlock1');

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

CREATE TABLE `produit_commande` (
  `id_produit` int NOT NULL,
  `id_commande` int NOT NULL,
  `quantite` smallint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usager` (`usager`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`id_produit`,`id_commande`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
