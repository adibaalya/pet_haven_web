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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM userinfo WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Error: Email already exists.');
            window.location.href = '../html/index.html';
        </script>";
    } else {
        $sql = "INSERT INTO userinfo (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email; 
            echo "<script>
                alert('New record created successfully');
                window.location.href = '../html/account_page.html';
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

    if (strpos($email, '@admin.com.my') !== false) {
        $sql = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<script>
                alert('Admin login successful');
                window.location.href = '../admin/php/admin_pets.php';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Invalid admin email or password');
                window.location.href = '../html/index.html';
            </script>";
            exit();
        }
    }

    $sql = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email; 
        $redirect_url = $_SERVER['HTTP_REFERER'];
        echo "<script>
            localStorage.setItem('isLoggedIn', 'true');
            window.location.href = '../html/index.html';
        </script>";
        exit();
    } else {
        echo "<script>
            window.location.href = '../html/index.html';
        </script>";
    }
}

$conn->close();
?>