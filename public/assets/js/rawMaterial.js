let rawMaterialType='fabric';
openRaw(null,'fabric');


function openRaw(evt,rawitemID) {
    console.log("rawMaterialType initial :"+rawMaterialType);

    let i, tablinks, addRawmaterialBtn;

    if(evt != null) {
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
    }
    rawMaterialType =rawitemID;
    console.log("rawMaterialType :::"+rawMaterialType);

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



function updateRawMaterial() {

    let i, tblrows, fabID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#rawMaterialMsgView').style.display = "none";
            fabID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/rawMaterialController/setNewSession",
                    data: {ID: fabID, key: "fabricUpdate"},
                    success: function (data) {

                        if(rawMaterialType=="fabric"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialController/loadupdateFabricform";

                        }
                        if(rawMaterialType=="button"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialController/loadupdateButtonform";

                        }
                        if(rawMaterialType=="thread"){
                            location.href = "http://localhost/Richway-garment-system/rawMaterialController/loadupdateThreadform";

                        }


                    },
                    error: function () {
                        // console.log("update data not  load")
                        //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }

        else{
            document.querySelector('#rawMaterialMsgView').style.display = "block";
        }
    }
}




function deleteRawMaterial(){

    let i, tblrows, rawID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#employeeMsgView').style.display = "none";
            rawID = tblrows[i].firstElementChild.innerHTML;
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/rawMaterialController/deleteFabric",
                data: {ID: rawID, key: "rawDelete"},
                success: function (data) {
                    if(!alert("Fabric removed successfully")) {
                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                    }

                },
                error: function () {
                    // console.log("update data not  load")
                    $("#tableParent").html('<br><p>Something went wrong.</p>');
                }
            });



        }


    }
}
$(document).ready(function(){
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/rawMaterialController/fabric_codeDropdown",
    data: {  key: "fabric_code"},
    success: function(data){
        console.log("success");
        // $("#fabric_codeDropdownlistId").html(data);



    },
    error       : function() {

    }
});
});









