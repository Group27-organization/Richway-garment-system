openRaw(null,'fabric');

let currenttab;
function openRaw(evt,rawitemID) {
    let i, tablinks, addRawmaterialBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addRawmaterialBtn = document.getElementById("addRawmaterial");

        currenttab =rawitemID;

        addRawmaterialBtn.onclick = function() {
            console.log("RRR :"+rawitemID);
            openRaw(null,'fabric');

            $.ajax({
                success: function(data,status){
                    if(rawitemID=="fabric"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/addFabricform";

                    }
                    if(rawitemID=="button"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/addButtonform";

                    }
                    if(rawitemID=="thread"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/addThreadform";

                    }


                },
                error : function() {
                }
            });

        }
        }
            if(rawitemID=="fabric") {
                $.ajax({

                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadFabricTable",
                    data: {employeerole: rawitemID, key: "rawMaterialData1"},
                    dataType: 'html',
                    success: function (data) {

                        $("#table-responsive").html(data);


                    },
                    error: function () {
                        $("#table-responsive").html('<br><p>Something went wrong.</p>');
                    }
                });
            }

            if(rawitemID=="button") {
                $.ajax({

                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadButtonTable",
                    data: {employeerole: rawitemID, key: "rawMaterialData2"},
                    dataType: 'html',
                    success: function (data) {

                        $("#table-responsive").html(data);


                    },
                    error: function () {
                        $("#table-responsive").html('<br><p>Something went wrong.</p>');
                    }
                });
            }
        if(rawitemID=="thread") {
            $.ajax({

                type: 'POST',
                url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadThreadTable",
                data: {employeerole: rawitemID, key: "rawMaterialData3"},
                dataType: 'html',
                success: function (data) {
                    // alert(data);
                    $("#table-responsive").html(data);


                },
                error: function () {
                    $("#table-responsive").html('<br><p>Something went wrong.</p>');
                }
            });
        }


}
function updateRM() {

    let i, tblrows, supID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            supID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialToStockController/setNewSession",
                    data: {supplierID: supID, rawmaterialtype : currenttab, key: "rawMaterialData"},
                    success: function (data) {
                        // alert("you clicked"+);
                        location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/editfabric";
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




