-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Juin 2015 à 12:12
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
  `texte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateActu` date NOT NULL,
  `dateCrea` date NOT NULL,
  `isHisto` tinyint(1) DEFAULT NULL,
  `nomRessource` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idTypeActu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `texte`, `dateActu`, `dateCrea`, `isHisto`, `nomRessource`, `idTypeActu`) VALUES
(1, 'Challenge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar ante, sit amet posuere turpis. Aliquam tortor justo, porttitor non commodo sit amet, congue et nunc. In lobortis porta elementum. In leo sem, rhoncus vitae blandit eget, consequat et mauris. Sed rhoncus ut augue eu tempor. Nunc nisi neque, luctus non augue a, suscipit facilisis urna. Quisque auctor faucibus tellus, sed facilisis ligula aliquam ut. Morbi porta vitae leo lobortis ultricies. Phasellus porttitor tortor eu tellus hendrerit placerat. Quisque a metus varius, varius ipsum ac, scelerisque ipsum. ', '2015-06-03', '2015-06-02', 0, 'article', 4),
(2, 'Enjeux', ' Vestibulum sodales urna condimentum mauris aliquam, non lobortis ex vehicula. Cras molestie facilisis tincidunt. Fusce at nibh ullamcorper nibh placerat vestibulum in a turpis. Aliquam commodo luctus tellus et accumsan. Nam turpis leo, volutpat blandit turpis ut, sodales fringilla arcu. Ut odio dolor, faucibus et quam vel, pretium elementum sem. Donec et luctus nisl. Nunc viverra interdum tellus, eget dapibus nulla pulvinar sit amet. Phasellus tempor iaculis lectus, quis laoreet arcu porttitor sit amet. Sed congue luctus mauris id rutrum. Duis sodales mi non neque pulvinar fermentum. ', '2015-06-23', '2015-06-26', 0, 'article', 4),
(3, 'Etablissements', ' Aliquam eu feugiat elit. Sed finibus turpis arcu, eget bibendum tellus imperdiet eget. Phasellus lacinia volutpat ex, eu eleifend lectus ullamcorper ac. Morbi eleifend nibh id ex luctus lacinia. Ut eu mauris ac leo rhoncus aliquet. Curabitur suscipit eleifend feugiat. Pellentesque id porta erat. ', '2015-06-03', '2015-06-26', 0, 'article', 4),
(8, 'ActuTrois', ' Donec gravida ullamcorper ipsum non tempor. Vivamus ut dignissim lacus. In lobortis turpis ac ligula dictum, non tempor tortor posuere. Maecenas quis turpis lacus. Quisque semper, turpis eu blandit tristique, purus tortor tempor sem, sed blandit massa nu', '2015-06-17', '2015-06-17', 0, 'article', 0),
(9, 'ActuQuatre', 'Suspendisse potenti. Vivamus porta pellentesque nisi quis congue. Mauris hendrerit sodales eros, vel euismod tellus convallis non. Nunc quam nisi, pulvinar ac risus sit amet, sollicitudin congue est. Donec euismod erat eu iaculis fringilla. In leo odio, La je peux écire autant que je veux mais la vie j''ai la flemme', '2015-06-02', '2015-06-04', 1, 'article', 0),
(10, 'ActuCinq', ' Aenean non ipsum aliquet, ultrices magna nec, ornare mauris. Vivamus finibus tristique diam. Praesent feugiat augue vitae mauris blandit, non rhoncus quam dapibus. Aliquam imperdiet iaculis lorem, sed lacinia lectus dignissim eu. Morbi non augue aliquam,', '2015-06-01', '2015-06-11', 0, 'article', 0),
(16, 'Re bonjour', 'Si ce texte s''affiche sur l''accueil, alors cela ne marche pas. La ça doit marcher.', '2010-01-01', '2015-06-19', 1, 'article', 0),
(17, 'Article test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n    Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.', '2015-05-01', '2015-06-24', 0, 'article', NULL),
(20, 'actuTest2', 'actuTest2', '2010-01-01', '2015-06-26', 0, 'article', NULL),
(21, 'actuTest3', 'actuTest3', '2010-01-01', '2015-06-26', 0, 'article', NULL),
(26, 'Test form imbriquer', 'test', '2010-01-01', '2015-06-26', 0, 'article', 1);

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
