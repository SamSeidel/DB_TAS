<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabelle</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
include 'dbinclude.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM kurs_dozent
                            LEFT JOIN dozent ON dozent.ID_Dozent = kurs_dozent.ID_Dozent
                            LEFT JOIN kurs ON kurs.ID_Kurs = kurs_dozent.ID_Kurs");

    $stmt->execute();
?>

<div>
    <br><br><br>
    <table style="width: 100%;">
        <th> Beginn </th>
        <th> Ende </th>
        <th> Anzahl Einheit </th>
        <th> Dozenten </th>
        <th> Kurs </th>
        <th></th>

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <form action="Kurs_DOZ_Rechnung_AND.php" method="POST">
                    <td> <input value="<?php echo $row["Datum_Beginn"] ?>" name="Beginn" type="date" class="edit"></td>
                    <td> <input value="<?php echo $row["Datum_Ende"] ?>" name="Ende" type="date" class="edit"></td>
                    <td> <input value="<?php echo $row["Anzahl_Einheiten"] ?>" name="Einheiten" type="text" class="edit"></td>
                    <td> <input value="<?php echo $row["ID_Dozent"] ?>" name="Dozent" type="text" class="edit"></td>
                    <td> <input value="<?php echo $row["ID_Kurs"] ?>" name="kurs" type="text" class="edit"></td>
                    <td>
                        <button type="submit" name="ID_rechnung" value="<?php echo $row["ID"]?>" style="border:none; background-color: #ececec;">
                            <img src="../../res/recycling.png" style="width:24px; height:24px;">
                        </button>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </table>
</div>

<br><br>

<form action="Kurs_doz_NEU.php" method="POST">
    <td> <input placeholder="StartDatum:" name="Beginn2" type="date" class="edit"></td>
    <td> <input placeholder="Endzeitpunkt:" name="Ende2" type="date" class="edit"></td>
    <td> <input placeholder="Anz Einheiten:" name="Einheiten2" type="text" class="edit"></td>
    <td> <input placeholder="Dozent:" name="Dozent2" type="text" class="edit"></td>
    <td> <input placeholder="Kurs:" name="kurs2" type="text" class="edit"></td>
    <td>
        <button type="submit" name="ID_rechnung2"  style="border:none; background-color: #ececec;">
            <img src="../../res/recycling.png" style="width:24px; height:24px;">
        </button>
    </td>
</form>

<?php
} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
