<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Gegevens - Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'session.php'; 
    if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Passagier') {
        $passagiernummer = $_SESSION['user_id']; // Vervang door de juiste sessievariabele die de passagiernummer bevat

        // Haal vluchtgegevens op
        $vluchtQuery = $verbinding->prepare("SELECT * FROM Vlucht WHERE vluchtnummer IN (SELECT vluchtnummer FROM Passagier WHERE passagiernummer = :passagiernummer)");
        $vluchtQuery->execute(['passagiernummer' => $passagiernummer]);
        $vluchten = $vluchtQuery->fetchAll();

        // Haal bagagegegevens op
        $bagageQuery = $verbinding->prepare("SELECT * FROM BagageObject WHERE passagiernummer = :passagiernummer");
        $bagageQuery->execute(['passagiernummer' => $passagiernummer]);
        $bagage = $bagageQuery->fetchAll();
    } else {
        header("Location: login.php");
        exit();
    }
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
                    <li><a href="mijngegevens.php" class='active'>Mijn Gegevens</a></li>
                <?php endif; ?>
                <li><a href="checkin.php">Checkin</a></li>
                <li><a href="contact.php">Contact</a></li>
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
        <h1>Mijn Vluchten</h1>
        <table>
            <tr>
                <th>Vluchtnummer</th>
                <th>Bestemming</th>
                <th>Vertrektijd</th>
            </tr>
            <?php foreach ($vluchten as $vlucht): ?>
            <tr>
                <td><?php echo htmlspecialchars($vlucht['vluchtnummer']); ?></td>
                <td><?php echo htmlspecialchars($vlucht['bestemming']); ?></td>
                <td><?php echo htmlspecialchars($vlucht['vertrektijd']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h1>Mijn Bagage</h1>
        <table>
            <tr>
                <th>Objectvolgnummer</th>
                <th>Gewicht</th>
            </tr>
            <?php foreach ($bagage as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['objectvolgnummer']); ?></td>
                <td><?php echo htmlspecialchars($item['gewicht']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
