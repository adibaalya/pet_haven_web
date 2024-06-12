document.getElementById('submitBtn').addEventListener('click', function() {
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
        submitBtn.textContent = "Submit";
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX Error:', textStatus, errorThrown);
        showToast('errorToast');
        submitBtn.textContent = "Submit";
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