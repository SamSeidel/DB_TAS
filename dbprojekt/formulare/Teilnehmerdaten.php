<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Kursformular</title>
</head>
<body>

  <h1>Kursformular</h1>

  <form action="index.php" method="post">

    <input type="hidden" name="action" value="submit">

    <div class="form-group">
      <label for="vorname">Vorname</label>
      <input type="text" class="form-control" id="vorname" name="vorname">
    </div>

    <div class="form-group">
      <label for="nachname">Nachname</label>
      <input type="text" class="form-control" id="nachname" name="nachname">
    </div>

    <div class="form-group">
      <label for="geschlecht">Geschlecht</label>
      <select class="form-control" id="geschlecht" name="geschlecht">
        <option value="männlich">männlich</option>
        <option value="weiblich">weiblich</option>
        <option value="divers">divers</option>
      </select>
    </div>

    <div class="form-group">
      <label for="kurs">Kurs</label>
      <select class="form-control" id="kurs" name="kurs">
        <?php

        // Verbindung zur Datenbank herstellen
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tas";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
        }

        // Kurse aus der Datenbank auslesen
        $sql = "SELECT Kurstyp, Gebühr, KursBeginn FROM kurs";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Kurse in der Auswahlliste darstellen
        while ($row = $stmt->fetch()) {
          echo "<option value=\"{$row['Kurstyp']}\">{$row['Kurstyp']} ({$row['Gebühr']} €)  ({$row['KursBeginn']})</option>";
        } 

        // Verbindung zur Datenbank schließen
        $conn = null;
        ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Abschicken</button>

  </form>

</body>
</html>
