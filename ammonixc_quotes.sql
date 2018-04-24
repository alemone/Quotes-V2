-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2016 um 17:13
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `name` text NOT NULL,
  `user_sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id`, `thumbnail`, `name`, `user_sub`) VALUES
  (23, 'http://quotes.localhost/api/files/images/584c28bc166f0.jpeg', 'Papa Franku', '111257305889975354330');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `author_id` int(11) NOT NULL,
  `user_sub` varchar(255) NOT NULL,
  `rating` int(4) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `quotes`
--

INSERT INTO `quotes` (`id`, `content`, `date`, `author_id`, `user_sub`, `rating`) VALUES
  (3, 'Faggots', '2016-12-10', 23, '111257305889975354330', '23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `sub` varchar(255) NOT NULL,
  `user_token` text,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `given_name` text NOT NULL,
  `family_name` text NOT NULL,
  `picture` text NOT NULL,
  `locale` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`sub`, `user_token`, `email`, `name`, `given_name`, `family_name`, `picture`, `locale`) VALUES
  ('111257305889975354330', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjViY2MwNTg2ODgyZDkwOTI0NmY5OGM0ODg2Y2I5NjQ0ZjA1MmVlMTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDgxMzg0NTczLCJleHAiOjE0ODEzODgxNzMsImF0X2hhc2giOiIzTWdRcjdfd2FZSWFwcnZBb29EMUx3IiwiYXVkIjoiNjc5NTcxMjQyODE4LXB0Zm9pcmxycHJncnVocmE4bXRvNW02c2pqODVoZDh0LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTExMjU3MzA1ODg5OTc1MzU0MzMwIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF6cCI6IjY3OTU3MTI0MjgxOC1wdGZvaXJscnByZ3J1aHJhOG10bzVtNnNqajg1aGQ4dC5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImVtYWlsIjoiam9hbi5rdWVuemxlckBnbWFpbC5jb20iLCJuYW1lIjoiSm9hbiBLdWVuemxlciIsInBpY3R1cmUiOiJodHRwczovL2xoNi5nb29nbGV1c2VyY29udGVudC5jb20vLXRybHRzbjdMQkZrL0FBQUFBQUFBQUFJL0FBQUFBQUFBQWVzL0ZrVDJZMDNzMHJjL3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJKb2FuIiwiZmFtaWx5X25hbWUiOiJLdWVuemxlciIsImxvY2FsZSI6ImRlIn0.EHKEdhDdVwAqXtwF2GyVQpz8RzAp0wzbqVZhCP5L64nGaDfjRhYBoxofEN4g9tnc3bTJojeh62VRYUo1mX1VPOSTow-iKFzLfxOpAgqmZWOfHEQHttbQVehejy9v9u0CFeY3sk1SscFcmcGcR6MAYvUZC9IShx45eI2riM64mqWBBstOd1RS9ca6lvxKxjzmWJV4995YBdZntbU9Tr2UXSjTnnK6NmFPoSKvY31T3X_H7SXAQARm6auKAU0HshSwAL30pOwZpGCqahT0Hx5XOeaxHim_BhysrMvMBmKZ6PAP4lT0v7l4pXOOfjt5CedszP8_H0zEhFm9jw1xQMI8Cw', 'joan.kuenzler@gmail.com', 'Joan Kuenzler', 'Joan', 'Kuenzler', 'https://lh6.googleusercontent.com/-trltsn7LBFk/AAAAAAAAAAI/AAAAAAAAAes/FkT2Y03s0rc/s96-c/photo.jpg', 'de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`,`user_sub`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_author_user1_idx` (`user_sub`);

--
-- Indizes für die Tabelle `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`,`author_id`,`user_sub`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_quotes_author_idx` (`author_id`),
  ADD KEY `fk_quotes_user1_idx` (`user_sub`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sub`),
  ADD UNIQUE KEY `sub_UNIQUE` (`sub`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT für Tabelle `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `fk_author_user1` FOREIGN KEY (`user_sub`) REFERENCES `user` (`sub`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `fk_quotes_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quotes_user1` FOREIGN KEY (`user_sub`) REFERENCES `user` (`sub`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
