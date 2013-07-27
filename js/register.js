$(document).on("pageshow", "#register", function() {
    $("#register-form").validate({
        errorPlacement: function(error, element) {
            error.insertAfter($(element).parent());
        }
    });
});