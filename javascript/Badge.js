$(document).ready(function() {
    $.ajax({
        url: '../php/Badge.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response); // Log the response for debugging
            $('#points').text(response.points);

            // Clear previous badges if any
            $('.badge-container').empty();

            // Define the badges with their conditions and descriptions
            const badges = [
                { img: '../images/beginner.png', name: 'HOPE GIVER', condition: response.badge1_given, points: 5, description: 'Awarded for<br>taking the first step<br>in your donor journey!' },
                { img: '../images/top.png', name: 'TOP DONOR', condition: response.badge2_given, points: 100, description: 'Awarded for reaching<br>100 points that makes<br>a significant impact<br>on the lives of many!' },
                { img: '../images/food.png', name: 'LIFE SUSTAINER', condition: response.foodBadge_given, points: 15, description: 'Awarded for donating<br>15 points worth of<br>food and supplies' },
                { img: '../images/medical care.png', name: 'HEALTH HERO', condition: response.medicalBadge_given, points: 15, description: 'Awarded for donating<br>15 points towards<br>medical care for pets' },
                { img: '../images/pet shelter.png', name: 'FOREVER FAMILY', condition: response.shelterBadge_given, points: 15, description: 'Awarded for donating<br>15 points towards<br>easing the adoption process' },
                { img: '../images/adopt.png', name: 'HOME HELPER', condition: response.adoptionBadge_given, points: 15, description: 'Awarded for<br>donating 15 points<br>towards shelter upkeep' }
            ];

            // Display all badges
            badges.forEach(badge => {
                const opacity = badge.condition ? '1' : '0.3'; // Full opacity if condition met, else 30%
                $('.badge-container').append(
                    `<div class="badge" style="opacity: ${opacity};">
                        <div class="badge-inner">
                            <div class="badge-front">
                                <img src="${badge.img}" alt="${badge.name}">
                            </div>
                            <div class="badge-back">
                                <div class="badge-description">${badge.description}</div>
                            </div>
                        </div>
                        <div class="badge-name">${badge.name}</div>
                    </div>`
                );
            });
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText); // Log the error for debugging
            $('#points').text('Error loading points');
        }
    });
});
