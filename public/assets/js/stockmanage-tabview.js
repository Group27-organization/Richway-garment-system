console.log("Table pane js  load")
openEmp(null,'RawMaterial');
addItemBtn = document.getElementById("addItem");
addItemBtn.onclick = function() {

    location.href = "http://localhost/Richway-garment-system/addRawMaterialController";

}


function openEmp(evt,elementID) {
    let i, tablinks, addItemBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addItemBtn = document.getElementById("addItem");
        addItemBtn.onclick = function() {
            if(elementID=="RawMaterial"){
                location.href = "http://localhost/Richway-garment-system/addRawMaterialController";
            }else if(elementID=="Tools"){

            }else if(elementID=="Machine"){

            }




        }
    }

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/StockNavigationController/loadOrderTable",
        data: { tableName: elementID,  key: "orderTable"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive-stockitems").html(data);
            console.log("Table data load")

        },
        error       : function() {
            $("#table-responsive2").html('<br><p>Something went wrong.</p>');
        }
    });

}

function orderIdSelect() {

    let i, tblrows, orderID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            orderID = tblrows[i].firstElementChild.innerHTML;


                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/StockNavigationController/setNewSession",
                    data: { order_ID: orderID, key: "selectOrderId"},
                    dataType: 'html',
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/StockNavigationController/loadaddstockform";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });



        }
    }
}