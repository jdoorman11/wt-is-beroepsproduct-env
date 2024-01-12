<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagage Inchecken - Gelre Airport</title>
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
            if (isset($_SESSION['user']) && isset($_SESSION['rol'])) {
                echo "<span>Ingelogd als " . htmlspecialchars($_SESSION['rol']) . ": " . htmlspecialchars($_SESSION['user']) . "</span>";
            }
            ?>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="info.php">Vluchtinformatie</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Passagier'): ?>
                    <li><a href="mijngegevens.php">Mijn Gegevens</a></li>
                <?php endif; ?>
                <li><a href="checkin.php" class="active">Checkin</a></li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="logout.php" class="logout">Uitloggen</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
    <main>
        <div class="register-container">
            <h2>Bagage Inchecken</h2>
            <form action="bagage.php" method="post">
                <div class="form-group">
                    <label for="vluchtnummer">Vluchtnummer:</label>
                    <input type="text" id="vluchtnummer" name="vluchtnummer" required>
                </div>
                <div class="form-group">
                    <label for="bagagegewicht">Gewicht van Bagage (kg):</label>
                    <input type="text" id="bagagegewicht" name="bagagegewicht" required>
                </div>
                <button type="submit">Inchecken</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
