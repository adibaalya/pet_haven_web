$(document).ready(function () {
    // Function to fetch adoptions from the server
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
                    } else if (row.status === 'reject') {
                        actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                    } else {
                        actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                    }
                    var adoptionDate = row.date? `<br><span class="adoption-date">${row.status === 'reject'? 'Rejected Date' : row.status === 'approve'? 'Pickup Date' : ''}: ${row.date}</span>` : '';
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

    // Function to update adoption status via AJAX
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

    // Initial fetch of adoptions when the document is ready
    fetchAdoptions();

    // Polling interval in milliseconds (e.g., poll every 5 seconds)
    var pollInterval = 5000; // 5 seconds

    // Function to poll for adoption updates
    function pollAdoptions() {
        setInterval(function () {
            fetchAdoptions(); // Fetch adoptions periodically
        }, pollInterval);
    }

    // Start polling
    pollAdoptions();

    // Event handler for the Cancel button
    $('#adoptionTable').on('click', '.cancel', function () {
        if (confirm('Are you sure you want to cancel this adoption request?')) {
            var row = $(this).closest('tr');
            var email = row.data('email');
            var petId = row.data('pet-id');
            var shelterId = row.data('shelter-id');

            // Call the updateAdoptionStatus function with action 'cancel'
            updateAdoptionStatus(email, petId, shelterId, 'cancel', '', function (success) {
                if (success) {
                    // Update the status column and replace Cancel button with Delete button
                    row.find('.status').text('cancel').removeClass('pending approve rejected').addClass('cancel');
                    row.find('.actions').html('<button class="button delete" style="width: fit-content">Delete</button>');
                }
            });
        }
    });

    // Event handler for the Delete button
    $('#adoptionTable').on('click', '.delete', function () {
        if (confirm('Are you sure you want to delete this adoption record?')) {
            var row = $(this).closest('tr');
            var email = row.data('email');
            var petId = row.data('pet-id');
            var shelterId = row.data('shelter-id');

            // Call the updateAdoptionStatus function with action 'delete'
            updateAdoptionStatus(email, petId, shelterId, 'delete', '', function (success) {
                if (success) {
                    // If successful, remove the row from the table
                    row.remove();
                }
            });
        }
    });

    // Event handler for the Set Date button
    $('#adoptionTable').on('click', '.date-picker', function () {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id');
        var shelterId = row.data('shelter-id');
    
        // Create a date picker input field
        var datePicker = $('<input type="date" id="adoptionDate" style="position: absolute; z-index: 1; padding: 5px; border: 1px solid #ccc;" />');
    
        // Append the date picker input field to the body
        $('body').append(datePicker);
    
        // Position the date picker input field below the.date-picker element
        var offset = $(this).offset();
        var height = $(this).outerHeight();
        datePicker.css({
            top: offset.top + height + 'px',
            left: offset.left + 'px'
        });
    
        // Focus the date picker input field
        datePicker.focus();
    
        // Add an event listener to the date picker input field
        datePicker.on('change', function () {
            var adoptionDate = datePicker.val();
            if (adoptionDate) {
                // Call the updateAdoptionStatus function with action 'approve' and adoptionDate
                updateAdoptionStatus(email, petId, shelterId, 'approve', adoptionDate, function (success) {
                    if (success) {
                        // Update the status column with 'approve' and display adoptionDate
                        row.find('.status').html(`Approved<br><span class="adoption-date">Adoption Date: ${adoptionDate}</span>`)
                           .removeClass('pending cancel rejected').addClass('approve');
                    } else {
                        console.log('Failed to update adoption status.');
                    }
                });
            }
            // Remove the date picker input field
            datePicker.remove();
        });
    
        // Add an event listener to the document to close the date picker when clicked outside
        $(document).on('click', function (e) {
            if ($(e.target).closest('.date-picker').length === 0 && $(e.target).closest('#adoptionDate').length === 0) {
                datePicker.remove();
            }
        });
    });
});
