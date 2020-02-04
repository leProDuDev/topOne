-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Février 2020 à 23:02
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `actions`
--

INSERT INTO `actions` (`id`, `message`, `image`) VALUES
(1, 'LUTTER CONTRE LES D&Eacute;CHETS PLASTIQUE.', '../img/card/card-3.jpg'),
(2, 'LUTTER CONTRE LE R&Eacute;CHAUFFEMENT CLIMATIQUE.', '../img/card/card-2.jpg'),
(4, 'PROT&Eacute;GER LES FOR&Ecirc;TS.', '../img/card/card-1.jpg'),
(6, 'LUTTER CONTRE LE GASPILLAGE ALIMENTAIRE.', '../img/card/card-4.jpg'),
(7, 'LUTTER CONTRE LE BRACONNAGE.', '../img/card/card-5.jpg'),
(9, 'LUTTER CONTRE LA POLLUTION.', '../img/card/card-6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `message`) VALUES
(1, 'Newsletter #1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere leo eu metus lobortis vestibulum. Nullam justo enim, pellentesque sed consequat et, efficitur eget mauris. Donec vitae efficitur justo. Praesent est neque, tempor ut lectus sed, aliquam laoreet massa. Morbi lacinia eget est quis tincidunt. Nullam nec dui ut elit facilisis molestie. Phasellus mattis, nibh sit amet facilisis semper, velit tellus imperdiet nisl, eu pharetra augue odio in libero. Mauris vel lectus eros. Nullam eu feugiat libero. Nulla ut sem ut tellus commodo aliquam a quis felis. Suspendisse ultrices orci quis euismod porta. Aenean eu consectetur augue.'),
(3, 'Update 2.0', 'MISE A JOUR');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `email_paypal` text NOT NULL,
  `message_paypal` text NOT NULL,
  `email` text NOT NULL,
  `street` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `settings`
--

INSERT INTO `settings` (`email_paypal`, `message_paypal`, `email`, `street`, `title`) VALUES
('paypal@paypal.fr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt enim vel dolor egestas, eget scelerisque neque eleifend. Aenean in ante quam. Donec luctus pretium ante ut malesuada.', 'email@email.com', '25 Avenue Albert Camus, 66000 Perpignan', 'BIENVENUE SUR Ã©COWORLD <br> TOUS UNIS POUR L\'AVENIR DE DEMAIN');

-- --------------------------------------------------------

--
-- Structure de la table `usermanager`
--

CREATE TABLE `usermanager` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usermanager`
--

INSERT INTO `usermanager` (`id`, `username`, `password`) VALUES
(2, 'yanis6660', '123'),
(4, 'admin', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usermanager`
--
ALTER TABLE `usermanager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `usermanager`
--
ALTER TABLE `usermanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
