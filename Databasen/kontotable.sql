-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 06. 12 2017 kl. 11:25:47
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontotable`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `bruger`
--

CREATE TABLE `bruger` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Navn` varchar(255) NOT NULL,
  `EfterNavn` varchar(255) NOT NULL,
  `Alder` int(11) NOT NULL,
  `Husdyr` varchar(255) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modifyed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `bruger`
--

INSERT INTO `bruger` (`ID`, `UserName`, `Password`, `Navn`, `EfterNavn`, `Alder`, `Husdyr`, `Created`, `Modifyed`) VALUES
(1, 'Jens', 'jens', 'Jens', 'Jensen', 55, '5', '2017-12-05 15:26:35', '2017-12-05 15:26:35'),
(14, 'Admin', 'admin', 'Richard', 'Thomsen', 21, '0', '2017-12-05 14:11:48', '2017-12-05 14:12:21'),
(15, 'Kurt', 'kurt', 'Kurt', 'Hansen', 99, '8000', '2017-12-05 14:26:43', '2017-12-05 14:26:43'),
(16, 'ida', 'ida', 'Ida', 'jenssen', 456, '-6', '2017-12-05 15:28:52', '2017-12-06 09:20:50'),
(17, 'maiken', '1234', 'Maiken Skriver', 'SÃ¸rensen', 21, 'nej', '2017-12-05 18:31:33', '2017-12-05 18:31:33');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `bruger`
--
ALTER TABLE `bruger`
  ADD PRIMARY KEY (`ID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `bruger`
--
ALTER TABLE `bruger`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
