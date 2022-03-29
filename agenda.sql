-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 jan. 2022 à 20:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogmode`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `body`) VALUES
(1, 1, 'natacha', 'mon commentaire'),
(2, 2, 'natacha', 'mon deuxieme commentaire'),
(3, 3, 'natacha', 'troisieme'),
(4, 1, 'vanelle', 'gnkfggwhxjckvlb'),
(5, 1, 'vanelle', 'gnkfggwhxjckvlb'),
(6, 2, 'kris', 'commmmmmmmmm'),
(7, 2, 'kris', 'commmmmmmmmm'),
(8, 2, 'kris', 'commmmmmmmmm');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(1, 1, 1, 'Optez pour cette nouvelle coque  !', '1642596586_p4.jpeg', '&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;Le nouvel accessoire tendance&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;strong&gt;Apr&egrave;s le sac &agrave; main, la ceinture ou encore le b&eacute;ret. La coque est le&amp;nbsp; nouvel accessoire indispensable pour sublimer vos tenues. Le t&eacute;l&eacute;phone est devenu un outil de la vie quotidienne aussi bien&amp;nbsp; dans le cadre priv&eacute; que professionnel.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Malheureusement il peut arriver que la couleur de celui-ci n\'est pas en&amp;nbsp; total accord avec le OutFit du jour. Mais pas d&rsquo;inqui&eacute;tude, de nombreuses entreprises r&eacute;pondent &agrave; cette&amp;nbsp; probl&eacute;matique.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;Ou s&rsquo;en procurer?&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;strong&gt;Bleu, rouge, transparente, effet miroir, lampe torche il y&rsquo;en a pour tous&amp;nbsp; les prix. &amp;nbsp;Comme dit pr&eacute;c&eacute;demment de nombreux vendeurs vous proposent ce&amp;nbsp; produit tendance.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Mais o&ugrave; s&rsquo;en procurer ?&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Les sites chinois sont l&rsquo;id&eacute;al ; Shein , AliExpress ou m&ecirc;me wish vous&amp;nbsp; proposent une immense gamme de s&eacute;lection pour moins de cinq euros .&amp;nbsp; Alors n\'h&eacute;sitez pas!&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;', 1, '2022-01-05 15:56:19'),
(2, 1, 2, 'Nabilla, son documentaire mode...', '1642596841_nabila.jpg', '&lt;p&gt;&lt;strong&gt;D&eacute;couvert dans l&rsquo;amour est aveugle et les anges de la t&eacute;l&eacute;-r&eacute;alit&eacute; nous&amp;nbsp; avons tous connu Nabilla avec son fameux:&lt;/strong&gt;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&laquo; All&ocirc; ! Non mais allo&amp;nbsp; quoi ! &raquo;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;strong&gt;De jeune fille capricieuse &agrave; femme d&rsquo;affaire nous avons suivi son&amp;nbsp; &eacute;volution depuis bient&ocirc;t pr&egrave;s de 10ans.&amp;nbsp; Aujourd&rsquo;hui elle nous fait d&eacute;couvrir son univers avec son&amp;nbsp; documentaire disponible sur Amazon Prime&amp;nbsp; De son enfance &agrave; aujourd&rsquo;hui elle nous partage son parcours en tout&amp;nbsp; v&eacute;rit&eacute; . connu pour sa p&eacute;riode sulfureuse nous allons la rencontrer en&amp;nbsp; tant que m&egrave;re et femme &eacute;panoui et surtout cr&eacute;atrice cosm&eacute;tiques.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;', 1, '2022-01-05 16:01:28'),
(3, 1, 3, 'Osez les accessoires ', '1642597015_1642340721_image1.jpg', '&lt;p&gt;&lt;strong&gt;Pour sublimer vos tenues n&rsquo;h&eacute;sitez pas &agrave; combiner les accessoires. &amp;nbsp;Couvre-chef, lunette, ceinture, collier ,bracelet&hellip;&hellip;&amp;nbsp; Il y&rsquo;en a une infinit&eacute;. Tous ces accessoires vont embellir vos tenues.&amp;nbsp; D&rsquo;une tenue banal elle en fera une tenue exceptionnelle et affinera&amp;nbsp; votre personnalit&eacute;.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;N&rsquo;h&eacute;sitez pas: classique, gothique, BCBG, urbain il y en a pour tout le&amp;nbsp; monde .&lt;/strong&gt;&lt;/p&gt;', 1, '2022-01-05 16:01:57'),
(4, 1, 3, 'Le Bullet journal ', '1642597150_bujo.jpg', '&lt;p&gt;&lt;strong&gt;Si vous &ecirc;tes quelqu\'un qui ignore les rappels t&eacute;l&eacute;phoniques et qui a des&amp;nbsp; notes Post-It infinies griffonn&eacute;es de t&acirc;ches incompl&egrave;tes, vous devrez&amp;nbsp; peut-&ecirc;tre investir dans un Bullet Journal (BuJo).&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Vous avez peut-&ecirc;tre rencontr&eacute; le terme en 2013.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Largement consid&eacute;r&eacute; comme la version liste de la m&eacute;thode de&amp;nbsp; rangement de la consultante en organisant Mari Kondo, le Bullet&amp;nbsp; Journal vise &agrave; aider les utilisateurs &agrave; commander et &agrave; hi&eacute;rarchiser des&amp;nbsp; t&acirc;ches qui m&eacute;ritent leur temps et qui peuvent &ecirc;tre effectu&eacute;es&amp;nbsp; consciencieusement.&lt;/strong&gt;&lt;/p&gt;', 1, '2022-01-19 10:34:26'),
(5, 1, 3, 'Test', '1642597191_1642584866_image4.jpg', '&lt;p&gt;Post de test...&lt;/p&gt;', 1, '2022-01-19 10:35:30'),
(6, 1, 1, 'lnbcnrio', '1642599232_1642584930_image3.jpg', '&lt;p&gt;ybdfi\'ob( anP6&lt;/p&gt;', 1, '2022-01-19 14:33:52');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `description` mediumtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `price`, `description`, `name`, `image`) VALUES
(5, 5, 'La coque miroir indispensable. Elle permet d\'avoir son make-up a tout moment de la journee ! ', 'Coque miroir', '1642590261_p4.jpeg'),
(2, 2.45, 'Le carnet est l\'accessoire essentiel pour planifier vos rendez vous. \r\nEn velours, il est doux et passe partout !  ', 'Carnet velours', '1642589925_p1.jpeg'),
(3, 50, 'Le sac a main est le meilleur amie de la femme. Appreciez la taille de celui-ci !\r\n', 'Sac à main', 'p2.jpeg'),
(6, 22, ',ndbfJVYA', 'test', '1642600097_1642579605_banner.jpg'),
(4, 35, 'Le Habaya est ideal pour les journees de menage a la maison.  Venant d\'orient elle sublimera votre corps.', 'Habaya femme', '1642590200_p3.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'Bon Plan', '<p>DÃ©couvrez tout une panoplie de deals que nous avons pour vous.</p>'),
(2, 'Mode', '<p>La mode de lÃ -bas a ici !</p>'),
(3, 'Inspiration', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(1, 1, 'vanelle', 'vanelle@gmail.com', '$2y$10$Ee0Z3aVJcAKldffqJy3R0Ohw.6RkVKTDKvuMzcqR0bOdqbXRHDiJ.', '2022-01-02 09:03:33'),
(2, 1, 'Allan', 'allan@gmail.com', '$2y$10$hg5N5F2Feeap0Dd.N94HTOctUwW7R8LSEYignAXBIzbrfPpDsVdBK', '2022-01-16 09:33:32'),
(3, 0, 'natacha', 'nat@gmail.com', '$2y$10$C9ubVn4pfRsfp8cihmqxye3C/HIXAmOwiLS2Plv06Obw1OinjmDEy', '2022-01-16 10:55:01'),
(4, 0, 'kris', 'kris@gmail.com', '$2y$10$782NAuyg4QhQytGXm2H.nusf3cCvyHVcdaPIzbS52SukzQNCOt78O', '2022-01-19 17:38:08');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
