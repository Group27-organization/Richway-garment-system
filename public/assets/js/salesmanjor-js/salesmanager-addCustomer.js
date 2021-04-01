
$(document).ready(function(){

    // $("#findsupbtn").click(function () {
    //     $('html, body').animate({
    //         scrollTop: $("#right").offset().top   //id of div to be scrolled
    //     }, 1);
    //
    //     document.querySelector('#selectsuppliertable').style.display = "flex";
    //     document.querySelector('body').style.overflow = "hidden";
    //     ///////////////////////////////////////////customer table load/////////////////////////////////////////////////
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadSupplierTable",
    //         data: {  key: "supplierinstock"},
    //         success: function(data){
    //             $("#suppliertablestock").html(data);
    //
    //
    //         },
    //         error       : function() {
    //             $("#suppliertablestock").html('<br><p>Something went wrong.</p>');
    //         }
    //     });
    // });

    // $("#btnsubmitC").click(function(e){
    //     $(".error").hide();
    //     if($("#CustomerName").val()==""||jQuery.trim($("#CustomerName").val()).length == 0){
    //         $("#A").show();
    //     }
    //     if($("#Address").val()=="" ||jQuery.trim($("#Address").val()).length == 0){
    //         $("#B").show();
    //     }
    //     if($("#CustomerContactNumber").val()=="" ||jQuery.trim($("#CustomerContactNumber").val()).length == 0||jQuery.trim($("#CustomerContactNumber").val()).length == 10){
    //         $("#C").show();
    //     }
    //
    //     if($("#gender option:selected").val()=="0") {
    //         $("#D").show();
    //     }if ($("#Email").val() == "") {
    //          $("#E").show();
    //     }else{
    //             $("#cstaddForm").submit();
    //     }
    //
    // });

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
                number: true,
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
            // weight: {
            //     required: {
            //         depends: function(elem) {
            //             return $("#age").val() > 50
            //         }
            //     },
            //     number: true,
            //     min: 0
            // }
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
                number: "Please enter your age as a numerical value",
                length: "Contact Number must be  10 Numbers ",
                noSpace: "Dont Keep empty spaces "
            },
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
            // weight: {
            //     required: "People with age over 50 have to enter their weight",
            //     number: "Please enter your weight as a numerical value"
            // }
        }
    });

});

