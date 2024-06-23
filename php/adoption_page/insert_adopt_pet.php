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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO adoption (email, petId, status, shelterId) 
VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die(json_encode(array('status' => 'error', 'message' => 'Prepare failed: ' . $conn->error)));
}
$stmt->bind_param("sisi",$email,$petId, $status ,$shelterId);

// Set parameters and execute
$email = $_POST['email'];
$petId = $_POST['petId'];
$status = 'pending';
$shelterId = $_POST['shelterId'];

if (!$stmt->execute()) {
    die(json_encode(array('status' => 'error', 'message' => 'Execute failed: ' . $stmt->error)));
}

echo json_encode(array('status' => 'success', 'message' => 'New record created successfully'));



$stmt->close();
$conn->close();
?>
