<?php


$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

function haalPassagiersOp($vluchtnummer, $verbinding) {
    $stmt = $verbinding->prepare("SELECT * FROM Passagier WHERE vluchtnummer = :vluchtnummer");
    $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);    
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Medewerker' && isset($_GET['vluchtnummer'])) {
        $vluchtnummer = $_GET['vluchtnummer'];
        $stmt = $verbinding->prepare("SELECT * FROM Passagier WHERE vluchtnummer = :vluchtnummer");
        $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
        $stmt->execute();
        $passagiers = $stmt->fetchAll();

        return $passagiers;
    }
} catch(PDOException $e) {
    echo "Er is een fout opgetreden: " . $e->getMessage();
}
?>
