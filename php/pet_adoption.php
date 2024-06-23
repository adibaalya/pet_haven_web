<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Handle form submission if POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $petId = $_POST['pet-id'];
  $shelterId = $_POST['shelter-id'];
  $status = 'pending'; // Default status for new adoption requests

  // Prepare SQL statement to insert data into 'adoption' table
  $sql = "INSERT INTO adoption (email, petId, shelterId, status)
          VALUES (?,?,?,?)";
  
  // Use prepared statement to prevent SQL injection
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $email, $petId, $shelterId, $status);

  // Execute the statement
  if ($stmt->execute()) {
    // Success response
    $response = array("status" => "success", "message" => "Adoption request submitted successfully!");
    echo json_encode($response);
  } else {
    // Error response
    $response = array("status" => "error", "message" => "Error: ". $conn->error);
    echo json_encode($response);
  }

  // Close statement and database connection
  $stmt->close();
  $conn->close();
} else {
  // Handle invalid request method
  http_response_code(405); // Method Not Allowed
  echo json_encode(array("status" => "error", "message" => "Method Not Allowed"));
}
?>