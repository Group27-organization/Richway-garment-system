openRaw(null,'fabric');
addRawmaterialBtn = document.getElementById("addRawmaterial");
addRawmaterial.onclick = function() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/rawMaterialController/setNewSession",
        data: {type: 'fabric', key: "rawMaterialData"},
        success: function (data, status) {
            location.href = "http://localhost/Richway-garment-system/rawMaterialController/addRawmaterialform";
        },
        error: function () {
        }
    });

}



function openRaw(evt,elementID) {
    let i, tablinks, addRawmaterialBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addRawmaterialBtn = document.getElementById("addRawmaterial");
        addRawmaterialBtn.onclick = function() {

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/rawMaterialController/setNewSession",
                data: { type: elementID,  key: "rawMaterialData"},
                success: function(data,status){
                    location.href = "http://localhost/Richway-garment-system/rawMaterialController/addRawmaterialform";
                },
                error       : function() {
                }
            });

        }
    }
    console.log("RRR :"+elementID);
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/rawMaterialController/loadTable",
        data: { employeerole: elementID,  key: "rawMaterialData2"},
        dataType: 'html',
        success: function(data){
           // alert(data);
            $("#table-responsive").html(data);


        },
        error       : function() {
            $("#table-responsive").html('<br><p>Something went wrong.</p>');
        }
    });


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




