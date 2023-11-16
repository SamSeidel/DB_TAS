Dozent
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysqlhost=$servername;dbname=tas", $username, $password);
   //set the PDO error mode to exception
  $conn-setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed"  . $e->getMessage();
}

    $sql = "INSERT INTO benutzer (vorname, nachname, email) VALUES ('$vorname', '$nachname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Benutzer erfolgreich registriert.";
    } else {
        echo "Fehler bei der Registrierung: " . $conn->error;
    }

    // Kurs zuweisen
    $kurs_id = $_POST['kurs_id'];
    $benutzer_id = $conn->insert_id; // ID des gerade eingefügten Benutzers

    $sql = "INSERT INTO kurszuweisung (benutzer_id, kurs_id) VALUES ('$benutzer_id', '$kurs_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Kurs erfolgreich zugewiesen.";
    } else {
        echo "Fehler bei der Kurszuweisung: " . $conn->error;
    }

    // Rechnung speichern
    $betrag = $_POST['betrag'];

    $sql = "INSERT INTO rechnungen (benutzer_id, betrag) VALUES ('$benutzer_id', '$betrag')";

    if ($conn->query($sql) === TRUE) {
        echo "Rechnung erfolgreich gespeichert.";
    } else {
        echo "Fehler beim Speichern der Rechnung: " . $conn->error;
    }


// HTML-Formular zur Benutzerregistrierung
?>
<!DOCTYPE html>
<html>
<head>
    <title>Anmeldeformular für Dozenten</title>
</head>
<body>
<h2>Anmeldeformular für Dozenten</h2>
<form method="post" action="formular_verarbeiten.php">
    <label for="anrede">Anrede:</label>
    <select name="anrede">
        <option value="Herr">Herr</option>
        <option value="Frau">Frau</option>
    </select><br><br>

    <label for="vorname">Vorname:</label>
    <input type="text" name="vorname"><br><br>

    <label for="nachname">Nachname:</label>
    <input type="text" name="nachname"><br><br>

    <label for="geburtsdatum">Geburtsdatum:</label>
    <input type="date" name="geburtsdatum"><br><br>

    <label for="telefonnummer">Telefonnummer:</label>
    <input type="tel" name="telefonnummer"><br><br>

    <label for="steuernummer">Steuernummer:</label>
    <input type="text" name="steuernummer"><br><br>

    <label for="kuerzel">Kürzel:</label>
    <input type="text" name="kuerzel"><br><br>

    <label for="wohnort">Wohnort:</label>
    <input type="text" name="wohnort"><br><br>

    <label for="hausnummer">Hausnummer:</label>
    <input type="text" name="hausnummer"><br><br>

    <label for="email">E-Mail:</label>
    <input type="email" name="email"><br><br>

    <label for="kurse">Kurse auswählen:</label>
    <select name="kurse[]" multiple>
        <option value="Kurs 1">Kurs 1</option>
        <option value="Kurs 2">Kurs 2</option>
        <option value="Kurs 3">Kurs 3</option>
    </select><br><br>

    <input type="submit" value="Anmelden">
</form>
</body>
</html>
<?php
$conn->close();
?>
