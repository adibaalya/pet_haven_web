<?php
session_start();
include 'db_connect.php';

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

// Establish database connection
try {
  $pdo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
} catch (PDOException $e) {
  die("Error: Could not connect to the database. " . $e->getMessage());
}

// Query to fetch pets data including BLOBs
$sql = "SELECT p.id, p.name, p.age, p.breed, p.gender, p.color, p.vaccinated, p.status, p.deworm, p.type, p.image1 as image, s.name as shelter 
FROM pet p 
LEFT JOIN shelter s ON p.shelterId = s.id";

$whereClause = [];

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $whereClause[] = "(p.name LIKE '%$keyword%' OR p.type LIKE '%$keyword%' OR p.breed LIKE '%$keyword%')";
}
if (isset($_GET['type']) && $_GET['type'] != 'Select Type') {
  $type = $_GET['type'];
  $whereClause[] = "p.type = '$type'";
}
if (isset($_GET['gender']) && $_GET['gender'] != 'Select Gender') {
  $gender = $_GET['gender'];
  $whereClause[] = "p.gender = '$gender'";
}
if (isset($_GET['location']) && $_GET['location'] != 'Select Location') {
  $location = $_GET['location'];
  $whereClause[] = "location = '$location'";
}
if (isset($_GET['shelter']) && $_GET['shelter'] != '') {
  $shelter = $_GET['shelter'];
  $whereClause[] = "p.shelterId = '$shelter'";
}

if (!empty($whereClause)) {
  $sql .= " WHERE " . implode(" AND ", $whereClause);
}
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $pets; 
?>
