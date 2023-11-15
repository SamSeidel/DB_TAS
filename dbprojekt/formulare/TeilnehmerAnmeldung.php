<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=tas", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktdaten des Betriebs</title>
</head>
<body>
  <form method="post" action="TeilnehmerAnmeldung2.php">
    <h2>Kontaktdaten des Betriebs</h2>
    
    <label for="betriebsname">Name des Betriebs *</label><br>
    <input type="text" id="betriebsname" name="betriebsname" required><br>
    
    <label for="ansprechpartner">Ansprechpartner *</label>
    <div>
      <input type="text" id="vorname" name="vorname" placeholder="Vorname" required>
      <input type="text" id="nachname" name="nachname" placeholder="Nachname" required>
    </div>
    
    <label for="email">E-Mail-Adresse des Ansprechpartners *</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="emailBestaetigung">E-Mail bestätigen</label><br>
    <input type="email" id="emailBestaetigung" name="emailBestaetigung" required><br>
    
    <label for="strasseHausnummer">Straße und Hausnummer *</label><br>
    <input type="text" id="strasseHausnummer" name="strasseHausnummer" required><br>
    
    <label for="telefonnummer">Telefonnummer *</label><br>
    <input type="tel" id="telefonnummer" name="telefonnummer" required><br>
    
    <label for="plz">PLZ *</label><br>
    <input type="text" id="plz" name="plz" required><br>
    
    <label for="ort">Ort *</label><br>
    <input type="text" id="ort" name="ort" required><br>
    
    <label for="land">Land *</label><br>
    <input type="text" id="land" name="land" required><br>
    
    <label for="rechnungEmail">E-Mail (für die Rechnungsstellung) *</label><br>
    <input type="email" id="rechnungEmail" name="rechnungEmail" required><br>
    
    <label for="rechnungEmailBestaetigung">E-Mail bestätigen</label><br>
    <input type="email" id="rechnungEmailBestaetigung" name="rechnungEmailBestaetigung" required><br>
    
    <input type="submit" value="Zum/zur Teilnehmerin">
  </form>
</body>
</html>
