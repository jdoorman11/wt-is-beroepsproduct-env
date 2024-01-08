<?php
$servername = "jouw_servernaam";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$dbname = "GelreAirport";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbinding succesvol";
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}
?>
