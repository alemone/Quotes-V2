-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2016 um 04:38
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

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` text NOT NULL,
  `name` text NOT NULL,
  `user_token` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id`, `thumbnail`, `name`, `user_token`) VALUES
  (22, 'http://quotes.localhost/api/files/images/584b75065a169.jpeg', 'Franku', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjViY2MwNTg2ODgyZDkwOTI0NmY5OGM0ODg2Y2I5NjQ0ZjA1MmVlMTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDgxMzQwMDczLCJleHAiOjE0ODEzNDM2NzMsImF0X2hhc2giOiJPVS1PU2doVEhLeWs5SWhVRENpY1BnIiwiYXVkIjoiNjc5NTcxMjQyODE4LXB0Zm9pcmxycHJncnVocmE4bXRvNW02c2pqODVoZDh0LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTExMjU3MzA1ODg5OTc1MzU0MzMwIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF6cCI6IjY3OTU3MTI0MjgxOC1wdGZvaXJscnByZ3J1aHJhOG10bzVtNnNqajg1aGQ4dC5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImVtYWlsIjoiam9hbi5rdWVuemxlckBnbWFpbC5jb20iLCJuYW1lIjoiSm9hbiBLdWVuemxlciIsInBpY3R1cmUiOiJodHRwczovL2xoNi5nb29nbGV1c2VyY29udGVudC5jb20vLXRybHRzbjdMQkZrL0FBQUFBQUFBQUFJL0FBQUFBQUFBQWVzL0ZrVDJZMDNzMHJjL3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJKb2FuIiwiZmFtaWx5X25hbWUiOiJLdWVuemxlciIsImxvY2FsZSI6ImRlIn0.frmnJrA54khZnRpMwGYcBu9QCYR4VIWCKsLWvqDAPoLdnMasRpKHSwHssqBFF6qhZSMgWqAZKiCbZ36crky_cgwrhcLJpFmZ-P07HofMvez7Wviiwj-c8JkSRWaSMF-0YWTnbQ0QQ3y37c-Z7PZ6OPqLJtxGYsKjHa39eM7ZBVcmID_qNNJXvvB-5ovmkduZJx4lT2vMxANUxmP4GH4vdRxrrRNFHQ3ohCN2Sf4wggp_NJJWtzSdbmzavLooNo7DcDpyJJM9VYhm2q7R3baQW0tYoFp4WGsUcTt0HrPFn7w36HyZq4EBvpa59q8UHmy3E9o2StY8Jk_wcjdmh23T9g');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `user_token` text NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`author_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_quotes_author_idx` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `quotes`
--

INSERT INTO `quotes` (`id`, `content`, `date`, `user_token`, `author_id`) VALUES
  (1, 'Faggots', '2016-12-08', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjViY2MwNTg2ODgyZDkwOTI0NmY5OGM0ODg2Y2I5NjQ0ZjA1MmVlMTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDgxMzQwMDczLCJleHAiOjE0ODEzNDM2NzMsImF0X2hhc2giOiJPVS1PU2doVEhLeWs5SWhVRENpY1BnIiwiYXVkIjoiNjc5NTcxMjQyODE4LXB0Zm9pcmxycHJncnVocmE4bXRvNW02c2pqODVoZDh0LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTExMjU3MzA1ODg5OTc1MzU0MzMwIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF6cCI6IjY3OTU3MTI0MjgxOC1wdGZvaXJscnByZ3J1aHJhOG10bzVtNnNqajg1aGQ4dC5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImVtYWlsIjoiam9hbi5rdWVuemxlckBnbWFpbC5jb20iLCJuYW1lIjoiSm9hbiBLdWVuemxlciIsInBpY3R1cmUiOiJodHRwczovL2xoNi5nb29nbGV1c2VyY29udGVudC5jb20vLXRybHRzbjdMQkZrL0FBQUFBQUFBQUFJL0FBQUFBQUFBQWVzL0ZrVDJZMDNzMHJjL3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJKb2FuIiwiZmFtaWx5X25hbWUiOiJLdWVuemxlciIsImxvY2FsZSI6ImRlIn0.frmnJrA54khZnRpMwGYcBu9QCYR4VIWCKsLWvqDAPoLdnMasRpKHSwHssqBFF6qhZSMgWqAZKiCbZ36crky_cgwrhcLJpFmZ-P07HofMvez7Wviiwj-c8JkSRWaSMF-0YWTnbQ0QQ3y37c-Z7PZ6OPqLJtxGYsKjHa39eM7ZBVcmID_qNNJXvvB-5ovmkduZJx4lT2vMxANUxmP4GH4vdRxrrRNFHQ3ohCN2Sf4wggp_NJJWtzSdbmzavLooNo7DcDpyJJM9VYhm2q7R3baQW0tYoFp4WGsUcTt0HrPFn7w36HyZq4EBvpa59q8UHmy3E9o2StY8Jk_wcjdmh23T9g', 22);

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
