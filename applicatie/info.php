<!DOCTYPE php>
<php lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vluchtinformatie - Gelre Airport</title>
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
                <li><a href="login.php">Login</a></li>
                <li><a href="flight-info.php" class="active">Vluchtinformatie</a></li>
                <li><a href="checkin.php">Checkin</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Vluchtinformatie</h2>
        <table>
            <thead>
                <tr>
                    <th>Vluchtnummer</th>
                    <th>Bestemming</th>
                    <th>Vertrektijd</th>
                    <th>Gate</th>
                    <!-- Voeg indien nodig meer kolommen toe -->
                </tr>
            </thead>
            <tbody>
                <!-- Voorbeeld van vluchtgegevens -->
                <tr>
                    <td>GA123</td>
                    <td>Amsterdam</td>
                    <td>08:30</td>
                    <td>A1</td>
                </tr>
                <!-- Herhaal voor meer vluchten -->
            </tbody>
        </table>
    </main>
    <footer>
        <!-- Voettekst, hergebruik van bestaande code -->
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</php>
