<?php 
    include 'dbinclude.php';
    print_r($_POST);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //datum Umformatieren

      
            $test=$conn->prepare("UPDATE kurs_dozent SET Datum_Beginn=:Datum_Beginn,Datum_Ende=:Datum_Ende, Anzahl_Einheiten=:Anzahl_Einheiten, ID_Dozent=:ID_Dozent, ID_Kurs=:ID_Kurs WHERE ID=:ID");

            $test->bindParam(':Datum_Beginn', $_POST["Beginn"]);
            $test->bindParam(':Datum_Ende', $_POST["Ende"]);
            $test->bindParam(':Anzahl_Einheiten', $_POST["Einheiten"]);
            $test->bindParam(':ID_Dozent', $_POST["Dozent"]);
            $test->bindParam(':ID_Kurs', $_POST["kurs"]);
            $test->bindParam(':ID', $_POST["ID_rechnung"]);


$test->execute();        
header('Location: '. "DozentenKursVertrag_tbl.php");

?>