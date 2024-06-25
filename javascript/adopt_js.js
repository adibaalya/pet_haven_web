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
                } else if (row.status === 'rejected') {
                    actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                } else {
                    actions = '<button class="button delete" style="width: fit-content">Delete</button>';
                }
                var adoptionDate = row.date ? `<br><span class="adoption-date">Adoption Date: ${row.date}</span>` : '';
                var rowHtml = `
                    <tr data-email="${row.email}" data-pet-id="${row.petId}" data-shelter-id="${row.shelterId}">
                    <td>${row.petName}</td> <!-- Updated to display pet name -->
                    <td>${row.shelterName}</td> <!-- Updated to display shelter name -->
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

$(document).ready(function () {
    fetchAdoptions();
    var pollInterval = 5000;
    setInterval(function () {
        fetchAdoptions();
    }, pollInterval);

    $('#adoptionTable').on('click', '.cancel, .delete, .date-picker', function () {
        var row = $(this).closest('tr');
        var email = row.data('email');
        var petId = row.data('pet-id');
        var shelterId = row.data('shelter-id');
        var action = $(this).hasClass('cancel') ? 'cancel' : $(this).hasClass('delete') ? 'delete' : 'approve';
        var adoptionDate = action === 'approve' ? prompt('Please enter the adoption date (YYYY-MM-DD):') : '';

        updateAdoptionStatus(email, petId, shelterId, action, adoptionDate, function (success) {
            if (success) {
                fetchAdoptions();
            }
        });
    });
});