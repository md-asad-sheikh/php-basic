<?php
require_once __DIR__ . "/config.php";
$create_msg_table_sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    details TEXT NOT NULL,
    `from` VARCHAR(255) NOT NULL,
    `to` VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

$pdo->exec($create_msg_table_sql);


try {
    // Prepared statement to insert special characters and emojis
    $sql = "INSERT INTO messages (details, `from`, `to`, created_at) VALUES (:details, :from, :to, :created_at)";
    $stmt = $pdo->prepare($sql);

    // Sample data containing special characters, symbols, and emojis
    $messages = [
        ['details' => 'Hello, how are you? 😊', 'from' => 'Alice', 'to' => 'Bob', 'created_at' => date('Y-m-d H:i:s')],
        ['details' => 'This is a test message! @#$%^&*()', 'from' => 'Charlie', 'to' => 'David', 'created_at' => date('Y-m-d H:i:s')],
        ['details' => '🔥💯✔️🚀 Emoticons in MySQL!', 'from' => 'EmojiUser', 'to' => 'Everyone', 'created_at' => date('Y-m-d H:i:s')],
        ['details' => '数学的表达式: ∑ (1/n²) = π²/6', 'from' => 'MathBot', 'to' => 'Student', 'created_at' => date('Y-m-d H:i:s')],
        ['details' => 'Japanese: こんにちは、世界！', 'from' => 'JapanUser', 'to' => 'World', 'created_at' => date('Y-m-d H:i:s')],
        ['details' => 'Arabic: السلام عليكم', 'from' => 'ArabUser', 'to' => 'All', 'created_at' => date('Y-m-d H:i:s')]
    ];

    // Insert each message into the database
    foreach ($messages as $msg) {
        $stmt->execute([
            ':details' => $msg['details'],
            ':from' => $msg['from'],
            ':to' => $msg['to'],
            ':created_at' => $msg['created_at']
        ]);
    }

    echo "Messages inserted successfully with special characters and emojis.";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
