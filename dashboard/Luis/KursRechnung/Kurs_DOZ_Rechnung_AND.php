<?php 
    include 'dbinclude.php';

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
 
        //Mit isempty arbeiten
       
        if(!empty($_POST["Beginn"])) {
            $conn->prepare("UPDATE kurs_dozent SET Datum_Beginn=':Datum_Beginn' WHERE ID=':ID' ")->execute();
        }
        if(!empty($_POST["Ende"])) {
            $conn->prepare("UPDATE kurs_dozent SET Datum_Ende=':Datum_Ende' WHERE ID=':ID'  ")->execute();
        }
        if(!empty($_POST["Anzahl_Einheiten"])) {
            $conn->prepare("UPDATE kurs_dozent SET Anzahl_Einheiten=':Anzahl_Einheiten' WHERE ID=':ID' ")->execute();
        }
        if(!empty($_POST["Dozent"])) {
            $conn->prepare("UPDATE kurs_dozent SET 	ID_Dozent=':ID_Dozent' WHERE ID=':ID'")->execute();
        }
        if(!empty($_POST["kurs"])) {
            $conn->prepare("UPDATE kurs_dozent SET ID_Kurs=':ID_Kurs' WHERE ID=':ID'")->execute();
        }
        

        $conn->bindParam(':Datum_Beginn', $_POST["Beginn"]);
$conn->bindParam(':Datum_Ende', $_POST["Ende"]);
$conn->bindParam(':Anzahl_Einheiten', $_POST["Einheiten"]);
$conn->bindParam(':ID_Dozent', $_POST["Dozent"]);
$conn->bindParam(':ID_Kurs', $_POST["kurs"]);
$conn->bindParam(':ID', $_POST["ID_rechnung"]);
        
    header('Location: '. "DozentenKursVertrag_tbl.php");
?>