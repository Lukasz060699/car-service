
$(document).ready(function() {
    $('.accept-visit-btn').on('click', function(e) {
        e.preventDefault();
        var visitId = $(this).closest('li').attr('id');
        $('#' + visitId).addClass('d-none');
    });
});
