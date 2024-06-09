<?php
$pets = [
  ['name' => 'Buddy', 'age' => 2, 'type' => 'Dog', 'image' => 'assets/images/adopt1.jpeg'],
  ['name' => 'Whiskers', 'age' => 3, 'type' => 'Cat', 'image' => 'assets/images/adopt1.jpeg'],
  ['name' => 'Goldie', 'age' => 1, 'type' => 'Fish', 'image' => 'assets/images/adopt1.jpeg'],
  ['name' => 'Shadow', 'age' => 4, 'type' => 'Dog', 'image' => 'assets/images/adopt1.jpeg'],
  ['name' => 'Bella', 'age' => 1, 'type' => 'Cat', 'image' => 'assets/images/adopt1.jpeg'],
  // Add more pets as needed
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="adopt.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Adopt</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="adopt.js"></script>
  <section class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="assets/images/pets-haven-logo.png" width="50" height="50" alt="Pet Haven Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">HOME</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="adopt_page.html" id="adoptDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ADOPT
            </a>
            <div class="dropdown-menu" aria-labelledby="adoptDropdown">
              <a class="dropdown-item" href="adopt_page.html">Dogs</a>
              <a class="dropdown-item" href="adopt_page.html">Cats</a>
              <a class="dropdown-item" href="adopt_page.html">Rabbit</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="donate.html">DONATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shelter1.html">SHELTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html#help">HELP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account_page.html">ACCOUNT</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="header">
    <h2>Find Your New Best Friends</h2>
    <div class="box">
      <div class="odometer" id="odometer">0</div>
      <h4>Adoption</h4>
    </div>
  </section>

  <section id="animals">
    <div class="main">
      <div class="row">
        <div class="column filter-column">
          <div class="filter-search">
            <input type="search" id="filter-search" placeholder="Search..." />
          </div>
          <div class="filter-heading">
            <h2>Filters</h2>
          </div>
          <div class="filter-item">
            <h6>Type</h6>
            <label for="type-dog" class="filter-label">
              <input type="checkbox" id="type-dog" value="dog" />
              Dog
            </label>
            <br />
            <label for="type-cat" class="filter-label">
              <input type="checkbox" id="type-cat" value="cat" />
              Cat
            </label>
            <br />
            <label for="type-rabbit" class="filter-label">
              <input type="checkbox" id="type-rabbit" value="rabbit" />
              Rabbit
            </label>
          </div>
          <div class="filter-item">
            <h6>Age</h6>
            <label for="type-puppy" class="filter-label">
              <input type="checkbox" id="type-dog" value="puppy" />
              Puppy
            </label>
            <br />
            <label for="type-kitten" class="filter-label">
              <input type="checkbox" id="type-cat" value="kitten" />
              Kitten
            </label>
            <br />
            <label for="type-adult" class="filter-label">
              <input type="checkbox" id="type-rabbit" value="adult" />
              Adult
            </label>
          </div>
          <div class="filter-item">
            <h6>Gender</h6>
            <label for="type-male" class="filter-label">
              <input type="checkbox" id="type-dog" value="male" />
              Male
            </label>
            <br />
            <label for="type-female" class="filter-label">
              <input type="checkbox" id="type-cat" value="female" />
              Female
            </label>
          </div>
          <div class="filter-item">
            <h6>Colour</h6>
            <label for="type-black" class="filter-label">
              <input type="checkbox" id="type-dog" value="black" />
              Black
            </label>
            <br />
            <label for="type-brown" class="filter-label">
              <input type="checkbox" id="type-cat" value="brown" />
              Brown
            </label>
            <br />
            <label for="type-grey" class="filter-label">
              <input type="checkbox" id="type-rabbit" value="grey" />
              Grey
            </label>
          </div>
          <div class="filter-item">
            <h6>Breed</h6>
            <select id="Breed" name="breed" class="form-select" style="border: 1px solid black; border-radius: 5px;">
              <option value="Select Breed">Select Breed</option>
              <option value="Johor">Johor</option>
              <option value="Kedah">Kedah</option>
              <option value="Kelantan">Kelantan</option>
              <option value="Melaka">Melaka</option>
              <option value="Negeri Sembilan">Negeri Sembilan</option>
              <option value="Pahang">Pahang</option>
              <option value="Perak">Perak</option>
              <option value="Perlis">Perlis</option>
              <option value="Pulau Pinang">Pulau Pinang</option>
              <option value="Sabah">Sabah</option>
              <option value="Sarawak">Sarawak</option>
              <option value="Selangor">Selangor</option>
              <option value="Terengganu">Terengganu</option>
              <option value="Kuala Lumpur">Kuala Lumpur</option>
              <option value="Labuan">Labuan</option>
              <option value="Putrajaya">Putrajaya</option>
            </select>
          </div>
          <div class="filter-item">
            <h6>Location</h6>
            <select id="Location" name="location" class="form-select"
              style="border: 1px solid black; border-radius: 5px;">
              <option value="Select Location">Select Location</option>
              <option value="Johor">Johor</option>
              <option value="Kedah">Kedah</option>
              <option value="Kelantan">Kelantan</option>
              <option value="Melaka">Melaka</option>
              <option value="Negeri Sembilan">Negeri Sembilan</option>
              <option value="Pahang">Pahang</option>
              <option value="Perak">Perak</option>
              <option value="Perlis">Perlis</option>
              <option value="Pulau Pinang">Pulau Pinang</option>
              <option value="Sabah">Sabah</option>
              <option value="Sarawak">Sarawak</option>
              <option value="Selangor">Selangor</option>
              <option value="Terengganu">Terengganu</option>
              <option value="Kuala Lumpur">Kuala Lumpur</option>
              <option value="Labuan">Labuan</option>
              <option value="Putrajaya">Putrajaya</option>
            </select>
          </div>
        </div>
      </div>
      <div class="column card-column">
        <div class="filter-title">
          <h6 id="filter-text">
            Show Filters <i class="fas fa-sliders-h"></i>
          </h6>
          <button class="heart-button" onclick="toggleHeart(this)" data-toggle="modal" data-target="#wishlist">
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
                    <tr>
                    </tr>
                    <tr>
                      <td><img src="assets/images/adopt6.jpeg" alt="Circle Image" /></td>
                      <td>
                        <b>John Doe</b> <br />
                        Foster Home
                      </td>
                      <td class="available">Available</td>
                      <td>
                        <button class="delete-button" data-id="1" class="button">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="assets/images/adopt5.jpeg" alt="Circle Image" /></td>
                      <td>
                        <b>Jane Doe</b> <br />
                        Foster Home
                      </td>
                      <td class="unavailable">Not Available</td>
                      <td>
                        <button class="delete-button" data-id="2" class="button">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                    <!-- Add more rows as needed -->
                  </table>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      console.log("DOM fully loaded and parsed");

                      // Get all delete buttons on the page
                      const deleteButtons =
                        document.querySelectorAll(".delete-button");
                      console.log(
                        "Delete buttons found:",
                        deleteButtons.length
                      );

                      // Add event listener to all delete buttons
                      deleteButtons.forEach((button) => {
                        console.log(
                          "Adding event listener to delete button with data-id:",
                          button.dataset.id
                        );

                        button.addEventListener("click", function () {
                          console.log(
                            "Delete button clicked with data-id:",
                            button.dataset.id
                          );

                          // Display a confirmation dialog
                          if (
                            confirm(
                              "Are you sure you want to delete this pet?"
                            )
                          ) {
                            const row = button.closest("tr");
                            if (row) {
                              row.parentNode.removeChild(row);
                              console.log("Pet deleted");
                            } else {
                              console.log("No row found for deletion");
                            }
                          }
                        });
                      });
                    });
                  </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <?php
          foreach ($pets as $pet) {
            echo '<div class="card">';
            echo '<img src="' . htmlspecialchars($pet['image']) . '" alt="Image of ' . htmlspecialchars($pet['name']) . '">';
            echo '<h2>' . htmlspecialchars($pet['name']) . '</h2>';
            echo '<p class="shelter" >Age: ' . htmlspecialchars($pet['age']) . '</p>';
            echo '<a href="detail_animal.html"><button class="adopt-button">ADOPT</button></a>'; // Adopt link
            echo '<button class="heart-button" onclick="toggleHeart(this)"><i class="fas fa-heart"></i></button>'; // Heart button
            echo '</div>';
          }
          ?>
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