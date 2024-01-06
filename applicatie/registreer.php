<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie - Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
    <div class="register-container">
        <h2>Account Registratie</h2>
        <form action="registatie.php" method="post">
            <div class="form-group">
                <label for="new-username">Gebruikersnaam:</label>
                <input type="text" id="new-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="new-password">Wachtwoord:</label>
                <input type="password" id="new-password" name="password" required>
            </div>
            <div class="form-group">
                <label for="fullname">Volledige Naam:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefoonnummer:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="passport">Paspoortnummer:</label>
                <input type="text" id="passport" name="passport">
            </div>
        
            <button type="submit">Registreer</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
