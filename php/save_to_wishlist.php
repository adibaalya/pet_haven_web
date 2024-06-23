<?php
session_start();
include 'db_connect.php';

// Check if pet ID is provided
if (!isset($_POST['petId']) || empty($_POST['petId'])) {
    http_response_code(400);
    echo json_encode(['error' => 'No pet ID provided']);
    exit;
}

$petId = $_POST['petId'];

// Check if user is logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'You must be logged in to add a pet to your wishlist']);
    exit;
}

// Insert into wishlist table
$stmt = $pdo->prepare("INSERT INTO wishlist (pet_id, user_id) VALUES (:petId, :userId)");
$stmt->bindParam(':petId', $petId);
$stmt->bindParam(':userId', $_SESSION['user_id']);

try {
    $stmt->execute();
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit;
}

if ($stmt->rowCount() > 0) {
    http_response_code(201);
    echo json_encode(['success' => 'Pet added to wishlist successfully!']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error adding pet to wishlist']);
}