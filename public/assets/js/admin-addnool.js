$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/rawMaterialController/fabric_codeDropdown",
        data: {  key: "fabric_code"},
        success: function(data){
            $("#fabricCodeDrop").html(data);


        },
        error       : function() {

        }
    });
});