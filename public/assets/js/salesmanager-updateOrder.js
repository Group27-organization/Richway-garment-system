$(document).ready(function () {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/loadOrderTable",
        data: {   key: "ordersTable"},
        success: function(data){

            $("#orderTableNotStart").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
});