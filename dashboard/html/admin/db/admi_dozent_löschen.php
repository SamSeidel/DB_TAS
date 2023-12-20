<?php 
    include '../../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_dozent = $_POST["id_dozent"];
    $del_usr = $conn->prepare("UPDATE dozent SET geloescht='1' WHERE ID_Dozent='$id_dozent'");
    header('Location: '. "../admi_dozent.php");
    $del_usr->execute();
?>