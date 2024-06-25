function fetchAdoptions() {
    $.ajax({
        url: '../php/fetch_adoptions.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log('Fetched adoptions:', data);
            var tableBody = $('#adoptionTable tbody');
            tableBody.empty();
            data.forEach(function (row) {
                var statusClass = row.status.toLowerCase();
                var actions = '';
                if (row.status === 'pending') {
                    actions = '<button class="button cancel" style="width: fit-content">Cancel</button>';
                } else if (row.status === 'approve') {
                    actions = '<button class="button date-picker" style="width: fit-content">Set Date</button>';
                } else if (row.status === 'rejected') {
                    actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                } else {
                    actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                }
                var adoptionDate = row.date ? `<br><span class="adoption-date">Adoption Date: ${row.date}</span>` : '';
                var rowHtml = `
                    <tr data-email="${row.email}" data-pet-id="${row.petId}" data-shelter-id="${row.shelterId}">
                    <td>${row.petName}</td>
                    <td>${row.shelterName}</td>
                    <td class="status ${statusClass}">${row.status}${adoptionDate}</td>
                    <td class="actions">${actions}</td>
                    </tr>
                `;
                tableBody.append(rowHtml);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching adoptions:', error);
        }
    });
}

function updateAdoptionStatus(email, petId, shelterId, status, adoptionDate, callback) {
    console.log('Updating status with:', { email, petId, shelterId, status, adoptionDate }); // Debugging line
    $.ajax({
        url: '../php/update_status.php',
        type: 'POST',
        data: {
            email: email,
            petId: petId,
            shelterId: shelterId,
            action: status,
            adoptionDate: adoptionDate
        },
        success: function (response) {
            console.log('Response from server:', response); // Debugging line
            try {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    callback(true);
                } else {
                    console.log('Server responded with success: false');
                    callback(false);
                }
            } catch (e) {
                console.error('Error parsing JSON response:', e);
                console.log('Raw response:', response);
                callback(false);
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', status, error);
            callback(false);
        }
    });
}

$(document).ready(function () {
    fetchAdoptions();
    var pollInterval = 5000;
    setInterval(function () {
        fetchAdoptions();
    }, pollInterval);

    $('#adoptionTable').on('click', '.cancel', function () {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id'); // Ensure this matches the data attribute in your HTML
        var shelterId = row.data('shelter-id'); // Ensure this matches the data attribute in your HTML

        console.log('Email:', email, 'Pet ID:', petId, 'Shelter ID:', shelterId); // Debugging line

        updateAdoptionStatus(email, petId, shelterId, 'cancel', '', function (success) {
            if (success) {
                row.remove();
                console.log('Adoption cancelled and row removed.');
            } else {
                console.log('Failed to cancel adoption.');
            }
        });
    });

    $('#adoptionTable').on('click', '.delete', function () {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id');
        var shelterId = row.data('shelter-id');

        updateAdoptionStatus(email, petId, shelterId, 'delete', '', function (success) {
            if (success) {
                row.remove();
                console.log('Adoption record deleted and row removed.');
            } else {
                console.log('Failed to delete adoption record.');
            }
        });
    });

    $('#adoptionTable').on('click', '.date-picker', function () {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id');
        var shelterId = row.data('shelter-id');

        var adoptionDate = prompt('Please enter the adoption date (YYYY-MM-DD):');
        if (adoptionDate) {
            updateAdoptionStatus(email, petId, shelterId, 'approve', adoptionDate, function (success) {
                if (success) {
                    // Update the status column with 'Approved' and display the adoption date
                    var statusElement = row.find('.status');
                    if (statusElement.length) {
                        // Update the status element with the new information
                        statusElement.html('Approved<br><span class="adoption-date">Adoption Date: ' + adoptionDate + '</span>')
                            .removeClass('pending cancel rejected').addClass('approved');
                    } else {
                        console.log('Status element not found. Check the HTML structure.');
                    }
                } else {
                    console.log('Failed to update adoption status.');
                }
            });
        }
    });
});
