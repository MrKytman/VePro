-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 22 okt 2019 om 07:49
-- Serverversie: 5.7.26
-- PHP-versie: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vepro`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userstable`
--

DROP TABLE IF EXISTS `userstable`;
CREATE TABLE IF NOT EXISTS `userstable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(15) NOT NULL DEFAULT '1',
  `username` varchar(32) NOT NULL,
  `password` varchar(124) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `userstable`
--

INSERT INTO `userstable` (`id`, `role`, `username`, `password`) VALUES
(16, 1, 'tester', '$2y$12$8rhJRGtLrF7YwkNrIzmD7OVbLcSLyLVRdGzOBfK82CaCmMjtA48T.'),
(14, 3, 'admin', '$2y$12$mRSgEpi/qjGBrvpox9eNs.a3xsJJHiX0S5m4KRW7Yu24d11gHHwRG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
