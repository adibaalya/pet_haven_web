<?php
// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $isLoggedIn = true;
} else {
  $isLoggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/detail.css" />
  <link rel="stylesheet" href="../css/trailer.css">
  <script src="../javascript/detail.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?php echo $name; ?></title>
</head>

<body>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div id="trailer">
  </div>
  <script src="../javascript/trailer.js"></script>
  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/pets-haven-logo.png" width="50" height="50" alt="Pet Haven Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item ">
            <a class="nav-link" href="../html/index.html">HOME</a>
          </li>
          <li class="nav-item dropdown active">
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
            <a class="nav-link" href="#help">HELP</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="display: none;">
              ACCOUNT
            </a>
            <div class="dropdown-menu" aria-labelledby="accountDropdown">
              <a class="dropdown-item" href="account_page.html">PROFILE</a>
              <a class="dropdown-item" href="#" id="logoutButton">LOGOUT</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="loginButton" href="login_page.html" style="display: none;">LOGIN</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">LOGIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-4">
          <form action="../php/user.php" method="get">
            <div class="form-group" novalidate>
              <label for="email">EMAIL ADDRESS</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                name="email" required>
              <div class="invalid-feedback">
                Please provide your email.
              </div>
            </div>
            <div class="form-group">
              <label for="password">PASSWORD</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              <div class="invalid-feedback">
                Please provide your password.
              </div>
            </div>
            <div class="forgot-password">
              <a href="#">Forgot your password?</a>
            </div>
            <div class="button-group">
              <button type="submit" class="btn btn-login">LOGIN</button>
              <button type="button" class="btn btn-signup" data-dismiss="modal" data-toggle="modal"
                data-target="#signUpModal">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="toast position-fixed bottom-right-toast" id="loginSuccessToast" role="alert" aria-live="assertive"
    aria-atomic="true" data-delay="5000">
    <div class="toast-header">
      <i class="fas fa-check-circle text-success mr-2"></i>
      <strong class="mr-auto text-success">Login Success</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      You have logged in successfully.
    </div>
  </div>

  <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signUpModalLabel">SIGN UP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../php/user.php" method="post" novalidate>
            <div class="form-group">
              <label for="sign-up-name">NAME</label>
              <input type="text" class="form-control" id="sign-up-name" placeholder="Enter name" name="name" required>
              <div class="invalid-feedback">
                Please provide your name.
              </div>
            </div>
            <div class="form-group">
              <label for="sign-up-email">EMAIL ADDRESS</label>
              <input type="email" class="form-control" id="sign-up-email" placeholder="Enter email" name="email"
                required>
              <div class="invalid-feedback">
                Please provide your email.
              </div>
            </div>
            <div class="form-group">
              <label for="sign-up-password">PASSWORD</label>
              <input type="password" class="form-control" id="sign-up-password" placeholder="Password" name="password"
                required>
              <div class="invalid-feedback">
                Please provide your password.
              </div>
            </div>
            <div class="button-group">
              <button type="submit" class="btn btn-login">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <section id="detail-animal">
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

    // Fetch pet details based on ID from $_POST
    if (isset($_POST['ID'])) {
      $id = htmlspecialchars($_POST['ID']);  // Fetch ID from POST data
    
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


    <div class="container">
      <div class="row">
        <div class="about-col-1">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo $image1; ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo $image2; ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo $image3; ?>" alt="First slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
        <div class="about-col-2">
          <h2 class="animal-title"><?php echo $name; ?></h2>
          <div class="table">
            <table>
              <table>
                <tr>
                  <th>ANIMAL ID</th>
                  <td><?php echo $id; ?></td>
                </tr>
                <tr>
                  <th>BREED</th>
                  <td><?php echo $breed; ?></td>
                </tr>
                <tr>
                  <th>GENDER</th>
                  <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                  <th>AGE</th>
                  <td><?php echo $age; ?></td>
                </tr>
                <tr>
                  <th>COLOR</th>
                  <td><?php echo $color; ?></td>
                </tr>
                <tr>
                  <th>VACCINATED</th>
                  <td><?php echo $vaccinated; ?></td>
                </tr>
                <tr>
                  <th>DEWORMED</th>
                  <td><?php echo $deworm; ?></td>
                </tr>
                <tr>
                  <th>SHELTER</th>
                  <td><?php echo $shelter; ?></td>
                </tr>
              </table>
          </div>
          <div class="button-container">
            <button id="open-popup" class="button" data-toggle="modal" data-target="#Adopt">ADOPT ME</button>
          </div>

          <div class="modal fade" id="Adopt" tabindex="-1" role="dialog" aria-labelledby="adopt" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title">Adopt <?php echo $name; ?> </h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body px-4">
                  <form id="adoption-form" method="post" enctype="multipart/form-data">
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email"><br>
                    <input type="checkbox" id="agree" name="agree">
                    <label for="agree">I agree to the terms and conditions:</label><br>

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" id="adopt-now">Adopt Now</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <script>
            document.getElementById("adopt-now").addEventListener("click", function () {
              console.log("Adopt Now button clicked!");
              if (document.getElementById("agree").checked) {
                var petId = <?php echo isset($id) ? $id : 'null'; ?>;
                var shelterId = <?php echo isset($shelterId) ? $shelterId : 'null'; ?>;
                var name = document.getElementById("email").value;

                console.log("petId:", petId);
                console.log("shelterId:", shelterId);
                console.log("email:", email);

                if (petId === null || shelterId === null) {
                  console.error("PHP variables not set!");
                  return;
                }

                // Send AJAX request to PHP script
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'insert_adopt_pet.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                  if (xhr.status === 200) {
                    alert("Thank you for your interest in adopting Simba, " + name + "!");
                    // Make sure jQuery is loaded before using it
                    if (typeof jQuery !== 'undefined') {
                      $('#Adopt').modal('hide');
                    } else {
                      console.error("jQuery not loaded!");
                    }
                  } else {
                    alert("Error adopting pet: " + xhr.statusText);
                  }
                };
                xhr.send('petId=' + petId + '&shelterId=' + shelterId + '&name=' + name);
              } else {
                alert("Please indicate that you agree to the terms and conditions.");
              }
            });
          </script>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section id="suggestion">
    <div class="text">
      <h3>YOU MAY ALSO LIKE</h3>
    </div>
    <div class="container-wrapper">
      <div class="container">
        <?php
        session_start();
        include 'db_connect.php'; // Make sure db_connect.php includes your database connection logic
        
        // Database configuration (move this to db_connect.php if not already there)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pethavenuser";

        // Establish database connection (use try-catch block for error handling)
        try {
          $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          die("Error: Could not connect to the database. " . $e->getMessage());
        }

        // Fetch all pets from the database
        $stmt = $pdo->query("SELECT p.id, p.name, p.age, p.breed, p.gender, p.color, p.vaccinated, p.status, p.deworm, p.type, p.image1 as image, s.name as shelter FROM pet p LEFT JOIN shelter s ON p.shelterId = s.id");
        $all_pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Store the ID of the current pet being viewed or adopted
        if (isset($_POST['adopt_pet_id'])) {
          $_SESSION['current_pet_id'] = $_POST['adopt_pet_id'];
        }

        // Shuffle the pets array (if needed)
        shuffle($all_pets);

        // Display the pets
        $pet_count = 0;
        foreach ($all_pets as $pet) {
          if ($pet['id'] != $_SESSION['viewed_pets'][] = $id) {
            if ($pet_count < 8) {
              echo '<div class="card" data-id="' . htmlspecialchars($pet['id']) . '">';
              echo '<img src="data:image/jpeg;base64,' . htmlspecialchars(base64_encode($pet['image'])) . '" alt="Image of ' . htmlspecialchars($pet['name']) . '">';
              echo '<h2>' . htmlspecialchars($pet['name']) . '</h2>';
              echo '<p class="shelter"> ' . htmlspecialchars($pet['shelter']) . '</p>';
              echo '<form action="detail_animal.php" method="POST">';
              echo '<input type="hidden" name="ID" value="' . htmlspecialchars($pet['id']) . '">';
              // Add more hidden fields if necessary
              echo '<button type="submit" class="detail-button">ADOPT</button>';
              echo '</form>';

              echo '<button class="heart-button" onclick="addToWishlist(' . htmlspecialchars(json_encode($pet['id'])) . ', this)" >
        <i class="fas fa-heart"></i>
        </button>';
              echo '</div>';
            }
          }
        }

        // Close the database connection
        $pdo = null;
        ?>



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
        <hr class="footer-navigation bg-white" />
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

    <script src="../javascript/nav-bar-account.js"></script>
    <script src="../javascript/authentication.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </section>
</body>

</html>