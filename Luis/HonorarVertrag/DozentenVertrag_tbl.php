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

<form action="vertrag_neu_dozent.php" method="POST">

<input name="id_Rechnung2" type="text" class="edit" placeholder="ID_Rechnung:">
<input name="Vertragsgegenstand2" type="text" class="edit" placeholder="Vertragsgegenstand:">
<input name="Vertragsbeginn2" type="date" class="edit" placeholder="Vertragsbeginn:">
<input name="Vertragsende2" type="date" class="edit" placeholder="Vertragsende:">
<input name="Honorar2" type="text" class="edit" placeholder="Honorar:">
<input name="ID_Dozent2" type="text" class="edit" placeholder="ID_Dozent:">

<button type="submit" name="Butt_VER_NEU" style="border:none; background-color: #ececec;"> 

</form>



<?php






include 'dbinclude.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT dozent.ID_Dozent, dozent.Steuernummer, dozent.Kürzel, dozentenvertrag.ID_Honorarvertrag, dozentenvertrag.Vertragsgegenstand, dozentenvertrag.Vertragsbeginn, dozentenvertrag.Vertragsende, dozentenvertrag.Honorar, dozentenvertrag.ID_Dozent 
FROM dozentenvertrag
LEFT JOIN dozent ON dozent.ID_Dozent = dozentenvertrag.ID_Dozent");

$stmt->execute();

/*
while ($row = $stmt->fetch()) { 
print_r($row);
}
*/
?>



<div><br><br><br>
            <table style="width: 100%;"> 
                    <th> ID </th>
                    <th> Kürzel </th>
                    <th> Steuernummer </th>
                    <th> Vertragsgegenstand </th>
                    <th> Vertragsbeginn </th>
                    <th> Vertragsende </th>
                    <th> Honorar </th>
                    <th> ID_Dozent </th>
                    <th></th>

                <?php 
                    while($row = $stmt->fetch()) {
                        ?>

                        <tr> 
                        <form action="Rechnung_AND.php" method="POST">
                            <td> <input value="<?php echo $row["ID_Honorarvertrag"]?>" name="id" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Kürzel"]?>" name="kuerzel" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Steuernummer"]?>" name="steuernum" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsgegenstand"]?>" name="vergegenst" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsbeginn"]?>" name="verbeginn" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Vertragsende"]?>" name="verende" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["Honorar"]?>" name="honorar" type="text" class="edit"></td>
                            <td> <input value="<?php echo $row["ID_Dozent"]?>" name="id_dozent" type="text" class="edit"></td>
                            
                            <td>  
                                    <button type="submit" name="ID_vertrag" value="<?php echo $row["ID_Honorarvertrag"]?>" style="border:none; background-color: #ececec;"> 
                                            <img src="../../res/recycling.png" style="width:24px; height:24px;">
                                    </button>
                                    </form>
                            </td>
    
                            <td>

                                <form action="Dozenternvertrag_Lösch.php" method="POST">
                                    <button type="submit" name="ID_vertrag" value="<?php echo $row["ID_Honorarvertrag"]?>" style="border:none; background-color: #ececec;">
                                            <img src="../../res/entfernen.png" style="width:24px; height:24px; background-color: #ececec;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            <!-- <tr> 
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
                <td style=" border-top: 1px solid black; border-collapse: collapse;"> </td>
            </tr>-->

        </table>
    </div>
        
</body>
</html>