<!DOCTYPE html>
<html lang="de">
<head>
    <title>Beastmode | TAS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

    <?php
        include '../../php/include/dbinclude.php';
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID_Betrieb, BetriebsName FROM betrieb");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                

    ?>
    <div class="header">
            <h2> Praktische kurse Anmeldung 

            <div class="center"> 
                <a href="../tas_anmeldung.html"><img width="26px" height="26px" class="heading" src="../../res/zuruck.png"> </h2></a>
            </div>
    </div>

    <div class="grid-2">
        <div></div>
        <div></div>

        <div>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                    <label>Anrede<a style="color:red;">*<a></label>   
                    <select name="anrede" id="anrede" style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                    </select>

                    <label> Vorname<a style="color:dark-red;">*<a></label>
                    <input name="vorname" type="text" placeholder="Max" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"><br>
                 
                    <label> Nachname<a style="color:red;">*<a></label>
                    <input name="nachname" type="text" placeholder="Mustermann" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"><br>
             
                    <label> E-Mail<a style="color:red;">*<a></label>
                    <input name="email" type="email" placeholder="max@mustermann.de" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"><br>
             
                    <label> Telefonnummer<a style="color:red;">*<a></label>
                    <input name="telnummer" type="tel" placeholder="+XX XXX XXXXXXXX" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"><br>

                    <label> Geburtsdatum<a style="color:red;">*<a></label>
                    <input name="gebdatum" type="date" placeholder="01.01.1999" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"> <br>

                    <label >Straße<a style="color:red;">*<a></label>
                    <input name="strasse" type="text" id="str" name="str" placeholder="Straße" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"><br>

                    <label>Hausnummer<a style="color:red;">*<a></label>
                    <input name="hausnr" type="text" id="haus" name="haus" placeholder="Hausnummer" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"> <br>

                    <label >Wähle dein betrieb</label><a style="color:red;">*<a>
                    <select name="betrieb" type="text" name="betriebe" id="betriebe" required style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black"> <br>

                    <option disabled selected>Wähle einen betrieb aus</option> 
                    <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="'.htmlspecialchars($row['ID_Betrieb']).'">'.htmlspecialchars($row['BetriebsName']).'</option>';
                        }
                    ?>  
                    </select>

                    <input type="submit" value="submit" style="width: 10%; text-align: center; border-radius: 12px; border: 1px solid Black">
                </form>

                <?php
                    If(isset($_POST['Submit'])){ 

                        $insert_qry = $conn->prepare("INSERT INTO teilnehmer (Anrede, Vorname, Nachname, Email, Tefenonnummer, Geburtsdatum Strasse, Hausnummer, ID_Betrieb)
                        VALUES(:anrede, :vorname, :nachname, :email, :telnummer, : gebdatum, :strasse, :hausnr, :betrieb)");

                        $insert_qry->bindParam(":anrede", $_POST["anrede"]);
                        $insert_qry->bindParam(":vorname", $_POST["vorname"]);
                        $insert_qry->bindParam(":nachname", $_POST["nachname"]);
                        $insert_qry->bindParam(":email", $_POST["email"]);
                        $insert_qry->bindParam(":telnummer", $_POST["telnummer"]);
                        $insert_qry->bindParam(":gebdatum", $_POST["gebdatum"]);
                        $insert_qry->bindParam(":strasse", $_POST["strasse"]);
                        $insert_qry->bindParam(":hausnr", $_POST["hausnr"]);
                        $insert_qry->bindParam(":betrieb", $_POST["betrieb"]);

                        $insert_qry->execute();
                    }

                } 
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>     
        <div>
       </div>
    </div>
</body>
</html>