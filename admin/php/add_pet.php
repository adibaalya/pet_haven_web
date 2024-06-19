<?php
// Handle form submission and store data in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $name = $_POST['name'];
    $color = $_POST['color'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $shelter = $_POST['shelter'];
    $vaccinated = isset($_POST['vaccinated']) ? 1 : 0;
    $dewormed = isset($_POST['dewormed']) ? 1 : 0;
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $status = "available";

    $target_dir = "uploads/";
    $image1 = $target_dir . basename($_FILES["image1"]["name"]);
    $image2 = $target_dir . basename($_FILES["image2"]["name"]);
    $image3 = $target_dir . basename($_FILES["image3"]["name"]);

    move_uploaded_file($_FILES["image1"]["tmp_name"], $image1);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $image2);
    move_uploaded_file($_FILES["image3"]["tmp_name"], $image3);

    $sql = "INSERT INTO pet (name, color, type, breed, shelter, vaccinated, dewormed, age, image1, image2, image3, gender,status)
            VALUES ('$name', '$color', '$type', '$breed', '$shelter', '$vaccinated', '$dewormed', '$age', '$image1', '$image2', '$image3', '$gender','$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
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
    <link rel="stylesheet" href="../css/add_pet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/zG7K6fX8j1ChBQaLRY/N5S4lq1O0z0S8G2ng"
        crossorigin="anonymous"></script>
</head>

<body>
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
                    <a href="#" class="sidebar-link">
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
                            <a href="../php/admin_pets.php" class="active sidebar-link">List Pets</a>
                        </li>
                        <li class="sidebar-item">
                            <a style=" background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;" href="../php/add_pet.php" class="active sidebar-link">Add Pet</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Adoption Request</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="../php/shelterList.php" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Shelter</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span>Donate</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Add Pets</h3>
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <form action="add_animal.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" required>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="age">Age:</label>
                                            <input type="number" id="age" name="age" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender">Gender:</label>
                                            <select id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="type">Type:</label>
                                            <input type="text" id="type" name="type" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="breed">Breed:</label>
                                            <input type="text" id="breed" name="breed" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="shelter">Shelter:</label>
                                            <select id="shelter" name="shelter" required>
                                                <option value="">Select a Shelter</option>
                                                
                                                <?php
                                                /*
                                                // Handle form submission and store data in the database
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    //...
                                                }

                                                // Create connection
                                                $conn = new mysqli($servername, $username, $password, $dbname);

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                // Fetch shelter list
                                                $sql = "SELECT shelter_id, shelter_name FROM shelter";
                                                $result = $conn->query($sql);

                                                //...
                                                
                                                // Close connection
                                                $conn->close();
                                                */
                                                ?> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="color">Color:</label>
                                            <input type="text" id="color" name="color" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Vaccinated:</label>
                                            <div class="radio-group">
                                                <label class="radio-inline">
                                                    <input type="radio" id="vaccinated_yes" name="vaccinated" value="1"
                                                        required>
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="vaccinated_no" name="vaccinated" value="0"
                                                        required>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Dewormed:</label>
                                            <div class="radio-group">
                                                <label class="radio-inline">
                                                    <input type="radio" id="dewormed_yes" name="dewormed" value="1"
                                                        required>
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="dewormed_no" name="dewormed" value="0"
                                                        required>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Image fields -->
                                    <div class="form-group">
                                        <label for="image1">Image 1:</label>
                                        <input type="file" id="image1" name="image1" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image2">Image 2:</label>
                                        <input type="file" id="image2" name="image2" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image3">Image 3:</label>
                                        <input type="file" id="image3" name="image3" accept="image/*" required>
                                    </div>

                                    <button class="submit" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start " style="position: fixed;">
                            <a class="text-body-secondary" href=" #">
                                <strong>PET HAVEN</strong>
                            </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../javascript/sidebar.js"></script>
</body>

</html>