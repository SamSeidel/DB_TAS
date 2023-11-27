<?php 
    include '../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_user = $_POST["id_teilnehmer"];
        //Mit isempty arbeiten

        if(!empty($_POST["anrede"])) {
            $conn->prepare("UPDATE teilnehmer SET Anrede='$_POST[anrede]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["vorname"])) {
            $conn->prepare("UPDATE teilnehmer SET Vorname='$_POST[vorname]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["nachname"])) {
            $conn->prepare("UPDATE teilnehmer SET Nachname='$_POST[nachname]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["email"])) {
            $conn->prepare("UPDATE teilnehmer SET Email='$_POST[email]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["telnummer"])) {
            $conn->prepare("UPDATE teilnehmer SET Telefonnummer='$_POST[telnummer]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["geburtsdatum"])) {
            $conn->prepare("UPDATE teilnehmer SET Geburtsdatum='$_POST[geburtsdatum]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["strasse"])) {
            $conn->prepare("UPDATE teilnehmer SET Strasse='$_POST[strasse]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["hausnr"])) {
            $conn->prepare("UPDATE teilnehmer SET Hausnummer='$_POST[hausnr]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        
    header('Location: '. "admi_teilnehmer.php");
?>