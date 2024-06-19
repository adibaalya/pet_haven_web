<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $donationType = $_POST['donation-type'];
    $petShelter = $_POST['pet-shelter']; 
    $donationAmount = $_POST['donation-amount'];

   
    $uploadDir = 'uploads/'; // Directory where uploaded files will be saved
    $proofOfPayment = $uploadDir . basename($_FILES['proof-of-payment']['name']); // Path to save the uploaded file

    if (move_uploaded_file($_FILES['proof-of-payment']['tmp_name'], $proofOfPayment)) {
    
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "pethavenuser"; 

       
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into 'donation' table
        $sql = "INSERT INTO donation (name,email,donationType,shelterId,amount,proof)
                VALUES (?, ?, ?, ?, ?, ?)";
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssid", $name, $email, $donationType, $petShelter, $donationAmount, $proofOfPayment);

        // Execute the statement
        if ($stmt->execute()) {
            // Success response (you can customize this response as needed)
            $response = array("status" => "success", "message" => "Donation submitted successfully!");
            echo json_encode($response);
        } else {
            // Error response (you can customize this response as needed)
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
    // Handle invalid request method (if needed)
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("status" => "error", "message" => "Method Not Allowed"));
}

?>
