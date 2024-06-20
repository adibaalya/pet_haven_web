document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');
    const donateButton = document.querySelector('.ready-to-donate .btn');
    const petShelterSelect = document.getElementById('pet-shelter');

    // Function to open the popup
    function openPopup() {
        // Clear any previously selected value
        petShelterSelect.value = '';
        
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

    // Fetch shelter data from PHP
    fetch('../php/get_shelters.php')
    .then(response => response.json())
    .then(shelters => {
        // Clear existing options first
        petShelterSelect.innerHTML = '';
        
        // Add the default "Select pet shelter" option
        let defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Select pet shelter';
        petShelterSelect.appendChild(defaultOption);

        // Populate the dropdown with shelters
        shelters.forEach(shelter => {
            let option = document.createElement('option');
            option.value = shelter.id;
            option.textContent = shelter.name;
            petShelterSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error fetching shelters:', error);
        // Handle error (optional)
    });

    // Add event listener to the form submission
    document.getElementById('donationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Gather form data
        const form = document.getElementById('donationForm');
        const formData = new FormData(form);

        // Send the data to the server using fetch (already in your code)
        fetch('../php/donate.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Handle success or error based on 'data' received
            if (data.status === 'success') {
                alert('Donation submitted successfully!');
                closePopup();
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
