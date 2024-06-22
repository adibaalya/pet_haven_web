<?php
// update_status.php

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
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

    // Get the POST parameters
    $email = $_POST['email'];
    $petId = $_POST['petId'];
    $shelterId = $_POST['shelterId'];
    $newStatus = $_POST['newStatus'];

    // Prepare the SQL statement to update the status
    $sql = "UPDATE adoption SET status=? WHERE email=? AND petId=? AND shelterId=?";

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $newStatus, $email, $petId, $shelterId);

    // Execute the update statement
    if ($stmt->execute()) {
        // If update is successful, send JSON response with success true
        echo json_encode(['success' => true]);
    } else {
        // If update fails, send JSON response with success false
        echo json_encode(['success' => false]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If request method is not POST, return HTTP status 405 Method Not Allowed
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
