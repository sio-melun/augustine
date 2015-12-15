-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Décembre 2015 à 10:37
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
  `idTypeActu` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_549281973F9E793C` (`idTypeActu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `texte`, `dateActu`, `dateCrea`, `isHisto`, `idTypeActu`, `path`) VALUES
(1, 'Challenge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel pulvinar ante, sit amet posuere turpis. Aliquam tortor justo, porttitor non commodo sit amet, congue et nunc. In lobortis porta elementum. In leo sem, rhoncus vitae blandit eget, consequat et mauris. Sed rhoncus ut augue eu tempor. Nunc nisi neque, luctus non augue a, suscipit facilisis urna. Quisque auctor faucibus tellus, sed facilisis ligula aliquam ut. Morbi porta vitae leo lobortis ultricies. Phasellus porttitor tortor eu tellus hendrerit placerat. Quisque a metus varius, varius ipsum ac, scelerisque ipsum. ', '2015-06-03', '2015-06-02', 0, 4, ''),
(2, 'Enjeux', ' Vestibulum sodales urna condimentum mauris aliquam, non lobortis ex vehicula. Cras molestie facilisis tincidunt. Fusce at nibh ullamcorper nibh placerat vestibulum in a turpis. Aliquam commodo luctus tellus et accumsan. Nam turpis leo, volutpat blandit turpis ut, sodales fringilla arcu. Ut odio dolor, faucibus et quam vel, pretium elementum sem. Donec et luctus nisl. Nunc viverra interdum tellus, eget dapibus nulla pulvinar sit amet. Phasellus tempor iaculis lectus, quis laoreet arcu porttitor sit amet. Sed congue luctus mauris id rutrum. Duis sodales mi non neque pulvinar fermentum. ', '2015-06-23', '2015-06-26', 0, 4, ''),
(3, 'Etablissements', ' Aliquam eu feugiat elit. Sed finibus turpis arcu, eget bibendum tellus imperdiet eget. Phasellus lacinia volutpat ex, eu eleifend lectus ullamcorper ac. Morbi eleifend nibh id ex luctus lacinia. Ut eu mauris ac leo rhoncus aliquet. Curabitur suscipit eleifend feugiat. Pellentesque id porta erat. ', '2015-06-03', '2015-06-26', 0, 4, ''),
(8, 'ActuTrois', ' Donec gravida ullamcorper ipsum non tempor. Vivamus ut dignissim lacus. In lobortis turpis ac ligula dictum, non tempor tortor posuere. Maecenas quis turpis lacus. Quisque semper, turpis eu blandit tristique, purus tortor tempor sem, sed blandit massa nu', '2015-06-17', '2015-06-17', 0, 3, ''),
(9, 'ActuQuatre', 'Suspendisse potenti. Vivamus porta pellentesque nisi quis congue. Mauris hendrerit sodales eros, vel euismod tellus convallis non. Nunc quam nisi, pulvinar ac risus sit amet, sollicitudin congue est. Donec euismod erat eu iaculis fringilla. In leo odio. Voici une suite pour être sûr de dépasser les 255 caractères.', '2015-06-02', '2015-06-04', 1, 4, ''),
(10, 'ActuCinq', 'Aenean non ipsum aliquet, ultrices magna nec, ornare mauris. Vivamus finibus tristique diam. Praesent feugiat augue vitae mauris blandit, non rhoncus quam dapibus. Aliquam imperdiet iaculis lorem, sed lacinia lectus dignissim eu. Morbi non augue aliquam.', '2015-06-01', '2015-06-11', 0, 4, ''),
(17, 'Article test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n    Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.', '2015-05-01', '2015-06-24', 0, 4, ''),
(21, 'actuTest3', 'ActuTest3', '2010-01-01', '2015-06-26', 0, 4, ''),
(26, 'Test form imbriquer', 'test', '2010-01-01', '2015-06-26', 0, 1, ''),
(27, 'test annto', 'voila voila', '2015-10-06', '2015-10-06', 1, 2, ''),
(33, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(34, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(35, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(36, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(37, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(38, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(39, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(40, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(41, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(42, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(43, 'test img', 'test img', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(44, 'test img 2', 'tester', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(45, 'test img 2', 'tester', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(46, 'test img 2', 'tester', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(47, 'test img 2', 'tester', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(48, 'test img 2', 'tester', '2015-10-08', '2015-10-08', 0, 1, 'initial'),
(49, 'uio', 'uio', '2015-10-09', '2015-10-09', 0, 1, 'initial');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(4, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, 'rxmg3yr0va8k408cs0wkcc04c8gcwc0', '$2y$13$rxmg3yr0va8k408cs0wkcOltkp/Bb2a.cfqad5VabBivJYUkdF1ZC', '2015-10-24 23:36:40', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(5, 'user', 'user', 'user@gmail.com', 'user@gmail.com', 1, '6elaieffld0k00os8sg4kg4gkogco0o', '$2y$13$6elaieffld0k00os8sg4kerLQDO80Jcpkx3EGtF1ZKBD4yjEVqGdS', '2015-11-03 09:41:37', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(6, 'test', 'test', 'test@gmail.com', 'test@gmail.com', 1, '7n2yfo1o7fggw8ws8c00wgsskks8g40', '$2y$13$7n2yfo1o7fggw8ws8c00wejRrDD4zY5XWo2qKepyJacBK1aJIfHwq', '2015-10-25 00:37:59', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `FK_549281973F9E793C` FOREIGN KEY (`idTypeActu`) REFERENCES `typeactu` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
