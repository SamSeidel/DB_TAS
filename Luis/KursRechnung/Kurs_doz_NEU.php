<?php 
    include 'dbinclude.php';


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("INSERT INTO kurs_dozent (Datum_Beginn, Datum_Ende, Anzahl_Einheiten, ID_Dozent, ID_Kurs)
  VALUES (':Datum_Beginn', ':Datum_Ende', ':Anzahl_Einheiten', ':ID_Dozent', ':ID_Kurs')");


$stmt->execute();

$stmt->bindParam(':Datum_Beginn', $_POST["Beginn2"]);
$stmt->bindParam(':Datum_Ende', $_POST["Ende2"]);
$stmt->bindParam(':Anzahl_Einheiten', $_POST["Einheiten2"]);
$stmt->bindParam(':ID_Dozent', $_POST["Dozent2"]);
$stmt->bindParam(':ID_Kurs', $_POST["kurs2"]);




$conn = null;

    header('Location: '. "DozentenVertrag_tbl.php");
?>