$(document).ready(function(){


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageCustomerController/loadCustomerTable",
        data: {  key: "customerTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#customerTableFormanageCustomer").html(data);
            console.log("Table data load"+data);

        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#addCustomer").click(function(){
        location.href = "http://localhost/Richway-garment-system/manageCustomerController/addCustomerform";

    });

                       
   
    $("#deleteCustomer").click(function(){
        location.href = "http://localhost/Richway-garment-system/manageCustomerController/deleteCustomer";
 
     });
 


});

function updateCustomer() {

    let i, tblrows, cusID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            cusID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageCustomerController/setNewSession",
                    data: {customer_ID: cusID, key: "customerUpdate"},
                    dataType: 'html',
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/manageCustomerController/loadupdateCustomerform";
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



function deleteCustomer() {

    let i, tblrows, cust_ID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            cust_ID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageCustomerController/deleteCustomer",
                    data: {customer_ID: cust_ID, key: "customerDelete"},
                    dataType: 'html',
                    success: function (data) {
                        alert(data);
                        // console.log("Table data load"+data);

                    },
                    error: function () {
                        // console.log("update data not  load")
                        $("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }
    }
}

