$(document).ready(function () {
    console.log("aaaaaaaaaaa");
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/loadOrderTable",
        data: {   key: "ordersTable"},
        success: function(data){

            $("#orderTable").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
});

function updateOrder() {

    let i, tblrows, supID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            supID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/updateOrderController/setNewSession",
                    data: {orderID: supID, key: "orderUpdate"},
                    success: function (data) {

                        location.href = "http://localhost/Richway-garment-system/updateOrderController/loadUpdateOrderForm";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }
    }
}