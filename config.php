<?php
// config.php: Database configuration

$host = 'localhost';
$dbname = 'demo_db';
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$port = '3307';

try {
    // Correct DSN with port included
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
