<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vluchtinformatie - Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
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
                <li><a href="index.php" class="active">Home</a></li>
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
                <?php
                if (isset($_SESSION['user'])): ?>
                    <li><a href="logout.php" class="logout">Uitloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
    <main>
        <h2>Vluchtinformatie</h2>
    <div class="filter-container">
        <form method="post">
            Vluchtnummer: <input type="text" name="vluchtnummer">
            Bestemming: <input type="text" name="bestemming">
            Vertrektijd: <input type="text" name="vertrektijd">
            Gate: <input type="text" name="gate">
            Maatschappij: <input type="text" name="maatschappij">
            <input type="submit" name="filter" value="Filter">
                <?php
                    if (isset($_SESSION['user']) && $_SESSION['rol'] == 'Medewerker'):
                    ?>
                    <a href="vluchttoevoegen.php" class="vlucht-toevoegen">Vlucht Toevoegen</a>
                    <?php
                    endif;
                ?>
        </form>

    </div>
        <table>
        <thead>
                <tr>
                    <th>Vluchtnummer</th>
                    <th>Bestemming</th>
                    <th>Vertrektijd</th>
                    <th>Gate</th>
                    <th>Maatschappij</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'main.php';              

                try {
                    $sql = "SELECT vluchtnummer, bestemming, vertrektijd, gatecode, maatschappijcode FROM vlucht";
                    $whereClauses = [];
                    $parameters = [];

                    if (isset($_POST['filter'])) {
                        if (!empty($_POST['vluchtnummer'])) {
                            $whereClauses[] = "vluchtnummer LIKE ?";
                            $parameters[] = '%' . $_POST['vluchtnummer'] . '%';
                        }
                        if (!empty($_POST['bestemming'])) {
                            $whereClauses[] = "bestemming LIKE ?";
                            $parameters[] = '%' . $_POST['bestemming'] . '%';
                        }
                        if (!empty($_POST['vertrektijd'])) {
                            $whereClauses[] = "vertrektijd LIKE ?";
                            $parameters[] = '%' . $_POST['vertrektijd'] . '%';
                        }
                        if (!empty($_POST['gate'])) {
                            $whereClauses[] = "gatecode LIKE ?";
                            $parameters[] = '%' . $_POST['gate'] . '%';
                        }
                        if (!empty($_POST['maatschappij'])) {
                            $whereClauses[] = "maatschappijcode LIKE ?";
                            $parameters[] = '%' . $_POST['maatschappij'] . '%';
                        }
                    }

                    if (!empty($whereClauses)) {
                        $sql .= " WHERE " . implode(' AND ', $whereClauses);
                    }

                    $stmt = $verbinding->prepare($sql);
                    $stmt->execute($parameters);
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach($stmt->fetchAll() as $row) {
                        echo "<tr><td>" . $row["vluchtnummer"]. "</td><td>" . $row["bestemming"]. "</td><td>" . $row["vertrektijd"]. "</td><td>" . $row["gatecode"]. "</td><td>" . $row["maatschappijcode"]. "</td></tr>";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Gelre Airport</p>
    </footer>
</body>
</html>
