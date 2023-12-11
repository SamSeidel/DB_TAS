<?php 
    include 'dbinclude.php';

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_user = $_POST["ID_rechnung"];
        //Mit isempty arbeiten

       
        if(!empty($_POST["vergegenst"])) {
            $conn->prepare("UPDATE dozentenvertrag SET Vertragsgegenstand='$_POST[vergegenst]'WHERE ID_Honorarvertrag=$id_user")->execute();
        }
        if(!empty($_POST["verbeginn"])) {
            $conn->prepare("UPDATE dozentenvertrag SET Vertragsbeginn='$_POST[verbeginn]'WHERE ID_Honorarvertrag=$id_user")->execute();
        }
        if(!empty($_POST["verende"])) {
            $conn->prepare("UPDATE dozentenvertrag SET Vertragsende='$_POST[verende]'WHERE ID_Honorarvertrag=$id_user")->execute();
        }
        if(!empty($_POST["honorar"])) {
            $conn->prepare("UPDATE dozentenvertrag SET Honorar='$_POST[honorar]'WHERE ID_Honorarvertrag=$id_user")->execute();
        }
        if(!empty($_POST["ID_Dozent"])) {
            $conn->prepare("UPDATE dozentenvertrag SET ID_Dozent='$_POST[id_dozent]'WHERE ID_Honorarvertrag=$id_user")->execute();
        }
        
        
    header('Location: '. "DozentenVertrag_tbl.php");
?>