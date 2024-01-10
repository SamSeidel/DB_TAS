<!DOCTYPE html>
<html lang="de">
<head>
    <title>TAS | Teilnehmer Rechnung</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="header">
        <h2> Teilnehmer Rechnung
        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST["cng_invoice"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields = array("RE_Nummer", "Zahlungsfrist", "Betrag", "Bezahldatum", "Bestellnummer", "Mahnungsdatum", "ID_Kurs");
                foreach ($fields as $key) {
                    updateInvoice($conn, "rechnung", $key, $_POST[$key], $_POST["cng_invoice"]);

                 // updateInvoice($conn, "rechnung", "betrag",$_POST["betrag"],  $_POST["cng_invoice"]);
                }
            }
        }
        
        if(!empty($_POST["del_invoice"])) {
            $delete = $conn->prepare("UPDATE rechnung SET rechnung.geloescht='1' WHERE ID_Rechnung=:value");
            $delete->bindparam(":value", $_POST["del_invoice"]);
            $delete->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }
        
        /**
         * PDO Update Method
         * $conn        ; The connection to the server
         * $table       ; The table where to update (as a string)
         * $target      ; The collum to update from the database
         * $value       ; The new value for the specified field
         * $primarykey  ; Who to update
         * NOTE : This method updates short after executing
         */
        function updateInvoice($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST["cng_invoice"])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Rechnung=:cng_invoice");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_invoice", $primarykey);
                $update->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            } 
        }

        if (isset($_POST['add_rechnung'])) {
            $Hinzufügen = $conn->prepare("INSERT INTO rechnung(RE_Nummer, Zahlungsfrist, Betrag, Bezahldatum, Bestellnummer, Mahnungsdatum, ID_Teilnehmer, ID_Kurs) VALUES
                                                        (:RE_Nummer, :Zahlungsfrist, :Betrag, :Bezahldatum, :Bestellnummer, :Mahnungsdatum, :ID_Teilnehmer, :ID_Kurs)");
            $Hinzufügen->bindParam(":RE_Nummer", $_POST["RE_Rummer"]);
            $Hinzufügen->bindParam(":Zahlungsfrist", $_POST["Zahlungsfrist"]);
            $Hinzufügen->bindParam(":Betrag", $_POST["Betrag"]);
            $Hinzufügen->bindParam(":Bezahldatum", $_POST["Bezahldatum"]);
            $Hinzufügen->bindParam(":Bestellnummer", $_POST["Bestellnummer"]);
            $Hinzufügen->bindParam(":Mahnungsdatum", $_POST["Mahnungsdatum"]);
            $Hinzufügen->bindParam(":ID_Teilnehmer", $_POST["ID_Teilnehmer"]);
            $Hinzufügen->bindParam(":ID_Kurs", $_POST["ID_Kurs"]);
            $Hinzufügen->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }


    ?>
       <div style="margin-left: 1.5%;"> 
            <h3> Hinzufügen </h3>
        </div>
        <div>
        <table style="width: 98.5%;"> 
                    <th> Teilnehmer </th>
                    <th> Rechnungs ID </th>
                    <th> Rechnungs Nummer </th>
                    <th> Betrag </th>
                    <th> Bestellnummer </th>
                    <th> Zahlungsfrist </th>
                    <th> Mahnungsdatum </th>
                    <th> Bezahldatum </th>
                    <th> Kurs </th>
                    <th></th>
                    <th></th>
                <tr> 
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                        <td>
                            <select name="ID_Teilnehmer" class="edit">
                                 <?php 
                                    $teilnehmer2 = $conn->prepare("SELECT ID_Teilnehmer, Vorname, Nachname FROM Teilnehmer");
                                    $teilnehmer2->execute();
                                    while($row = $teilnehmer2->fetch()) { ?>
                                    <option value="<?php echo $row["ID_Teilnehmer"]?>"> <?php echo $row["Vorname"] . " ".  $row["Nachname"]  ?></option>
                                   <?php } ?>
                                </select>
                            </td>
                            <td> <input readonly placeholder="Automatisch"  type="text" class="edit"></td>
                            <td> <input name="RE_Nummer" type="text" class="edit"></td>
                            <td> <input name="Betrag" placeholder="Eingabe z.b. 50.5" class="edit"></td>
                            <td> <input name="Bestellnummer" tyoe="text" class="edit"></td>
                            <td> <input name="Zahlungsfrist" type="date" class="edit"></td>
                            <td> <input name="Mahnungsdatum" type="date" class="edit"></td>
                            <td> <input name="Bezahldatum" type="date" class="edit"></td>
                            <td> 
                                <select name="ID_Kurs" class="edit">
                                    <?php 
                                    $Kurs= $conn->prepare("SELECT ID_Kurs, Kursbeschreibung FROM Kurs");
                                    $Kurs->execute();
                                    while($row = $Kurs->fetch()) { ?>
                                        <option value="<?php echo $row["ID_Kurs"]?>"> <?php echo $row["Kursbeschreibung"] ?></option>
                                    <?php } ?>
                                </select>
                        <td>
                        <button type="submit" name="add_rechnung" style="border:none; background-color: #ececec;">
                                <img src="../../res/hinzufugen.png" style="width:24px; height:24px; margin-bottom:35%; margin-left:60%; background-color: #ececec;">
                        </button>
                    </form>
                    </td>
                </tr>
        </table>
    </div>
    <div><br>
            <table style="width: 100%;"> 
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> Rchnungs ID </th>
                    <th> Rechnungs Nummer </th>
                    <th> Betrag </th>
                    <th> Bestellnummer </th>
                    <th> Zahlungsfrist </th>
                    <th> Mahnungsdatum </th>
                    <th> Bezahldatum </th>
                    <th> Kurs </th>
                    <th></th>
                    <th></th>
                    <th></th>
                <?php 
                    $teilnehmer = $conn->prepare("SELECT * FROM rechnung LEFT JOIN teilnehmer ON teilnehmer.ID_Teilnehmer = rechnung.ID_Teilnehmer WHERE rechnung.geloescht!=1");
                    $teilnehmer->execute();
                    while($row = $teilnehmer->fetch()) {
                        ?>

                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["Vorname"]?>"  readonly name="Vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" readonly name="Nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Rechnung"]?>" readonly name="ID_Rechnung" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["RE_Nummer"]?>" name="RE_Nummer" type="text" class="edit"></td>
                            <td> <input value="<?php 
                                                $result = str_replace('.', ',', $row["Betrag"]);
                                                echo $result . ".- €";
                                                ?>" name="Betrag" placeholder="Eingabe z.b. 50.5" class="edit"></td>
                            <td> <input value="<?php echo $row["Bestellnummer"]?>" name="Bestellnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Zahlungsfrist"]?>" name="Zahlungsfrist" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Mahnungsdatum"]?>" name="Mahnungsdatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Bezahldatum"]?>" name="Bezahldatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Kurs"]?>" readonly name="ID_Kurs" type="text" class="edit"></td>
                            <td>  
                                 <button type="submit" name="cng_invoice" value="<?php echo $row["ID_Rechnung"]?>" style="border:none; background-color: #ececec;"> 
                                         <img src="../../res/recycling.png" title="Daten aktualisieren" style="width:24px; height:24px;">
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                <button type="submit" name="del_invoice" value="<?php echo $row["ID_Rechnung"]?>" style="border:none; background-color: #ececec;">
                                           <img src="../../res/entfernen.png" title="Rechnung Archivieren" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                <button type="submit" name="create_invoice" value="<?php echo $row["ID_Rechnung"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/erstellen.png" title="Rechung erstellen" alt="Rechnung Erstellen" style="width:24px; height:24px; background-color: #ececec;">
                                </button>
                            </form>
                        </td>
                     </tr>
                <?php } ?>
        </table>
    </div>
</body>
</html>
