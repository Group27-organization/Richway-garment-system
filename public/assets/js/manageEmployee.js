
openEmp(null,'sales_manager');
addUserBtn = document.getElementById("adduser");
addUserBtn.onclick = function() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageEmployeeController/setNewSession",
        data: { role: 'sales_manager',  key: "manageUserData"},
        success: function(data,status){
            location.href = "http://localhost/Richway-garment-system/manageEmployeeController/addEmployeeform";
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
                url: "http://localhost/Richway-garment-system/manageEmployeeController/setNewSession",
                data: { role: elementID,  key: "manageEmployeeData"},
                success: function(data,status){
                    location.href = "http://localhost/Richway-garment-system/manageEmployeeController/addEmployeeform";
                },
                error       : function() {
                }
            });

        }
    }

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageEmployeeController/loadTable",
            data: { tableName: elementID,  key: "manageEmployeeData"},
            dataType: 'html',
            success: function(data){
                $("#table-responsive").html(data);

            },
            error       : function() {
                $("#table-responsive").html('<br><p>Something went wrong.</p>');
            }
        });





}


function updateEmployee() {

    let i, tblrows, empID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            empID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageEmployeeController/NewSession",
                    data: {emp_ID: empID, key: "employeeUpdate"},
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform";
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