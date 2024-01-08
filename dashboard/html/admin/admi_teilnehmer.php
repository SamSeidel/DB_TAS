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
        $stmt = $conn->prepare("SELECT * FROM teilnehmer");
        $stmt->execute();

        if(isset($_POST["cng_teilnehmer"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields = array("Anrede", "Vorname", "Nachname", "Email", "Telefonnummer", "Geburtsdatum", "land", "stadt", "Strasse", "Hausnummer");
                foreach ($fields as $key) {
                    updateTeilnehmer($conn, "teilnehmer", $key, $_POST[$key], $_POST["cng_teilnehmer"]);
                }
            }
        }
        
        if(isset($_POST["del_teilnehmer"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                deleteTeilnehmer($conn, "teilnehmer", $_POST["del_teilnehmer"]);
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
        function updateTeilnehmer($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST[$target])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Teilnehmer=:cng_teilnehmer");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_teilnehmer", $primarykey);
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
        function deleteTeilnehmer($conn, $table, $primarykey) {
            if (isset($_POST['del_teilnehmer'])) {
                $delete = $conn->prepare("UPDATE $table SET geloescht='1' WHERE ID_Teilnehmer=:del_teilnehmer");
                $delete->bindParam(":del_teilnehmer", $primarykey);
                $delete->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }

    ?>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> Anrede </th>
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> E - Mail </th>
                    <th> Telefonnummer </th>
                    <th> Geburtsdatum </th>
                    <th> Land </th>
                    <th> Stadt </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th></th>
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        if($row["geloescht"] == NULL) { 
                        ?>

                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["ID_Teilnehmer"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Anrede"]?>" name="anrede" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vorname"]?>" name="vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" name="nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Email"]?>" name="email" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" name="telnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Geburtsdatum"]?>" name="geburtsdatum" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["land"]?>" name="land" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["stadt"]?>" name="stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Strasse"]?>" name="strasse" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Hausnummer"]?>" name="hausnr" type="text" class="edit"></td>
                            
                            <td>  
                                    <button type="submit" name="cng_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;"> 
                                            <img src="../../res/recycling.png" title="Daten aktualisieren" style="width:24px; height:24px;">
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" title="Teilnehmer Archivieren" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/hinzufugen.png" title="Kurs" style="width:24px; height:24px; background-color: #ececec;">
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