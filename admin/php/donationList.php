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
    <link rel="stylesheet" href="../css/donationList.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/zG7K6fX8j1ChBQaLRY/N5S4lq1O0z0S8G2ng"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
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
                    <a href="../php/admin_pets.php" class="sidebar-link">
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
                            <a href="" class="active sidebar-link">List Pets</a>
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
                    <a href="../php/shelterList.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-solid fa-house"></i>
                        <span>Shelter</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style=" background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;" href="../php/shelterList.php" class="sidebar-link">List Shelter</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../php/add_shelter.php" class="sidebar-link">Add Shelter</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="../php/donationList.php" class="active sidebar-link">
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
                    <h1>Donation List</h1>
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
                    <table>
                        <thead>
                            <tr>
                                <th> Donor's Name<span class="icon-arrow">&UpArrow;</span></th>
                                <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Type Of Donation <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Shelter Name <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Amount of Donation<span class="icon-arrow">&UpArrow;</span></th>
                                <th> Proof Of Payment<span class="icon-arrow">&UpArrow;</span></th>
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

$sql = "SELECT d.name, d.email, d.donationType, s.name, d.amount, d.proof 
        FROM donation d 
        LEFT JOIN shelter s ON d.shelterId = s.id"; // Updated SQL query with LEFT JOIN

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['donationType']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>"; // Output shelterName instead of shelterId
        echo "<td>" . htmlspecialchars($row['amount']) . "</td>";

        // Check if proof exists
        if (!empty($row['proof'])) {
            $fileData = base64_encode($row['proof']); // Base64 encode the binary data
            $fileType = mime_content_type_from_binary($row['proof']); // Get MIME type from binary data

            echo '<td><a href="#" class="file-popup-link" data-mime="' . htmlspecialchars($fileType) . '" data-file="' . htmlspecialchars($fileData) . '">View File</a></td>';
        } else {
            echo '<td>No Proof</td>';
        }

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}
$conn->close();

function mime_content_type_from_binary($binaryData) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return $finfo->buffer($binaryData);
}
?>


                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9k9ybmHyAx6z4fl7IP8TTIQuP8lyxH7E9TkU7NS5nWDxHUAI2Q9H6tag" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.file-popup-link').magnificPopup({
                type: 'iframe',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                callbacks: {
                    elementParse: function (item) {
                        var mimeType = item.el.attr('data-mime');
                        var fileData = item.el.attr('data-file');
                        if (mimeType.startsWith('image')) {
                            item.type = 'image';
                            item.src = 'data:' + mimeType + ';base64,' + fileData;
                        } else if (mimeType === 'application/pdf') {
                            item.type = 'iframe';
                            item.src = 'data:' + mimeType + ';base64,' + fileData;
                        } else {
                            item.type = 'iframe';
                            item.src = 'data:' + mimeType + ';base64,' + fileData;
                        }
                    }
                }
            });
        });
    </script>
    <script src="../javascript/donation.js"></script>
</body>

</html>
