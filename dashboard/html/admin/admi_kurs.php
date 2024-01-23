<!DOCTYPE html>
<html lang="de">
<head>
    <title>Beastmode | TAS</title>

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
        <h2> Teilnehmerverwaltung

        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM kurs");
        $stmt->execute();
        
        if(!empty($_POST["cng_kurs"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields = array("Gebühr", "Kursnummer", "Kurstyp", "Raum", "Kursbeschreibung", "KursBeginn", "KursEnde", "plz", "stadt", "land", "minAnzahl", "maxAnzahl");
                foreach ($fields as $key) {
                    updateKurs( $conn, "kurs", $key, $_POST[$key], $_POST["cng_kurs"]);
                }
            }
        }
        
        if(!empty($_POST["del_kurs"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                deleteKurs($conn, "kurs", $_POST["del_kurs"]);
            }
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
        function updateKurs($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST[$target])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Kurs=:cng_kurs");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_kurs", $primarykey);
                $update->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            } 
        }

        /**
         * PDO Delete Method
         * $conn        ; The connection to the server
         * $table       ; The table where to update (as a string)
         * $primarykey  ; Who to update
         * NOTE : This method is not for deleting a Dozent its for archiving them 
         */
        function deleteKurs($conn, $table, $primarykey) {
            if (isset($_POST['del_kurs'])) {
                $delete = $conn->prepare("UPDATE $table SET Archiviert='1' WHERE ID_Kurs=:del_kurs");
                $delete->bindParam(":del_kurs", $primarykey);
                $delete->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }
 
        if(!empty($_POST["addKurs"])) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                
                $add = $conn->prepare("INSERT INTO kurs (Gebühr, Kursnummer, Kurstyp, Raum, Kursbeschreibung, KursBeginn, KursEnde, plz, stadt, land, minAnzahl, maxAnzahl) 
                                                VALUES (:Gebühr, :Kursnummer, :Kurstyp, :Raum, :Kursbeschreibung, :KursBeginn, :KursEnde, :plz, :stadt, :land, :minAnzahl, :maxAnzahl)");
                $add->bindParam(':Gebühr', $_POST['gebühr']);
                $add->bindParam(':Kursnummer', $_POST['kursnummer']);
                $add->bindParam(':Kurstyp', $_POST['kurstyp']);
                $add->bindParam(':Raum', $_POST['raum']);
                $add->bindParam(':Kursbeschreibung', $_POST['kursbeschreibung']);
                $add->bindParam(':KursBeginn', $_POST['kursBeginn']);
                $add->bindParam(':KursEnde', $_POST['kursEnde']);
                $add->bindParam(':plz', $_POST['Plz']);
                $add->bindParam(':stadt', $_POST['Stadt']);
                $add->bindParam(':land', $_POST['Land']);
                $add->bindParam(':minAnzahl', $_POST['MinAnzahl']);
                $add->bindParam(':maxAnzahl', $_POST['MaxAnzahl']);
                $add->execute();
                //header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }

    ?>
        <div style="margin-left: 1.5%;"> 
        <h3> Hinzufügen </h3>
        </div>
        <div>
        <table style="width: 98.5%;"> 
                    <th> ID </th>
                    <th> Gebühr </th>
                    <th> Kursnummer </th>
                    <th> Raum </th>
                    <th> Kurstyp </th>
                    <th> Beschreibung </th>
                    <th> Beginn </th>
                    <th> Ende </th>
                    <th> PLZ </th>
                    <th> Stadt </th>
                    <th> Land </th>
                    <th> Min. Anzahl </th>
                    <th> Max. Anzahl </th>
                    <th></th>
                <tr> 
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">

                            <td> <input readonly placeholder="Automatisch" name="ID_Kurs"  type="text" class="edit"></td>
                            <td> <input name="gebühr" placeholder="Eingabe z.b. 50.5" type="text" class="edit"></td>
                            <td> <input name="kursnummer" type="number" class="edit"></td>
                            <td> <input name="raum" type="text" class="edit"></td>
                            <td> <input name="kurstyp" type="text" class="edit"></td>
                            <td> <input name="kursbeschreibung" type="text" class="edit"></td>
                            <td> <input name="kursBeginn" type="date" class="edit"></td>
                            <td> <input name="kursEnde" type="date" class="edit"></td>
                            <td> <input name="Plz" type="text" class="edit"></td>
                            <td> <input name="Stadt" type="text" class="edit"></td>
                            <td> <input name="Land" type="text" class="edit"></td>
                            <td> <input name="MinAnzahl" type="number" class="edit"></td>
                            <td> <input name="MaxAnzahl" type="number" class="edit"></td>
                        <td>
                        <button type="submit" name="addKurs" style="border:none; background-color: #ececec;">
                                <img src="../../res/erstellen.png" style="width:24px; height:24px; margin-bottom:35%; margin-left:60%; background-color: #ececec;">
                        </button>
                    </form>
                    </td>
                </tr>
        </table>
    </div>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> Gebühr </th>
                    <th> Kursnummer </th>
                    <th> Raum </th>
                    <th> Kurstyp </th>
                    <th> Beschreibung </th>
                    <th> Beginn </th>
                    <th> Ende </th>
                    <th> PLZ </th>
                    <th> Stadt </th>
                    <th> Min. Anzahl </th>
                    <th> Max. Anzahl </th>
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        if($row["Archiviert"] == NULL) { 
                        ?>

                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["ID_Kurs"]?>" readonly name="ID_Kurs" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Gebühr"]. ".-€"?>" name="Gebühr" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Kursnummer"]?>" name="Kursnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Raum"]?>" name="Raum" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Kurstyp"]?>" name="Kurstyp" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Kursbeschreibung"]?>" name="Kursbeschreibung" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["KursBeginn"]?>" name="KursBeginn" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["KursEnde"]?>" name="KursEnde" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["plz"]?>" name="plz" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["stadt"]?>" name="stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["land"]?>" name="stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["minAnzahl"]?>" name="minAnzahl" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["maxAnzahl"]?>" name="maxAnzahl" type="text" class="edit"></td>
                            <td>  
                                 <button type="submit" name="cng_kurs" value="<?php echo $row["ID_Kurs"]?>" style="border:none; background-color: #ececec;"> 
                                        <img src="../../res/recycling.png" title="Daten aktualisieren" style="width:24px; height:24px;">
                                </button>
                            </form>
                          </td>
                        <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_kurs" value="<?php echo $row["ID_Kurs"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" title="Teilnehmer Archivieren" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                ?>
        </table>
    </div>
</body>
</html>
