<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch adoption data from database
$sql = "SELECT petId, shelterId, status FROM adoption";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['petId'] . "</td>";
        echo "<td>" . $row['shelterId'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No adoption records found</td></tr>";
}

$conn->close();
