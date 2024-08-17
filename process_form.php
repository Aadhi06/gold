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

// Insert form data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $goldType = $_POST['goldType'];
    $weight = $_POST['weight'];
    $message = $_POST['message'];

    $sql = "INSERT INTO gold_requests (name, email, phone, goldType, weight, message, created_at)
            VALUES (:name, :email, :phone, :goldType, :weight, :message, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'goldType' => $goldType,
        'weight' => $weight,
        'message' => $message
    ]);

    header("Location: we-buy-gold.html?success=1");
    exit();
}
?>
