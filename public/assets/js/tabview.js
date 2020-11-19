
openEmp(null,'sales_manager');
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

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/manageUserController/setNewSession",
                data: { role: elementID,  key: "manageUserData"},
                success: function(data,status){
                    location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView";
                },
                error       : function() {
                }
            });

        }
    }

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageUserController/loadTable",
            data: { tableName: elementID,  key: "manageUserData"},
            dataType: 'html',
            success: function(data){
                $("#table-responsive").html(data);

            },
            error       : function() {
                $("#table-responsive").html('<br><p>Something went wrong.</p>');
            }
        });





}