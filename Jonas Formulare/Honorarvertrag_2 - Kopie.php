<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tas";
print_r($_POST);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // get values from form
    $Vertragsgegenstand = $_POST['vertragsgegenstand'];
    $Vertragsbeginn = $_POST['vertragsbeginn'];
    $Vertragsende = $_POST['vertragsende'];
    $Honorar = $_POST['honorar'];
    

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `dozentenvertrag` (`Vertragsgegenstand`, `Vertragsbeginn`, `Vertragsende`, `Honorar`)
    VALUES (:vertragsgegenstand, :vertragsbeginn, :vertragsende, :honorar)");

    // bind parameters
    $stmt->bindParam(':vertragsgegenstand', $Vertragsgegenstand);
    $stmt->bindParam(':vertragsbeginn', $Vertragsbeginn);
    $stmt->bindParam(':vertragsende', $Vertragsende);
    $stmt->bindParam(':honorar', $Honorar);


    // execute the prepared statement
    if ($stmt->execute())
    {
            echo "New record created successfully";

    }

    // echo success message
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>