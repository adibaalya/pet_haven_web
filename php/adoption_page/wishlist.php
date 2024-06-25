<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
} catch (PDOException $e) {
    die("Error: Could not connect to the database. " . $e->getMessage());
}

// Assuming user_id is stored in session
$userId = $_SESSION['email']; // Adjust according to your session management

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $petId = $_POST['pet_id'];

    if ($action === 'add') {
        // Add to wishlist
        $stmt = $pdo->prepare("INSERT INTO wishlist (email, pet_id) VALUES (:email, :pet_id) ON DUPLICATE KEY UPDATE email=email");
        $stmt->bindParam(':email', $userId);
        $stmt->bindParam(':pet_id', $petId);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Pet added to wishlist']);
    } elseif ($action === 'remove') {
        // Remove from wishlist
        $stmt = $pdo->prepare("DELETE FROM wishlist WHERE email = :email AND pet_id = :pet_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':pet_id', $petId);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Pet removed from wishlist']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch wishlist
    $stmt = $pdo->prepare("SELECT p.id, p.name, p.shelter, p.status, p.image1 as image FROM wishlist w JOIN pet p ON w.pet_id = p.id WHERE w.user_id = :user_id");
    $stmt->bindParam(':email', $userId);
    $stmt->execute();
    $wishlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($wishlist);
}
?>
