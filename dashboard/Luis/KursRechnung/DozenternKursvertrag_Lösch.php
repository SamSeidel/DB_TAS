<?php 
    include 'dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_user = $_POST["ID_vertrag"];
    $del_usr = $conn->prepare("DELETE FROM kurs_dozent WHERE ID_Dozent='$id_user'");
    header('Location: '. "DozentenVertrag_tbl.php");
    $del_usr->execute();
?>