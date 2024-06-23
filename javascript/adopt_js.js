$(document).ready(function() {
    // Function to fetch adoptions from the server
    function fetchAdoptions() {
        $.ajax({
            url: 'fetch_adoptions.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Fetched adoptions:', data); // Log fetched data for debugging
                var tableBody = $('#adoptionTable tbody');
                tableBody.empty();
                data.forEach(function(row) {
                    var statusClass = row.status.toLowerCase();
                    var actions = '';

                    // Determine actions based on status
                    if (row.status === 'pending') {
                        actions = '<button class="button cancel" style="width: fit-content">Cancel</button>';
                    } else if (row.status === 'approve') {
                        actions = '<button class="button date-picker" style="width: fit-content">Set Date</button>';
                    } else if (row.status === 'rejected') {
                        actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                    } else { // default for 'cancel' status
                        actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                    }

                    // Prepare adoption date HTML if available
                    var adoptionDate = row.date ? `<br><span class="adoption-date">Adoption Date: ${row.date}</span>` : '';

                    // Construct the row HTML
                    var rowHtml = `
                        <tr data-email="${row.email}" data-pet-id="${row.petId}" data-shelter-id="${row.shelterId}">
                            <td>${row.petId}</td>
                            <td>${row.shelterId}</td>
                            <td class="status ${statusClass}">${row.status}${adoptionDate}</td>
                            <td class="actions">${actions}</td>
                        </tr>
                    `;
                    tableBody.append(rowHtml);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching adoptions:', error);
            }
        });
    }

    // Initial fetch of adoptions when the document is ready
    fetchAdoptions();

    // Event handler for the Cancel button
    $('#adoptionTable').on('click', '.cancel', function() {
        if (confirm('Are you sure you want to cancel this adoption request?')) {
            var row = $(this).closest('tr');
            var email = row.data('email');
            var petId = row.data('pet-id');
            var shelterId = row.data('shelter-id');

            updateAdoptionStatus(email, petId, shelterId, 'cancel', null, function(success) {
                if (success) {
                    fetchAdoptions(); // Refresh the table after updating the status
                }
            });
        }
    });

    // Event handler for the Delete button
    $('#adoptionTable').on('click', '.delete', function() {
        if (confirm('Are you sure you want to delete this adoption record?')) {
            var row = $(this).closest('tr');
            var email = row.data('email');
            var petId = row.data('pet-id');
            var shelterId = row.data('shelter-id');

            updateAdoptionStatus(email, petId, shelterId, 'delete', null, function(success) {
                if (success) {
                    fetchAdoptions(); // Refresh the table after deleting the record
                }
            });
        }
    });

    // Event handler for the Set Date button
    $('#adoptionTable').on('click', '.date-picker', function() {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id');
        var shelterId = row.data('shelter-id');

        var adoptionDate = prompt('Please enter the adoption date (YYYY-MM-DD):');
        if (adoptionDate) {
            updateAdoptionStatus(email, petId, shelterId, 'approve', adoptionDate, function(success) {
                if (success) {
                    fetchAdoptions(); // Refresh the table after updating the adoption date
                }
            });
        }
    });

    // Function to update adoption status via AJAX
    function updateAdoptionStatus(email, petId, shelterId, action, adoptionDate, callback) {
        $.ajax({
            url: 'update_status.php',
            method: 'POST',
            data: {
                email: email,
                petId: petId,
                shelterId: shelterId,
                action: action,
                date: adoptionDate // Pass adoptionDate as part of the data
            },
            dataType: 'json',
            success: function(response) {
                console.log('Update status response:', response); // Log response for debugging
                if (response.success) {
                    callback(true); // Notify success
                } else {
                    alert('Failed to update adoption status.');
                    callback(false); // Notify failure
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating adoption status:', error);
                alert('Error updating adoption status. Please try again later.');
                callback(false); // Notify failure
            }
        });
    }
});
