<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tas";
print_r($POST);

try {
  $conn = new PDO("mysql:host=$servername;dbname=tas", $username, $password);
   //set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed"  . $e-getMessage();
}

    $sql = "INSERT INTO dozent  (Anrede, Vorname, Nachname,Geburtsdatum,Telefonnummer, Steuernummer,Kürzel,Strasse,Hausnummer) VALUES ('$vorname', '$nachname','$geburtsdatum','$telefonnummer', '$steuernummer,'$kuerzel','$strasse','$hausnummer')";

    if ($conn->query($sql) === TRUE) {
        echo "Benutzer erfolgreich registriert.";
    } else {
        echo "Fehler bei der Registrierung: " . $conn->error;
    }

  
// HTML-Formular zur Benutzerregistrierung
?>