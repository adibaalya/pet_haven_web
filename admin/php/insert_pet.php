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
$stmt = $conn->prepare("INSERT INTO pet (name, age, breed, gender, color, vaccinated, status, deworm, type, image1, image2, image3, shelterId) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die(json_encode(array('status' => 'error', 'message' => 'Prepare failed: ' . $conn->error)));
}
$stmt->bind_param("sisssisssssss", $name, $age, $breed, $gender, $color, $vaccinated, $status, $deworm, $type, $image1, $image2, $image3, $shelterId);

// Set parameters and execute
$name = $_POST['name'];
$age = $_POST['age'];
$breed = $_POST['breed'];
$gender = $_POST['gender'];
$color = $_POST['color'];
$vaccinated = isset($_POST['vaccinated']) ? 1 : 0;
$status = "available";
$deworm = isset($_POST['dewormed']) ? 1 : 0;
$type = $_POST['type'];
$shelterId = $_POST['shelter'];

// Handle file uploads
$image1 = file_get_contents($_FILES["image1"]["tmp_name"]);
$image2 = file_get_contents($_FILES["image2"]["tmp_name"]);
$image3 = file_get_contents($_FILES["image3"]["tmp_name"]);

if (!$stmt->execute()) {
    die(json_encode(array('status' => 'error', 'message' => 'Execute failed: ' . $stmt->error)));
}

echo json_encode(array('status' => 'success', 'message' => 'New record created successfully'));

$stmt->close();
$conn->close();
?>
