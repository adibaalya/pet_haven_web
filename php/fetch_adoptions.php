<?php
header('Content-Type: application/json');
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

if (!isset($_SESSION['email'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Forbidden']);
    exit();
}

$email = $_SESSION['email'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

$sql = "SELECT p.name AS petName, s.name AS shelterName, a.status, a.email, a.petId AS petId, a.shelterId AS shelterId, a.date AS adoptionDate
        FROM adoption a
        JOIN pet p ON a.petId = p.id
        JOIN shelter s ON a.shelterId = s.id
        WHERE a.email = ?";
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