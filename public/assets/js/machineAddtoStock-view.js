
$(document).ready(function(){
    console.log("machine add to stock")
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageStockMachineController/loadMachineTable",
        data: {  key: "supplierTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive-MachineTable").html(data);
            console.log("Table data load")

        },
        error       : function() {
            $("#table-responsive-MachineTable").html('<br><p>Something went wrong.</p>');
        }
    });
    $("#addTool").click(function () {
        location.href = "http://localhost/Richway-garment-system/manageStockMachineController/addStockMachineForm"
    });
});




