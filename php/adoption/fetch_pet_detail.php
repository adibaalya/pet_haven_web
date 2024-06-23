<?php
session_start();

// Include database connection file
require_once 'db_connect.php';

// Check if pet IDs are provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'No pet IDs provided']);
    exit;
}

// Get pet IDs from URL parameter
$petIds = explode(',', $_GET['id']);

// Create an array to store the pet details
$petDetails = [];

// Loop through each pet ID
foreach ($petIds as $petId) {
    // Prepare the SQL query
    $sql = "SELECT p.id, p.name, p.image1 as image FROM pet p WHERE p.id = :petId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':petId', $petId, PDO::PARAM_INT);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        exit;
    }

    // Fetch the pet details
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);

    // Add the pet details to the array
    if ($pet) {
        $petDetails[] = $pet;
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Pet not found']);
        exit;
    }
}

// Output the pet details in JSON format
header('Content-Type: application/json');
echo json_encode($petDetails);
?>