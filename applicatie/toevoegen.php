<?php
session_start();

$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $vluchtnummer = $_POST['vluchtnummer'];
    $bestemming = $_POST['bestemming'];
    $gatecode = $_POST['gatecode'];
    $max_aantal = $_POST['max_aantal'];
    $max_gewicht_pp = $_POST['max_gewicht_pp'];
    $max_totaalgewicht = $_POST['max_totaalgewicht'];
    $vertrektijd = date('Y-m-d H:i:s', strtotime($_POST['vertrektijd']));
    $maatschappijcode = $_POST['maatschappijcode'];

    $sql = "INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode) VALUES (:vluchtnummer, :bestemming, :gatecode, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode)";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([
        'vluchtnummer' => $vluchtnummer, 
        'bestemming' => $bestemming, 
        'gatecode' => $gatecode, 
        'max_aantal' => $max_aantal, 
        'max_gewicht_pp' => $max_gewicht_pp, 
        'max_totaalgewicht' => $max_totaalgewicht, 
        'vertrektijd' => $vertrektijd, 
        'maatschappijcode' => $maatschappijcode
    ]);

    $_SESSION['succesBericht'] = "Vlucht is succesvol toegevoegd!";

    header('Location: info.php');
    exit();
} catch(PDOException $e) {
    echo "Fout bij het toevoegen van de vlucht: " . $e->getMessage();
}
?>
