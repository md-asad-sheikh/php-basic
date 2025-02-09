<?php
function connectDatabase()
{
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "php_basic";

    try {
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);
    } catch (PDOException $e) {
        die("Database connection error: " . $e->getMessage());
    }
}

$pdo = connectDatabase();
