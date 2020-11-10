console.log("Table pane js  load")
openEmp(null,'RawMaterial');
addUserBtn = document.getElementById("adduser");
addUserBtn.onclick = function() {

    location.href = "http://localhost/Richway-garment-system/addRawMaterialController";

}


function openEmp(evt,elementID) {
    let i, tablinks, addUserBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addUserBtn = document.getElementById("adduser");
        addUserBtn.onclick = function() {
            if(elementID=="RawMaterial"){
                location.href = "http://localhost/Richway-garment-system/addRawMaterialController";
            }else if(elementID=="Tools"){

            }else if(elementID=="Machine"){

            }




        }
    }

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/StockNavigationController/loadRTMTable",
        data: { tableName: elementID,  key: "ItemType"},
        dataType: 'html',
        success: function(data){
            $("#tableParent").html(data);
            console.log("Table data load")

        },
        error       : function() {
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

}