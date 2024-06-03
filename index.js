$(document).ready(function(){
    $('#catTipsModal').on('hidden.bs.modal', function () {
      $(this).find('.modal-body').html('<!-- Insert your cat tips here -->');
    });
  });