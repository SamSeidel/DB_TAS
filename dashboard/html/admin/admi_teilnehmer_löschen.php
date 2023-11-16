<?php 
    include '../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_user = $_POST["id_teilnehmer"];
    $del_usr = $conn->prepare("DELETE FROM teilnehmer WHERE ID_Teilnehmer='$id_user'");
    header('Location: '. "admi_teilnehmer.php");
    $del_usr->execute();
?>