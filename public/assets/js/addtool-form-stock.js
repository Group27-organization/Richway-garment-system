$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageToolController/setToolCategoryDropdown",
        data: {   key: "selecttooldopdown"},
        success: function(data){
             console.log("tool : "+data);
            $("#selecttooldopdown").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
    $("#selecttooldopdown").select2({
        templateResult: formatOptions2
    });

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageToolController/setSupplierDropdown",
        data: {   key: "selectsupplierdopdown"},
        success: function(data){
            console.log("tool : "+data);
            $("#selectsupplierdopdown").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
    $("#selectsupplierdopdown").select2({
        templateResult: formatOptions2
    });

    $("#btnsubmitBtn").click(function(e){
        $("#A").hide();
        $("#B").hide();
        $("#C").hide();
        $("#D").hide();
        $("#E").hide();


        $(".error").hide();
        if($("#selecttooldopdown option:selected").val()=="0"){
            $("#A").show();
        }if($("#toolQuantity").val()=="" ||parseInt($("#toolQuantity").val())<0 ||jQuery.trim($("#toolQuantity").val()).length == 0 || $.isNumeric($("#btnQuantity").val())!=true  ){
            $("#B").show();
        }if($("#toolprice").val()=="" ||parseInt($("#toolprice").val())<0 ||jQuery.trim($("#toolprice").val()).length == 0 || $.isNumeric($("#btnQuantity").val())!=true  ){
            $("#C").show();
        } if(jQuery.trim($("#Description").val()).length == 0){
            $("#D").show();
        }if($("#selectsupplierdopdown option:selected").val()=="0"){
            $("#E").show();
        }else{
            $("#btnForm").submit();
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
