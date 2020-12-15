
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageToolController/loadToolTable",
        data: {  key: "supplierTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive-toolTable").html(data);
            console.log("Table data load")

        },
        error       : function() {
            $("#table-responsive2").html('<br><p>Something went wrong.</p>');
        }
    });
    $("#addTool").click(function () {
        location.href = "http://localhost/Richway-garment-system/manageToolController/addToolForm"
    });
});




