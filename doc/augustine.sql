-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Juin 2015 à 11:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `augustine`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateActu` date NOT NULL,
  `dateCrea` date NOT NULL,
  `isHisto` tinyint(1) DEFAULT NULL,
  `nomRessource` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idTypeActu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `texte`, `dateActu`, `dateCrea`, `isHisto`, `nomRessource`, `idTypeActu`) VALUES
(6, 'ActuUn', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mattis a sem quis accumsan. Integer non fringilla leo, ac consectetur urna. Morbi eget vehicula lacus. Nunc tortor augue, blandit eget euismod a, aliquam eu magna. Morbi lacinia nunc vel ferment', '2015-06-15', '2015-06-15', 0, 'article', 0),
(7, 'ActuDeux', ' Ut vitae tellus vel tortor dictum efficitur. Proin blandit lacus id neque luctus, luctus hendrerit tellus condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sed lectus leo. Nunc tellus neque, scel', '2015-06-16', '2015-06-16', 0, 'article', 0),
(8, 'ActuTrois', ' Donec gravida ullamcorper ipsum non tempor. Vivamus ut dignissim lacus. In lobortis turpis ac ligula dictum, non tempor tortor posuere. Maecenas quis turpis lacus. Quisque semper, turpis eu blandit tristique, purus tortor tempor sem, sed blandit massa nu', '2015-06-17', '2015-06-17', 0, 'article', 0),
(9, 'ActuQuatre', ' Suspendisse potenti. Vivamus porta pellentesque nisi quis congue. Mauris hendrerit sodales eros, vel euismod tellus convallis non. Nunc quam nisi, pulvinar ac risus sit amet, sollicitudin congue est. Donec euismod erat eu iaculis fringilla. In leo odio, ', '2015-06-02', '2015-06-04', 1, 'article', 0),
(10, 'ActuCinq', ' Aenean non ipsum aliquet, ultrices magna nec, ornare mauris. Vivamus finibus tristique diam. Praesent feugiat augue vitae mauris blandit, non rhoncus quam dapibus. Aliquam imperdiet iaculis lorem, sed lacinia lectus dignissim eu. Morbi non augue aliquam,', '2015-06-01', '2015-06-11', 0, 'article', 0),
(15, 'Bonjour', 'Ceci est un test', '2015-03-15', '2015-06-19', 0, 'article', 0),
(16, 'Re bonjour', 'Si ce texte s''affiche sur l''accueil, alors cela ne marche pas.', '2010-01-01', '2015-06-19', 1, 'article', 0);

-- --------------------------------------------------------

--
-- Structure de la table `typeactu`
--

CREATE TABLE IF NOT EXISTS `typeactu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `typeactu`
--

INSERT INTO `typeactu` (`id`, `libelle`) VALUES
(1, 'image'),
(2, 'youtube'),
(3, 'dailymotion'),
(4, 'article');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
