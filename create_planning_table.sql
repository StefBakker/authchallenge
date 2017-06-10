-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jun 2017 om 22:06
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
-- Tabelstructuur voor tabel `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `examiner_1_id` int(11) NOT NULL,
  `examiner_2_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `result_id` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `exam_id`, `student_id`, `date`, `time`, `examiner_1_id`, `examiner_2_id`, `company_id`, `status_id`, `result_id`, `remarks`) VALUES
(1, 1, 2, '2017-06-07', '09:00:00', 6, 8, 1, 3, 2, ''),
(2, 3, 2, '2017-06-07', '09:00:00', 6, 8, 1, 3, 1, ''),
(3, 2, 2, '2017-04-05', '14:15:00', 3, 4, 1, 4, 0, ''),
(4, 1, 5, '2017-06-07', '09:00:00', 6, 8, 2, 0, 0, ''),
(5, 3, 5, '2017-06-07', '09:00:00', 6, 8, 2, 0, 0, ''),
(6, 2, 5, '2017-04-05', '14:15:00', 3, 4, 2, 0, 0, ''),
(7, 2, 5, '2017-04-19', '14:15:00', 3, 4, 2, 0, 0, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `examiner_1_id` (`examiner_1_id`),
  ADD KEY `examiner_2_id` (`examiner_2_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `results_id` (`result_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `planning_ibfk_3` FOREIGN KEY (`examiner_1_id`) REFERENCES `examiners` (`id`),
  ADD CONSTRAINT `planning_ibfk_4` FOREIGN KEY (`examiner_2_id`) REFERENCES `examiners` (`id`),
  ADD CONSTRAINT `planning_ibfk_5` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
