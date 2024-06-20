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
    <link rel="stylesheet" href="../css/shelterList.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/zG7K6fX8j1ChBQaLRY/N5S4lq1O0z0S8G2ng"
        crossorigin="anonymous"></script>
        <style>

    th, td {
        text-align: center; /* Center-align text in table cells */
    }

    th {
        position: relative; /* Ensure position relative for arrow positioning */
    }

    .icon-arrow {
        position: absolute;
        margin-left: 5px; /* Adjust as needed to position the arrow */
    }
</style>

</head>

<body style="background-color:cornsilk;">
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
                            <a style=" background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;" href="../php/admin_pets.php" class="active sidebar-link">List Pets</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/add_pet.php" class="active sidebar-link">Add Pet</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/adoptionRequest.php" class="sidebar-link">Adoption Request</a>
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
                        <h3 class="fw-bold fs-4 my-3">PETS
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">in Charge of</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Nurul Saidahtul Fatiha Shaharudin </td>
                                            <td>approving the adoption request</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Nur Adiba Alya Shamsul Kamalrujan</td>

                                            <td>Updating the list of pets</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Nur Aisyah Abdullah</td>

                                            <td>Donation</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Shane John Kennedy</td>

                                            <td>contact form</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Name <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Age <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Breed <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Gender <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Color <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Vaccine <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Deworm <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Type <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Shelter <span class="icon-arrow">&UpArrow;</span></th>
                            </tr>
                        </thead>
                        <tbody>
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

                            $sql = "SELECT p.*, s.name AS shelter_name  
                FROM pet p  
                LEFT JOIN shelter s ON p.shelterId = s.id"; // Assuming shelter table has an 'id' and 'name' column
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['breed']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['color']) . "</td>";
                                    echo "<td>" . ($row['vaccinated'] == 1 ? 'Y' : 'N') . "</td>"; // Display 'Y' for 1 and 'N' for 0
                                    echo "<td>" . ($row['deworm'] == 1 ? 'Y' : 'N') . "</td>"; // Assuming deworm status similarly stored
                                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['shelter_name']) . "</td>"; // Display shelter name
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>0 results</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>

                </section>
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
    <script src="../javascript/shelter.js"></script>
</body>

</html>