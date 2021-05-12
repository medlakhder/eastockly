-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 mai 2021 à 20:09
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `qrcode`
--

-- --------------------------------------------------------

--
-- Structure de la table `eat`
--

CREATE TABLE `eat` (
  `id` int(100) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `buy_date` varchar(100) NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'food',
  `die_date` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eat`
--

INSERT INTO `eat` (`id`, `qr_code`, `nom`, `buy_date`, `buy_price`, `sell_price`, `photo`, `die_date`, `supplier_name`, `supplier_phone`) VALUES
(7, 'RM45117', 'OMO ', '01/01/2001', '10', '11', 'omo.png', '01/01/2023', 'OMO CORP', '+212 639430035'),
(9, '4564', 'sqd', 'klm', 'mlk', 'mkl', '96b5ba5be05ebfcce63dc2969f289eb2.jpg', 'mlk', 'lmk', 'mkl'),
(10, '7896', 'kmlk', 'mklml', '15', '12', 'inv-hero-facts.png', 'kmlk', 'mlk', 'mlk'),
(12, '5', 'jlkj', 'lj', 'lkj', '13', '1.jpg', '45', '465', '45'),
(120, '4', 'kljljl', 'jlkj', 'lkj', '78', '1.jpg', '\r\n45', '45', '454'),
(175, '6', 'klmklm', 'jlk', 'kmlk', '44', '1.jpg', 'jklj', 'lkj', 'kljk'),
(456, '3', 'jhjhk', 'khjk', 'klmk', '45', '1.jpg', 'klmk', 'kmlk', 'mlk'),
(4556, '1', 'Test est', 'jlkjk', 'lkj', '10', '1.jpg', 'dsfs', 'sdf', 'jkl'),
(5655, '2', 'test est', 'klm', 'kmlkm', '10', '1.jpg', 'klmkm', 'mkml', 'kml'),
(5656, '1234', 'lÃ¹m', 'lÃ¹m', 'lÃ¹m', 'lÃ¹m', '5caf1ef9054c7066e7eb073d10110576.jpg', 'lÃ¹m', 'Ã¹l', 'Ã¹l');

-- --------------------------------------------------------

--
-- Structure de la table `stock_admin`
--

CREATE TABLE `stock_admin` (
  `password` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock_admin`
--

INSERT INTO `stock_admin` (`password`) VALUES
(1120);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eat`
--
ALTER TABLE `eat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eat`
--
ALTER TABLE `eat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5657;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
