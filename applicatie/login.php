<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gelre Airport</title>
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
                    <li><a href="login.php" class="active">Login</a></li>
                <?php endif; ?>
                <li><a href="info.php">Vluchtinformatie</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Passagier'): ?>
                    <li><a href="mijngegevens.php">Mijn Gegevens</a></li>
                <?php endif; ?>
                <li><a href="checkin.php">Checkin</a></li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="logout.php" class="logout">Uitloggen</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

    <div class="login-container">
        <h2>Login</h2>
        <form action="session.php" method="post">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Inloggen</button>
            <div class="register-link">
                Heb je nog geen account? <a href="registreer.php">Registreer hier</a>.
            </div>
            <div class="form-group">
                <select id="rol" name="rol" required>
                <option value="" disabled selected>Bent u passagier of medewerker?</option> 
                <option value="Passagier">Passagier</option>
                <option value="Medewerker">Medewerker</option>
                </select>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
