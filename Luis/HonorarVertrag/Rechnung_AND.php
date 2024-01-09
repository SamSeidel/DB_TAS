<?php 
    include 'dbinclude.php';
    print_r($_POST);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //datum Umformatieren

      
            $test=$conn->prepare("UPDATE dozentenvertrag SET Vertragsgegenstand=:Vertragsgegenstand,Vertragsbeginn=:Vertragsbeginn, Vertragsende=:Vertragsende, Honorar=:Honorar, ID_Dozent=:ID_Dozent WHERE ID_Honorarvertrag=:ID_Honorarvertrag");

            $test->bindParam(':Vertragsgegenstand', $_POST["vergegenst"]);
            $test->bindParam(':Vertragsbeginn', $_POST["verbeginn"]);
            $test->bindParam(':Vertragsende', $_POST["verende"]);
            $test->bindParam(':Honorar', $_POST["honorar"]);
            $test->bindParam(':ID_Dozent', $_POST["ID_Dozent"]);
            $test->bindParam(':ID_Honorarvertrag', $_POST["ID_vertrag"]);


$test->execute();        
    header('Location: '. "DozentenVertrag_tbl.php");

?>
