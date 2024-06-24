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
    header("Location: ../html/index.html");
    exit;
}

// Fetch donations for the logged-in user
$email = $_SESSION['email'];
$sql = "SELECT donationType FROM donation WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Initialize points and category counters
$points = 0;
$foodAndSuppliesCount = 0;
$medicalCareCount = 0;
$shelterUpkeepCount = 0;
$adoptionServicesCount = 0;

// Count donations and categorize them
while ($row = $result->fetch_assoc()) {
    switch ($row['donationType']) {
        case 'food-supplies':
            $points += 5;
            $foodAndSuppliesCount++;
            break;
        case 'medical-care':
            $points += 5;
            $medicalCareCount++;
            break;
        case 'shelter-upkeep':
            $points += 5;
            $shelterUpkeepCount++;
            break;
        case 'adoption-services':
            $points += 5;
            $adoptionServicesCount++;
            break;
        default:
            // Handle other types of donations if needed
            break;
    }
}

// Determine badges based on points and category counts
$badge1_given = ($points >= 5);
$badge2_given = ($points >= 100);
$foodBadge_given = ($foodAndSuppliesCount * 5 >= 15);
$medicalBadge_given = ($medicalCareCount * 5 >= 15);
$shelterBadge_given = ($shelterUpkeepCount * 5 >= 15);
$adoptionBadge_given = ($adoptionServicesCount * 5 >= 15);

// Prepare JSON response
$response = [
    'points' => $points,
    'badge1_given' => $badge1_given,
    'badge2_given' => $badge2_given,
    'foodBadge_given' => $foodBadge_given,
    'medicalBadge_given' => $medicalBadge_given,
    'shelterBadge_given' => $shelterBadge_given,
    'adoptionBadge_given' => $adoptionBadge_given
];

header('Content-Type: application/json');
echo json_encode($response);

$stmt->close();
$conn->close();
?>