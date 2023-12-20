<?php 
    include '../../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_dozent = $_POST["id_dozent"];
        //Mit isempty arbeiten

        if(!empty($_POST["anrede"])) {
            $conn->prepare("UPDATE dozent SET Anrede='$_POST[anrede]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["vorname"])) {
            $conn->prepare("UPDATE dozent SET Vorname='$_POST[vorname]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["nachname"])) {
            $conn->prepare("UPDATE dozent SET Nachname='$_POST[nachname]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["email"])) {
            $conn->prepare("UPDATE dozent SET Email='$_POST[email]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["telnummer"])) {
            $conn->prepare("UPDATE dozent SET Telefonnummer='$_POST[telnummer]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["geburtsdatum"])) {
            $conn->prepare("UPDATE dozent SET Geburtsdatum='$_POST[geburtsdatum]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["steuernummer"])) {
            $conn->prepare("UPDATE dozent SET Steuernummer='$_POST[steuernummer]'WHERE ID_Dozent=$id_dozent")->execute();
        }
        if(!empty($_POST["kuerzel"])) {
            $conn->prepare("UPDATE dozent SET Kürzel='$_POST[kuerzel]'WHERE ID_Dozent=$id_dozent")->execute();
        }

    header('Location: '. "../admi_dozent.php");
?>