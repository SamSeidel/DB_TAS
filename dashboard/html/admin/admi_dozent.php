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
        <h2> Dozentenverwaltung

        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM dozent");
        $stmt->execute();

        if(!empty($_POST["cng_dozent"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields = array("Anrede", "Vorname", "Nachname", "Telefonnummer", "Geburtsdatum", "Steuernummer", "Kürzel", "Strasse", "Hausnummer");
                foreach ($fields as $key) {
                    updateDozent($conn, "dozent", $key, $_POST[$key], $_POST["cng_dozent"]);
                }
            }
        }
        
        if(!empty($_POST["del_dozent"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                deleteDozent($conn, "dozent", $_POST["del_dozent"]);
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
        function updateDozent($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST[$target])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Dozent=:cng_dozent");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_dozent", $primarykey);
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
        function deleteDozent($conn, $table, $primarykey) {
            if (isset($_POST['del_dozent'])) {
                $delete = $conn->prepare("UPDATE $table SET geloescht='1' WHERE ID_Dozent=:del_dozent");
                $delete->bindParam(":del_dozent", $primarykey);
                $delete->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }

        if(!empty($_POST["add_dozent"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                
                $stmt = $conn->prepare("INSERT INTO dozent (Anrede, Vorname, Nachname, Geburtsdatum, Telefonnummer, Steuernummer, Kürzel) 
                VALUES (:anrede, :vorname, :nachname, :geburtsdatum, :telefonnummer, :steuernummer, :kuerzel)");
            
                $stmt->bindParam(':anrede', $_POST['Anrede']);
                $stmt->bindParam(':vorname', $_POST['Vorname']);
                $stmt->bindParam(':nachname', $_POST['Nachname']);
                $stmt->bindParam(':geburtsdatum', $_POST['Geburtsdatum']);
                $stmt->bindParam(':telefonnummer', $_POST['Telnummer']);
                $stmt->bindParam(':steuernummer', $_POST['Steuernummer']);
                $stmt->bindParam(':kuerzel', $_POST['Kuerzel']);
                $stmt->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }

    ?>
    </div>
    <div style="margin-left: 1.5%;"> 
            <h3> Hinzufügen </h3>
        </div>
        <div>
        <table style="width: 98.5%;"> 
                    <th> ID </th>
                    <th> Anrede </th>
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> Geburtsdatum </th>
                    <th> Kürzel </th>
                    <th> Steuernummer </th>
                    <th> Telefonnummer </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th></th>
                <tr> 
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                    <td> <input readonly name="id" type="text" class="edit"></td>

                    <!--<td>
                    <select name="anrede" id="anrede" class="edit">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                    </select>
                    </td>-->
                    <td> <input name="Anrede" type="text" class="edit"> </td>
                    <td> <input name="Vorname" type="text" class="edit"></td>
                    <td> <input name="Nachname" type="text" class="edit"></td>
                    <td> <input name="Geburtsdatum" type="date" class="edit"></td>
                    <td> <input name="Kuerzel" type="text" class="edit"></td>
                    <td> <input name="Steuernummer" type="text" class="edit"></td>
                    <td> <input name="Telnummer" type="text" class="edit"></td>
                    <td> <input name="Strasse" type="text" class="edit"></td>
                    <td> <input name="Hausnummer" type="text" class="edit"></td>
                    
                    <td>
                            <button type="submit" name="add_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
                                    <img src="../../res/hinzufugen.png" style="width:24px; height:24px; margin-bottom:35%; margin-left:60%; background-color: #ececec;">
                            </button>
                        </form>
                    </td>
                </tr>
        </table>
    </div>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> Anrede </th>
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> Geburtsdatum </th>
                    <th> Kürzel </th>
                    <th> Steuernummer </th>
                    <th> Telefonnummer </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        if($row["geloescht"] == NULL) {
                        ?>

                        <tr> 
                        <!--<form action="db/admi_dozent_aendern.php" method="POST">-->
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["ID_Dozent"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Anrede"]?>" name="Anrede" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vorname"]?>" name="Vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" name="Nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Geburtsdatum"]?>" name="Geburtsdatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Kürzel"]?>" name="Kürzel" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Steuernummer"]?>" name="Steuernummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" name="Telefonnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Strasse"]?>" name="Strasse" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Hausnummer"]?>" name="Hausnummer" type="text" class="edit"></td>
                            
                            <td>  
                                <button type="submit" name="cng_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;"> 
                                        <img src="../../res/recycling.png" title="Daten Aendern" style="width:24px; height:24px;">
                                </button>
                                </form>
                            </td>
                            <td>
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" title="Dozent Archivieren" style="width:24px; height:24px; background-color: #ececec;">
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