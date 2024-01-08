Honorarvertrag
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honorarvertrag</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form method="post" action="Honorarvertrag_2.php">
    <h2>Honorarvertrag</h2>

    <label for="vertragsgegenstand">Vertragsgegenstand:</label>
    <input type="text" id="vertragsgegenstand" name="vertragsgegenstand" required>

    <label for="vertragsbeginn">Vertragsbeginn:</label>
    <input type="date" id="vertragsbeginn" name="vertragsbeginn" required>

    <label for="vertragsende">Vertragsende:</label>
    <input type="date" id="vertragsende" name="vertragsende" required>

    <label for="honorar">Honorar:</label>
    <input type="text" id="honorar" name="honorar" required>

    <button type="submit">Vertrag abschicken</button>
</form>

</body>
</html>
