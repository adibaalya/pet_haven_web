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
    <link rel="stylesheet" href="../css/adoptionRequest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/zG7K6fX8j1ChBQaLRY/N5S4lq1O0z0S8G2ng"
        crossorigin="anonymous"></script>
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
                            <a href="../php/admin_pets.php" class="active sidebar-link">List Pets</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/add_pet.php" class="active sidebar-link">Add Pet</a>
                        </li>
                        <li class="sidebar-item">
                            <a style=" background-color: rgba(255, 255, 255, .075);
                                border-left: 3px solid #3b7ddd;" href="../php/adoptionRequest.php"
                                class="sidebar-link">Adoption Request</a>
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
                                border-left: 3px solid #3b7ddd;" href="../php/shelterList.php"
                                class="active sidebar-link">List Shelter</a>
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
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <main class="table" id="customers_table">
                <section class="table__header">
                    <h1>Adoption Request</h1>
                    <div class="input-group">
                        <input type="search" placeholder="Search Here ">
                    </div>
                    <div class="export__file">
                        <label for="export-file" class="export__file-btn" title="Export File">
                            <i class="fas fa-download"></i>
                        </label>
                        <input type="checkbox" id="export-file" style="display:none;">
                        <div class="export__file-options">
                            <label>Export As &nbsp; &#10140;</label>
                            <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                            <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                            <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                            <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                        </div>
                    </div>
                </section>
                <section class="table__body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Pet ID <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Shelter ID <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Date <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Action</th>
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

                            $sql = "SELECT * FROM adoption";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['petId']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['shelterId']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                    // Action button for status change
                                    echo "<td>
                                            <button class='btn btn-secondary dropdown-toggle status-change-btn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                Change Status
                                            </button>
                                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                <li><a class='dropdown-item status-change' href='#' data-email='" . htmlspecialchars($row['email']) . "' data-petId='" . htmlspecialchars($row['petId']) . "' data-shelterId='" . htmlspecialchars($row['shelterId']) . "' data-newstatus='pending'>Pending</a></li>
                                                <li><a class='dropdown-item status-change' href='#' data-email='" . htmlspecialchars($row['email']) . "' data-petId='" . htmlspecialchars($row['petId']) . "' data-shelterId='" . htmlspecialchars($row['shelterId']) . "' data-newstatus='reject'>Rejected</a></li>
                                                <li><a class='dropdown-item status-change' href='#' data-email='" . htmlspecialchars($row['email']) . "' data-petId='" . htmlspecialchars($row['petId']) . "' data-shelterId='" . htmlspecialchars($row['shelterId']) . "' data-newstatus='approve'>Approved</a><li>                                              
                                            </ul>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>0 results</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>
    
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <!-- Custom JavaScript for sidebar -->
        <script src="../javascript/sidebar.js"></script>
        <script src="../javascript/shelter.js"></script>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                // Function to handle status change
                $('.status-change').on('click', function (e) {
                    e.preventDefault();
                    var email = $(this).data('email');
                    var petId = $(this).data('petid');
                    var shelterId = $(this).data('shelterid');
                    var newStatus = $(this).data('newstatus');
    
                    // AJAX POST request to update_status.php
                    $.ajax({
                        type: 'POST',
                        url: 'update_status.php',
                        data: {
                            email: email,
                            petId: petId,
                            shelterId: shelterId,
                            newStatus: newStatus
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Reload the page after successful update
                                location.reload();
                            } else {
                                // Handle error scenario
                                alert('Failed to update status');
                            }
                        },
                        error: function () {
                            // Handle AJAX errors
                            alert('Failed to send request');
                        }
                    });
                });
            });
        </script>
    </body>
    
    </html>
    
