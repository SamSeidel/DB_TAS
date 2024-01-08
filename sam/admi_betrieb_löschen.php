<?php 
    include 'dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_betrieb = $_POST["id_betrieb"];
    $del_usr = $conn->prepare("DELETE FROM betrieb WHERE ID_Betrieb='$id_betrieb'");
    header('Location: '. "betrieb.php");
    $del_usr->execute();
?>