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
        <h2> Betriebverwaltung

        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM betrieb");
        $stmt->execute();

        if(!empty($_POST["cng_betrieb"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields = array("Betriebsname", "Telefonnummer", "Strasse", "Hausnummer", "Rechnungsmail", "PLZ", "Stadt", "Land");
                foreach ($fields as $key) {
                    updateBetrieb($conn, "betrieb", $key, $_POST[$key], $_POST["cng_betrieb"]);
                }
            }
        }

        if(!empty($_POST["del_betrieb"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                deleteBetrieb($conn, "betrieb", $_POST["del_betrieb"]);
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
        function updateBetrieb($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST[$target])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Betrieb=:cng_betrieb");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_betrieb", $primarykey);
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
        function deleteBetrieb($conn, $table, $primarykey) {
            if (isset($_POST['del_betrieb'])) {
                $delete = $conn->prepare("UPDATE $table SET geloescht='1' WHERE ID_Betrieb=:del_betrieb");
                $delete->bindParam(":del_betrieb", $primarykey);
                $delete->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            }
        }
    ?>
    <div><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> BetriebsName </th>
                    <th> Telefonnummer </th>
                    <th> Strasse </th>
                    <th> Hausnummer </th>
                    <th> Rechnungsmail </th>
                    <th> PLZ </th>
                    <th> Stadt </th>
                    <th> Land </th>
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        if($row["geloescht"] == NULL) {
                        ?>
                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["ID_Betrieb"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["BetriebsName"]?>" name="Betriebsname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" name="Telefonnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Strasse"]?>" name="Strasse" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Hausnummer"]?>" name="Hausnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Rechnungsmail"]?>" name="Rechnungsmail" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["PLZ"]?>" name="PLZ" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["stadt"]?>" name="Stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["land"]?>" name="Land" type="text" class="edit"></td>
                            
                            <td>  
                                <button type="submit" name="cng_betrieb" value="<?php echo $row["ID_Betrieb"]?>" style="border:none; background-color: #ececec;"> 
                                        <img src="../../res/recycling.png" title="Daten Aendern" style="width:24px; height:24px;">
                                </button>
                                </form>
                            </td>
                            <td>
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_betrieb" value="<?php echo $row["ID_Betrieb"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" title="Betrieb Archivieren" style="width:24px; height:24px; background-color: #ececec;">
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