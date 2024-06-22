<?php
session_start(); // Ensure session is started

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sessionEmail = $_SESSION['email']; // Use a different variable for session email
$name = $_POST['fullname'];
$postEmail = $_POST['email']; // Use a different variable for posted email
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("UPDATE userinfo SET name=?, email=?, password=? WHERE email=?");
$stmt->bind_param("ssss", $name, $postEmail, $hashedPassword, $sessionEmail);

if ($stmt->execute()) {
    $_SESSION['email'] = $postEmail; // Update session email if email was changed
    
    // Instead of using a script for redirection, send a JSON response
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'message' => 'Details updated successfully',
        'name' => $name,
        'email' => $postEmail
    ]);
} else {
    // Send a JSON response on failure
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Error updating record: ' . $conn->error
    ]);
}

$stmt->close();
$conn->close();