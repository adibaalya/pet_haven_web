<?php
if ($_GET) {
  $id = htmlspecialchars($_GET['ID']);
  $name = htmlspecialchars($_GET['name']);
  $breed = htmlspecialchars($_GET['breed']);
  $color = htmlspecialchars($_GET['color']);
  $vaccinated = htmlspecialchars($_GET['vaccinated']);
  $dewormed = htmlspecialchars($_GET['dewormed']);
  $age = htmlspecialchars($_GET['age']);
  $type = htmlspecialchars($_GET['type']);
  $image = htmlspecialchars($_GET['image']);
  $image2 = htmlspecialchars($_GET['image2']);
  $image3 = htmlspecialchars($_GET['image3']);
  $gender = htmlspecialchars($_GET['gender']);
  $_SESSION['viewed_pets'][] = $id;
} else {
  echo 'No pet information available.';
  exit;
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
  <?php include 'animal.php'; ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div id="trailer">
  </div>
  <script src="../javascript/trailer.js"></script>
  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">
        <img src="assets/images/pets-haven-logo.png" width="50" height="50" alt="Pet Haven Logo" />
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
            <a class="nav-link" href="../html/index.html#help">HELP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/account_page.html">ACCOUNT</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="detail-animal">
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
                <img class="d-block w-100" src="<?php echo $image; ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $image2; ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $image3; ?>" alt="Third slide">
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
                  <td><?php echo $dewormed; ?></td>
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
                  <form id="adoption-form">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name"><br>
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
              if (document.getElementById("agree").checked) {
                alert("Thank you for your interest in adopting Simba, " + document.getElementById("name").value + "!");
                $('#Adopt').modal('hide');
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

        // Assume $pets is an array of pet information
        
        // Store the IDs of viewed pets in a session
        if (!isset($_SESSION['viewed_pets'])) {
          $_SESSION['viewed_pets'] = array();
        }

        // Initialize a counter for the number of pets displayed
        $pet_count = 0;

        // Loop through the pets array
        foreach ($pets as $pet) {
          if (!in_array($pet['ID'], $_SESSION['viewed_pets'])) {
            echo '<div class="card">';
            echo '<img src="' . htmlspecialchars($pet['image']) . '" alt="Image of ' . htmlspecialchars($pet['name']) . '">';
            echo '<h2>' . htmlspecialchars($pet['name']) . '</h2>';
            echo '<p class="shelter">Age: ' . htmlspecialchars($pet['age']) . '</p>';
            echo '<form action="detail_animal.php" method="GET">'; // Use detail_animal.php for the next page
            foreach ($pet as $key => $value) {
              echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
            }
            echo '<button type="submit" class="detail-button">ADOPT</button>';
            echo '</form>';
            echo '<button class="heart-button" onclick="toggleHeart(this)"><i class="fas fa-heart"></i></button>'; // Heart button
            echo '</div>';
            
            $_SESSION['viewed_pets'][] = $pet['ID'];
            $pet_count++;
            if ($pet_count == 8) {
              break;
            }
          }
        }
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </section>
</body>

</html>