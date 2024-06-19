<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../css/index-style.css" />
  <link rel="stylesheet" href="../css/trailer.css">
  <title>Pet Haven</title>
</head>

<body>
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
          
          <li class="nav-item active">
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
            <a class="nav-link" href="#help">HELP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
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
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
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
    <script>
      
      const loginForm = document.getElementById('loginModal').querySelector('form');
      signUpForm.addEventListener('submit', (event) => {
        if (!signUpForm.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
    
          signUpForm.querySelectorAll(':invalid').forEach((field) => {
            field.closest('.form-group').classList.add('was-validated');
          });
        } else {
          // If the form is valid, submit it here.
          signUpForm.submit();
        }
      });
    </script>
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
          <form  action="../php/user.php" method="post" novalidate>
            <div class="form-group">
              <label for="sign-up-name">NAME</label>
              <input type="text" class="form-control" id="sign-up-name" placeholder="Enter name" name="name" required>
              <div class="invalid-feedback">
                Please provide your name.
              </div>
            </div>
            <div class="form-group">
              <label for="sign-up-email">EMAIL ADDRESS</label>
              <input type="email" class="form-control" id="sign-up-email" placeholder="Enter email" name="email" required>
              <div class="invalid-feedback">
                Please provide your email.
              </div>
            </div>
            <div class="form-group">
              <label for="sign-up-password">PASSWORD</label>
              <input type="password" class="form-control" id="sign-up-password" placeholder="Password" name="password" required>
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
    <script>
      const signUpForm = document.getElementById('signUpModal').querySelector('form');
      signUpForm.addEventListener('submit', (event) => {
        if (!signUpForm.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();

          signUpForm.querySelectorAll(':invalid').forEach((field) => {
            field.closest('.form-group').classList.add('was-validated');
          });
        } else {
          // If the form is valid, submit it here.
          signUpForm.submit();
        }
      });
    </script>
  </div>

  <div class="heading text-center">
    <h1>PET HAVEN</h1>
    <h2>Connecting all pet shelters in Malaysia</h2>
  </div>

  <div style="margin-top: 40px;" class="banner position-relative d-flex align-items-center justify-content-center">
    <img src="../assets/images/pets-banner.png" alt="Banner" class="img-fluid" />
    <div class="position-absolute text-center">
      <a href="../php/adopt_page.php">
        <button class="btn btn-dark btn-lg me-2">ADOPT NOW</button>
      </a>

    </div>
  </div>

  <div class="countdown-container container text-center py-5 mt-5">
    <h2 class="mb-4">INTERNATIONAL ANIMAL DAY</h2>
    <div class="row">
      <div class="col countdown-item">
        <h3 id="days">00</h3>
        <p class="text-uppercase">Days</p>
      </div>
      <div class="col countdown-item">
        <h3 id="hours">00</h3>
        <p class="text-uppercase">Hours</p>
      </div>
      <div class="col countdown-item">
        <h3 id="minutes">00</h3>
        <p class="text-uppercase">Minutes</p>
      </div>
      <div class="col countdown-item">
        <h3 id="seconds">00</h3>
        <p class="text-uppercase">Seconds</p>
      </div>
    </div>
  </div>

  <script>
    var countDownDate = new Date("Oct 4, 2024 00:00:00").getTime();

    var x = setInterval(function () {
      var now = new Date().getTime();
      var distance = countDownDate - now;

      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("days").innerHTML = days;
      document.getElementById("hours").innerHTML = hours;
      document.getElementById("minutes").innerHTML = minutes;
      document.getElementById("seconds").innerHTML = seconds;

      if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
      }
    }, 1000);
  </script>

  <div id="care-section" class="container-fluid mt-5">
    <h1 class="care-title text-center">HOW TO TAKE CARE OF PETS</h1>
    <div class="row no-gutters">
      <div class="image-container col-md-4 col-sm-12">
        <img src="../assets/images/dog.png" alt="Dog" class="img-fluid care-img" data-toggle="modal"
          data-target="#dogModal">
      </div>
      <div class="image-container col-md-4 col-sm-12">
        <img src="../assets/images/cat.png" alt="Cat" class="img-fluid care-img" data-toggle="modal"
          data-target="#catTipsModal">
        <div class="modal fade" id="catTipsModal" tabindex="-1" role="dialog" aria-labelledby="catTipsModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title" id="catTipsModalLabel">How do I take care of a Cat?</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-4">
                <p>
                  Basic Tips Caring for Your Cat
                <ul>
                  <li>Provide a balanced diet with high-quality cat food.</li>
                  <li>Ensure access to fresh water at all times.</li>
                  <li>Schedule regular vet check-ups and vaccinations.</li>
                  <li>Create a stimulating environment with toys and scratching posts.</li>
                  <li>Groom daily to reduce shedding and prevent hairballs.</li>
                  <li>Keep the litter box clean to maintain good hygiene</li>
                </ul>
                </p>
              </div>
              <div class="modal-footer">
                <a href="adopt_page.php"><button type="button" class="btn btn-dark">Adopt Now</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="image-container col-md-4 col-sm-12">
        <img src="../assets/images/rabbit.png" alt="Rabbit" class="img-fluid care-img" data-toggle="modal"
          data-target="#rabbitModal">
      </div>
    </div>
  </div>

  <div class="help-container mt-5 d-flex justify-content-center">
    <div class="col-md-6">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#adoption">ADOPTION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#shelter">SHELTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#refunds">REFUNDS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#contact">CONTACT</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="adoption">
          <p>
          <ul>
            <li>Visit our shelter or website to view available pets.</li>
            <li>Fill out an adoption application form.</li>
            <li>Meet and greet the pet you're interested in.</li>
            <li>Complete an adoption interview with our staff.</li>
            <li>Pay the adoption fee and finalize the paperwork.</li>
            <li>Take your new pet home!</li>
          </ul>
          </p>
        </div>
        <div class="tab-pane fade" id="shelter">
          <p>
          <ol>
            <li>How do I know your shelter is trustworthy?</li>
            <ul>
              <li>
                Our shelter is a registered non-profit organization dedicated to the welfare of animals. We adhere to
                strict ethical standards and are transparent about our operations and finances. Our mission is to
                rescue, rehabilitate, and rehome animals in need.
              </li>
            </ul>
            <li>Are the animals in your shelter rescued?</li>
            <ul>
              <li>Yes, all our animals are rescued from various situations such as abandonment, neglect, or being
                surrendered by owners who can no longer care for them. We provide them with the care and love they need
                to thrive.</li>
            </ul>
            <li>What happens if an animal is not adopted?</li>
            <ul>
              <li>We are a no-kill shelter, meaning we do not euthanize healthy or treatable animals. Pets stay with us
                as long as it takes to find them a loving home. Meanwhile, they continue to receive the best care
                possible.
                how to make this into a unordered list that looks nice </li>
            </ul>
          </ol>
          </p>
        </div>
        <div class="tab-pane fade" id="refunds">
          <p>What are the refund conditions?
          <ul>
            <li>Full refunds within 14 days of adoption if the pet is returned for any reason.</li>
            <li>Partial refunds up to 30 days after adoption, depending on circumstances.</li>
            <li>No refunds after 30 days, but we will assist in re-homing the pet.</li>
          </ul>
          </p>
        </div>
        <div id="contact" class="tab-pane fade mt-3">
          <div class="row justify-content-center">
            <p>Fill out the form below with your details and inquiry.
              Our friendly staff will get in touch with you shortly.</p>
            <div class="col-md-8">
              <form class="contact-form" action="../php/send-email.php" method="post" id="contactForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                  <div class="error-message"></div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
                  <div class="error-message"></div>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="message" rows="5" maxlength="500"
                    placeholder="Enter your description" required></textarea>
                  <div class="error-message"></div>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="toast position-fixed bottom-right-toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
          <div class="toast-header">
            <i class="fas fa-check-circle text-success mr-2"></i>
            <strong class="mr-auto text-success">Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            Your message has been sent successfully.
          </div>
        </div>  

        <div class="toast position-fixed bottom-right-toast" id="errorToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
          <div class="toast-header">
            <strong class="mr-auto text-danger">Error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            There was an error sending your message. Please try again.
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="help" class="feedback-container text-center mt-2">
    <div class="feedback-section">
        <h2 class="mb-4">Your Feedback Matters</h2>
        <p class="mb-4">We'd love to hear from you. Please share your feedback with us.</p>
        <button id="feedbackButton" class="btn btn-dark btn-lg">Share Your Feedback</button>
    </div>
</div>

<script>
    document.getElementById('feedbackButton').addEventListener('click', function() {
        var contactTab = document.querySelector('a[href="#contact"]');
        var contactPane = document.getElementById('contact');
        
        // Switch to the contact tabdedez
        contactTab.classList.add('active');
        contactPane.classList.add('show', 'active');
        
        // Remove active class from other tabs and panes
        var otherTabs = document.querySelectorAll('.nav-link:not([href="#contact"])');
        var otherPanes = document.querySelectorAll('.tab-pane:not(#contact)');
        
        otherTabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        
        otherPanes.forEach(function(pane) {
            pane.classList.remove('show', 'active');
        });
    });
</script>

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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../javascript/index.js"></script>
</body>

</html>