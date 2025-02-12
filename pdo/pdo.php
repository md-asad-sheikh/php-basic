<?php
// 1️⃣ Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2️⃣ Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email, created_at) VALUES (:name, :email, :created_at)");

// 3️⃣ Execute the statement with values
$stmt->execute([
    ":name" => "John Doe",
    ":email" => "john@example.com",
    ":created_at" => date("Y-m-d H:i:s") // Current timestamp
]);

echo "✅ Data inserted successfully!";
