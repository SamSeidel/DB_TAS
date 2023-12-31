CREATE TABLE Betrieb (
	ID_Betrieb int PRIMARY KEY AUTO_INCREMENT,
    BetriebsName varchar(256),
    Telefonnummer varchar(16), 
    Strasse varchar(64),
    Hausnummer int,
    Rechnungsmail varchar(128)
),

CREATE TABLE Teilnehmer(
	ID_Teilnehmer int PRIMARY KEY AUTO_INCREMENT,
    Anrede varchar(64),
    Vorname varchar(64),
    Nachname varchar(64),
    Email varchar(128),
    Telefonnummer varchar(78),
    Geburtsdatum DATE,
    Strasse varchar(64),
    Hausnummer int,
    ID_Betrieb int NOT NULL,
    FOREIGN KEY (ID_Betrieb) REFERENCES betrieb(ID_Betrieb)
),

CREATE TABLE Ort(
	ID_Ort int PRIMARY KEY AUTO_INCREMENT,
    PLZ int,
    Stadt varchar(86),
    Land varchar(87)
),

CREATE TABLE Kurs (
	ID_Kurs int PRIMARY KEY AUTO_INCREMENT,
    Gebühr double,
    Kursnummer int,
    Kurstyp varchar(64),
    Raum varchar(11),
    Kursbeschreibung varchar(1028),
    KursBeginn DATETIME,
    KursEnde DATETIME,
    ID_Ort int NOT NULL,
    FOREIGN KEY (ID_ORT) REFERENCES ort(ID_Ort)
),

CREATE TABLE Rechnung (
	ID_Rechnung int PRIMARY KEY AUTO_INCREMENT,
    RE_Nummer varchar(128),
    Zahlungsfrist DATETIME,
    Betrag double,
    Bezahldatum DATETIME,
    Bestellnummer varchar(256),
    Mahnungsdatum DATE,
    ID_Teilnehmer int NOT NULL,
    FOREIGN KEY (ID_Teilnehmer) REFERENCES teilnehmer(ID_Teilnehmer),
    ID_Kurs int NOT NULL,
    FOREIGN KEY (ID_Kurs) REFERENCES kurs(ID_Kurs)
),

CREATE TABLE Dozent (
	ID_Dozent int PRIMARY KEY AUTO_INCREMENT,
    Anrede varchar(32),
    Vorname varchar(128),
    Nachname varchar(128),
    Geburtsdatum DATE,
    Telefonnummer varchar(16),
    Steuernummer varchar(32),
    Kürzel varchar(32),
    Strasse varchar(128),
    Hausnummer int
),

CREATE TABLE Dozentenvertrag (
	ID_Honorarvertrag int PRIMARY KEY AUTO_INCREMENT,
    Vertragsgegenstand varchar(512),
    Vertragsbeginn DATE,
    Vertragsende DATE,
    Honorar varchar(128),
    ID_Dozent int NOT NULL,
    FOREIGN KEY (ID_Dozent) REFERENCES dozent(ID_Dozent)
),

CREATE TABLE Kurs_Teilnehmer( 
	Anfangszeitpunkt DATETIME,
    Endzeitpunkt DATETIME,
    ID_Kurs int NOT NULL,
    FOREIGN KEY (ID_Kurs) REFERENCES kurs(ID_Kurs),
    ID_Teilnehmer int NOT NULL,
    FOREIGN KEY (ID_Teilnehmer) REFERENCES teilnehmer(ID_Teilnehmer)
),

CREATE TABLE kurs_dozentenrechnung (
    ID_DozentenRechnung int PRIMARY KEY AUTO_INCREMENT,
	Datum DATETIME,
    Datum_Bezahl DATETIME,
    Dozentenrechnungslink varchar(65535),
    ID_Dozent int,
    FOREIGN KEY(ID_Dozent) REFERENCES dozent(ID_Dozent),
    ID_Kurs int,
    FOREIGN KEY (ID_Kurs) REFERENCES kurs(ID_Kurs)
),

CREATE TABLE kurs_dozent (
    Datum_Beginn DATETIME,
    Datum_Ende DATETIME,
    Anzahl_Einheiten int,
    ID_Dozent int,
    FOREIGN KEY(ID_Dozent) REFERENCES dozent(ID_Dozent),
    ID_Kurs int,
    FOREIGN KEY(ID_Kurs) REFERENCES kurs(ID_Kurs)
),

CREATE TABLE teilnehmer_ort (
    ID_Teilnehmer int,
    FOREIGN KEY(ID_Teilnehmer) REFERENCES teilnehmer(ID_Teilnehmer),
	ID_ORt int,
    FOREIGN KEY(ID_Ort) REFERENCES ort(ID_Ort)
),

CREATE TABLE betrieb_ort (
    ID_Betrieb int,
    FOREIGN KEY(ID_Betrieb) REFERENCES betrieb(ID_Betrieb),
	ID_Ort int,
    FOREIGN KEY(ID_Ort) REFERENCES ort(ID_Ort)
)
