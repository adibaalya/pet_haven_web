let value = 1250;
setInterval(() => {
  document.getElementById('odometer').textContent = value.toString();
}, 1000); // update every 1 second
function toggleHeart(button) {
  button.classList.toggle('liked');
}
 // Example filtering logic (replace with your actual data)
 const petCards = document.querySelectorAll('.pet-card');

 const typeFilter = document.getElementById('type');
 typeFilter.addEventListener('change', function() {
   const selectedType = this.value;
   petCards.forEach(card => {
     if (selectedType === '' || card.querySelector('.pet-details').textContent === selectedType) {
       card.style.display = 'block';
     } else {
       card.style.display = 'none';
     }
   });
 });
 const filterSearch = document.getElementById('filter-search');
 const filterItems = document.querySelectorAll('.filter-item');
 
 filterSearch.addEventListener('input', (e) => {
   const searchTerm = e.target.value.toLowerCase();
   filterItems.forEach((item) => {
     const label = item.querySelector('.filter-label');
     const text = label.textContent.toLowerCase();
     if (text.includes(searchTerm)) {
       item.style.display = 'block';
     } else {
       item.style.display = 'none';
     }
   });
 });
 document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded and parsed");

  //hi
  // Get all delete buttons on the page
  const deleteButtons = document.querySelectorAll(".delete-button");
  console.log("Delete buttons found:", deleteButtons.length);

  // Add event listener to all delete buttons
  deleteButtons.forEach((button) => {
    console.log("Adding event listener to delete button with data-id:", button.dataset.id);

    button.addEventListener("click", function () {
      console.log("Delete button clicked with data-id:", button.dataset.id);

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
    });
  });
});
