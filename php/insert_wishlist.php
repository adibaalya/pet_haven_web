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
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve shelters data
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

// Close the connection for now; reopen if needed later
$conn->close();

// Handle form submission if POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $donationType = $_POST['donation-type'];
    $petShelter = $_POST['pet-shelter']; 
    $donationAmount = $_POST['donation-amount'];

    if (is_uploaded_file($_FILES['proof-of-payment']['tmp_name'])) {
        $proofOfPayment = file_get_contents($_FILES['proof-of-payment']['tmp_name']); // Read the file content

        // Reopen connection to insert donation
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into 'donation' table
        $sql = "INSERT INTO donation (name, email, donationType, shelterId, amount, proof)
                VALUES (?, ?, ?, ?, ?, ?)";
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssis", $name, $email, $donationType, $petShelter, $donationAmount, $proofOfPayment);

        // Execute the statement
        if ($stmt->execute()) {
            // Success response
            $response = array("status" => "success", "message" => "Donation submitted successfully!");
            echo json_encode($response);
        } else {
            // Error response
            $response = array("status" => "error", "message" => "Error: " . $conn->error);
            echo json_encode($response);
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();

    } else {
        // File upload failed
        $response = array("status" => "error", "message" => "Error uploading file.");
        echo json_encode($response);
    }

} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("status" => "error", "message" => "Method Not Allowed"));
}
?>
