<form action="/teilnehmer/speichern" method="post">
  <div class="form-group">
    <label for="vorname">Vorname</label>
    <input type="text" name="vorname" id="vorname" required>
  </div>
  <div class="form-group">
    <label for="nachname">Nachname</label>
    <input type="text" name="nachname" id="nachname" required>
  </div>
  <div class="form-group">
    <label for="anrede">Anrede</label>
    <select name="anrede" id="anrede" required>
      <option value="herr">Herr</option>
      <option value="frau">Frau</option>
      <option value="divers">Divers</option>
    </select>
  </div>

  <?php
  if ($vorname !== "" && $nachname !== "") {
    echo "<div class=\"form-group\">
      <label for=\"kurs\">Kurs</label>
      <select name=\"kurs\" id=\"kurs\" required>
        <option value=\"kursteilnehmer1\" selected>KursTeilnehmer1 *</option>
        <option value=\"kursteilnehmer2\">KursTeilnehmer2</option>
      </select>
    </div>

    <div class=\"form-group\">
      <label for=\"zeitraum\">Zeitraum</label>
      <select name=\"zeitraum\" id=\"zeitraum\" required>
        <option value=\"blockzeitrauma\">Blockzeitraum A</option>
        <option value=\"blockzeitraumb\" selected>Blockzeitraum B</option>
      </select>
    </div>";
  }
  ?>

  <button type="submit">Weiter</button>
</form>
