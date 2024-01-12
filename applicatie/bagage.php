<?php

session_start();
include 'db_connect.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $vluchtnummer = $_POST['vluchtnummer'];
    $bagagegewicht = $_POST['bagagegewicht'];

    $passagiernummer = $_SESSION['passagiernummer'];

    $query = $conn->prepare("INSERT INTO BagageObject (passagiernummer, gewicht) VALUES (?, ?)");
    $query->bind_param("id", $passagiernummer, $bagagegewicht);

    if ($query->execute()) {
        echo "Bagage succesvol ingecheckt.";
    } else {
        echo "Fout bij het inchecken van bagage: " . $conn->error;
    }

    $query->close();
} else {

    header("Location: checkin.php");
    exit();
}

$conn->close();
?>
