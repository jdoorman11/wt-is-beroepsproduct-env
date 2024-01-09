<?php
$db_host = "database_server"; // Zorg ervoor dat dit de correcte servernaam is
$db_user = "sa"; // Je gebruikersnaam
$db_password = "abc123!@#"; // Je wachtwoord
$db_name = "GelreAirport"; // Naam van je database

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);    
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Verbinding succesvol";
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}
?>



