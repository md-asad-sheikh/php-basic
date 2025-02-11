<?php
require_once __DIR__ . "/config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $details = trim($_POST['description']);

    if (!empty($details)) {
        try {
            $from = 'Asad';
            $to = 'Sujat';
            $created_at = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare("INSERT INTO messages (details, `from`, `to`, created_at) VALUES (:details, :from, :to, :created_at)");
            $stmt->bindParam(':details', $details, PDO::PARAM_STR);
            $stmt->bindParam(':from', $from, PDO::PARAM_STR);
            $stmt->bindParam(':to', $to, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->execute();

            echo "Details saved successfully!";
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Description cannot be empty!";
    }
}
