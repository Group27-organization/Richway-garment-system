
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageSupplierController/loadSupplierTable",
        data: {  key: "supplierTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive-stockitems").html(data);
            console.log("Table data load")

        },
        error       : function() {
            $("#table-responsive2").html('<br><p>Something went wrong.</p>');
        }
    });
    $("#addSupplier").click(function () {
        location.href = "http://localhost/Richway-garment-system/manageSupplierController/addSupplierForm"
    });
});




