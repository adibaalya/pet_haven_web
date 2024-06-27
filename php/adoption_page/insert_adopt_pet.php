<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array('status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error)));
}

// Set parameters
$email = $_POST['email'];
$petId = $_POST['petId'];
$status = 'pending';
$shelterId = $_POST['shelterId'];

// Check if the email has already adopted the pet with the same ID
$checkSql = "SELECT * FROM adoption WHERE email = ? AND petId = ?";
$checkStmt = $conn->prepare($checkSql);
if (!$checkStmt) {
    die(json_encode(array('status' => 'error', 'message' => 'Prepare failed: ' . $conn->error)));
}
$checkStmt->bind_param("si", $email, $petId);
$checkStmt->execute();
$result = $checkStmt->get_result();

if ($result->num_rows > 0) {
    // Email has already adopted the pet
    echo json_encode(array('status' => 'error', 'message' => 'You have already adopted this pet.'));
} else {
    // Proceed with the adoption
    $insertSql = "INSERT INTO adoption (email, petId, status, shelterId) VALUES (?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    if (!$insertStmt) {
        die(json_encode(array('status' => 'error', 'message' => 'Prepare failed: ' . $conn->error)));
    }
    $insertStmt->bind_param("sisi", $email, $petId, $status, $shelterId);

    if (!$insertStmt->execute()) {
        die(json_encode(array('status' => 'error', 'message' => 'Execute failed: ' . $insertStmt->error)));
    }

    echo json_encode(array('status' => 'success', 'message' => 'New record created successfully'));
    $insertStmt->close();
}

$checkStmt->close();
$conn->close();
?>
