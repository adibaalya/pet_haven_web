<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Establish PDO connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    exit(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]));
}

// Check if all required POST parameters are provided
if (!isset($_POST['petId'], $_POST['shelterId'], $_POST['userEmail'])) {
    http_response_code(400); // Bad Request
    exit(json_encode(['status' => 'error', 'message' => 'Missing parameters']));
}

$petId = $_POST['petId'];
$shelterId = $_POST['shelterId'];
$userEmail = $_POST['userEmail'];

try {
    // Insert into wishlist table
    $stmt = $pdo->prepare('INSERT INTO wishlist (pet_id, shelter_id, user_email) VALUES (?, ?, ?)');
    $stmt->execute([$petId, $shelterId, $userEmail]);

    // Return success response
    echo json_encode(['status' => 'success', 'message' => 'Pet added to wishlist successfully']);
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    exit;
}
?>
