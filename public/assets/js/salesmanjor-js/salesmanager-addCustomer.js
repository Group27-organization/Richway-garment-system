
$(document).ready(function(){


    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");


    jQuery.validator.addMethod("selectNone", function(value, element) {
            if (element.value == "0") {
                return false;
            } else
                return true;
        },
        "Please select an option."
    );

    $("#cstaddForm").validate({

        rules: {
            name : {
                required: true,
                minlength: 5,
                noSpace: true,
            },
            address : {
                required: true,
                noSpace: true
            },
            contact_no: {
                required: true,
                length: 10,
                noSpace: true
            },
            gender: {
                selectNone: true
            },
            email: {
                required: true,
                email: true

            },

        },
        messages : {
            name: {
                minlength: "Name should be at least 5 characters",
                noSpace: "Dont Keep empty spaces "
            },
            address: {
                minlength: "Name should be at least 10 characters",
                noSpace: "Dont Keep empty spaces "

            },
            gender: {
                selectNone: "Select gender"
            },
            contact_no: {
                required: "Please enter your contact number",
                length: "Contact Number must be  10 Numbers ",
                noSpace: "Dont Keep empty spaces "
            },
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },

        }
    });

});

