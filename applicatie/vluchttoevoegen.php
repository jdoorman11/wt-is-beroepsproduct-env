<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vluchtinformatie - Vlucht Toevoegen</title>
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
                <?php elseif (isset($_SESSION['user']) && $_SESSION['rol'] == 'Medewerker'): ?>
                    <li><a href="passagiers.php">Passagiersgegevens</a></li>
                <?php endif; ?>
                <li><a href="checkin.php">Checkin</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['user'])): ?>
                    <li><a href="logout.php" class="logout">Uitloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
    <main>
        <div class="vlucht-container">
            <h2>Vlucht Toevoegen</h2>
            <form action="toevoegen.php" method="POST">
                <div class="form-group">
                    <label for="vluchtnummer">Vluchtnummer:</label>
                    <input type="number" name="vluchtnummer" required>
                </div>
                <div class="form-group">
                    <label for="bestemming">Bestemming:</label>
                    <input type="text" name="bestemming" required>
                </div>
                <div class="form-group">
                    <label for="gatecode">Gatecode:</label>
                    <input type="text" name="gatecode">
                </div>
                <div class="form-group">
                    <label for="max_aantal">Max Aantal:</label>
                    <input type="number" name="max_aantal" required>
                </div>
                <div class="form-group">
                    <label for="max_gewicht_pp">Max Gewicht per Persoon:</label>
                    <input type="number" step="0.01" name="max_gewicht_pp" required>
                </div>
                <div class="form-group">
                    <label for="max_totaalgewicht">Max Totaalgewicht:</label>
                    <input type="number" step="0.01" name="max_totaalgewicht" required>
                </div>
                <div class="form-group">
                    <label for="vertrektijd">Vertrektijd:</label>
                    <input type="datetime-local" name="vertrektijd">
                </div>
                <div class="form-group">
    <label for="maatschappijcode">Maatschappijcode:</label>
    <select name="maatschappijcode" required>
        <?php

        $stmt = $verbinding->query("SELECT maatschappijcode, naam FROM Maatschappij");
        while ($rij = $stmt->fetch()) {
            echo "<option value='" . htmlspecialchars($rij['maatschappijcode']) . "'>" . htmlspecialchars($rij['naam']) . "</option>";
        }
        ?>
    </select>
</div>
                <div class="form-group">
                    <button type="submit">Vlucht Toevoegen</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        &copy; 2024 Vluchtinformatie. Alle rechten voorbehouden.
    </footer>
</body>
</html>
