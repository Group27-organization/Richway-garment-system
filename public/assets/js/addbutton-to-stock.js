$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/rawMaterialToStockController/supplierDropdown",
        data: {  key: "supplierinstock"},
        success: function(data){
            // $("#suppliertablestock").html(data);
            $("#supplierDrop").html(data);



        },
        error       : function() {

        }
    });
    // $("#supplierDrop").select2({
    //     templateResult: formatOptions2
    // });


    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");


    jQuery.validator.addMethod("selectNone", function(value, element) {
            if (element.value == "0") {
                console.log("false");
                return false;
            } else
                console.log("true");
                return true;
        },
        "Please select an option."
    );

    $("#btnForm").validate({

        ignore: [],
        rules: {
            fabric_code_id : {
                required: true,
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
                // required: true,
                 selectNone: true
            },

        },
        messages : {
            fabric_code_id: {
                // selectNone: "Please select fabric code",
                required: "Please select  fabric code",

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

function closeModel(){
    document.querySelector('#selectsuppliertable').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}

function assignsupplier(){

    let i, tblrows, empID="",cname="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
            name =  tblrows[i].children[1].innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('#selectsuppliertable').style.display = "none";


        document.querySelector('body').style.overflow = "auto";
        jQuery(function($) {
            $("#SuppliesId").val(empID);
            $("label[for='SuppliesLabel']").text(name);
        });

    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }
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