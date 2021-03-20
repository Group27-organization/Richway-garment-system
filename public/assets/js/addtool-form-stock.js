$(document).ready(function () {
    console.log("addtool-form-stock");
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageStockToolController/setToolCategoryDropdown",
        data: {   key: "selecttooldopdown"},
        success: function(data){
             console.log("tool : "+data);
            $("#selecttooldopdown").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
    // $("#selecttooldopdown").select2({
    //     templateResult: formatOptions2
    // });


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/rawMaterialToStockController/supplierDropdown",
        data: {  key: "supplierinstock"},
        success: function(data){
            // $("#suppliertablestock").html(data);
            $("#supplierOptions").html(data);



        },
        error       : function() {

        }
    });
    // $("#selectsupplierdopdown").select2({
    //     templateResult: formatOptions2
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

    $("#toolForm").validate({

        rules: {
            category : {

                selectNone: true,

            },
            quantity : {
                required: true,
                number: true,
                noSpace: true
            },
            description: {
                required: true,
                minlength: 10,
                noSpace: true
            },
            supplierOptions: {
                selectNone: true
            },

        },
        messages : {
            category: {
                // selectNone: "Please select fabric code",
                required: "Please select  tool code",

            },
            quantity: {
                number: "Please enter your quantity as a numerical value",
                noSpace: "Dont Keep empty spaces ",
                required: "This Field Required",

            },
            description: {
                required: "This Field Required",
                noSpace: "Dont Keep empty spaces ",
                minlength:"At Least 10 characters should be entered"
            },
            supplierOptions: {
                required: "Please select supplier",


            },

        }
    });

});
//********************customer select************************************//




function formatOptions (state) {
    if (!state.id) { return state.text; }

    var $state;
    $state = $(
        '<span class="dropdownList" ><img class="dropdownimage" src="' + state.element.value+ '"  /> ' + state.text + '</span>'
    );
    if(state.element.value=='0'){
        $state = $(
            '<span class="dropdownList" id="impt" >--SELECT--</span>'
        );
    }

    return $state;
}
function formatOptions2 (state) {
    if (!state.id) { return state.text; }

    var $state;
    $state = $(
        '<span class="dropdownList" >' + state.text + '</span>'
    );
    // if(state.element.value=='0'){
    //     $state = $(
    //         '<span class="dropdownList" id="impt" >--SELECT--</span>'
    //     );
    // }

    return $state;
}
