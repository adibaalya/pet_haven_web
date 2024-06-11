<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$email = $_SESSION['email'];

if (!isset($email)) {
    die(json_encode(["error" => "Session email not set"]));
}

$sql = "SELECT * FROM userinfo WHERE email='$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];

    echo json_encode([
        "name" => $name,
        "email" => $email,
        "password" => $password
    ]);
} else {
    echo json_encode(["error" => "User not found."]);
}

$conn->close();
?>
