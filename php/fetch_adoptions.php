<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('HTTP/1.1 403 Forbidden');
    die();
}

$email = $_SESSION['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch adoption data for the logged-in user
$sql = "SELECT petId, shelterId, status, date FROM adoption WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$adoptions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $adoptions[] = $row;
    }
}

$stmt->close();
$conn->close();

echo json_encode($adoptions);
?>