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
});

document.getElementById('donationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Gather form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const donationType = document.getElementById('donation-type').value;
    const petShelter = document.getElementById('pet-shelter').value;
    const donationAmount = document.getElementById('donation-amount').value;

    // Redirect to payment gateway
    const paymentGatewayUrl = `https://www.cimbclicks.com.my/?amount=${donationAmount}&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&donationType=${encodeURIComponent(donationType)}&petShelter=${encodeURIComponent(petShelter)}`;
    window.location.href = paymentGatewayUrl;
});