<?php
    include '../../php/include/dbinclude.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $teilnehmer_id = $_POST['id'];

        $teilnehmerlöschen = $conn->prepare("DELETE FROM teilnehmer WHERE id_teilnehmer = :value");
        $teilnehmerlöschen->bindParam(":value", $teilnehmer_id);
        $teilnehmerlöschen->execute();


?>