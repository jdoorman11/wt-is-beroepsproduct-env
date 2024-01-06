<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
        <div class="header-container">
            <div class="logo-container">
                <span>Gelre Airport</span>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php" class="active">Login</a></li>
                    <li><a href="info.php">Vluchtinformatie</a></li>
                    <li><a href="checkin.php">Checkin</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login-verwerking.php" method="post">
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
        </form>
    </div>
</body>
<footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</html>
