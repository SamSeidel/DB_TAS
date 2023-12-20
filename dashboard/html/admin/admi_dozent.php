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
                    <th></th>
                    <th></th>
                <tr> 
                <form action="db/admi_dozent_hinzufügen.php" method="POST">

                    <td> <input readonly name="id" type="text" class="edit"></td>

                    <!--<td>
                    <select name="anrede" id="anrede" class="edit">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                    </select>
                    </td>-->
                    <td> <input name="anrede" type="text" class="edit"> </td>
                    <td> <input name="vorname" type="text" class="edit"></td>
                    <td> <input name="nachname" type="text" class="edit"></td>
                    <td> <input name="geburtsdatum" type="date" class="edit"></td>
                    <td> <input name="kuerzel" type="text" class="edit"></td>
                    <td> <input name="steuernummer" type="text" class="edit"></td>
                    <td> <input name="telnummer" type="text" class="edit"></td>
                    
                    <td>
                            <button type="submit" name="id_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
                                    <img src="../../res/hinzufugen.png" style="width:24px; height:24px; margin-bottom:35%; margin-left:60%; background-color: #ececec;">
                            </button>
                        </form>
                    </td>
                </tr>
        </table>
    </div>
    <?php
        include '../../php/include/dbinclude.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM dozent");
        $stmt->execute();
    ?>
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
                    <th></th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        if($row["geloescht"] == NULL) {
                        ?>

                        <tr> 
                        <form action="db/admi_dozent_aendern.php" method="POST">
                            <td> <input value="<?php echo $row["ID_Dozent"]?>" readonly name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Anrede"]?>" name="anrede" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vorname"]?>" name="vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" name="nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Geburtsdatum"]?>" name="geburtsdatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Kürzel"]?>" name="kuerzel" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Steuernummer"]?>" name="steuernummer" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Telefonnummer"]?>" name="telnummer" type="text" class="edit"></td>
                            
                            <td>  
                                <button type="submit" name="id_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;"> 
                                        <img src="../../res/recycling.png" style="width:24px; height:24px;">
                                </button>
                                </form>
                            </td>
                            <td>
                                <form action="db/admi_dozent_löschen.php" method="POST">
                                    <button type="submit" name="id_dozent" value="<?php echo $row["ID_Dozent"]?>" style="border:none; background-color: #ececec;">
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