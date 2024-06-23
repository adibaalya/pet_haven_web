$(document).ready(function () {
    // Function to fetch and update badge data
    function updateBadges() {
        $.ajax({
            url: 'Badge.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update collected points
                $('#collectedPoints').text(data.points);

                // Update badges based on JSON response
                if (data.badge1_given) {
                    $('#badgeContainer .badge:nth-child(1)').removeClass('badge-inactive').addClass('badge-given');
                } else {
                    $('#badgeContainer .badge:nth-child(1)').addClass('badge-inactive');
                }
                if (data.badge2_given) {
                    $('#badgeContainer .badge:nth-child(2)').removeClass('badge-inactive').addClass('badge-given');
                } else {
                    $('#badgeContainer .badge:nth-child(2)').addClass('badge-inactive');
                }
                if (data.badge3_given) {
                    $('#badgeContainer .badge:nth-child(3)').removeClass('badge-inactive').addClass('badge-given');
                } else {
                    $('#badgeContainer .badge:nth-child(3)').addClass('badge-inactive');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching badge data:', error);
                // Handle error if needed
            }
        });
    }

    // Initial fetch of badge data on page load
    updateBadges();
});