<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // get values from form
    $betriebsname = $_POST['betriebsname'];
    $telefonnummer = $_POST['telefonnummer'];
    $strasse = $_POST['strasse'];
    $hausnummer = $_POST['hausnummer'];
    $rechnungsmail = $_POST['rechnungsmail'];

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `betrieb` (`BetriebsName`, `Telefonnummer`, `Strasse`, `Hausnummer`, `Rechnungsmail`)
    VALUES (:betriebsname, :telefonnummer, :strasse, :hausnummer, :rechnungsmail)");

    // bind parameters
    $stmt->bindParam(':betriebsname', $betriebsname);
    $stmt->bindParam(':telefonnummer', $telefonnummer);
    $stmt->bindParam(':strasse', $strasse);
    $stmt->bindParam(':hausnummer', $hausnummer);
    $stmt->bindParam(':rechnungsmail', $rechnungsmail);

    // execute the prepared statement
    if ($stmt->execute())
    {
        // Weiterleitung auf die Datei Teilnehmerdaten.php
        header("Location: Teilnehmerdaten.php");
        exit();
    }

    // echo success message
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
