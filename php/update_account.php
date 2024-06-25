<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sessionEmail = $_SESSION['email'];
$name = $_POST['fullname'];
$postEmail = $_POST['email'];

if (!empty($_POST['password'])) {
    // Only hash and update the password if a new one is provided
    $password = $_POST['password'];
    $stmt = $conn->prepare("UPDATE userinfo SET name=?, email=?, password=? WHERE email=?");
    $stmt->bind_param("ssss", $name, $postEmail, $password, $sessionEmail);
} else {
    // If no new password is provided, update other details without changing the password
    $stmt = $conn->prepare("UPDATE userinfo SET name=?, email=? WHERE email=?");
    $stmt->bind_param("sss", $name, $postEmail, $sessionEmail);
}

if ($stmt->execute()) {
    $_SESSION['email'] = $postEmail;
    
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'message' => 'Details updated successfully',
        'name' => $name,
        'email' => $postEmail
    ]);
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Error updating record: ' . $conn->error
    ]);
}
$stmt->close();
$conn->close();
?>