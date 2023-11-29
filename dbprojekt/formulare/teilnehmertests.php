<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
</head>
<body>
  <form action="checkout.php" method="post">
    <h1>Checkout</h1>
    <table>
      <tr>
        <td>Anrede</td>
        <td><select name="anrede">
          <option value="Herr">Herr</option>
          <option value="Frau">Frau</option>
          <option value="Divers">Divers</option>
        </select></td>
      </tr>
      <tr>
        <td>Vorname</td>
        <td><input type="text" name="vorname" placeholder="Vorname" /></td>
      </tr>
      <tr>
        <td>Nachname</td>
        <td><input type="text" name="nachname" placeholder="Nachname" /></td>
      </tr>
      <tr>
        <td>Zeitraum</td>
        <td>Zeitraum</td>
      </tr>
      <tr>
        <td>Kosten</td>
        <td>Kosten</td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Bezahlen" /></td>
      </tr>
    </table>
  </form>
</body>
</html>
