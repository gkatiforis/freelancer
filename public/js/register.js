$(document).ready(function () {

    $('#registration-form').validate({
        rules: {
            username: {
                minlength: 6,
                required: true,
            },

            password: {
                required: true,
                minlength: 6
            },
            //confirm_password: {
            //	required: true,
            //	minlength: 6,
            //	equalTo: "#password"
            //},
            email: {
                required: true,
                email: true
            },

            agree: "required"
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