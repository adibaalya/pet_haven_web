<?php
session_start();

if (!isset($_SESSION['wishlist'])) {
  $_SESSION['wishlist'] = array();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/adopt_page.css" />
  <link rel="stylesheet" href="../css/trailer.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Adopt</title>
</head>

<body>
  <?php include '../php/animal.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src="../javascript/adopt.js"></script>
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
          <li class="nav-item">
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
            foreach ($pets as $pet) {
              echo '<div class="card" data-id="' . htmlspecialchars($pet['ID']) . '">';
              echo '<img src="' . htmlspecialchars($pet['image']) . '" alt="Image of ' . htmlspecialchars($pet['name']) . '">';
              echo '<h2>' . htmlspecialchars($pet['name']) . '</h2>';
              echo '<p class="shelter">Age: ' . htmlspecialchars($pet['age']) . '</p>';
              echo '<form action="detail_animal.php" method="GET">'; // Use detail_animal.php for the next page
              foreach ($pet as $key => $value) {
                echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
              }
              echo '<button type="submit" class="detail-button">ADOPT</button>';
              echo '</form>';
              echo '<button class="heart-button" onclick="addToWishlist(' . htmlspecialchars(json_encode($pet)) . ', this)" >
                  <i class="fas fa-heart"></i>
                  </button>';
              echo '</div>';
            }
            ?>
            <script>
              // Array to store wishlist items
              let wishlist = [];

              function addToWishlist(pet, button) {
                console.log('addToWishlist called');
                console.log('Button:', button);

                const petIndex = wishlist.findIndex(item => item.ID === pet.ID);
                const isPetInWishlist = petIndex !== -1;

                if (!isPetInWishlist) {
                  wishlist.push(pet);
                } else {
                  wishlist.splice(petIndex, 1);
                }

                updateWishlistPopup();
                // Update the heart button state immediately
                button.classList.toggle("liked", !isPetInWishlist);
              }

              function removeFromWishlist(index) {
                const removedPet = wishlist[index];
                wishlist.splice(index, 1);
                updateWishlistPopup();

                // Find the heart button associated with the removed pet
                const heartButton = document.querySelector('.card[data-id="' + removedPet.ID + '"] .heart-button');

                if (heartButton) {
                  // Remove the liked class from the heart button
                  heartButton.classList.remove('liked');
                }
              }

              function updateWishlistPopup() {
                const wishlistTable = document.querySelector('#wishlist table');

                // Clear existing rows
                wishlistTable.innerHTML = '';

                // Add rows for each pet in the wishlist
                wishlist.forEach((pet, index) => {
                  wishlistTable.innerHTML += `
            <tr>
                <td><img src="${pet.image}" alt="Circle Image" /></td>
                <td>
                    <b>${pet.name}</b> <br />
                    Foster Home
                </td>
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
                    const isPetInWishlist = wishlist.some(item => item.ID === petId);
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

            </script>

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