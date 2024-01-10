<?php
$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);    
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}
?>