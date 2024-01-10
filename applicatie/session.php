<?php

session_start();


$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);    
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Verbinding succesvol";
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit; 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $verbinding->prepare("SELECT * FROM Passagier WHERE passagiernummer = :username AND wachtwoord = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        
        $_SESSION['user'] = $user['naam']; 
        header("Location: index.php"); 
    } else {
       
        echo "<p>Incorrecte gebruikersnaam of wachtwoord</p>";
    }    
}
?>