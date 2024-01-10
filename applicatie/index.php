<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'session.php'; 
    ?>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <span>Gelre Airport</span>
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<span>Ingelogd als: " . htmlspecialchars($_SESSION['user']) . "</span>";
                }
                ?>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="info.php">Vluchtinformatie</a></li>
                    <li><a href="checkin.php">Checkin</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php
        if (isset($_SESSION['user'])) {
            echo '<li><a href="logout.php" class="logout">Uitloggen</a></li>';
        }
        ?>     </ul>
            </nav>

        </div>
    </header>
    <main>
        <h2>Welkom bij Gelre Airport</h2>
        <p>Informatie over de luchthaven en diensten...</p>
    </main>
    <footer>
        <p>&copy; 2024 Gelre Airport test</p>
    </footer>
</body>
</html>
