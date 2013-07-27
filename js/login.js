$(document).on("pageshow", "#login", function() {
    $("#login-form").validate({
        errorPlacement: function(error, element) {
            error.insertAfter($(element).parent());
        }
    });
});