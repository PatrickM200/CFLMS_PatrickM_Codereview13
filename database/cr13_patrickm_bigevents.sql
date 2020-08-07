-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Aug 2020 um 15:16
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_patrickm_bigevents`
--
CREATE DATABASE
IF NOT EXISTS `cr13_patrickm_bigevents` DEFAULT CHARACTER
SET utf8mb4
COLLATE utf8mb4_general_ci;
USE `cr13_patrickm_bigevents`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar
(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar
(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int
(11) NOT NULL,
  `contact_mail` varchar
(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar
(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar
(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar
(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`
id`,
`name`,
`date
`, `description`, `image`, `capacity`, `contact_mail`, `contact_phone`, `address`, `url`, `type`) VALUES
(1, 'Event-1', '2020-04-14 20:30:00', 'Event TEXT', 'https://kalapriya.org/wp-content/uploads/2015/08/placeholder-300x300.jpg', 10, 'event1@event.at', '+43456456', 'Event Address', 'https://Event-1.com', 'music'),
(2, 'Event-2', '2021-05-10 10:30:00', 'Event TEXT', 'https://kalapriya.org/wp-content/uploads/2015/08/placeholder-300x300.jpg', 15, 'event2@event.at', '+43567567', 'Event Address', 'https://event2.com', 'music'),
(3, 'Event-3', '2020-08-10 20:30:00', 'Event TEXT', 'https://kalapriya.org/wp-content/uploads/2015/08/placeholder-300x300.jpg', 240, 'event@event.at', '+43678678', 'Event Address', 'https://event3.com', 'theater'),
(7, 'Event4', '2021-05-10 10:30:00', 'Event TEXT', 'https://kalapriya.org/wp-content/uploads/2015/08/placeholder-300x300.jpg', 15, 'event@event.at', '+43979798', 'Event Address', 'wsww.event4.com', 'outdoor'),
(8, 'Event-5', '2020-08-10 20:30:00', 'Event Text', 'https://kalapriya.org/wp-content/uploads/2015/08/placeholder-300x300.jpg', 240, 'event@event.at', '+4356565656', 'Event Address', 'www.event5.com', 'sport');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
