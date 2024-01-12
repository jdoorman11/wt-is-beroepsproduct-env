<?php

session_start();

$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

try {
    $verbinding = new PDO('sqlsrv:Server=' . $db_host . ';Database=' . $db_name . ';TrustServerCertificate=1', $db_user, $db_password);    
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol']; 

    if ($rol == 'Passagier') {
        $stmt = $verbinding->prepare("SELECT * FROM Passagier WHERE passagiernummer = :username AND wachtwoord = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user['naam'];
            $_SESSION['rol'] = 'Passagier';
            $_SESSION['user_id'] = $user['passagiernummer'];
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Incorrecte gebruikersnaam of wachtwoord voor passagier</p>";
        }
    } elseif ($rol == 'Medewerker') {
        $stmt = $verbinding->prepare("SELECT * FROM Balie WHERE balienummer = :username AND wachtwoord = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $username; 
            $_SESSION['rol'] = 'Medewerker';
            $_SESSION['user_id'] = $username;
            header("Location: index.php");
            exit();
        
        } else {
            echo "<p>Incorrecte gebruikersnaam of wachtwoord voor medewerker</p>";
        }
    }  
}
?>
