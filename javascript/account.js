
/*document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded and parsed");

  const buttons = document.querySelectorAll("button");
  console.log("Buttons found:", buttons.length);

  buttons.forEach((button) => {
    console.log("Adding event listener to button with id:", button.id);

    button.addEventListener("click", function () {
      console.log("Button clicked with id:", button.id);


      switch (button.id) {
        case "cancel":

          if (confirm("Are you sure you want to cancel this pet?")) {
            const row = button.closest("tr");
            if (row) {
              row.parentNode.removeChild(row);
              console.log("Pet cancelled");
            } else {
              console.log("No row found for cancellation");
            }
          }
          break;
        case "delete":

          if (confirm("Are you sure you want to delete this pet?")) {
            const row = button.closest("tr");
            if (row) {
              row.parentNode.removeChild(row);
              console.log("Pet deleted");
            } else {
              console.log("No row found for deletion");
            }
          }
          break;

        default:
          console.log("Unknown button id:", button.id);
      }
    });
  });
});


const approveBtn = document.getElementById("approve");
const dropdownContent = document.querySelector(".dropdown-content");
const calendarInput = document.getElementById("calendar");
const confirmBtn = document.getElementById("confirm");

approveBtn.addEventListener("click", function () {
  dropdownContent.classList.toggle("show");
});

calendarInput.addEventListener("change", function () {
  if (calendarInput.value) {
    confirmBtn.addEventListener("click", function () {
      alert("Date confirmed: " + calendarInput.value);
    });
  }
});*/

$(document).ready(function () {

  if (!localStorage.getItem('isLoggedIn')) {
    window.location.href = 'index.html';
    return; 
  }

  $.ajax({
    url: '../php/get_account_details.php',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response && response.email) {
        $('#fullnameDisplay').text(response.name);
        $('#name').val(response.name);
        $('#email').val(response.email);
      } else {
        console.error('Failed to fetch account details:', response.error);
      }
    },
    error: function (xhr, status, error) {
      console.error('Failed to fetch account details:', error);
    }
  });

  $('#logoutButton').click(function () {
    // Perform logout operations here
    // Example: Clear user session data
    localStorage.clear(); // or specific keys with localStorage.removeItem('keyName');
    // Redirect to index.html
    window.location.href = 'index.html';
  });
});

