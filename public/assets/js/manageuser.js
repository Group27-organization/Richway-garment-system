
let selectedRole = 'sales_manager';
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

function addExtraRole() {

    let i, tblrows, logID = "", empID = "", act=false;

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            act = true;
            document.querySelector('#userMsgView').style.display = "none";
            logID = tblrows[i].firstElementChild.innerHTML;
            empID = tblrows[i].children[1].innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageUserController/setExtraRoleSession",
                    data: {logID: logID, empID: empID, role: selectedRole, key: "manageUserData"},
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/manageUserController/addExtraRoleView";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }
    }
    if(!act){
        document.querySelector('#userMsgView').style.display = "block";
    }
}


function openEmp(evt,elementID) {
    let i, tablinks, addUserBtn;

    if(evt != null){
        selectedRole = elementID;
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
