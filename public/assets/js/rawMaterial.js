openRaw(null,'fabric');


function openRaw(evt,rawitemID) {
    let i, tablinks, addRawmaterialBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addRawmaterialBtn = document.getElementById("addRawmaterial");

        addRawmaterialBtn.onclick = function() {
            console.log("RRR :"+rawitemID);
            openRaw(null,'fabric');

            $.ajax({
                success: function(data,status){
                    if(rawitemID=="fabric"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialController/addFabricform";

                    }
                    if(rawitemID=="button"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialController/addButtonform";

                    }
                    if(rawitemID=="thread"){
                        location.href = "http://localhost/Richway-garment-system/rawMaterialController/addThreadform";

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
                    url: "http://localhost/Richway-garment-system/rawMaterialController/loadFabricTable",
                    data: {employeerole: rawitemID, key: "rawMaterialData2"},
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

            if(rawitemID=="button") {
                $.ajax({

                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialController/loadButtonTable",
                    data: {employeerole: rawitemID, key: "rawMaterialData2"},
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
        if(rawitemID=="thread") {
            $.ajax({

                type: 'POST',
                url: "http://localhost/Richway-garment-system/rawMaterialController/loadThreadTable",
                data: {employeerole: rawitemID, key: "rawMaterialData2"},
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



function deleteRawMaterial(){

    let i, tblrows, rawID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#employeeMsgView').style.display = "none";
            rawID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialController/deleteFabric",
                    data: {ID: rawID, key: "rawDelete"},
                    success: function (data) {
                         if(parseInt(data)===200){
                              if(!alert("Fabric removed successfully")) {
                                 window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
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
            //document.querySelector('#employeeMsgView').style.display = "block";
        }

    }
}




