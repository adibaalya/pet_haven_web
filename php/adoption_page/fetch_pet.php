<?php
    session_start(); // Start session at the beginning
    
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

    // Fetch pet details based on ID from $_POST
    if (isset($_POST['ID'])) {
      $id = htmlspecialchars($_POST['ID']);  // Fetch ID from POST data
      $_SESSION['pet_id'] = $id;

      // Prepare SQL query (assuming 'pet' is your table name)
      $sql = "SELECT p.*, s.name as shelter FROM pet p LEFT JOIN shelter s ON p.shelterId = s.id WHERE p.id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);

      // Execute SQL query
      $stmt->execute();

      // Check for errors
      if ($stmt->error) {
        echo "SQL Error: " . $stmt->error;
      }

      // Get result set
      $result = $stmt->get_result();

      // Check if there are results
      if ($result->num_rows > 0) {
        // Fetch pet data
        $row = $result->fetch_assoc();
        $name = htmlspecialchars($row['name']);
        $breed = htmlspecialchars($row['breed']);
        $color = htmlspecialchars($row['color']);
        $vaccinated = ($row['vaccinated'] == 1 ? 'Yes' : 'No');
        $deworm = htmlspecialchars($row['deworm'] == 1 ? 'Yes' : 'No');
        $age = htmlspecialchars($row['age']);
        $gender = htmlspecialchars($row['gender']);
        $shelterId = htmlspecialchars($row['shelterId']);
        $shelter = htmlspecialchars($row['shelter']);

        // Fetch and encode images as base64
        $image1 = base64_encode($row['image1']);
        $image2 = base64_encode($row['image2']);
        $image3 = base64_encode($row['image3']);

        // Store viewed pets in session
        session_start();  // Start session if not already started
        $_SESSION['viewed_pets'][] = $id;
      } else {
        echo 'No pet found with ID ' . $id;
        exit;
      }

      $stmt->close();
    } else {
      echo 'No pet ID provided.';
      exit;
    }

    $conn->close();
    ?>