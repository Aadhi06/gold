<?php
// Database connection
$host = 'localhost';
$dbname = 'gold_buying';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch form submissions
$query = "SELECT * FROM gold_requests ORDER BY created_at DESC";
$statement = $pdo->query($query);
$requests = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Gold Buyers</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Panel</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="requests">
        <div class="container">
            <h2>Gold Requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gold Type</th>
                        <th>Weight (grams)</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($request['name']); ?></td>
                            <td><?php echo htmlspecialchars($request['email']); ?></td>
                            <td><?php echo htmlspecialchars($request['phone']); ?></td>
                            <td><?php echo htmlspecialchars($request['goldType']); ?></td>
                            <td><?php echo htmlspecialchars($request['weight']); ?></td>
                            <td><?php echo htmlspecialchars($request['message']); ?></td>
                            <td><?php echo htmlspecialchars($request['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Gold Buyers. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
