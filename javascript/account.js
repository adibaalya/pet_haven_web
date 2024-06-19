
document.addEventListener("DOMContentLoaded", () => {
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
});
