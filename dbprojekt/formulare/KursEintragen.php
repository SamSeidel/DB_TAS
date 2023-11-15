<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurs Eintrags Formular</title>
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=tas", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
  <form method="post" action="KursBack.php">
    <label for="Gebuehr">Gebühr: </label>
    <input type="text" id="Gebuehr" name="Gebuehr"><br>
    <label for="Kursnummer">Kursnummer: </label>
    <input type="text" id="Kursnummer" name="Kursnummer"><br>
    <label for="Kurstyp">Kurstyp: </label>
    <input type="text" id="Kurstyp" name="Kurstyp"><br>
    <label for="Raum">Raum: </label>
    <input type="text" id="Raum" name="Raum"><br>
    <label for="Kursbeschreibung">Kursbeschreibung: </label>
    <input type="text" id="Kursbeschreibung" name="Kursbeschreibung"><br>
    <label for="KursBeginn">KursBeginn: </label>
    <input type="datetime-local" id="KursBeginn" name="KursBeginn"><br>
    <label for="KursEnde">KursEnde: </label>
    <input type="datetime-local" id="KursEnde" name="KursEnde"><br>
    <label for="Kurs">Kurs: </label>
    <select id="Kurs" name="Kurs"><br>
      <!-- Hier solltest du deine Optionen für das Dropdown-Menü hinzufügen -->
    </select>
  </form>
</body>
</html>
