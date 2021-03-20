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

    let i, tblrows, rawID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            rawID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialToStockController/setNewSession",
                    data: {rawID: rawID,  key: "rawMaterialData"},
                    success: function (data) {

                        if(currenttab=="fabric"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/editfabric";
                        }
                        if(currenttab=="button"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/editbutton";
                        }
                        if(currenttab=="thread"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController/editthread";
                        }


                        // alert("you clicked"+);

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




