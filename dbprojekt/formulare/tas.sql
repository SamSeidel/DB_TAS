-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Okt 2023 um 13:13
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

--
-- Daten für Tabelle `betrieb`
--

INSERT INTO `betrieb` (`ID_Betrieb`, `BetriebsName`, `Telefonnummer`, `Strasse`, `Hausnummer`, `Rechnungsmail`) VALUES
(1, 'ABC Corporation', '123-456-7890', 'Hauptstraße', 123, 'abc@example.com'),
(2, 'XYZ Industries', '987-654-3210', 'Musterweg', 456, 'xyz@example.com'),
(3, 'Smith & Co.', '555-123-4567', 'Eichenallee', 789, 'smith@example.com'),
(4, 'Johnson Ltd.', '888-555-1234', 'Buchenweg', 101, 'johnson@example.com'),
(5, 'Doe Enterprises', '777-333-2222', 'Lindenstraße', 55, 'doe@example.com'),
(6, 'Tech Solutions', '111-222-3333', 'Ahornweg', 77, 'tech@example.com'),
(7, 'Blue Widgets Inc.', '444-555-6666', 'Eschenweg', 22, 'blue@example.com'),
(8, 'Green Systems', '222-333-4444', 'Kiefernweg', 33, 'green@example.com'),
(9, 'Red Innovations', '666-777-8888', 'Birkenweg', 44, 'red@example.com'),
(10, 'Yellow Enterprises', '999-888-7777', 'Tannenweg', 66, 'yellow@example.com'),
(11, 'Purple Solutions', '777-999-1111', 'Ulmenweg', 99, 'purple@example.com'),
(12, 'Orange Widgets', '333-666-9999', 'Kastanienweg', 11, 'orange@example.com'),
(13, 'Brown Technologies', '444-222-1111', 'Erlenweg', 88, 'brown@example.com'),
(14, 'Silver Systems', '222-111-4444', 'Fichtenweg', 77, 'silver@example.com'),
(15, 'Gold Innovations', '555-444-3333', 'Akazienweg', 55, 'gold@example.com'),
(16, 'Platinum Enterprises', '888-777-6666', 'Hainweg', 33, 'platinum@example.com'),
(17, 'Diamond Corporation', '777-555-2222', 'Weidenweg', 22, 'diamond@example.com'),
(18, 'Pearl Solutions', '222-333-4444', 'Kirschweg', 66, 'pearl@example.com'),
(19, 'Ruby Widgets', '666-777-8888', 'Ebereschenweg', 44, 'ruby@example.com'),
(20, 'Emerald Systems', '555-999-1111', 'Schlehenweg', 99, 'emerald@example.com'),
(21, 'Sapphire Enterprises', '333-666-9999', 'Apfelweg', 11, 'sapphire@example.com'),
(22, 'Topaz Innovations', '777-111-4444', 'Brombeerweg', 88, 'topaz@example.com'),
(23, 'Amber Technologies', '222-888-3333', 'Holunderweg', 77, 'amber@example.com'),
(24, 'Crimson Widgets', '444-222-7777', 'Himbeerweg', 55, 'crimson@example.com'),
(25, 'Azure Systems', '999-777-4444', 'Stachelbeerweg', 33, 'azure@example.com'),
(26, 'Cobalt Corporation', '555-666-3333', 'Johannisbeerweg', 22, 'cobalt@example.com'),
(27, 'Indigo Solutions', '333-444-6666', 'Blaubeerweg', 66, 'indigo@example.com'),
(28, 'Magenta Enterprises', '666-555-8888', 'Preiselbeerweg', 44, 'magenta@example.com'),
(29, 'Violet Innovations', '222-888-1111', 'Waldweg', 99, 'violet@example.com');

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

--
-- Daten für Tabelle `dozent`
--

INSERT INTO `dozent` (`ID_Dozent`, `Anrede`, `Vorname`, `Nachname`, `Geburtsdatum`, `Telefonnummer`, `Steuernummer`, `Kürzel`, `Strasse`, `Hausnummer`) VALUES
(1, 'Herr', 'Michael', 'Schmidt', '1980-05-15', '123-456-7890', 'DE123456789', 'SCHM', 'Hauptstraße', 123),
(2, 'Frau', 'Anna', 'Müller', '1992-08-21', '987-654-3210', 'DE987654321', 'MUEL', 'Musterweg', 456),
(3, 'Herr', 'Thomas', 'Meier', '1975-03-10', '555-123-4567', 'DE555123456', 'MEIE', 'Eichenallee', 789),
(4, 'Frau', 'Christine', 'Wagner', '1988-11-03', '888-555-1234', 'DE888555123', 'WAGN', 'Buchenweg', 101),
(5, 'Herr', 'Andreas', 'Schulz', '1990-09-25', '777-333-2222', 'DE777333222', 'SCHU', 'Lindenstraße', 55),
(6, 'Herr', 'Markus', 'Koch', '1982-07-14', '111-222-3333', 'DE111222333', 'KOCH', 'Ahornweg', 77),
(7, 'Frau', 'Sabine', 'Fischer', '1986-04-02', '444-555-6666', 'DE444555666', 'FISC', 'Eschenweg', 22),
(8, 'Herr', 'Stefan', 'Huber', '1978-12-19', '222-333-4444', 'DE222333444', 'HUBE', 'Kiefernweg', 33),
(9, 'Herr', 'Sebastian', 'Becker', '1995-01-28', '666-777-8888', 'DE666777888', 'BECK', 'Birkenweg', 44),
(10, 'Frau', 'Julia', 'Hoffmann', '1991-06-07', '999-888-7777', 'DE999888777', 'HOFF', 'Tannenweg', 66),
(11, 'Herr', 'Matthias', 'Richter', '1984-02-12', '777-999-1111', 'DE777999111', 'RICH', 'Ulmenweg', 99),
(12, 'Herr', 'Johannes', 'Kramer', '1987-10-08', '333-666-9999', 'DE333666999', 'KRAM', 'Kastanienweg', 11),
(13, 'Herr', 'Frank', 'Schneider', '1976-08-31', '444-222-1111', 'DE444222111', 'SCHN', 'Erlenweg', 88),
(14, 'Herr', 'Daniel', 'Lange', '1983-03-17', '222-111-4444', 'DE222111444', 'LANG', 'Fichtenweg', 77),
(15, 'Herr', 'Peter', 'Werner', '1993-09-14', '555-444-3333', 'DE555444333', 'WERN', 'Akazienweg', 55),
(16, 'Herr', 'Christian', 'Schwarz', '1989-05-03', '888-777-6666', 'DE888777666', 'SCHW', 'Hainweg', 33),
(17, 'Herr', 'Martin', 'Bauer', '1981-07-22', '777-555-2222', 'DE777555222', 'BAUE', 'Weidenweg', 22),
(18, 'Herr', 'Andreas', 'Schmidt', '1980-10-12', '222-333-4444', 'DE222333444', 'SCHM', 'Kirschweg', 66),
(19, 'Frau', 'Nicole', 'Meyer', '1990-11-09', '666-777-8888', 'DE666777888', 'MEYE', 'Ebereschenweg', 44),
(20, 'Herr', 'Max', 'Schulze', '1986-12-04', '555-999-1111', 'DE555999111', 'SCHU', 'Schlehenweg', 99),
(21, 'Herr', 'Klaus', 'Fuchs', '1984-04-29', '333-666-9999', 'DE333666999', 'FUCH', 'Apfelweg', 11),
(22, 'Herr', 'Hans', 'Herrmann', '1977-02-15', '777-111-4444', 'DE777111444', 'HERR', 'Brombeerweg', 88),
(23, 'Herr', 'Oliver', 'Schmitt', '1982-06-18', '222-888-3333', 'DE222888333', 'SCHM', 'Holunderweg', 77),
(24, 'Frau', 'Lisa', 'Lehmann', '1992-03-26', '444-222-7777', 'DE444222777', 'LEHM', 'Himbeerweg', 55),
(25, 'Herr', 'Erik', 'Krause', '1988-09-05', '999-777-4444', 'DE999777444', 'KRAU', 'Stachelbeerweg', 33),
(26, 'Frau', 'Laura', 'Wolf', '1991-08-07', '555-666-3333', 'DE555666333', 'WOLF', 'Johannisbeerweg', 22),
(27, 'Herr', 'Felix', 'Schreiber', '1985-01-30', '333-444-6666', 'DE333444666', 'SCHR', 'Blaubeerweg', 66),
(28, 'Frau', 'Nina', 'Baum', '1994-12-23', '666-555-8888', 'DE666555888', 'BAUM', 'Preiselbeerweg', 44),
(29, 'Herr', 'David', 'Graf', '1983-11-14', '222-888-1111', 'DE222888111', 'GRAF', 'Waldweg', 99);

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

--
-- Daten für Tabelle `ort`
--

INSERT INTO `ort` (`ID_Ort`, `PLZ`, `Stadt`, `Land`) VALUES
(1, 42653, 'Solingen', 'Deutschland'),
(2, 34134, 'Hessen', 'Deutschland'),
(3, 10115, 'Berlin', 'Deutschland'),
(4, 20095, 'Hamburg', 'Deutschland'),
(5, 60306, 'Frankfurt', 'Deutschland'),
(6, 80331, 'München', 'Deutschland'),
(7, 40210, 'Düsseldorf', 'Deutschland'),
(8, 30159, 'Hannover', 'Deutschland'),
(9, 70173, 'Stuttgart', 'Deutschland'),
(10, 80801, 'München', 'Deutschland'),
(11, 14467, 'Potsdam', 'Deutschland'),
(12, 80335, 'München', 'Deutschland'),
(13, 10178, 'Berlin', 'Deutschland'),
(14, 50667, 'Köln', 'Deutschland'),
(15, 23552, 'Lübeck', 'Deutschland'),
(16, 66111, 'Saarbrücken', 'Deutschland'),
(17, 65183, 'Wiesbaden', 'Deutschland'),
(18, 45127, 'Essen', 'Deutschland'),
(19, 30161, 'Hannover', 'Deutschland'),
(20, 1067, 'Dresden', 'Deutschland'),
(21, 86150, 'Augsburg', 'Deutschland'),
(22, 40213, 'Düsseldorf', 'Deutschland'),
(23, 55116, 'Mainz', 'Deutschland'),
(24, 44135, 'Dortmund', 'Deutschland'),
(25, 28195, 'Bremen', 'Deutschland'),
(26, 6108, 'Halle', 'Deutschland'),
(27, 76133, 'Karlsruhe', 'Deutschland'),
(28, 68161, 'Mannheim', 'Deutschland'),
(29, 86152, 'Augsburg', 'Deutschland'),
(30, 18055, 'Rostock', 'Deutschland'),
(31, 6112, 'Halle', 'Deutschland'),
(32, 65185, 'Wiesbaden', 'Deutschland');

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
  MODIFY `ID_Betrieb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `dozent`
--
ALTER TABLE `dozent`
  MODIFY `ID_Dozent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `ID_Ort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
