<?php 
    include 'dbinclude.php';


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("INSERT INTO dozentenvertrag (Vertragsgegenstand, Vertragsbeginn, Vertragsende, Honorar, ID_Dozent)
  VALUES (':id_rech', ':gegenstand', ':beginn', ':ende', ':honorar', ':id_doz' )");

$stmt->bindParam(':id_rech', $_POST["id_Rechnung2"]);
$stmt->bindParam(':gegenstand', $_POST["Vertragsgegenstand2"]);
$stmt->bindParam(':beginn', $_POST["Vertragsbeginn2"]);
$stmt->bindParam(':ende', $_POST["Vertragsende2"]);
$stmt->bindParam(':honorar', $_POST["Honorar2"]);
$stmt->bindParam(':id_doz', $_POST["ID_Dozent2"]);

$stmt->execute();

$conn = null;

    header('Location: '. "DozentenVertrag_tbl.php");
?>