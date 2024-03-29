-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jan 2024 um 18:13
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

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
  `Rechnungsmail` varchar(128) DEFAULT NULL,
  `PLZ` int(18) DEFAULT NULL,
  `stadt` varchar(255) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  `geloescht` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `betrieb`
--

INSERT INTO `betrieb` (`ID_Betrieb`, `BetriebsName`, `Telefonnummer`, `Strasse`, `Hausnummer`, `Rechnungsmail`, `PLZ`, `stadt`, `land`, `geloescht`) VALUES
(1, 'ABC Corporation', '123-456-7890', 'Hauptstraße', 123, 'abc@example.com', NULL, NULL, NULL, NULL),
(2, 'XYZ Industries', '987-654-3210', 'Musterweg', 456, 'xyz@example.com', NULL, NULL, NULL, NULL),
(4, 'Johnson Ltd.', '888-555-1234', 'Buchenweg', 101, 'johnson@example.com', NULL, NULL, NULL, 1),
(5, 'Doe Enterprises', '777-333-2222', 'Lindenstraße', 55, 'doe@example.com', NULL, NULL, NULL, NULL),
(6, 'Tech Solutions', '111-222-3333', 'Ahornweg', 77, 'tech@example.com', NULL, NULL, NULL, 0),
(8, 'Green Systems', '222-333-4444', 'Kiefernweg', 33, 'green@example.com', NULL, NULL, NULL, NULL),
(9, 'Red Innovations', '666-777-8888', 'Birkenweg', 44, 'red@example.com', NULL, NULL, NULL, NULL),
(10, 'Yellow Enterprises', '999-888-7777', 'Tannenweg', 66, 'yellow@example.com', NULL, NULL, NULL, NULL),
(11, 'Purple Solutions', '777-999-1111', 'Ulmenweg', 99, 'purple@example.com', NULL, NULL, NULL, NULL),
(12, 'Orange Widgets', '333-666-9999', 'Kastanienweg', 11, 'orange@example.com', NULL, NULL, NULL, NULL),
(13, 'Brown Technologies', '444-222-1111', 'Erlenweg', 88, 'brown@example.com', NULL, NULL, NULL, NULL),
(14, 'Silver Systems', '222-111-4444', 'Fichtenweg', 77, 'silver@example.com', NULL, NULL, NULL, NULL),
(15, 'Gold Innovations', '555-444-3333', 'Akazienweg', 55, 'gold@example.com', NULL, NULL, NULL, NULL),
(16, 'Platinum Enterprises', '888-777-6666', 'Hainweg', 33, 'platinum@example.com', NULL, NULL, NULL, NULL),
(17, 'Diamond Corporation', '777-555-2222', 'Weidenweg', 22, 'diamond@example.com', NULL, NULL, NULL, 1),
(18, 'Pearl Solutions', '222-333-4444', 'Kirschweg', 66, 'pearl@example.com', NULL, NULL, NULL, 1),
(19, 'Ruby Widgets', '666-777-8888', 'Ebereschenweg', 44, 'ruby@example.com', NULL, NULL, NULL, NULL),
(20, 'Emerald Systems', '555-999-1111', 'Schlehenweg', 99, 'emerald@example.com', NULL, NULL, NULL, NULL),
(21, 'Sapphire Enterprises', '333-666-9999', 'Apfelweg', 11, 'sapphire@example.com', NULL, NULL, NULL, NULL),
(22, 'Topaz Innovations', '777-111-4444', 'Brombeerweg', 88, 'topaz@example.com', NULL, NULL, NULL, NULL),
(23, 'Amber Technologies', '222-888-3333', 'Holunderweg', 77, 'amber@example.com', NULL, NULL, NULL, NULL),
(24, 'Crimson Widgets', '444-222-7777', 'Himbeerweg', 55, 'crimson@example.com', NULL, NULL, NULL, NULL),
(25, 'Azure Systems', '999-777-4444', 'Stachelbeerweg', 33, 'azure@example.com', NULL, NULL, NULL, NULL),
(26, 'Cobalt Corporation', '555-666-3333', 'Johannisbeerweg', 22, 'cobalt@example.com', NULL, NULL, NULL, NULL),
(27, 'Indigo Solutions', '333-444-6666', 'Blaubeerweg', 66, 'indigo@example.com', NULL, NULL, NULL, 1),
(28, 'Magenta Enterprises', '666-555-8888', 'Preiselbeerweg', 44, 'magenta@example.com', NULL, NULL, NULL, NULL),
(29, 'Violet Innovations', '222-888-1111', 'Waldweg', 99, 'violet@example.com', NULL, NULL, NULL, NULL);

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
  `Hausnummer` int(11) DEFAULT NULL,
  `plz` int(10) DEFAULT NULL,
  `stadt` varchar(255) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  `geloescht` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `dozent`
--

INSERT INTO `dozent` (`ID_Dozent`, `Anrede`, `Vorname`, `Nachname`, `Geburtsdatum`, `Telefonnummer`, `Steuernummer`, `Kürzel`, `Strasse`, `Hausnummer`, `plz`, `stadt`, `land`, `geloescht`) VALUES
(1, 'Herr', 'Michael', 'Schmidt', '1980-05-15', '123-456-7890', '12', 'SCHM', 'Hauptstraße', 123, NULL, NULL, NULL, 1),
(3, 'Herr', 'Thomas', 'Meier', '1975-03-10', '555-123-4567', 'DE555123456', 'MEIE', 'Eichenallee', 789, NULL, NULL, NULL, NULL),
(5, 'Herr', 'Andreas', 'Schulz', '1990-09-25', '777-333-2222', 'DE777333222', 'SCHU', 'Lindenstraße', 55, NULL, NULL, NULL, 0),
(6, 'Herr', 'Markus', 'Koch', '1982-07-14', '111-222-3333', 'DE111222333', 'KOCH', 'Ahornweg', 77, NULL, NULL, NULL, 0),
(7, 'Frau', 'Sabine', 'Fischer', '1986-04-02', '444-555-6666', 'DE444555666', 'FISC', 'Eschenweg', 22, NULL, NULL, NULL, 0),
(10, 'Frau', 'Julia', 'Hoffmann', '1991-06-07', '999-888-7777', 'DE999888777', 'HOFF', 'Tannenweg', 66, NULL, NULL, NULL, 0),
(11, 'Herr', 'Matthias', 'Richter', '1984-02-12', '777-999-1111', 'DE777999111', 'RICH', 'Ulmenweg', 99, NULL, NULL, NULL, 0),
(12, 'Herr', 'Johannes', 'Kramer', '1987-10-08', '333-666-9999', 'DE333666999', 'KRAM', 'Kastanienweg', 11, NULL, NULL, NULL, 0),
(13, 'Herr', 'Frank', 'Schneider', '1976-08-31', '444-222-1111', 'DE444222111', 'SCHN', 'Erlenweg', 88, NULL, NULL, NULL, 0),
(15, 'Herr', 'Peter', 'Werner', '1993-09-14', '555-444-3333', 'DE555444333', 'WERN', 'Akazienweg', 55, NULL, NULL, NULL, 0),
(16, 'Herr', 'Christian', 'Schwarz', '1989-05-03', '888-777-6666', 'DE888777666', 'SCHW', 'Hainweg', 33, NULL, NULL, NULL, 0),
(17, 'Herr', 'Martin', 'Bauer', '1981-07-22', '777-555-2222', 'DE777555222', 'BAUE', 'Weidenweg', 22, NULL, NULL, NULL, NULL),
(18, 'Herr', 'Andreas', 'Schmidt', '1980-10-12', '222-333-4444', 'DE222333444', 'SCHM', 'Kirschweg', 66, NULL, NULL, NULL, NULL),
(19, 'Frau', 'Nicole', 'Meyer', '1990-11-09', '666-777-8888', 'DE666777888', 'MEYE', 'Ebereschenweg', 44, NULL, NULL, NULL, NULL),
(20, 'Herr', 'Max', 'Schulze', '1986-12-04', '555-999-1111', 'DE555999111', 'SCHU', 'Schlehenweg', 99, NULL, NULL, NULL, 0),
(21, 'Herr', 'Klaus', 'Fuchs', '1984-04-29', '333-666-9999', 'DE333666999', 'FUCH', 'Apfelweg', 11, NULL, NULL, NULL, 0),
(22, 'Herr', 'Hans', 'Herrmann', '1977-02-15', '777-111-4444', 'DE777111444', 'HERR', 'Brombeerweg', 88, NULL, NULL, NULL, 0),
(23, 'Herr', 'Oliver', 'Schmitt', '1982-06-18', '222-888-3333', 'DE222888333', 'SCHM', 'Holunderweg', 77, NULL, NULL, NULL, 1),
(25, 'Herr', 'Erik', 'Krause', '1988-09-05', '999-777-4444', 'DE999777444', 'KRAU', 'Stachelbeerweg', 33, NULL, NULL, NULL, 1),
(26, 'Frau', 'Laura', 'Wolf', '1991-08-07', '555-666-3333', 'DE555666333', 'WOLF', 'Johannisbeerweg', 22, NULL, NULL, NULL, 0),
(28, 'Frau', 'Nina', 'Baum', '1994-12-23', '666-555-8888', 'DE666555888', 'BAUM', 'Preiselbeerweg', 44, NULL, NULL, NULL, NULL),
(29, 'Herr', 'David', 'Graf', '1983-11-14', '222-888-1111', 'DE222888111', 'GRAF', 'Waldweg', 99, NULL, NULL, NULL, NULL);

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
  `ID_Dozent` int(11) NOT NULL,
  `geloescht` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `dozentenvertrag`
--

INSERT INTO `dozentenvertrag` (`ID_Honorarvertrag`, `Vertragsgegenstand`, `Vertragsbeginn`, `Vertragsende`, `Honorar`, `ID_Dozent`, `geloescht`) VALUES
(13, 'Vorlesung Mathematik', '2024-02-01', '2024-05-01', '3000.00', 1, 0),
(14, 'Seminar Informatik', '2024-03-15', '2024-06-15', '2500.00', 3, 0),
(15, 'Workshop Kunstgeschichte', '2024-04-10', '2024-07-10', '2000.00', 5, 1),
(16, 'Sprachkurs Englisch', '2024-05-20', '2024-08-20', '3500.00', 6, 0),
(17, 'Musikunterricht Klavier', '2024-06-15', '2024-09-15', '2800.00', 7, 0),
(19, 'Kochkurs Italienisch', '2024-08-10', '2024-11-10', '2300.00', 10, 1);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `dozent_kurs`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `dozent_kurs` (
`Dozent_Anrede` varchar(32)
,`Dozent_Vorname` varchar(128)
,`Dozent_Nachname` varchar(128)
,`Dozent_Telefonnummer` varchar(16)
,`Dozent_Kürzel` varchar(32)
,`Kurs_Kursnummer` int(11)
,`Kurs_Kurstyp` varchar(64)
,`Kurs_Raum` varchar(11)
,`Kurs_Kursbeschreibung` varchar(1028)
,`Kurs_KursBeginn` datetime
,`Kurs_KursEnde` datetime
);

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
  `plz` int(11) DEFAULT NULL,
  `stadt` varchar(255) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  `minAnzahl` int(11) DEFAULT NULL,
  `maxAnzahl` int(11) DEFAULT NULL,
  `Archiviert` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kurs`
--

INSERT INTO `kurs` (`ID_Kurs`, `Gebühr`, `Kursnummer`, `Kurstyp`, `Raum`, `Kursbeschreibung`, `KursBeginn`, `KursEnde`, `plz`, `stadt`, `land`, `minAnzahl`, `maxAnzahl`, `Archiviert`) VALUES
(12, 50, 101, 'Sprachkurs', 'Raum A1', 'Deutsch für Anfänger', '2024-02-01 00:00:00', '2024-04-01 00:00:00', 12345, 'Musterstadt', 'Deutschland', 5, 20, 0),
(13, 75, 202, 'Fitnesskurs', 'Fitnessraum', 'Cardio und Krafttraining', '2024-03-15 00:00:00', '2024-05-15 00:00:00', 54321, 'Sportstadt', 'Deutschland', 8, 15, 0),
(14, 30, 303, 'Kochkurs', 'Küche B', 'Italienische Küche', '2024-04-10 00:00:00', '2024-06-10 00:00:00', 67890, 'Kochhausen', 'Deutschland', 6, 18, 0),
(15, 90, 404, 'Tanzkurs', 'Tanzsaal C', 'Salsa für Fortgeschrittene', '2024-05-20 00:00:00', '2024-07-20 00:00:00', 98765, 'Tanzstadt', 'Deutschland', 10, 25, 0),
(16, 40, 505, 'Computerkurs', 'Computerlab', 'Einführung in Programmierung', '2024-06-15 00:00:00', '2024-08-15 00:00:00', 23456, 'IT-City', 'Deutschland', 7, 22, 0),
(17, 60, 606, 'Yogakurs', 'Yogaraum', 'Hatha Yoga für Entspannung', '2024-07-05 00:00:00', '2024-09-05 00:00:00', 34567, 'Yogastadt', 'Deutschland', 9, 20, 0),
(18, 80, 707, 'Malerkurs', 'Kunstraum', 'Acrylmalerei Workshop', '2024-08-10 00:00:00', '2024-10-10 00:00:00', 45678, 'Kunststadt', 'Deutschland', 5, 15, 0),
(19, 55, 808, 'Musikkurs', 'Musiksaal', 'Gitarrenunterricht für Anfänger', '2024-09-25 00:00:00', '2024-11-25 00:00:00', 56789, 'Musikstadt', 'Deutschland', 6, 18, 0),
(20, 70, 909, 'Fotografiekurs', 'Fotostudio', 'Grundlagen der Fotografie', '2024-10-15 00:00:00', '2024-12-15 00:00:00', 76543, 'Fotohausen', 'Deutschland', 8, 20, 0),
(21, 45, 1010, 'Handwerkskurs', 'Werkstatt D', 'Holzbearbeitung für Einsteiger', '2024-11-05 00:00:00', '2025-01-05 00:00:00', 87654, 'Handwerksstadt', 'Deutschland', 7, 15, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_dozent`
--

CREATE TABLE `kurs_dozent` (
  `Datum_Beginn` date DEFAULT NULL,
  `Datum_Ende` date DEFAULT NULL,
  `Anzahl_Einheiten` int(11) DEFAULT NULL,
  `ID_Dozent` int(11) DEFAULT NULL,
  `ID_Kurs` int(11) DEFAULT NULL,
  `geloescht` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kurs_dozent`
--

INSERT INTO `kurs_dozent` (`Datum_Beginn`, `Datum_Ende`, `Anzahl_Einheiten`, `ID_Dozent`, `ID_Kurs`, `geloescht`) VALUES
('2024-01-05', '2024-01-25', 69, 7, 19, 0),
('2024-01-05', '2024-01-25', 69, 7, 19, 0),
('2024-01-12', '2024-01-11', 1, 28, 16, 0),
('2024-01-12', '2024-01-11', 1, 28, 16, 0),
('2024-01-03', '2024-01-05', 2, 3, 12, 0),
('2024-01-03', '2024-01-05', 2, 3, 12, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_dozentenrechnung`
--

CREATE TABLE `kurs_dozentenrechnung` (
  `ID_DozentenRechnung` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Datum_Bezahl` date DEFAULT NULL,
  `Dozentenrechnungslink` mediumtext DEFAULT NULL,
  `ID_Dozent` int(11) DEFAULT NULL,
  `ID_Kurs` int(11) DEFAULT NULL,
  `geloescht` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs_teilnehmer`
--

CREATE TABLE `kurs_teilnehmer` (
  `Anfangszeitpunkt` datetime DEFAULT NULL,
  `Endzeitpunkt` datetime DEFAULT NULL,
  `ID_Kurs` int(11) NOT NULL,
  `ID_Teilnehmer` int(11) NOT NULL,
  `geloescht` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kurs_teilnehmer`
--

INSERT INTO `kurs_teilnehmer` (`Anfangszeitpunkt`, `Endzeitpunkt`, `ID_Kurs`, `ID_Teilnehmer`, `geloescht`) VALUES
('2024-01-18 18:09:17', '2024-01-06 18:09:17', 15, 110, 0),
('2024-01-18 18:09:17', '2024-01-06 18:09:17', 15, 110, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `ID_Rechnung` int(11) NOT NULL,
  `RE_Nummer` varchar(128) DEFAULT NULL,
  `Zahlungsfrist` date DEFAULT NULL,
  `Betrag` double DEFAULT NULL,
  `Bezahldatum` date DEFAULT NULL,
  `Bestellnummer` varchar(256) DEFAULT NULL,
  `Mahnungsdatum` date DEFAULT NULL,
  `ID_Teilnehmer` int(11) NOT NULL,
  `ID_Kurs` int(11) NOT NULL,
  `geloescht` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rechnung`
--

INSERT INTO `rechnung` (`ID_Rechnung`, `RE_Nummer`, `Zahlungsfrist`, `Betrag`, `Bezahldatum`, `Bestellnummer`, `Mahnungsdatum`, `ID_Teilnehmer`, `ID_Kurs`, `geloescht`) VALUES
(101, 'RE34567', '2024-01-27', 140, '0000-00-00', 'BN789', '2024-01-05', 101, 16, 0),
(102, 'RE45678', '2024-01-28', 250, '0000-00-00', 'BN123', '2024-01-24', 99, 19, 1);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `rechnungen_details`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `rechnungen_details` (
`RE_Nummer` varchar(128)
,`Zahlungsfrist` date
,`Betrag` double
,`Bezahldatum` date
,`Bestellnummer` varchar(256)
,`Teilnehmer_Vorname` varchar(64)
,`Teilnehmer_Nachname` varchar(64)
,`Kursnummer` int(11)
,`Kurstyp` varchar(64)
);

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
  `ID_Betrieb` int(11) NOT NULL,
  `PLZ` int(11) DEFAULT NULL,
  `stadt` varchar(255) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  `geloescht` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`ID_Teilnehmer`, `Anrede`, `Vorname`, `Nachname`, `Email`, `Telefonnummer`, `Geburtsdatum`, `Strasse`, `Hausnummer`, `ID_Betrieb`, `PLZ`, `stadt`, `land`, `geloescht`) VALUES
(70, 'herr', 'jonas', 'bürger', 'grenwi@gmail.com', '92397502387', '2024-01-16', 'test', 31, 1, 511, 'solhgn', 'germanien', 1),
(91, 'Herr', 'Max', 'Mustermann', 'max.mustermann@example.com', '123456789', '1990-01-01', 'Musterstraße', 123, 1, 12345, 'Musterstadt', 'Deutschland', 0),
(92, 'Frau', 'Maria', 'Musterfrau', 'maria.musterfrau@example.com', '987654321', '1985-05-15', 'Beispielweg', 456, 1, 54321, 'Beispieldorf', 'Deutschland', 0),
(93, 'Herr', 'Thomas', 'Schmidt', 'thomas.schmidt@example.com', '555555555', '1982-09-20', 'Teststraße', 789, 1, 67890, 'Teststadt', 'Deutschland', 1),
(94, 'Frau', 'Laura', 'Müller', 'laura.mueller@example.com', '999888777', '1995-07-10', 'Neue Allee', 101, 4, 54321, 'Musterhausen', 'Deutschland', 0),
(95, 'Herr', 'Kevin', 'Schulz', 'kevin.schulz@example.com', '111223344', '1988-03-25', 'Hauptweg', 55, 5, 98765, 'Stadtmitte', 'Deutschland', 0),
(97, 'Herr', 'Martin', 'Hofmann', 'martin.hofmann@example.com', '777666555', '1992-12-05', 'Bergweg', 22, 4, 23456, 'Bergdorf', 'Deutschland', 0),
(98, 'Frau', 'Petra', 'Schneider', 'petra.schneider@example.com', '333222111', '1980-08-30', 'Talstraße', 98, 8, 34567, 'Talstadt', 'Deutschland', 0),
(99, 'Herr', 'Christian', 'Lange', 'christian.lange@example.com', '666777888', '1987-06-15', 'Wiesenweg', 14, 9, 56789, 'Wiesendorf', 'Deutschland', 0),
(100, 'Frau', 'Monika', 'Krause', 'monika.krause@example.com', '222333444', '1998-04-03', 'Am Markt', 30, 10, 45678, 'Marktstadt', 'Deutschland', 0),
(101, 'Herr', 'Andreas', 'Meyer', 'andreas.meyer@example.com', '999999999', '1984-02-12', 'Industriestraße', 76, 11, 76543, 'Industriestadt', 'Deutschland', 1),
(102, 'Frau', 'Silke', 'Becker', 'silke.becker@example.com', '111111111', '1993-10-08', 'Gartenweg', 18, 12, 98765, 'Gartenstadt', 'Deutschland', 0),
(103, 'Herr', 'Stefan', 'Schulze', 'stefan.schulze@example.com', '444444444', '1979-07-22', 'Feldstraße', 42, 13, 87654, 'Feldstadt', 'Deutschland', 0),
(104, 'Frau', 'Bianca', 'Herrmann', 'bianca.herrmann@example.com', '777777777', '1996-05-14', 'Bachweg', 9, 14, 23456, 'Bachdorf', 'Deutschland', 0),
(105, 'Herr', 'Frank', 'Werner', 'frank.werner@example.com', '333333333', '1986-11-28', 'Dorfplatz', 63, 15, 34567, 'Dorfstadt', 'Deutschland', 0),
(106, 'Frau', 'Carolin', 'Schuster', 'carolin.schuster@example.com', '666666666', '1997-08-18', 'Buchenallee', 27, 16, 56789, 'Buchendorf', 'Deutschland', 0),
(107, 'Herr', 'Daniel', 'Köhler', 'daniel.koehler@example.com', '222222222', '1981-04-05', 'Bergstraße', 8, 17, 45678, 'Bergstadt', 'Deutschland', 0),
(108, 'Frau', 'Nadine', 'Fischer', 'nadine.fischer@example.com', '888888888', '1994-01-30', 'Hauptplatz', 52, 18, 76543, 'Hauptstadt', 'Deutschland', 1),
(109, 'Herr', 'Matthias', 'Schreiber', 'matthias.schreiber@example.com', '555555555', '1983-09-10', 'Parkweg', 11, 19, 98765, 'Parkstadt', 'Deutschland', 0),
(110, 'Frau', 'Julia', 'Lehmann', 'julia.lehmann@example.com', '999999999', '1990-06-25', 'Rosenstraße', 36, 20, 87654, 'Rosenstadt', 'Deutschland', 0);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `teilnehmer_betrieb`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `teilnehmer_betrieb` (
`Teilnehmer_Anrede` varchar(64)
,`Teilnehmer_Vorname` varchar(64)
,`Teilnehmer_Nachname` varchar(64)
,`Teilnehmer_E-Mail` varchar(128)
,`Teilnehmer_Telefonnummer` varchar(78)
,`Teilnehmer_Strasse` varchar(64)
,`Teilnehmer_Hausnummer` int(11)
,`Betrieb_Name` varchar(256)
,`Betrieb_Telefonnummer` varchar(16)
,`Betrieb_Strasse` varchar(64)
,`Betrieb_Hausnummer` int(11)
,`Betrieb_` varchar(128)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `teilnehmer_kurse`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `teilnehmer_kurse` (
`Teilnehmer_Anrede` varchar(64)
,`Teilnehmer_Vorname` varchar(64)
,`Teilnehmer_Nachname` varchar(64)
,`Teilnehmer_Email` varchar(128)
,`Teilnehmer_Telefonnummer` varchar(78)
,`Kurs_Kursnummer` int(11)
,`Kurs_Kurstyp` varchar(64)
,`Kurs_Raum` varchar(11)
,`Kurs_Kursbeschreibung` varchar(1028)
,`Kurs_KursBeginn` datetime
,`Kurs_KursEnde` datetime
);

-- --------------------------------------------------------

--
-- Struktur des Views `dozent_kurs`
--
DROP TABLE IF EXISTS `dozent_kurs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dozent_kurs`  AS SELECT `d`.`Anrede` AS `Dozent_Anrede`, `d`.`Vorname` AS `Dozent_Vorname`, `d`.`Nachname` AS `Dozent_Nachname`, `d`.`Telefonnummer` AS `Dozent_Telefonnummer`, `d`.`Kürzel` AS `Dozent_Kürzel`, `k`.`Kursnummer` AS `Kurs_Kursnummer`, `k`.`Kurstyp` AS `Kurs_Kurstyp`, `k`.`Raum` AS `Kurs_Raum`, `k`.`Kursbeschreibung` AS `Kurs_Kursbeschreibung`, `k`.`KursBeginn` AS `Kurs_KursBeginn`, `k`.`KursEnde` AS `Kurs_KursEnde` FROM ((`kurs_dozent` `kd` join `dozent` `d` on(`kd`.`ID_Dozent` = `d`.`ID_Dozent`)) join `kurs` `k` on(`kd`.`ID_Kurs` = `k`.`ID_Kurs`)) ;

-- --------------------------------------------------------

--
-- Struktur des Views `rechnungen_details`
--
DROP TABLE IF EXISTS `rechnungen_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rechnungen_details`  AS SELECT `r`.`RE_Nummer` AS `RE_Nummer`, `r`.`Zahlungsfrist` AS `Zahlungsfrist`, `r`.`Betrag` AS `Betrag`, `r`.`Bezahldatum` AS `Bezahldatum`, `r`.`Bestellnummer` AS `Bestellnummer`, `t`.`Vorname` AS `Teilnehmer_Vorname`, `t`.`Nachname` AS `Teilnehmer_Nachname`, `k`.`Kursnummer` AS `Kursnummer`, `k`.`Kurstyp` AS `Kurstyp` FROM ((`rechnung` `r` join `teilnehmer` `t` on(`r`.`ID_Teilnehmer` = `t`.`ID_Teilnehmer`)) join `kurs` `k` on(`r`.`ID_Kurs` = `k`.`ID_Kurs`)) ;

-- --------------------------------------------------------

--
-- Struktur des Views `teilnehmer_betrieb`
--
DROP TABLE IF EXISTS `teilnehmer_betrieb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teilnehmer_betrieb`  AS SELECT `t`.`Anrede` AS `Teilnehmer_Anrede`, `t`.`Vorname` AS `Teilnehmer_Vorname`, `t`.`Nachname` AS `Teilnehmer_Nachname`, `t`.`Email` AS `Teilnehmer_E-Mail`, `t`.`Telefonnummer` AS `Teilnehmer_Telefonnummer`, `t`.`Strasse` AS `Teilnehmer_Strasse`, `t`.`Hausnummer` AS `Teilnehmer_Hausnummer`, `b`.`BetriebsName` AS `Betrieb_Name`, `b`.`Telefonnummer` AS `Betrieb_Telefonnummer`, `b`.`Strasse` AS `Betrieb_Strasse`, `b`.`Hausnummer` AS `Betrieb_Hausnummer`, `b`.`Rechnungsmail` AS `Betrieb_` FROM (`teilnehmer` `t` join `betrieb` `b` on(`t`.`ID_Betrieb` = `b`.`ID_Betrieb`)) ;

-- --------------------------------------------------------

--
-- Struktur des Views `teilnehmer_kurse`
--
DROP TABLE IF EXISTS `teilnehmer_kurse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teilnehmer_kurse`  AS SELECT `t`.`Anrede` AS `Teilnehmer_Anrede`, `t`.`Vorname` AS `Teilnehmer_Vorname`, `t`.`Nachname` AS `Teilnehmer_Nachname`, `t`.`Email` AS `Teilnehmer_Email`, `t`.`Telefonnummer` AS `Teilnehmer_Telefonnummer`, `k`.`Kursnummer` AS `Kurs_Kursnummer`, `k`.`Kurstyp` AS `Kurs_Kurstyp`, `k`.`Raum` AS `Kurs_Raum`, `k`.`Kursbeschreibung` AS `Kurs_Kursbeschreibung`, `k`.`KursBeginn` AS `Kurs_KursBeginn`, `k`.`KursEnde` AS `Kurs_KursEnde` FROM ((`kurs_teilnehmer` `kt` join `teilnehmer` `t` on(`kt`.`ID_Teilnehmer` = `t`.`ID_Teilnehmer`)) join `kurs` `k` on(`kt`.`ID_Kurs` = `k`.`ID_Kurs`)) ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `betrieb`
--
ALTER TABLE `betrieb`
  ADD PRIMARY KEY (`ID_Betrieb`);

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
  ADD PRIMARY KEY (`ID_Kurs`);

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
  MODIFY `ID_Honorarvertrag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_Kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `kurs_dozentenrechnung`
--
ALTER TABLE `kurs_dozentenrechnung`
  MODIFY `ID_DozentenRechnung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `ID_Rechnung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `ID_Teilnehmer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `dozentenvertrag`
--
ALTER TABLE `dozentenvertrag`
  ADD CONSTRAINT `ID_Dozent` FOREIGN KEY (`ID_Dozent`) REFERENCES `dozent` (`ID_Dozent`) ON DELETE CASCADE,
  ADD CONSTRAINT `dozentenvertrag_ibfk_1` FOREIGN KEY (`ID_Dozent`) REFERENCES `dozent` (`ID_Dozent`);

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
  ADD CONSTRAINT `ID_Teilnehmer` FOREIGN KEY (`ID_Teilnehmer`) REFERENCES `teilnehmer` (`ID_Teilnehmer`) ON DELETE CASCADE,
  ADD CONSTRAINT `rechnung_ibfk_1` FOREIGN KEY (`ID_Teilnehmer`) REFERENCES `teilnehmer` (`ID_Teilnehmer`),
  ADD CONSTRAINT `rechnung_ibfk_2` FOREIGN KEY (`ID_Kurs`) REFERENCES `kurs` (`ID_Kurs`);

--
-- Constraints der Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD CONSTRAINT `teilnehmer_ibfk_1` FOREIGN KEY (`ID_Betrieb`) REFERENCES `betrieb` (`ID_Betrieb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
