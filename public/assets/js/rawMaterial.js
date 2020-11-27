openEmp(null,'fabric');
addEmployeeBtn = document.getElementById("addEmployee");
addRawmaterial.onclick = function() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageEmployeeController/setNewSession",
        data: {role: 'sales_manager', key: "manageEmployeeData"},
        success: function (data, status) {
            location.href = "http://localhost/Richway-garment-system/rawMaterialController/addRawmaterialform";
        },
        error: function () {
        }
    });

}



function openEmp(evt,elementID) {
    let i, tablinks, addEmployeeBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        addEmployeeBtn = document.getElementById("addEmployee");
        addEmployeeBtn.onclick = function() {

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/manageEmployeeController/setNewSession",
                data: { role: elementID,  key: "manageEmployeeData"},
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
        url: "http://localhost/Richway-garment-system/manageEmployeeController/loadTable",
        data: { employeerole: elementID,  key: "manageEmployeeData2"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive").html(data);


        },
        error       : function() {
            $("#table-responsive").html('<br><p>Something went wrong.</p>');
        }
    });


}
;


