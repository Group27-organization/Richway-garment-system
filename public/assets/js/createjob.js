
loadOrderTbl();
addUserBtn = document.getElementById("adduser");
addUserBtn.onclick = function() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageUserController/setNewSession",
        data: { role: 'sales_manager',  key: "manageUserData"},
        success: function(data,status){
            location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView";
        },
        error       : function() {
        }
    });

}


function loadOrderTbl() {

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageJobController/loadOrderTable",
            data: { key: "manageJobData"},
            dataType: 'html',
            success: function(data){
                $("#table-responsive").html(data);

            },
            error       : function() {
                $("#table-responsive").html('<br><p>Something went wrong.</p>');
            }
        });

}
