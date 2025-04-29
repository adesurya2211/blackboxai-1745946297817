<?php
// Database configuration
$host = 'localhost';
$dbname = 'rukun_tetangga';
$username = 'root';
$password = '';

// Create connection
try {
    // Use PDO with MySQL driver explicitly
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
