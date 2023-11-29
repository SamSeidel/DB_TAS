<!DOCTYPE html>
<html>
<head>
    <link rel ="stylesheet" href ="formulare/style_dozent.css">
    <title>Anmeldeformular für Dozenten</title>
</head>
<body>
<h2>Anmeldeformular für Dozenten</h2>
<form method="post" action="Dozent_Vermittlung.php">
    <label for="anrede">Anrede:</label>
    <select name="anrede" id ="anrede">
        <option value="Herr">Herr</option>
        <option value="Frau">Frau</option>
    </select><br><br>

    <label for="vorname">Vorname:</label>
    <input type="text" id="vorname" name="vorname"><br><br>

    <label for="nachname">Nachname:</label>
    <input type="text" id = "nachname" name="nachname"><br><br>

    <label for="geburtsdatum">Geburtsdatum:</label>
    <input type="date" id = "geburtsdatum" name="geburtsdatum"><br><br>

    <label for="telefonnummer">Telefonnummer:</label>
    <input type="tel" id = "telefonnummer" name="telefonnummer"><br><br>

    <label for="steuernummer">Steuernummer:</label>
    <input type="text" id = "steuernummer" name="steuernummer"><br><br>

    <label for="kuerzel">Kürzel:</label>
    <input type="text" id = "kuerzel" name="kuerzel"><br><br>

    <label for="strasse">Straße:</label>
    <input type="text" id = "strasse" name="strasse"><br><br>

    <label for="hausnummer">Hausnummer:</label>
    <input type="text" id = "hausnummer" name="hausnummer"><br><br>

    <label for="email">E-Mail:</label>
    <input type="email" id = "email" name="email"><br><br>

    <label for="kurse">Kurse:</label>
    <div class="dropdown">
  <button class="dropbtn">Kurse auswählen bitte :</button>
  <div class="dropdown-content">
    <a href="kurs1">Link 1</a>
    <a href="kurs2">Link 2</a>
    <a href="kurs3">Link 3</a>
  </div>
</div>

    <input type="submit" value="Anmelden">
</form>
</body>
</html>
