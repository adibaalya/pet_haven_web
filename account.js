// Wait for the DOM to fully load
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
  
    // Get all buttons on the page
    const buttons = document.querySelectorAll("button");
    console.log("Buttons found:", buttons.length);
  
    // Add event listener to all buttons
    buttons.forEach((button) => {
      console.log("Adding event listener to button with id:", button.id);
  
      button.addEventListener("click", function () {
        console.log("Button clicked with id:", button.id);
  
        // Check the id of the button
        switch (button.id) {
          case "cancel":
            // Display a confirmation dialog
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
            // Display a confirmation dialog
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
          // Add more cases for other button ids as needed
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
});
