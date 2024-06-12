<?php
session_start();



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pethavenuser";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$name = $_POST['fullname'];
$email = $_POST['email'];
$password = ($_POST['password']);

$sql = "UPDATE userinfo SET name='$name', email='$email', password='$password' WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['email'] = $email; 
    echo "<script>
        alert('Details updated successfully');
        window.location.href = '../html/account_page.html';
    </script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

