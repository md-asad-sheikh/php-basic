<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "php_basic";

try {
    // Connect to MySQL without specifying a database
    $pdo = new PDO("mysql:host=$host", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Create database with utf8mb4 encoding for emoji and multilingual support
    $sql = "CREATE DATABASE IF NOT EXISTS `$dbname` 
            CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

    // Execute the query
    $pdo->exec($sql);

    echo "Database '$dbname' created successfully!";
} catch (PDOException $e) {
    die("Database creation failed: " . $e->getMessage());
}
