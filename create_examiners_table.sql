-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jun 2017 om 20:49
-- Serverversie: 5.7.11
-- PHP-versie: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authchallenge`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examiners`
--

DROP TABLE IF EXISTS `examiners`;
CREATE TABLE `examiners` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tabel leegmaken voor invoegen `examiners`
--

TRUNCATE TABLE `examiners`;
--
-- Gegevens worden geëxporteerd voor tabel `examiners`
--

INSERT INTO `examiners` (`id`, `name`, `code`) VALUES
(1, 'Dhr. Snoek', 'SNP'),
(2, 'Dhr. van Cooten', 'CTN'),
(3, 'Dhr. de Jong', 'JGA'),
(4, 'Dhr. Slemmer', 'SLR'),
(5, 'Dhr. Nouwen', 'MNO'),
(6, 'Dhr. de Ruijter', 'JDR'),
(7, 'Dhr. Huisman', 'HJW'),
(8, 'Dhr. Oorschot', 'OSE'),
(9, 'Mevr. van Kan', 'KAN');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `examiners`
--
ALTER TABLE `examiners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `examiners`
--
ALTER TABLE `examiners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
