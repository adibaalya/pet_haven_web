
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

$sql= "SELECT * from shelter";
$result = $conn->query($sql);

$shelters = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row['imageLogo'] = base64_encode($row['imageLogo']);
        $shelters[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close()
?>


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
    <link rel="stylesheet" href="../css/trailer.css">



</head>
<style>
    body {
        background-color: #EDEBD2;
        margin: 0;
        padding: 0;
    }
</style>

<body>
    <div id="trailer">
    </div>
    <script src="../javascript/trailer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <section class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-dark">
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
                    <li class="nav-item active">
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

    <div class="banner position-relative d-flex align-items-center justify-content-center">
        <img src="../assets/images/Happy-dog.jpg" style="width: 100%;">
        <div class="shelterText">
            <h1 style="font-weight: bold;" class="display-4">Pet Shelter</h1>
            <p>Find your new best friend, </p>
            <p>anytime anywhere</p>
        </div>
        <div class="filterContainer">
            <h5>Choose your Shelter</h5>
            <div class="row " style="text-align: center; padding-bottom: 10px;padding-left: 60px;">
                <div class="col-3" style="left: 10px;">
                    <select id="Location" name="location" class="form-select" style="border: 2px solid black;">
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
                <div class="col-3">
                    <select id="states2" name="states" class="form-select" style="border: 2px solid black;">
                        <option value="Select Location">Select Area</option>
                        <option value="west">West Malaysia</option>
                        <option value="east">East Malaysia</option>
                     
                    </select>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Shelter Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="circleContainer ">
                <i class="bi bi-search"></i>
            </div>

        </div>
    </div>
    </div>
    <div class="container-fluid"
        style=" background-color:rgb(251, 249, 230); margin-top: 100px; border-radius: 50px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  width: 80%;">
       

        <div class="row">
            <div class="col-4">
                <div class="textTitle">
                    All
                </div>
            </div>
          
        </div>
        <div class="row d-flex justify-content-center">
            
           <?php foreach ($shelters as $shelter): ?>
            <div class="col-auto">
    <div class="container1" style="padding-left: 10px; padding-bottom: 20px;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?= htmlspecialchars($shelter['id']); ?>" style="background-color: rgba(0, 0, 0, 0); border: 0;">
            <div class="card" style="border-radius: 20% 20% 10% 10%; text-align: center; width: 200px;">

                <div class="card-content d-flex justify-content-center align-items-center">
                    <div class="image">
                        <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageLogo']); ?>" alt="<?= htmlspecialchars($shelter['name']); ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                </div>

                <div class="container2" style="height: 70px;">
                    <?= htmlspecialchars($shelter['name']); ?>
                </div>
            </div>
        </button>
    </div>
</div>



    <div class="modal fade" id="exampleModalCenter<?= htmlspecialchars($shelter['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: #EDEBD2; border: 1px solid black; border-radius: 5%;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="container p-2" style="border-radius: 4%;">
                        <div class="row">
                            <div class="col-4 left-panel" style="background-color: white; height:fit-content">
                                <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageLogo']); ?>" style="width: 70%; ">
                                <h4><?= htmlspecialchars($shelter['name']); ?></h4>
                                <div class="col-auto">
                                    <p><strong>Contact:</strong> <?= htmlspecialchars($shelter['contact']); ?></p>
                                    <p><strong>Location:</strong> <?= htmlspecialchars($shelter['location']); ?></p>
                                    <p><strong>Working Day:</strong> <?= htmlspecialchars($shelter['workingDay']); ?></p>
                                    <p><strong>Working Hours:</strong> <?= htmlspecialchars($shelter['workingHours']); ?></p>
                                </div>
                            </div>
                            <div class="col-7 right-panel" style="margin-left: 10px; height: fit-content;">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description">
                                        <img src="data:image/jpeg;base64,<?= htmlspecialchars($shelter['imageDesc']); ?>" >
                                        <p><?= htmlspecialchars($shelter['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-buttons text-center">
                            <a href="<?= htmlspecialchars($shelter['link']); ?>"><button class="btn btn-custom">Facebook</button></a>
                           
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
    <script>
        var swiper = new Swiper(".mySwiper", {

            loop: true,
            breakpoints: {

                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                450: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                530: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },

                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50
                },
                1380: {
                    slidesPerView: 6,
                    spaceBetween: 60
                },
                1800: {
                    slidesPerView: 8,
                    spaceBetween: 60
                }
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: false,
            },
        });
    </script>
</body>

</html>