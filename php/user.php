<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email already exists
    $sql = "SELECT * FROM userinfo WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Error: Email already exists.');
            window.location.href = '../html/index.html';
        </script>";
    } else {
        // Email does not exist, proceed with insert
        $sql = "INSERT INTO userinfo (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('New record created successfully');
                window.location.href = '../html/index.html';
            </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_GET["email"];
    $password = $_GET["password"];
   

    if ($email === 'admin1@admin.com.my' and $password== 'kerjakumpulan4') {
        echo "<script>
            alert('Admin login successful');
            window.location.href = 'account_page2.html';
        </script>";
        exit();
    }

    $sql = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('User login successful');
            window.location.href = '../html/account_page.html';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Invalid email or password');
            window.location.href = '../html/index.html';
        </script>";
    }
}

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $email=$_GET["email"];
    $password=$_GET["password"];
    $name=$_GET["name"];

    $sql="SELECT * from userinfo where email='$email' AND password='$password' AND name='$name'";

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Login successful');
            window.location.href = 'account_page.php';
        </script>";
        exit();
    }
        else {
            echo "<script>
                alert('Invalid email or password');
                window.location.href = '../html/index.html';
            </script>";
        }
}


$conn->close();
?>

