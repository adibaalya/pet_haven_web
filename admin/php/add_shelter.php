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
    // Collect form data
    $name = $_POST['name'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $workingHours = $_POST['workingHours'];
    $workingDay = $_POST['workingDay'];
    $description = $_POST['description'];
    $facebookLink = $_POST['facebookLink'];
    $area = $_POST['area'];

    // Handle image upload
    $logo = $_FILES['image1']['tmp_name'];
    $shelterImage = $_FILES['image2']['tmp_name'];

    // Read the file content into variables
    $logoContent = file_get_contents($logo);
    $shelterImageContent = file_get_contents($shelterImage);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO shelter (name, location, contact, workingHours, workingDay, description, imageLogo, imageDesc, link, area) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $location, $contact, $workingHours, $workingDay, $description, $logoContent, $shelterImageContent, $facebookLink, $area);

    // Execute the query
    if ($stmt->execute()) {
        echo "New shelter added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch shelter data
$sql = "SELECT * FROM shelter";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins Pets</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/add_shelter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/zG7K6fX8j1ChBQaLRY/N5S4lq1O0z0S8G2ng"
        crossorigin="anonymous"></script>
</head>

<body >
    <div class="wrapper">
    <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">PET HAVEN</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="../php/profile_admin.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fas fa-paw"></i>
                        <span>Pets</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style=" background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;" href="../php/admin_pets.php" class="active sidebar-link">List Pets</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/add_pet.php" class="sidebar-link">Add Pets</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/adoptionRequest.php" class="sidebar-link">Adoption Request</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                <a href="../php/shelterList.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-solid fa-house"></i>
                        <span>Shelter</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style=" background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;" href="../php/shelterList.php" class="active sidebar-link">List Shelter</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/add_shelter.php" class="sidebar-link">Add Shelter</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="../php/donationList.php" class="sidebar-link">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span>Donate</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="../../html/index.html" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Add Shelter</h3>
                        <div class="row">
                            <div class="col-12">
                                <form id="addShelterForm" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="location">Location:</label>
                                            <input type="text" id="location" name="location" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="contact">Contact:</label>
                                            <input type="text" id="contact" name="contact" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="workingHours">Working Hours:</label>
                                            <input type="text" id="workingHours" name="workingHours" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="workingDay">Working Day:</label>
                                            <input type="text" id="workingDay" name="workingDay" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="description">Description:</label>
                                            <input type="text" id="description" name="description" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="facebookLink">Facebook Link:</label>
                                            <input type="text" id="facebookLink" name="facebookLink" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="area">Area:</label>
                                            <input type="text" id="area" name="area" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Logo:</label>
                                        <input type="file" id="image1" name="image1" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image2">Shelter Image:</label>
                                        <input type="file" id="image2" name="image2" accept="image/*" required>
                                    </div>
                                    <button class="submit" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGz8z1HcHpXqb1V/6p9sub8I0Pf6hU+cKz6GK4h2vI2VH"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-pM3E6yfO9i8pAPM2Yo+5Ln0Md0Os2mA/+HzRbH2PvxdxE4u2N2GFnvynP0PRYRhp"
        crossorigin="anonymous"></script>
        <script src="../javascript/sidebar.js"></script>
</body>

</html>


