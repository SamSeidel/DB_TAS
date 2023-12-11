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

    $stmt = $conn->prepare("SELECT kurs_dozent.Datum_Beginn, kurs_dozent.Datum_Ende, kurs_dozent.Anzahl_Einheiten, dozent.ID_Dozent, dozent.Kürzel, kurs.ID_Kurs, kurs.Kurstyp FROM kurs_dozent
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

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td> <input value="<?php echo $row["Datum_Beginn"] ?>" name="Beginn" type="text" class="edit"></td>
                <td> <input value="<?php echo $row["Datum_Ende"] ?>" name="Ende" type="text" class="edit"></td>
                <td> <input value="<?php echo $row["Anzahl_Einheiten"] ?>" name="Einheiten" type="text" class="edit"></td>
                
                
                <td>
                <input list="dozenten" name="dozent">

  <datalist id="dozenten">
  <?php while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option select disabled value="-1">Wähle Deinen Dozenten</option>
                        <option value="<?php echo $row2['ID_Dozent'] ?>"><?php echo $row2["Kürzel"] ?></option>
                    </select>
                    <?php } ?>
                </td>
               
                <td>
                <input list="kurse" name="kurs">

  <datalist id="kurse">
  <?php while ($row3 = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option select disabled value="-1">Wähle Deinen Kurs</option>
                        <option value="<?php echo $row3['ID_Kurs'] ?>"><?php echo $row3["Kurstyp"] ?></option>
                    </select>
                    <?php } ?>
                </td>
                
              

                <td>
                    <form action="Kurs_DOZ_Rechnung_AND.php" method="POST">
                        <button type="submit" name="ID_rechnung" value="<?php echo $row["ID_Dozent"] ?>" style="border:none; background-color: #ececec;">
                            <img src="../../res/recycling.png" style="width:24px; height:24px;">
                        </button>
                    </form>
                </td>

            </tr>
        <?php } ?>
    </table>
</div>

<?php
} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
