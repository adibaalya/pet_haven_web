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

// Assuming email is stored in session
$email = $_SESSION['email']; // Adjust according to your session management

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $petId = $_POST['pet_id'];
    $shelterId = $_POST['shelter_id'];

    if ($action === 'add') {
        // Add to wishlist
        $stmt = $pdo->prepare("INSERT INTO wishlist (email, petId, shelterId) VALUES (:email, :petId, :shelterId) ON DUPLICATE KEY UPDATE email=email");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':petId', $petId);
        $stmt->bindParam(':shelterId', $shelterId);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Pet added to wishlist']);
    } elseif ($action === 'remove') {
        // Remove from wishlist
        $stmt = $pdo->prepare("DELETE FROM wishlist WHERE email = :email AND petId = :petId");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':petId', $petId);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Pet removed from wishlist']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch wishlist
    $stmt = $pdo->prepare("SELECT p.id, p.name, s.name as shelter, p.status, p.image1 as image FROM wishlist w JOIN pet p ON w.petId = p.id JOIN shelter s ON w.shelterId = s.id WHERE w.email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $wishlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($wishlist);
}