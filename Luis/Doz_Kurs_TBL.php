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

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header">
        <h2> Dozenten Kurs Rechnung
        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    </div>
    <?php

      /**
         * PDO Update Method
         * $conn        ; The connection to the server
         * $table       ; The table where to update (as a string)
         * $target      ; The collum to update from the database
         * $value       ; The new value for the specified field
         * $primarykey  ; Who to update
         * NOTE : This method updates short after executing
         */




         //DB Einfügen
        include 'dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        //CNG
        if(!empty($_POST["cng_invoice"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields =  array("Beginn", "Ende", "Einheiten", "Dozent", "kurs");
                foreach ($fields as $key) {
                    updateInvoice($conn, "kurs_dozent", $key, $_POST[$key], $_POST["cng_invoice"], $_POST["kurs"]);

                }
            }
        }
        


        //DEL
        if(!empty($_POST["del_invoice"])) {
            $delete = $conn->prepare("UPDATE kurs_dozent SET kurs_dozent.geloescht='1' WHERE ID_Dozent=:value1 AND ID_Kurs=:value2");
            $delete->bindparam(":value1", $_POST["del_invoice"]);
            $delete->bindparam(":value2", $_POST["kurs"]);
            $delete->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }
        
        
        //UPDATE FUNCTION

        function updateInvoice($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST["cng_invoice"])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Dozent=:cng_invoice AND ID_Kurs=:ID_Kurs");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_invoice", $primarykey);
                $update->bindParam(":ID_Kurs", $pk2);
                $update->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            } 
        }


        //Neu anlegen
        if (isset($_POST['add_rechnung'])) {
            $add =  $conn->prepare("INSERT INTO kurs_dozent (Datum_Beginn, Datum_Ende, Anzahl_Einheiten, ID_Dozent, ID_Kurs)
            VALUES (:Datum_Beginn, :Datum_Ende, :Anzahl_Einheiten, :ID_Dozent, :ID_Kurs)");
    
            $add->bindParam(':Datum_Beginn', $_POST["Beginn2"]);
            $add->bindParam(':Datum_Ende', $_POST["Ende2"]);
            $add->bindParam(':Anzahl_Einheiten', $_POST["Einheiten2"]);
            $add->bindParam(':ID_Dozent', $_POST["ID_Dozent2"]);
            $add->bindParam(':ID_Kurs', $_POST["ID_Kurs2"]);
    
            $add->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }


    ?>
       <div style="margin-left: 1.5%;"> 
            <h3> Hinzufügen </h3>
        </div>
        <div>
        <table style="width: 98.5%;"> 
        <th> Beginn </th>
        <th> Ende </th>
        <th> Anzahl Einheit </th>
        <th> Dozenten </th>
        <th> Kurs </th>
        <th></th>
        
                <tr> 
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <table style="width: 100%;">
<tr>
    <td> <input placeholder="StartDatum:" name="Beginn2" type="date" class="edit"></td>
    <td> <input placeholder="Endzeitpunkt:" name="Ende2" type="date" class="edit"></td>
    <td> <input placeholder="Anz Einheiten:" name="Einheiten2" type="text" class="edit"></td>

                        <td> 
                                <select name="ID_Dozent2" class="edit">
                                    <?php 
                                    $DOZ= $conn->prepare("SELECT ID_Dozent, Nachname FROM dozent");
                                    $DOZ->execute();
                                    while($row = $DOZ->fetch()) { ?>
                                        <option value="<?php echo $row["ID_Dozent"]?>"> <?php echo $row["Nachname"] ?></option>
                                    <?php } ?>
                                </select>
                        </td>

                        <td> 
                                <select name="ID_Kurs2" class="edit">
                                    <?php 
                                    $Kurs= $conn->prepare("SELECT ID_Kurs, Kursbeschreibung FROM Kurs");
                                    $Kurs->execute();
                                    while($row = $Kurs->fetch()) { ?>
                                        <option value="<?php echo $row["ID_Kurs"]?>"> <?php echo $row["Kursbeschreibung"] ?></option>
                                    <?php } ?>
                                </select>
                        </td>
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
            <th> Beginn </th>
        <th> Ende </th>
        <th> Anzahl Einheit </th>
        <th> Dozenten </th>
        <th> Kurs </th>
        <th></th>
        <th></th>

                <?php 
                    $teilnehmer = $conn->prepare("SELECT * FROM kurs_dozent
                    LEFT JOIN dozent ON dozent.ID_Dozent = kurs_dozent.ID_Dozent
                    LEFT JOIN kurs ON kurs.ID_Kurs = kurs_dozent.ID_Kurs 
                    WHERE kurs_dozent.geloescht!=1");

                    $teilnehmer->execute();
                    while($row = $teilnehmer->fetch()) {
                        ?>

                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                        <td> <input value="<?php echo $row["Datum_Beginn"] ?>" name="Beginn" type="date" class="edit"></td>
                    <td> <input value="<?php echo $row["Datum_Ende"] ?>" name="Ende" type="date" class="edit"></td>
                    <td> <input value="<?php echo $row["Anzahl_Einheiten"] ?>" name="Einheiten" type="text" class="edit"></td>
                    <td> <input value="<?php echo $row["ID_Dozent"] ?>" name="Dozent" type="text" class="edit"></td>
                    <td> <input value="<?php echo $row["ID_Kurs"] ?>" name="kurs" type="text" class="edit"></td>
                    <td>
                                 <button type="submit" name="cng_invoice" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;"> 
                                         <img src="../../res/recycling.png" title="Daten aktualisieren" style="width:24px; height:24px;">
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                <button type="submit" name="del_invoice" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
                                           <img src="../../res/entfernen.png" title="Rechnung Archivieren" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                            
                     </tr>
                <?php } ?>
        </table>
    </div>
</body>
</html>