<?php
// Example fetch_pet_detail.php script

// Assuming you have a database connection established
// Replace with your actual database connection code
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pet details based on IDs from GET parameter
$petIds = $_GET['id']; // Ensure to validate and sanitize input
$petIdsArray = explode(',', $petIds); // Split comma-separated IDs into an array

// Prepare SQL statement (example query, adjust based on your database schema)
$sql = "SELECT id, name, image, shelter FROM pets WHERE id IN (" . implode(',', $petIdsArray) . ")";

$result = $conn->query($sql);

if ($result) {
    $petDetails = array();
    while ($row = $result->fetch_assoc()) {
        // Build array of pet details
        $petDetails[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image'],
            'shelter' => $row['shelter']
        );
    }
    // Return JSON-encoded array of pet details
    echo json_encode($petDetails);
} else {
    // Handle database query error
    http_response_code(500); // Internal Server Error
    echo json_encode(array('error' => 'Database query error: ' . $conn->error));
}

// Close database connection
$conn->close();
?>
