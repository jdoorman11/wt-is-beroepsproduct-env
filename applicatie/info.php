<!DOCTYPE php>
<php lang="nl">
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
    <main>
        <h2>Vluchtinformatie</h2>
</form>

        <table>
            <thead>
                <tr>
                    <th>Vluchtnummer</th>
                    <th>Bestemming</th>
                    <th>Vertrektijd</th>
                    <th>Gate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'main.php'; 

                try {
                    $stmt = $verbinding->prepare("SELECT vluchtnummer, bestemming, vertrektijd, gatecode FROM vlucht");

                    $stmt->execute();

                    
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach($stmt->fetchAll() as $row) {
                        echo "<tr><td>" . $row["vluchtnummer"]. "</td><td>" . $row["bestemming"]. "</td><td>" . $row["vertrektijd"]. "</td><td>" . $row["gatecode"]. "</td></tr>";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null; 
                ?>
            </tbody>
        </table>
    </main>
        <p>&copy; 2024 Gelre Airport</p>
</body>
</php>
