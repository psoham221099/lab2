<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Database configuration
$host = "localhost";
$db_name = "lab2";
$username = "root";  // Change to your MySQL username
$password = "";      // Change to your MySQL password

try {
    // Connect to MySQL database
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all users
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return JSON response
    echo json_encode(["status" => "success", "users" => $users]);

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>