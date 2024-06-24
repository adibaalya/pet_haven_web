<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter</title>
    <link rel="stylesheet" href="../css/shelter1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"   />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/trailers.css">
    <link rel="stylesheet" href="../css/nav-bar.css" />
    
</head>

<body>
<div id="trailer"></div>
  <script src="../javascript/trailer.js"></script>

  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark">
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
          <li class="nav-item ">
            <a class="nav-link" href="../php/adopt_page.php">ADOPT</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../html/donate.html">DONATION</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../php/shelter.php">SHELTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/index.html#help">HELP</a>
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

    <div class="banner position-relative d-flex align-items-center justify-content-center">
        <img src="../assets/images/Happy-dog.jpg" style="width: 100%;">
        <div class="shelterText">
            <h1 style="font-weight: bold;" class="display-4">Pet Shelter</h1>
            <p>Find your new best friend, </p>
            <p>anytime anywhere</p>
        </div>
        <div class="filterContainer">
            <form action="shelter.php" method="GET">
                <h5 style="padding: 15px;">Choose your Shelter</h5>
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <select id="Location" name="location" class="form-select" style="border: 2px solid black;">
                            <option value="Select Location">Select Location</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="keyword" class="form-control" placeholder="Shelter Name"
                            style="border: 2px solid black;">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>


    </div>


    </div>
    </div>
    </div>
    <div class="container-fluid"
        style=" background-color:#DDCAB5; margin-top: 100px; border-radius: 50px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  width: 80%;">


        <div class="row">
            <div class="col-4">
                <div class="textTitle">
                    All
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-center">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pethavenuser";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT * FROM shelter";
            $whereClause = [];


            if (isset($_GET['location']) && $_GET['location'] != 'Select Location') {
                $location = $conn->real_escape_string($_GET['location']);
                $whereClause[] = "location = '$location'";
            }


            if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                $keyword = $conn->real_escape_string($_GET['keyword']);
                $whereClause[] = "(name LIKE '%$keyword%' )";
            }


            if (!empty($whereClause)) {
                $sql .= " WHERE " . implode(" AND ", $whereClause);
            }

            $result = $conn->query($sql);

            $shelters = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['imageLogo'] = base64_encode($row['imageLogo']);
                    $row['imageDesc'] = base64_encode($row['imageDesc']);
                    $shelters[] = $row;
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

            <?php foreach ($shelters as $shelter): ?>
                <div class="col-auto">
                    <div class="container1" style="padding-left: 10px; padding-bottom: 20px;">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter<?= htmlspecialchars($shelter['id']); ?>"
                            style="background-color: rgba(0, 0, 0, 0); border: 0;">
                            <div class="card" style="border-radius: 20% 20% 10% 10%; text-align: center; width: 200px;">

                                <div class="card-content d-flex justify-content-center align-items-center">
                                    <div class="image">
                                        <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageLogo']); ?>"
                                            alt="<?= htmlspecialchars($shelter['name']); ?>"
                                            style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    </div>
                                </div>

                                <div class="container2" style="height: 70px;">
                                    <?= htmlspecialchars($shelter['name']); ?>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>



                <div class="modal fade" id="exampleModalCenter<?= htmlspecialchars($shelter['id']); ?>" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content"
                            style="background-color: #EDEBD2; border: 1px solid black; border-radius: 5%;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                                <div class="container p-2" style="border-radius: 4%;">
                                    <div class="row">
                                        <div class="col-4 left-panel" style="background-color: white; height:fit-content">
                                            <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageLogo']); ?>"
                                                style="width: 70%; ">
                                            <h4><?= htmlspecialchars($shelter['name']); ?></h4>
                                            <div class="col-auto">
                                                <p><strong>Contact:</strong> <?= htmlspecialchars($shelter['contact']); ?>
                                                </p>
                                                <p><strong>Location:</strong> <?= htmlspecialchars($shelter['location']); ?>
                                                </p>
                                                <p><strong>Working Day:</strong>
                                                    <?= htmlspecialchars($shelter['workingDay']); ?></p>
                                                <p><strong>Working Hours:</strong>
                                                    <?= htmlspecialchars($shelter['workingHours']); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-7 right-panel" style="margin-left: 10px; ">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="description">
                                                    <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageDesc']); ?>"
                                                        style="width: 100%;">
                                                    <p><?= htmlspecialchars($shelter['description']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-buttons text-center">
                                        <a href="<?= htmlspecialchars($shelter['link']); ?>"><button
                                                class="btn btn-custom">Facebook</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



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
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../javascript/nav-bar-account.js"></script>
    <script src="../javascript/authentication.js"></script>
</body>

</html>