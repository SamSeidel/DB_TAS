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
        <h2> Dozent Vertrag
            <div class="center"> 
                <a href="../tas_admin.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
            </div>
    </div>

    <?php

       //DB Verbindung
        include 'dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        /**
         * PDO Update Method
         * $conn        ; The connection to the server
         * $table       ; The table where to update (as a string)
         * $target      ; The collum to update from the database
         * $value       ; The new value for the specified field
         * $primarykey  ; Who to update
         * NOTE : This method updates short after executing
         */




        //CNG
        if(!empty($_POST["cng_invoice"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                $fields =  array("kuerzel", "steuernum", "vergegenst", "verbeginn", "verende", "Honorar", "id_dozent");
                foreach ($fields as $key) {
                    updateInvoice($conn, "dozentenvertrag", $key, $_POST[$key], $_POST["cng_invoice"]);

                }
            }
        }
        


        //DEL
        if(!empty($_POST["del_invoice"])) {
            $delete = $conn->prepare("UPDATE dozentenvertrag SET kurs_dozent.geloescht='1' WHERE ID_Dozent=:value1");
            $delete->bindparam(":value1", $_POST["del_invoice"]);
            $delete->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }
        
        
        //UPDATE FUNCTION

        function updateInvoice($conn, $table, $target, $value, $primarykey) {
            if (isset($_POST["cng_invoice"])) { 
                $update = $conn->prepare("UPDATE $table SET $target=:value WHERE ID_Dozent=:cng_invoice AND ID_Kurs=:ID_Kurs");
                $update->bindParam(":value", $_POST[$target]);
                $update->bindParam(":cng_invoice", $primarykey);
                $update->execute();
                header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
            } 
        }


         //NEU
         if (isset($_POST['add_rechnung'])) {
            $Hinzufügen = $conn->prepare("INSERT INTO dozentenvertrag (Vertragsgegenstand, Vertragsbeginn, Vertragsende, Honorar, ID_Dozent)
            VALUES (':id_rech', ':gegenstand', ':beginn', ':ende', ':honorar', ':id_doz' )");
        

          $Hinzufügen->bindParam(':id_rech', $_POST["id_Rechnung2"]);
          $Hinzufügen->bindParam(':gegenstand', $_POST["Vertragsgegenstand2"]);
          $Hinzufügen->bindParam(':beginn', $_POST["Vertragsbeginn2"]);
          $Hinzufügen->bindParam(':ende', $_POST["Vertragsende2"]);
          $Hinzufügen->bindParam(':honorar', $_POST["Honorar2"]);
          $Hinzufügen->bindParam(':id_doz', $_POST["ID_Dozent2"]);
          
            $Hinzufügen->execute();
            header("Refresh: 0.1; url=$_SERVER[PHP_SELF]");
        }
    ?>

    <div style="margin-left: 1.5%;"> 
        <h3> Hinzufügen </h3>
    </div>

    <div>
        <table style="width: 98.5%;"> 
            <tr>
                    <th> Kürzel </th>
                    <th> Steuernummer </th>
                    <th> Vertragsgegenstand </th>
                    <th> Vertragsbeginn </th>
                    <th> Vertragsende </th>
                    <th> Honorar </th>
                    <th> ID_Dozent </th>
                    <th></th>
            </tr>
            <tr>

            <?php//Form Für Neu?>

                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                    <input name="Vertragsgegenstand2" type="text" class="edit" placeholder="Vertragsgegenstand:">
                    <input name="Vertragsbeginn2" type="date" class="edit" placeholder="Vertragsbeginn:">
                    <input name="Vertragsende2" type="date" class="edit" placeholder="Vertragsende:">
                    <input name="Honorar2" type="text" class="edit" placeholder="Honorar:">

                    <select name="ID_Dozent2" class="edit">
                                    <?php 
                                    $Kurs= $conn->prepare("SELECT ID_Dozent, Nachname FROM dozent");
                                    $Kurs->execute();
                                    while($row = $Kurs->fetch()) { ?>
                                        <option value="<?php echo $row["ID_Dozent"]?>"> <?php echo $row["Nachname"] ?></option>
                                    <?php } ?>
                                </select>
                </form>
            </tr>
        </table>
    </div>

    <div><br>
        <table style="width: 100%;"> 
       

            <?php 
               $VertragDOZ = $conn->prepare("SELECT dozent.ID_Dozent, dozent.Steuernummer, dozent.Kürzel, dozentenvertrag.ID_Honorarvertrag, dozentenvertrag.Vertragsgegenstand, dozentenvertrag.Vertragsbeginn, dozentenvertrag.Vertragsende, dozentenvertrag.Honorar, dozentenvertrag.ID_Dozent 
               FROM dozentenvertrag
               LEFT JOIN dozent ON dozent.ID_Dozent = dozentenvertrag.ID_Dozent");
                $VertragDOZ->execute();
                while($row = $VertragDOZ->fetch()) {
            ?>

            <tr> 
                
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                            <td> <input value="<?php echo $row["Kürzel"]?>" name="kuerzel" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Steuernummer"]?>" name="steuernum" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsgegenstand"]?>" name="vergegenst" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsbeginn"]?>" name="verbeginn" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsende"]?>" name="verende" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Honorar"]?>" name="honorar" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Dozent"]?>" name="id_dozent" type="text" class="edit"></td>

                            <?php//form CNG?>
                            <td>  
                                 <button type="submit" name="cng_invoice" value="<?php echo $row["ID_Honorarvertrag"]?>" style="border:none; background-color: #ececec;"> 
                                         <img src="../../res/recycling.png" title="Daten aktualisieren" style="width:24px; height:24px;">
                                    </button>
                                </form>
                            </td> 
                </form>

                <?php//form DEL?>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                <button type="submit" name="del_invoice" value="<?php echo $row["ID_Honorarvertrag"]?>" style="border:none; background-color: #ececec;">
                                        <img src="../../res/entfernen.png" title="Vertrag Archivieren" style="width:24px; height:24px; background-color: #ececec;">
                                  </button>
                </form>

                <?php//form NEU?>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <button type="submit" name="create_invoice" value="<?php echo $row["ID_Honorarvertrag"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/erstellen.png" title="Vertrag erstellen" alt="Rechnung Erstellen" style="width:24px; height:24px; background-color: #ececec;">
                                </button>
                </form>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
