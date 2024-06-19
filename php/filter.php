<?php
// filter.php - This file handles the form submission and database querying

// Validate and sanitize inputs (handle XSS and SQL injection)
function sanitize($input) {
    return htmlspecialchars(strip_tags($input));
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";
// Establish database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Prepare SQL statement
$sql = "SELECT * FROM pet WHERE 1";

// Handle filter conditions
if (!empty($_POST['type'])) {
    $types = array_map('sanitize', $_POST['type']);
    $sql .= " AND type IN ('" . implode("','", $types) . "')";
}

if (!empty($_POST['color'])) {
    $colors = array_map('sanitize', $_POST['color']);
    $sql .= " AND color IN ('" . implode("','", $colors) . "')";
}

if (!empty($_POST['breed']) && $_POST['breed'] !== 'Select Breed') {
    $breed = sanitize($_POST['breed']);
    $sql .= " AND breed = '$breed'";
}

if (!empty($_POST['location']) && $_POST['location'] !== 'Select Location') {
    $location = sanitize($_POST['location']);
    $sql .= " AND location = '$location'";
}

// Execute SQL query
try {
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Display results
if ($results && count($results) > 0) {
    foreach ($results as $row) {
        echo "<p>Name: " . htmlspecialchars($row['name']) . "</p>";
        echo "<p>Color: " . htmlspecialchars($row['color']) . "</p>";
        // Display other pet information as needed
    }
} else {
    echo "No pets found matching the selected criteria.";
}

// Close database connection
$pdo = null;
?>
