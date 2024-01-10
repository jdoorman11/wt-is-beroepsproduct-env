<?php
session_start();
session_unset();
session_destroy(); 

$db_host = "database_server"; 
$db_user = "sa"; 
$db_password = "abc123!@#"; 
$db_name = "GelreAirport"; 

header("Location: login.php");
exit();
?>
