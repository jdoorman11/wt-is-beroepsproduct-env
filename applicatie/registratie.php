<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $fullname = $_POST["fullname"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $address = $_POST["address"] ?? '';
    $passport = $_POST["passport"] ?? '';

    if (empty($username) || empty($password) || empty($email)) {
        echo "Vereiste velden zijn niet ingevuld.";
    } else {
        echo "Registratie geslaagd voor gebruiker: " . htmlspecialchars($username);
    }
} else {
    echo "Ongeldige toegang.";
}
?>
