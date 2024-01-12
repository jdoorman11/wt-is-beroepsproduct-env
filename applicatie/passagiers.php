<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passagiers Overzicht - Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'session.php'; ?>

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
                    <li><a href="passagiers.php" class="active">Passagiersgegevens</a></li>
                <?php endif; ?>
                <li><a href="checkin.php">Checkin</a></li>
                <?php
                if (isset($_SESSION['user'])): ?>
                    <li><a href="logout.php" class="logout">Uitloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<?php 
    if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Medewerker'): 
        include 'passagiers_overzicht.php';

        $passagiers = [];
        if (isset($_GET['vluchtnummer'])) {
            $passagiers = haalPassagiersOp($_GET['vluchtnummer'], $verbinding);
        }
    ?>

        <main>
            <div class="filter-container">
                <form action="passagiers.php" method="get">
                    <div class="form-group">
                        <label for="vluchtnummer">Vluchtnummer:</label>
                        <input type="text" id="vluchtnummer" name="vluchtnummer" required>
                    </div>
                    <button type="submit">Filter</button>
                </form>
            </div>

            <?php if (!empty($passagiers)): ?>
                <table>
                    <tr>
                        <th>Passagiernummer</th>
                        <th>Naam</th>
                        <th>Vluchtnummer</th>
                        <th>Geslacht</th>
                        <th>Stoel</th>
                    </tr>
                    <?php foreach ($passagiers as $passagier): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($passagier['passagiernummer']); ?></td>
                        <td><?php echo htmlspecialchars($passagier['naam']); ?></td>
                        <td><?php echo htmlspecialchars($passagier['vluchtnummer']); ?></td>
                        <td><?php echo htmlspecialchars($passagier['geslacht']); ?></td>
                        <td><?php echo htmlspecialchars($passagier['stoel']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Voer een vluchtnummer in om passagiersgegevens te zien.</p>
            <?php endif; ?>
        </main>

    <?php else: ?>
        <p>U heeft geen toegang tot deze pagina.</p>
    <?php endif; ?>

    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
