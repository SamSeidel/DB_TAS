<?php 
    include '../../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->prepare("INSERT INTO dozent (Anrede, Vorname, Nachname, Geburtsdatum, Telefonnummer, Steuernummer, Kürzel) 
        VALUES ($_POST[anrede], $_POST[vorname], $_POST[nachname], $_POST[geburtsdatum], $_POST[telnummer], $_POST[steuernummer], $_POST[kuerzel])")->execute();

    /*if(!empty($_POST["anrede"])) {
        $conn->prepare("INSERT INTO dozent (Anrede, Vorname, Nachname, Geburtsdatum, Telefonnummer, Steuernummer, Kürzel) 
           VALUES ($_POST[anrede], $_POST[vorname], $_POST[nachname], $_POST[geburtsdatum], $_POST[telnummer], $_POST[steuernummer], $_POST[kürzel])")->execute();
    }*/
        
    header('Location: '. "../admi_dozent.php");
?>