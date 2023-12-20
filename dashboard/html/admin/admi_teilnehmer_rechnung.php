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

        $teilnehmer = $conn->prepare("SELECT * FROM rechnung LEFT JOIN teilnehmer ON teilnehmer.ID_Teilnehmer = rechnung.ID_Teilnehmer ");
        $teilnehmer->execute();

    ?>
    <div><br>
            <table style="width: 100%;"> 
                    <th> Vorname </th>
                    <th> Nachname </th>
                    <th> Rchnungs ID </th>
                    <th> Rechnungs Nummer </th>
                    <th> Betrag </th>
                    <th> Zahlungsfrist </th>
                    <th> Mahnungsdatum </th>
                    <th> Bezahldatum </th>
                    <th> Kurs </th>
                    <th></th>
                    <th></th>
                    <th></th>


                <?php 
                    while($row = $teilnehmer->fetch()) {
                        ?>

                        <tr> 
                        <form action="db/admi_teilnehmer_rechnung_aendern.php" method="POST">
                            <td> <input value="<?php echo $row["Vorname"]?>"  name="vorname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Nachname"]?>" name="nachname" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Rechnung"]?>" readonly name="id_rechnung" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["RE_Nummer"]?>" name="re_nummer" type="text" class="edit"></td>
                            <td> <input value="<?php 
                                                $result = str_replace('.', ',', $row["Betrag"]);
                                                echo $result . ".- €";
                                                ?>" name="betrag" placeholder="Eingabe z.b. 50.5" class="edit"></td>
                            <td> <input value="<?php echo $row["Zahlungsfrist"]?>" name="zahlungsfrist" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Mahnungsdatum"]?>" name="mahnungsdatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["Bezahldatum"]?>" name="bezahldatum" type="date" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Kurs"]?>" readonly name="id_kurs" type="text" class="edit"></td>
                            
                            <td>  
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;"> 
                                            <img src="../../res/recycling.png" style="width:24px; height:24px;">
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="db/admi_teilnehmer_löschen.php" method="POST">
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="db/admi_teilnehmer_rechnung_erstellen.php" method="POST">
                                    <button type="submit" name="id_teilnehmer" value="<?php echo $row["ID_Teilnehmer"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/erstellen.png" alt="Rechnung Erstellen" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>

                        </tr>
                        <?php
                    }
                ?>
        </table>
    </div>
</body>
</html>