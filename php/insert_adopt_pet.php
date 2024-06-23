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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get posted values
$petId = $_POST['petId'];
$shelterId = $_POST['shelterId'];
$email = $_POST['email'];
$status = 'pending';

// Validate input data
if (empty($petId) || empty($shelterId) || empty($email)) {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid input data'));
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO adoption (petId, shelterId, email,status) VALUES (?, ?, ?,?)");
$stmt->bind_param("iiss", $petId, $shelterId, $email, $status);

// Execute
if (!$stmt->execute()) {
    echo json_encode(array('status' => 'error', 'message' => 'Execute failed: ' . $stmt->error));
    exit;
}

echo json_encode(array('status' => 'success', 'message' => 'New record created successfully'));

// Close connection
$stmt->close();
$conn->close();
?>