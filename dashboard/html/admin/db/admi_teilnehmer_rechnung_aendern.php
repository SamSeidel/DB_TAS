<?php 
    include '../../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!empty($_POST)) {
        $id_user = $_POST["id_teilnehmer"];
        if(!empty($_POST["vorname"])) {
            $conn->prepare("UPDATE teilnehmer SET Vorname='$_POST[vorname]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["nachname"])) {
            $conn->prepare("UPDATE teilnehmer SET Nachname='$_POST[nachname]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["re_Nummer"])) {
            $conn->prepare("UPDATE rechnung SET RE_Nummer='$_POST[re_nummer]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["betrag"])) {
            $conn->prepare("UPDATE rechnung SET Betrag='$_POST[betrag]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["zahlungsfrist"])) {
            $conn->prepare("UPDATE rechnung SET Zahlungsfrist='$_POST[zahlungsfrist]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["mahnungsdatum"])) {
            $conn->prepare("UPDATE rechnung SET Mahnungsdatum='$_POST[mahnungsdatum]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
        if(!empty($_POST["bezahldatum"])) {
            $conn->prepare("UPDATE rechnung SET Bezahldatum='$_POST[bezahldatum]'WHERE ID_Teilnehmer=$id_user")->execute();
        }
    }
    header('Location: '. "../admi_teilnehmer_rechnung.php");

?>