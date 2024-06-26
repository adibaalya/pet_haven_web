<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email']; // Retrieve email from POST data
$petId = $_POST['petId'];
$shelterId = $_POST['shelterId'];
$action = $_POST['action'];
$adoptionDate = $_POST['adoptionDate'];

$response = ['success' => false];

if ($action === 'delete' || $action === 'cancel') {
    // Delete the adoption record from the database
    $sql = "DELETE FROM adoption WHERE email = ? AND petId = ? AND shelterId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $petId, $shelterId);
} else if ($action === 'approve') {
    // Update adoption status and adoption date
    $sql = "UPDATE adoption SET status = ?, `date` = ? WHERE email = ? AND petId = ? AND shelterId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $action, $adoptionDate, $email, $petId, $shelterId);
} else {
    // Update for other actions like 'pending'
    $sql = "UPDATE adoption SET status = ? WHERE email = ? AND petId = ? AND shelterId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $action, $email, $petId, $shelterId);
}

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    error_log("Error executing statement: " . $stmt->error); // Debugging line
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>