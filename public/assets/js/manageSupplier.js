$(document).ready(function(){


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageSupplierController/loadSupplierTable",
        data: {  key: "supplierTableInDash"},
        dataType: 'html',
        success: function(data){

            $("#supplierTableForManageSupplier").html(data);


        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#addSupplier").click(function(){
        location.href = "http://localhost/Richway-garment-system/manageSupplierController/addSupplierform";

    });



});

