$(document).ready(function () {


    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },

            password: {
                required: true,
            },

        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });

});