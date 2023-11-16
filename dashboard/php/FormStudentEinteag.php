<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eitrag Student</title>
</head>
<body>

<?php
include 'dbinclude.php';


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT ID_Betrieb, BetriebsName FROM betrieb");
  $stmt->execute();

          // set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
         
} 
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

$conn = null;
?>




<form action="FormStudentAusfueren">

<label for="fname">Vorname:</label><br>
  <input type="text" id="fname" name="fname" placeholder="Vorname"><br>

  <label for="lname">Nachname:</label><br>
  <input type="text" id="lname" name="lname" placeholder="Nachname"><br>

  <label for="anrede">Anrede:</label><br>
  <input type="text" id="anrede" name="anrede" placeholder="Anrede"><br><br>

  <label for="email">E-Mail:</label><br>
  <input type="email" id="email" name="email" placeholder="E-Mail"><br><br>

  <label for="tel">Telefonnummer:</label><br>
  <input type="text" id="tel" name="tel" placeholder="Telefonnummer"><br><br>

  <label for="gdatum">Geburts Datum:</label><br>
  <input type="text" id="gdatum" name="gdatum" placeholder="Geburts Datum"><br><br>

  <label for="lnstrame">Straße:</label><br>
  <input type="text" id="str" name="str" placeholder="Straße"><br><br>

  <label for="haus">Hausnummer:</label><br>
  <input type="text" id="haus" name="haus" placeholder="Hausnummer"><br><br>

  <label for="betriebe">Wähle dein betrieb:</label><br>

  
  <select placeholder="Wähle einen Betrieb aus" name="betriebe" id="betriebe">
  
      <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<option value="'.htmlspecialchars($row['ID_Betrieb']).'">'.htmlspecialchars($row['BetriebsName']).'</option>';
        }

      ?>  
    </select>

      <input type="submit" value="Submit">

</form> 

</body>
</html> 