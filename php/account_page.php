<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/account.css">
  <link rel="stylesheet" href="../css/trailers.css">
  <link rel="stylesheet" href="../css/Badge.css">
  <title>Account</title>
  
</head>

<body>
  <div id="trailer"></div>
  <script src="../javascript/trailer.js"></script>

  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
      <img src="../assets/images/logo.png" width="60" height="60" alt="Pet Haven Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../html/index.html">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="../php/adopt_page.php" id="adoptDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ADOPT
            </a>
            <div class="dropdown-menu" aria-labelledby="adoptDropdown">
              <a class="dropdown-item" href="../php/adopt_page.php">Dogs</a>
              <a class="dropdown-item" href="../php/adopt_page.php">Cats</a>
              <a class="dropdown-item" href="../php/adopt_page.php">Rabbit</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/donate.html">DONATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/shelter.php">SHELTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/index.html#help">HELP</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="account_page.html">ACCOUNT</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>

  <section id="body">
    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#adoptions">Adoption</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#donations">Donation</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="profile">
        <div class="detail-container">
          <div class="profile-image">
            <img src="https://i.pinimg.com/564x/71/b3/1c/71b31c8f817a111b4d73e8d555038021.jpg" alt="profile image">
          </div>
          <h2 id="fullnameDisplay" class="fullnameDisplay">Name</h2>
          <h6>Pet Haven Member</h6>
          <div class="container-1">
            <h4>Update Account Details</h4>
            <form id="account-form" action="../php/get_account_details.php" method="POST">
              <label for="fullname">Full Name</label>
              <input type="text" id="name" name="fullname" placeholder="Name">

              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Email address">

              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="******">

              <input class="submitbtn" id="submit" type="submit" value="Update Details">
            </form>
          </div>
        </div>
      </div>


      <div class="tab-pane fade" id="adoptions">
        <div class="detail-container">
          <h2 class="title">Adoption</h2>
          <div class="container table-container">
    <table id="adoptionTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Pet ID</th>
                <th>Shelter ID</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pethavenuser";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch adoption data from database
            $sql = "SELECT petId, shelterId, status, email FROM adoption";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['petId'] . "</td>";
                    echo "<td>" . $row['shelterId'] . "</td>";
                    echo "<td class='status " . strtolower($row['status']) . "'>" . ucfirst($row['status']);
                    if ($row['status'] == 'approve') {
                        // Display date picker button if status is 'approve'
                        echo "<button class='btn btn-sm btn-outline-primary pick-date-btn' data-email='" . $row['email'] . "' data-petid='" . $row['petId'] . "' data-shelterid='" . $row['shelterId'] . "'>Pick Date</button>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No adoption records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
        </div>
      </div>
      <div class="tab-pane fade" id="donations">
        <div class="detail-container">
          
          <div class="container mt-5 mb-5 donation">
            <h2 class="text-center mb-4">Thank You for Your Support!</h2>
            <p class="text-center mb-4">
              We appreciate your incredible generosity. As a token of our gratitude, here are your donor badges:
            </p>

            <!-- Display collected points -->
            <div class="container mb-4 points-container">
    <p class="text-center points-label">Points Collected: <span id="points">Loading...</span></p>
</div>


            <!-- Badge container -->
          <div class="container mb-4">
            <div class="badge-container">
              <!-- Badges will be dynamically loaded here -->
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="footer">
    <footer class="bg-dark text-white py-4 mt-5">
      <div class="container">
        <div class="row">
          <div class="contact-info col-md-6">
            <h5 class="mb-3">Pet Haven</h5>
            <p>1234 Pet Street, Pet City, 56789</p>
            <p>Email: info@petshelter.com | Phone: 123-456-7890</p>
          </div>
          <div class="col-md-6 text-md-right">
            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <hr class="footer-navigation bg-white">
        <div class="row">
          <div class="col-md-6">
            <nav>
              <a href="#home" class="text-white me-2">HOME</a> |
              <a href="#about" class="text-white me-2">ADOPT</a> |
              <a href="#contact" class="text-white me-2">DONATION</a> |
              <a href="#contact" class="text-white me-2">SHELTER</a> |
              <a href="#contact" class="text-white me-2">HELP</a> |
              <a href="#contact" class="text-white">LOGIN</a>
            </nav>
          </div>
          <div class="col-md-6 text-md-right">
            <p>© 2024 Pet Haven. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../javascript/account.js"></script>
  <script src="../javascript/adopt_js.js"></script>
  <script src="../javascript/Badge.js"></script>
</body>
</html>
