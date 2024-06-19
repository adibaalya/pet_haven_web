let value = 1250;
setInterval(() => {
  document.getElementById("odometer").textContent = value.toString();
}, 1000);

function toggleHeart(button) {
  button.classList.toggle("liked");
}


const petCards = document.querySelectorAll(".card");

const typeFilter = document.getElementById("Breed");
typeFilter.addEventListener("change", function () {
  const selectedType = this.value;
  petCards.forEach((card) => {
    if (
      selectedType === "" ||
      card.querySelector("h2").textContent === selectedType
    ) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
});

const locationFilter = document.getElementById("Location");
locationFilter.addEventListener("change", function () {
  const selectedLocation = this.value;
  petCards.forEach((card) => {
    if (
      selectedLocation === "" ||
      card.querySelector("p.shelter").textContent === selectedLocation
    ) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
});

const filterSearch = document.getElementById("filter-search");
filterSearch.addEventListener("input", (e) => {
  const searchTerm = e.target.value.toLowerCase();
  petCards.forEach((card) => {
    const name = card.querySelector("h2").textContent.toLowerCase();
    const shelter = card.querySelector("p.shelter").textContent.toLowerCase();
    if (name.includes(searchTerm) || shelter.includes(searchTerm)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded and parsed");

 
  const deleteButtons = document.querySelectorAll(".delete-button");
  console.log("Delete buttons found:", deleteButtons.length);

  deleteButtons.forEach((button) => {
    console.log(
      "Adding event listener to delete button with data-id:",
      button.dataset.id
    );

    button.addEventListener("click", function () {
      console.log("Delete button clicked with data-id:", button.dataset.id);

      
      if (confirm("Are you sure you want to delete this pet?")) {
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
