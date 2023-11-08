-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Sep 2023 um 14:03
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE tas;
USE DATABASE tas;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tas`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betrieb`
--

CREATE TABLE `betrieb` (
  `ID_Betrieb` int(11) NOT NULL,
  `BetriebsName` varchar(256) DEFAULT NULL,
  `Telefonnummer` varchar(16) DEFAULT NULL,
  `Strasse` varchar(64) DEFAULT NULL,
  `Hausnummer` int(11) DEFAULT NULL,
  `Rechnungsmail` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betrieb_ort`
--

CREATE TABLE `betrieb_ort` (
  `ID_Betrieb` int(11) DEFAULT NULL,
  `ID_Ort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dozent`
--

CREATE TABLE `dozent` (
  `ID_Dozent` int(11) NOT NULL,
  `Anrede` varchar(32) DEFAULT NULL,
  `Vorname` varchar(128) DEFAULT NULL,
  `Nachname` varchar(128) DEFAULT NULL,
  `Geburtsdatum` date DEFAULT NULL,
  `Telefonnummer` varchar(16) DEFAULT NULL,
  `Steuernummer` varchar(32) DEFAULT NULL,
  `Kürzel` varchar(32) DEFAULT NULL,
  `Strasse` varchar(128) DEFAULT NULL,
  `Hausnummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dozentenvertrag`
--

CREATE TABLE `dozentenvertrag` (
  `ID_Honorarvertrag` int(11) NOT NULL,
  `Vertragsgegenstand` varchar(512) DEFAULT NULL,
  `Vertragsbeginn` date DEFAULT NULL,
  `Vertragsende` date DEFAULT NULL,
  `Honorar` varchar(128) DEFAULT NULL,
  `ID_Dozent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs`
--

CREATE TABLE `kurs` (
  `ID_Kurs` int(11) NOT NULL,
  `Gebühr` double DEFAULT NULL,
  `Kursnummer` int(11) DEFAULT NULL,
  `Kurstyp` varchar(64) DEFAULT NULL,
  `Raum` varchar(11) DEFAULT NULL,
  `Kursbeschreibung` varchar(1028) DEFAULT NULL,
  `KursBeginn` datetime DEFAULT NULL,
  `KursEnde` datetime DEFAULT NULL,
  `ID_Ort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_dozent`
--

CREATE TABLE `kurs_dozent` (
  `Datum_Beginn` datetime DEFAULT NULL,
  `Datum_Ende` datetime DEFAULT NULL,
  `Anzahl_Einheiten` int(11) DEFAULT NULL,
  `ID_Dozent` int(11) DEFAULT NULL,
  `ID_Kurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_dozentenrechnung`
--

CREATE TABLE `kurs_dozentenrechnung` (
  `ID_DozentenRechnung` int(11) NOT NULL,
  `Datum` datetime DEFAULT NULL,
  `Datum_Bezahl` datetime DEFAULT NULL,
  `Dozentenrechnungslink` mediumtext DEFAULT NULL,
  `ID_Dozent` int(11) DEFAULT NULL,
  `ID_Kurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_teilnehmer`
--

CREATE TABLE `kurs_teilnehmer` (
  `Anfangszeitpunkt` datetime DEFAULT NULL,
  `Endzeitpunkt` datetime DEFAULT NULL,
  `ID_Kurs` int(11) NOT NULL,
  `ID_Teilnehmer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `ID_Ort` int(11) NOT NULL,
  `PLZ` int(11) DEFAULT NULL,
  `Stadt` varchar(86) DEFAULT NULL,
  `Land` varchar(87) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `ID_Rechnung` int(11) NOT NULL,
  `RE_Nummer` varchar(128) DEFAULT NULL,
  `Zahlungsfrist` datetime DEFAULT NULL,
  `Betrag` double DEFAULT NULL,
  `Bezahldatum` datetime DEFAULT NULL,
  `Bestellnummer` varchar(256) DEFAULT NULL,
  `Mahnungsdatum` date DEFAULT NULL,
  `ID_Teilnehmer` int(11) NOT NULL,
  `ID_Kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `ID_Teilnehmer` int(11) NOT NULL,
  `Anrede` varchar(64) DEFAULT NULL,
  `Vorname` varchar(64) DEFAULT NULL,
  `Nachname` varchar(64) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Telefonnummer` varchar(78) DEFAULT NULL,
  `Geburtsdatum` date DEFAULT NULL,
  `Strasse` varchar(64) DEFAULT NULL,
  `Hausnummer` int(11) DEFAULT NULL,
  `ID_Betrieb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer_ort`
--

CREATE TABLE `teilnehmer_ort` (
  `ID_Teilnehmer` int(11) DEFAULT NULL,
  `ID_ORt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `betrieb`
--
ALTER TABLE `betrieb`
  ADD PRIMARY KEY (`ID_Betrieb`);

--
-- Indizes für die Tabelle `betrieb_ort`
--
ALTER TABLE `betrieb_ort`
  ADD KEY `ID_Betrieb` (`ID_Betrieb`),
  ADD KEY `ID_Ort` (`ID_Ort`);

--
-- Indizes für die Tabelle `dozent`
--
ALTER TABLE `dozent`
  ADD PRIMARY KEY (`ID_Dozent`);

--
-- Indizes für die Tabelle `dozentenvertrag`
--
ALTER TABLE `dozentenvertrag`
  ADD PRIMARY KEY (`ID_Honorarvertrag`),
  ADD KEY `ID_Dozent` (`ID_Dozent`);

--
-- Indizes für die Tabelle `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`ID_Kurs`),
  ADD KEY `ID_Ort` (`ID_Ort`);

--
-- Indizes für die Tabelle `kurs_dozent`
--
ALTER TABLE `kurs_dozent`
  ADD KEY `ID_Dozent` (`ID_Dozent`),
  ADD KEY `ID_Kurs` (`ID_Kurs`);

--
-- Indizes für die Tabelle `kurs_dozentenrechnung`
--
ALTER TABLE `kurs_dozentenrechnung`
  ADD PRIMARY KEY (`ID_DozentenRechnung`),
  ADD KEY `ID_Dozent` (`ID_Dozent`),
  ADD KEY `ID_Kurs` (`ID_Kurs`);

--
-- Indizes für die Tabelle `kurs_teilnehmer`
--
ALTER TABLE `kurs_teilnehmer`
  ADD KEY `ID_Kurs` (`ID_Kurs`),
  ADD KEY `ID_Teilnehmer` (`ID_Teilnehmer`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`ID_Ort`);

--
-- Indizes für die Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD PRIMARY KEY (`ID_Rechnung`),
  ADD KEY `ID_Teilnehmer` (`ID_Teilnehmer`),
  ADD KEY `ID_Kurs` (`ID_Kurs`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`ID_Teilnehmer`),
  ADD KEY `ID_Betrieb` (`ID_Betrieb`);

--
-- Indizes für die Tabelle `teilnehmer_ort`
--
ALTER TABLE `teilnehmer_ort`
  ADD KEY `ID_Teilnehmer` (`ID_Teilnehmer`),
  ADD KEY `ID_ORt` (`ID_ORt`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `betrieb`
--
ALTER TABLE `betrieb`
  MODIFY `ID_Betrieb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dozent`
--
ALTER TABLE `dozent`
  MODIFY `ID_Dozent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `dozentenvertrag`
--
ALTER TABLE `dozentenvertrag`
  MODIFY `ID_Honorarvertrag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_Kurs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kurs_dozentenrechnung`
--
ALTER TABLE `kurs_dozentenrechnung`
  MODIFY `ID_DozentenRechnung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ort`
--
ALTER TABLE `ort`
  MODIFY `ID_Ort` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `ID_Rechnung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `ID_Teilnehmer` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `betrieb_ort`
--
ALTER TABLE `betrieb_ort`
  ADD CONSTRAINT `betrieb_ort_ibfk_1` FOREIGN KEY (`ID_Betrieb`) REFERENCES `betrieb` (`ID_Betrieb`),
  ADD CONSTRAINT `betrieb_ort_ibfk_2` FOREIGN KEY (`ID_Ort`) REFERENCES `ort` (`ID_Ort`);

--
-- Constraints der Tabelle `dozentenvertrag`
--
ALTER TABLE `dozentenvertrag`
  ADD CONSTRAINT `dozentenvertrag_ibfk_1` FOREIGN KEY (`ID_Dozent`) REFERENCES `dozent` (`ID_Dozent`);

--
-- Constraints der Tabelle `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ibfk_1` FOREIGN KEY (`ID_Ort`) REFERENCES `ort` (`ID_Ort`);

--
-- Constraints der Tabelle `kurs_dozent`
--
ALTER TABLE `kurs_dozent`
  ADD CONSTRAINT `kurs_dozent_ibfk_1` FOREIGN KEY (`ID_Dozent`) REFERENCES `dozent` (`ID_Dozent`),
  ADD CONSTRAINT `kurs_dozent_ibfk_2` FOREIGN KEY (`ID_Kurs`) REFERENCES `kurs` (`ID_Kurs`);

--
-- Constraints der Tabelle `kurs_dozentenrechnung`
--
ALTER TABLE `kurs_dozentenrechnung`
  ADD CONSTRAINT `kurs_dozentenrechnung_ibfk_1` FOREIGN KEY (`ID_Dozent`) REFERENCES `dozent` (`ID_Dozent`),
  ADD CONSTRAINT `kurs_dozentenrechnung_ibfk_2` FOREIGN KEY (`ID_Kurs`) REFERENCES `kurs` (`ID_Kurs`);

--
-- Constraints der Tabelle `kurs_teilnehmer`
--
ALTER TABLE `kurs_teilnehmer`
  ADD CONSTRAINT `kurs_teilnehmer_ibfk_1` FOREIGN KEY (`ID_Kurs`) REFERENCES `kurs` (`ID_Kurs`),
  ADD CONSTRAINT `kurs_teilnehmer_ibfk_2` FOREIGN KEY (`ID_Teilnehmer`) REFERENCES `teilnehmer` (`ID_Teilnehmer`);

--
-- Constraints der Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD CONSTRAINT `rechnung_ibfk_1` FOREIGN KEY (`ID_Teilnehmer`) REFERENCES `teilnehmer` (`ID_Teilnehmer`),
  ADD CONSTRAINT `rechnung_ibfk_2` FOREIGN KEY (`ID_Kurs`) REFERENCES `kurs` (`ID_Kurs`);

--
-- Constraints der Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD CONSTRAINT `teilnehmer_ibfk_1` FOREIGN KEY (`ID_Betrieb`) REFERENCES `betrieb` (`ID_Betrieb`);

--
-- Constraints der Tabelle `teilnehmer_ort`
--
ALTER TABLE `teilnehmer_ort`
  ADD CONSTRAINT `teilnehmer_ort_ibfk_1` FOREIGN KEY (`ID_Teilnehmer`) REFERENCES `teilnehmer` (`ID_Teilnehmer`),
  ADD CONSTRAINT `teilnehmer_ort_ibfk_2` FOREIGN KEY (`ID_ORt`) REFERENCES `ort` (`ID_Ort`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
