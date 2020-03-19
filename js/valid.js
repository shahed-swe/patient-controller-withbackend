$(document).ready(function() {
    $("#submit").css('display', 'none');
    $('#password').on('input', function() {
        var password = $("#password").val();
        if (password) {
            $("#submit").css('display', 'block');
        } else {
            $("#submit").css('display', 'none');
        }
    });

});