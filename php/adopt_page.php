<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/adopt.css" />
  <link rel="stylesheet" href="../css/trailers.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

  <title>Adopt</title>
  <style>

  </style>
</head>

<body>
  <div id="trailer">
  </div>
  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/logo.png" width="60" height="60" alt="Pet Haven Logo" />
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
          <li class="nav-item active">
            <a class="nav-link" href="../php/adopt_page.php">ADOPT</a>
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
              <a class="dropdown-item" href="../php/account_page.php">PROFILE</a>
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

  <section id="header">
    <h2>Find Your New Best Friends</h2>
    <div class="box">
      <div class="odometer" id="odometer">0</div>
      <h4>Adoptions</h4>
    </div>
  </section>

  <section id="animals">
    <div class="main">
      <div class="row">
        <div class="column filter-column">
          <form action="adopt_page.php" method="GET">
            <div class="filter-search">
              <input type="search" name="keyword" id="filter-search" placeholder="Search..." />
            </div>
            <div class="filter-heading">
              <h2>Filters</h2>
            </div>
            <div class="filter-item">
              <h6>Type</h6>
              <select id="Type" name="type" class="form-select" style="border: 1px solid black; border-radius: 5px;">
                <option value="Select Type" <?php if (!isset($_GET['type']) || $_GET['type'] == 'Select Type')
                  echo 'selected'; ?>>Select Type</option>
                <option value="Cat" <?php if (isset($_GET['type']) && $_GET['type'] == 'Cat')
                  echo 'selected'; ?>>Cat
                </option>
                <option value="Dog" <?php if (isset($_GET['type']) && $_GET['type'] == 'Dog')
                  echo 'selected'; ?>>Dog
                </option>
                <option value="Rabbit" <?php if (isset($_GET['type']) && $_GET['type'] == 'Rabbit')
                  echo 'selected'; ?>>
                  Rabbit</option>
              </select>
            </div>

            <div class="filter-item">
              <h6>Gender</h6>
              <select id="Gender" name="gender" class="form-select"
                style="border: 1px solid black; border-radius: 5px;">
                <option value="Select Gender" <?php if (!isset($_GET['gender']) || $_GET['gender'] == 'Select Gender')
                  echo 'selected'; ?>>Select Gender</option>
                <option value="Male" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'Male')
                  echo 'selected'; ?>>
                  Male</option>
                <option value="Female" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'Female')
                  echo 'selected'; ?>>Female</option>
              </select>
            </div>
            <div class="filter-item">
              <h6>Breed</h6>
              <select id="Breed" name="breed" class="form-select" style="border: 1px solid black; border-radius: 5px;">
                <option value="Select Breed">Select Breed</option>
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

                $sql = "SELECT * FROM pet";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["breed"] . "</option>";
                  }
                } else {
                  echo "<option value=''>No breed</option>";
                }

                $conn->close();
                ?>
              </select>
            </div>
            <div class="filter-item">
              <h6>Location</h6>
              <select id="Location" name="location" class="form-select"
                style="border: 1px solid black; border-radius: 5px;">
                <option value="Select Location" <?php if (!isset($_GET['location']) || $_GET['location'] == 'Select Location')
                  echo 'selected'; ?>>Select Location</option>
                <option value="Johor" <?php if (isset($_GET['location']) && $_GET['location'] == 'Johor')
                  echo 'selected'; ?>>Johor</option>
                <option value="Kedah" <?php if (isset($_GET['location']) && $_GET['location'] == 'Kedah')
                  echo 'selected'; ?>>Kedah</option>
                <option value="Kelantan" <?php if (isset($_GET['location']) && $_GET['location'] == 'Kelantan')
                  echo 'selected'; ?>>Kelantan</option>
                <option value="Melaka" <?php if (isset($_GET['location']) && $_GET['location'] == 'Melaka')
                  echo 'selected'; ?>>Melaka</option>
                <option value="Negeri Sembilan" <?php if (isset($_GET['location']) && $_GET['location'] == 'Negeri Sembilan')
                  echo 'selected'; ?>>Negeri Sembilan</option>
                <option value="Pahang" <?php if (isset($_GET['location']) && $_GET['location'] == 'Pahang')
                  echo 'selected'; ?>>Pahang</option>
                <option value="Perak" <?php if (isset($_GET['location']) && $_GET['location'] == 'Perak')
                  echo 'selected'; ?>>Perak</option>
                <option value="Perlis" <?php if (isset($_GET['location']) && $_GET['location'] == 'Perlis')
                  echo 'selected'; ?>>Perlis</option>
                <option value="Pulau Pinang" <?php if (isset($_GET['location']) && $_GET['location'] == 'Pulau Pinang')
                  echo 'selected'; ?>>Pulau Pinang</option>
                <option value="Sabah" <?php if (isset($_GET['location']) && $_GET['location'] == 'Sabah')
                  echo 'selected'; ?>>Sabah</option>
                <option value="Sarawak" <?php if (isset($_GET['location']) && $_GET['location'] == 'Sarawak')
                  echo 'selected'; ?>>Sarawak</option>
                <option value="Selangor" <?php if (isset($_GET['location']) && $_GET['location'] == 'Selangor')
                  echo 'selected'; ?>>Selangor</option>
                <option value="Terengganu" <?php if (isset($_GET['location']) && $_GET['location'] == 'Terengganu')
                  echo 'selected'; ?>>Terengganu</option>
                <option value="Kuala Lumpur" <?php if (isset($_GET['location']) && $_GET['location'] == 'Kuala Lumpur')
                  echo 'selected'; ?>>Kuala Lumpur</option>
                <option value="Labuan" <?php if (isset($_GET['location']) && $_GET['location'] == 'Labuan')
                  echo 'selected'; ?>>Labuan</option>
                <option value="Putrajaya" <?php if (isset($_GET['location']) && $_GET['location'] == 'Putrajaya')
                  echo 'selected'; ?>>Putrajaya</option>
              </select>
            </div>
            <div class="filter_item">
              <h6>Shelter</h6>
              <select id="shelter" name="shelter" class="form-select"
                style="border: 1px solid black; border-radius: 5px;">
                <option value="" <?php if (!isset($_GET['shelter']) || $_GET['shelter'] == '')
                  echo 'selected'; ?>>Select
                  a Shelter</option>
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

                $sql = "SELECT * FROM shelter";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'" . (isset($_GET['shelter']) && $_GET['shelter'] == $row["id"] ? ' selected' : '') . ">" . $row["name"] . "</option>";
                  }
                } else {
                  echo "<option value=''>No shelters found</option>";
                }

                $conn->close();
                ?>
              </select>
            </div>
            <div class="filter-item">
              <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="column card-column">
        <div class="filter-title">
          <h6 id="filter-text">
            Show Filters <i class="fas fa-sliders-h"></i>
          </h6>
          <button class="heart-button" id="heart-button" onclick="toggleHeart(this)" data-toggle="modal"
            data-target="#wishlist">
            <i class="fas fa-heart"></i>
          </button>
          <div class="modal fade" id="wishlist" tabindex="-1" role="dialog" aria-labelledby="adopt" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title">Wishlist</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body px-4">
                  <table>
                    <!-- Table content -->
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>

          <script>
            function toggleHeart(button) {
              button.classList.toggle('toggled');
            }

            $('#wishlist').on('hidden.bs.modal', function (e) {
              const heartButton = document.getElementById('heart-button');
              if (heartButton.classList.contains('toggled')) {
                heartButton.classList.remove('toggled');
              }
            });
          </script>

        </div>
        <div class="container-wrapper">
          <div class="container">
            <?php
            // Database configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pethavenuser";

            // Establish database connection
            try {
              $pdo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
            } catch (PDOException $e) {
              die("Error: Could not connect to the database. " . $e->getMessage());
            }

            // Query to fetch pets data including BLOBs
            $sql = "SELECT p.id, p.name, p.age, p.breed, p.gender, p.color, p.vaccinated, p.status, p.deworm, p.type, p.image1 as image, s.name as shelter 
        FROM pet p 
        LEFT JOIN shelter s ON p.shelterId = s.id";

            $whereClause = [];

            if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
              $keyword = $_GET['keyword'];
              $whereClause[] = "(p.name LIKE '%$keyword%' OR p.type LIKE '%$keyword%' OR p.breed LIKE '%$keyword%')";
            }
            if (isset($_GET['type']) && $_GET['type'] != 'Select Type') {
              $type = $_GET['type'];
              $whereClause[] = "p.type = '$type'";
            }
            if (isset($_GET['gender']) && $_GET['gender'] != 'Select Gender') {
              $gender = $_GET['gender'];
              $whereClause[] = "p.gender = '$gender'";
            }
            if (isset($_GET['location']) && $_GET['location'] != 'Select Location') {
              $location = $_GET['location'];
              $whereClause[] = "location = '$location'";
            }
            if (isset($_GET['shelter']) && $_GET['shelter'] != '') {
              $shelter = $_GET['shelter'];
              $whereClause[] = "p.shelterId = '$shelter'";
            }

            if (!empty($whereClause)) {
              $sql .= " WHERE " . implode(" AND ", $whereClause);
            }

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($pets as $pet) {
              echo '<div class="card" data-id="' . htmlspecialchars($pet['id']) . '">';
              echo '<img src="data:image/jpeg;base64,' . htmlspecialchars(base64_encode($pet['image'])) . '" alt="Image of ' . htmlspecialchars($pet['name']) . '">';
              echo '<h2>' . htmlspecialchars($pet['name']) . '</h2>';
              echo '<p class="shelter">' . htmlspecialchars($pet['shelter']) . '</p>';
              echo '<form action="detail_animal.php" method="POST">';
              echo '<input type="hidden" name="ID" value="' . htmlspecialchars($pet['id']) . '">';
              // Add more hidden fields if necessary
              echo '<button type="submit" class="detail-button">ADOPT</button>';
              echo '</form>';

              echo '<button type="submit" class="heart-button" onclick="addToWishlist(' . htmlspecialchars(json_encode($pet['id'])) . ', this)" >';
              echo '<i class="fas fa-heart"></i>';
              echo '</button>';
              echo '</div>';
            }
            ?>
            <script>
              let wishlist = [];

              function addToWishlist(petId, button) {
                console.log('addToWishlist called');
                console.log('Button:', button);
                const petIndex = wishlist.findIndex(item => item === petId);
                const isPetInWishlist = petIndex !== -1;
                if (!isPetInWishlist) {
                  wishlist.push(petId);
                  // Send AJAX request to save to wishlist table
                  const xhr = new XMLHttpRequest();
                  xhr.open('POST', 'adoption_page/insert_wishlist.php', true); // Corrected the URL
                  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                  xhr.onload = function () {
                    if (xhr.status === 200) {
                      console.log('Pet added to wishlist successfully!');
                    } else {
                      console.error('Error adding pet to wishlist:', xhr.statusText);
                    }
                  };
                  xhr.send('petId=' + petId);
                } else {
                  wishlist.splice(petIndex, 1);
                }
                updateWishlistPopup();
                button.classList.toggle("liked", !isPetInWishlist);
              }

              function updateWishlistPopup() {
                const wishlistTable = document.querySelector('#wishlist table');
                wishlistTable.innerHTML = '';

                // Fetch pet details from database using IDs
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'adoption_page/fetch_pet_detail.php?id=' + wishlist.join(','), true); // Corrected the URL
                xhr.onload = function () {
                  if (xhr.status === 200) {
                    const petDetails = JSON.parse(xhr.responseText);
                    petDetails.forEach((pet, index) => {
                      wishlistTable.innerHTML += `
          <tr>
            <td><img src="${pet.image}" alt="Circle Image" /></td>
            <td> <b>${pet.name}</b> <br /> Foster Home </td>
            <td class="available">Available</td>
            <td>
              <button class="delete-button" data-id="${index}" class="button">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        `;
                    });

                    // Update heart buttons
                    const heartButtons = document.querySelectorAll('.heart-button');
                    heartButtons.forEach(button => {
                      const card = button.closest('.card');
                      if (card) {
                        const petId = card.getAttribute('data-id');
                        const isPetInWishlist = wishlist.includes(parseInt(petId));
                        button.classList.toggle("liked", isPetInWishlist);
                      }
                    });

                    // Add event listeners to delete buttons
                    const deleteButtons = document.querySelectorAll(".delete-button");
                    deleteButtons.forEach(button => {
                      button.addEventListener("click", function () {
                        const index = parseInt(button.dataset.id);
                        removeFromWishlist(index);
                      });
                    });
                  }
                };
                xhr.send();
              }

              function removeFromWishlist(index) {
                const removedPetId = wishlist[index];
                wishlist.splice(index, 1);
                updateWishlistPopup();

                // Find the heart button associated with the removed pet
                const heartButton = document.querySelector('.card[data-id="' + removedPetId + '"] .heart-button');
                if (heartButton) {
                  heartButton.classList.remove('liked');
                }
              }
            </script>

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
      </div>
    </footer>


    <script src="../javascript/adopt.js"></script>
    <script src="../javascript/trailer.js"></script>
    <script src="../javascript/nav-bar-account.js"></script>
    <script src="../javascript/authentication.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </section>
</body>

</html>