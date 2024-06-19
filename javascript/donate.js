document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');
    const donateButton = document.querySelector('.ready-to-donate .btn');

    // Function to open the popup
    function openPopup() {
        popup.style.display = 'block';
        overlay.style.display = 'block';
    }

    // Function to close the popup
    function closePopup() {
        popup.style.display = 'none';
        overlay.style.display = 'none';
    }

    // Add event listener to open the popup when donate button is clicked
    donateButton.addEventListener('click', openPopup);

    // Add event listener to close the popup when clicking outside
    overlay.addEventListener('click', closePopup);

    // Add event listener to the form submission
    document.getElementById('donationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Gather form data
// Assuming you have a form element with id="donationForm" in your HTML
const form = document.getElementById('donationForm');
const formData = new FormData(form);

        // Send the data to the server using fetch
        fetch('donate.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Handle success or error based on 'data' received
            if (data.status === 'success') {
                alert('Donation submitted successfully!');
                // Optionally, redirect or perform other actions on success
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting donation. Please try again later.');
        });
        
    });

});
