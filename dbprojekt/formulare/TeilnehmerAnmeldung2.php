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



  // Store participant data in the database
    $betriebsname = $_POST['betriebsname'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $strasseHausnummer = $_POST['strasseHausnummer'];
    $telefonnummer = $_POST['telefonnummer'];
    $plz = $_POST['plz'];
    $ort = $_POST['ort'];
    $land = $_POST['land'];
    $rechnungEmail = $_POST['rechnungEmail'];

    $sql = "INSERT INTO `teilnehmer` (`betriebsname`, `vorname`, `nachname`, `email`, `strasseHausnummer`, `telefonnummer`, `plz`, `ort`, `land`, `rechnungEmail`)
            VALUES (:betriebsname, :vorname, :nachname, :email, :strasseHausnummer, :telefonnummer, :plz, :ort, :land, :rechnungEmail)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':betriebsname', $betriebsname);
    $stmt->bindParam(':vorname', $vorname);
    $stmt->bindParam(':nachname', $nachname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':strasseHausnummer', $strasseHausnummer);
    $stmt->bindParam(':telefonnummer', $telefonnummer);
    $stmt->bindParam(':plz', $plz);
    $stmt->bindParam(':ort', $ort);
    $stmt->bindParam(':land', $land);
    $stmt->bindParam(':rechnungEmail', $rechnungEmail);

    if ($stmt->execute()) {
      // Participant data inserted successfully
      exit;
    } else {
      echo "Fehler beim Speichern der Teilnehmerdaten.";
    }
    
