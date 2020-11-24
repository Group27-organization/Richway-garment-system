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





});


function updateSupplier() {

    let i, tblrows, supID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#SupplierMsgView').style.display = "none";
            supID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageSupplierController/setNewSession",
                    data: {supplierID: supID, key: "supplierUpdate"},
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/manageSupplierController/loadupdateSupplierform";
                    },
                    error: function () {
                        // console.log("update data not  load")
                       //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }

        else{
            document.querySelector('#SupplierMsgView').style.display = "block";
        }
    }
}

function deleteSupplier() {

    let i, tblrows, suppID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#SupplierMsgView').style.display = "none";
            suppID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageSupplierController/deleteSupplier",
                    data: {supplierID: suppID, key: "supplierDelete"},
                    success: function (data) {
                       // alert(data);
                        if(parseInt(data)===200){
                            if(!alert("Supplier removed successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/index"
                            }
                        }
                    },
                    error: function () {
                        // console.log("update data not  load")
                        $("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }
        else{
            document.querySelector('#SupplierMsgView').style.display = "block";
        }

    }
}
