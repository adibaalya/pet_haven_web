<?php
session_start();

// Replace with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pethavenuser';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: index.html");
    exit;
}

// Fetch donations for the logged-in user
$email = $_SESSION['email'];
$sql = "SELECT * FROM donation WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$donations = $result->fetch_all(MYSQLI_ASSOC);

// Calculate points based on donations
$points = count($donations) * 5;

// Determine badges based on points
$badge1_given = ($points >= 10) ? true : false;
$badge2_given = ($points >= 20) ? true : false;
$badge3_given = ($points >= 30) ? true : false;

// Prepare JSON response
$response = [
    'points' => $points,
    'badge1_given' => $badge1_given,
    'badge2_given' => $badge2_given,
    'badge3_given' => $badge3_given
];

header('Content-Type: application/json');
echo json_encode($response);

$stmt->close();
$conn->close();
?>
