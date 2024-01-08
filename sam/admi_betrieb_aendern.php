<?php 
    include 'dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_betrieb = $_POST["id_betrieb"];
        //Mit isempty arbeiten

        if(!empty($_POST["betriebsname"])) {
            $conn->prepare("UPDATE betrieb SET BetriebsName='$_POST[betriebsname]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["telefonnummer"])) {
            $conn->prepare("UPDATE betrieb SET Telefonnummer='$_POST[telefonnummer]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["strasse"])) {
            $conn->prepare("UPDATE betrieb SET Strasse='$_POST[strasse]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["hausnummer"])) {
            $conn->prepare("UPDATE betrieb SET Hausnummer='$_POST[hausnummer]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["rechnungsmail"])) {
            $conn->prepare("UPDATE betrieb SET Rechnungsmail='$_POST[rechnungsmail]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["plz"])) {
            $conn->prepare("UPDATE betrieb SET plz='$_POST[plz]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["stadt"])) {
            $conn->prepare("UPDATE betrieb SET stadt='$_POST[stadt]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        if(!empty($_POST["land"])) {
            $conn->prepare("UPDATE betrieb SET land='$_POST[land]'WHERE ID_Betrieb=$id_betrieb")->execute();
        }
        
    header('Location: '. "betrieb.php");
?>