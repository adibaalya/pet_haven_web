document.getElementById('submitBtn').addEventListener('click', function () {
  this.textContent = "Submitting...";
});

document.addEventListener('DOMContentLoaded', function () {
  $('.contact-form').on('submit', function (event) {
    if (this.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    console.log('Form submission initiated.');
    event.preventDefault();
    
    $.ajax({
      url: '../php/send-email.php',
      type: 'POST',
      data: $(this).serialize() + "&submit=true",
      dataType: 'json',
      success: function (response) {
        console.log('AJAX request successful.');
        console.log('Response:', response);
        const toastId = response.status === 'success' ? 'successToast' : 'errorToast';
        showToast(toastId);
        document.getElementById('submitBtn').textContent = "Submit";
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX Error:', textStatus, errorThrown);
        console.error('Server response:', jqXHR.responseText); 
        showToast('errorToast');
        document.getElementById('submitBtn').textContent = "Submit";
      }
    });

    function showToast(toastId) {
      const toast = document.getElementById(toastId);
      toast.classList.add('show');
      setTimeout(function () {
        toast.classList.remove('show');
      }, 5000);
    }
    $(this).addClass('was-validated');
  });

  const inputFields = document.querySelectorAll('.contact-form input, .contact-form textarea');

  inputFields.forEach(field => {
    field.addEventListener('input', function (e) {
      var value = e.target.value;
      var isValid = true;
      var errorMessage = '';

      switch (e.target.id) {
        case 'name':
          if (value.trim().length < 2 || value.trim().length > 50) {
            isValid = false;
            errorMessage = 'Name must be between 2 and 50 characters.';
          }
          break;
        case 'email':
          var emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
          if (!emailPattern.test(value)) {
            isValid = false;
            errorMessage = 'Please provide a valid email.';
          }
          break;
        case 'description':
          if (value.trim().length > 500 || value.trim() === '') {
            isValid = false;
            errorMessage = 'Description must be less than 500 characters and not empty.';
          }
          break;
      }

      if (isValid) {
        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
        e.target.nextElementSibling.textContent = '';
      } else {
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        e.target.nextElementSibling.textContent = errorMessage;
      }
    });

    var event = new Event('input', {
      bubbles: true,
      cancelable: true,
    });
    field.dispatchEvent(event);
  });
});

document.getElementById('contactButton').addEventListener('click', function () {
  var contactTab = document.querySelector('a[href="#contact"]');
  var contactPane = document.getElementById('contact');
  
  contactTab.classList.add('active');
  contactPane.classList.add('show', 'active');

  var otherTabs = document.querySelectorAll('.nav-link:not([href="#contact"])');
  var otherPanes = document.querySelectorAll('.tab-pane:not(#contact)');

  otherTabs.forEach(function (tab) {
    tab.classList.remove('active');
  });

  otherPanes.forEach(function (pane) {
    pane.classList.remove('show', 'active');
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const images = [
    "../assets/images/pets-banner.jpg",
    "../assets/images/pets-banner-2.jpg", 
    "../assets/images/pets-banner-3.jpg"
  ];
  let currentIndex = 0;

  function cycleImages() {
    currentIndex = (currentIndex + 1) % images.length; // Cycle through the array
    document.getElementById('bannerImg').src = images[currentIndex]; // Update the image src
    updateActiveDot();
  }

  setInterval(cycleImages, 3000); // Change image every 3000 milliseconds (3 seconds)

  document.querySelectorAll('#bannerControls .dot').forEach(dot => {
    dot.addEventListener('click', function() {
      currentIndex = parseInt(this.getAttribute('data-index')); // Update currentIndex based on dot
      document.getElementById('bannerImg').src = images[currentIndex]; // Immediately update the image src
      updateActiveDot();
    });
  });

  function updateActiveDot() {
    document.querySelectorAll('#bannerControls .dot').forEach(dot => {
      dot.classList.remove('active');
    });
    document.querySelector(`#bannerControls .dot[data-index="${currentIndex}"]`).classList.add('active');
  }

  updateActiveDot(); // Initialize the active dot on page load
});

function showLoginSuccessToast() {
  $('#loginSuccessToast').toast('show');
}

// Function to show login failure toast
function showLoginFailureToast() {
  $('#errorToast').toast('show'); // Assuming the ID of your error toast is 'errorToast'
}

// Example login function
function login(email, password) {
  // Example AJAX request to your PHP login script
  $.ajax({
    url: '../php/user.php',
    type: 'POST',
    data: {
      email: email,
      password: password
    },
    success: function(response) {
      // Assuming your PHP script returns a JSON object with a success property
      if(response.success) {
        showLoginSuccessToast();
      } else {
        showLoginFailureToast();
      }
    },
    error: function() {
      // Handle AJAX error
      showLoginFailureToast();
    }
  });
}