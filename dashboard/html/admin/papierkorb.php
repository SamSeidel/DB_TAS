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
        <h2> Papierkorb
        <div class="center"> 
            <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
        </div>
    </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST["cng_dozent"])) { 
            $dozent = $conn->prepare("UPDATE dozent SET geloescht='NULL' WHERE id_dozent=$_POST[cng_dozent]");
            $dozent->execute();
            header('Location: '. "papierkorb.php");
        }

        if(!empty($_POST["del_dozent"])) { 
            ?>
                <script> 
                    if(confirm('Soll der Dozent wirklich endgültig gelöscht werdern?\nDanach kann man ihn nicht wiederherstellen!')) {
                        <?php
                            $dozentlöschen = $conn->prepare("DELETE FROM dozent WHERE id_dozent=:value");
                            $dozentlöschen->bindparam(":value", $_POST["del_dozent"]);
                            $dozentlöschen->execute();
                         ?>
                    } else {
                        console.log('Das ist ein test für die else des Endgültigen löschens');
                    }
                </script>
            <?php
        }   

        if(!empty($_POST["cng_teilnehmer"])) { 
            $teilnehmer = $conn->prepare("UPDATE teilnehmer SET geloescht='NULL' WHERE id_teilnehmer=$_POST[cng_teilnehmer]");
            $teilnehmer->execute();
            header('Location: '. "papierkorb.php");
        }

        if(!empty($_POST["del_teilnehmer"])) { 
        ?>
            <script> 
                if(confirm('Soll der Teilnehmer wirklich endgültig gelöscht werdern?\nDanach kann man ihn nicht wiederherstellen!')) {
                    <?php
                        $teilnehmerlöschen = $conn->prepare("DELETE FROM teilnehmer WHERE id_teilnehmer=:value");
                        $teilnehmerlöschen->bindparam(":value", $_POST["del_teilnehmer"]);
                        $teilnehmerlöschen->execute();
                     ?>
                } else {
                    console.log('Das ist ein test für die else des Endgültigen löschens');
                }
            </script>
        <?php
      }
    ?>
    <div><br>
    <table style="width: 100%;"> 
                    <h2 style="text-align: center; margin-top: -0.1%;"> Archivierte Teilnehmer</h2> 
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

                <?php 
                    $teilnehmer = $conn->prepare("SELECT * FROM teilnehmer");
                    $teilnehmer->execute();

                    while($row = $teilnehmer->fetch()) {
                        if($row["geloescht"] != NULL) { 
                        ?>

                        <tr> 
                        <form action="" method="POST">
                            <td> <input value="<?php echo $row["ID_Teilnehmer"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Anrede"]?>" readonly name="anrede" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vorname"]?>" readonly name="vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" readonly name="nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Email"]?>" readonly name="email" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" readonly name="telnummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Geburtsdatum"]?>" readonly name="geburtsdatum" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["land"]?>" readonly name="land" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["stadt"]?>" readonly name="stadt" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Strasse"]?>" readonly  name="strasse" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Hausnummer"]?>" readonly  name="hausnr" type="text" class="edit"></td>
                            
                            <td>  
                                <button type="submit" name="cng_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;"> 
                                     <img src="../../res/wiederherstellen.png" title="Wiederherstellen" style="width:24px; height:24px;">
                                </button>
                             </form>
                            </td>
                            <td>
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" title="Endgültig Löschen" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                ?>
        </table> <br>
        <table style="width: 100%;"> 
                    <h2 style="text-align: center; margin-top: -0.1%;">Archivierte Dozenten</h2> 
                    <th> ID </th>
                    <th> Anrede </th>
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> Geburtsdatum </th>
                    <th> Kürzel </th>
                    <th> Steuernummer </th>
                    <th> Telefonnummer </th>
                    <th></th>
                    <th></th>

                <?php 
                    $dozent = $conn->prepare("SELECT * FROM dozent");
                    $dozent->execute();
                    while($row = $dozent->fetch()) {
                        if($row["geloescht"] != NULL) {
                        ?>

                        <tr> 
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["ID_Dozent"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Anrede"]?>" readonly name="anrede" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vorname"]?>" readonly name="vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" readonly name="nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Geburtsdatum"]?>" readonly name="geburtsdatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Kürzel"]?>" readonly name="kuerzel" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Steuernummer"]?>" readonly name="steuernummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" readonly name="telnummer" type="text" class="edit"></td>
                            
                            <td>  
                                <button type="submit" name="cng_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;"> 
                                        <img src="../../res/wiederherstellen.png" style="width:24px; height:24px;">
                                </button>
                                </form>
                            </td>
                            <td>
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="del_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" style="width:24px; height:24px; background-color: #ececec;">
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