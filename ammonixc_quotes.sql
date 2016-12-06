-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Dez 2016 um 03:06
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ammonixc_quotes`
--
CREATE DATABASE IF NOT EXISTS `ammonixc_quotes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ammonixc_quotes`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id`, `thumbnail`, `name`) VALUES
(1, 'http://quotes.localhost/api/files/images/defAuthor.png', 'Kifkof'),
(2, 'http://quotes.localhost/api/files/images/defAuthor.png', 'DäHeeeb'),
(6, 'http://quotes.localhost/api/files/images/58461be9b0966.jpeg', 'Ebin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `quotes`
--

INSERT INTO `quotes` (`id`, `content`, `date`, `author_id`) VALUES
(1, 'Edgy', '2016-10-04', 1),
(2, 'Chääs', '2016-12-04', 2),
(3, 'qweqwe', '2016-12-06', 1),
(6, 'Ebin :D', '2016-12-06', 6),
(7, 'Ebin :D', '2016-12-06', 6),
(9, 'Ebin', '2016-12-06', 6),
(10, 'Ebin', '2016-12-01', 6);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indizes für die Tabelle `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`,`author_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_quotes_author_idx` (`author_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `fk_quotes_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
