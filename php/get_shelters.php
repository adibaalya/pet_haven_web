<?php
// Database connection setup (similar to donate.php)

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "pethavenuser"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch shelters from the database
$sql = "SELECT id, name FROM shelter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $shelters = array();
    while ($row = $result->fetch_assoc()) {
        $shelters[] = $row;
    }
} else {
    $shelters = array(); // Empty array if no shelters found (optional)
}

// Close database connection
$conn->close();

// Output JSON response
echo json_encode($shelters);
?>
