
openEmp(null,'sales_manager');
addEmployeeBtn = document.getElementById("addEmployee");
addEmployeeBtn.onclick = function() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageEmployeeController/setNewSession",
        data: {role: 'sales_manager', key: "manageEmployeeData"},
        success: function (data, status) {
            location.href = "http://localhost/Richway-garment-system/manageEmployeeController/addEmployeeform";
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
                    location.href = "http://localhost/Richway-garment-system/manageEmployeeController/addEmployeeform";
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



function updateEmployee() {

    let i, tblrows, empID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#employeeMsgView').style.display = "none";
            empID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageEmployeeController/NewSession",
                    data: {emp_ID: empID, key: "employeeUpdate"},
                    success: function (data) {
                       console.log('PHP in model select: " . json_encode($id) . "');
                        location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        //$("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }

        else{
            document.querySelector('#employeeMsgView').style.display = "block";
        }
    }
}

function deleteEmployee(){

    let i, tblrows, empID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#employeeMsgView').style.display = "none";
            empID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageEmployeeController/deleteEmployee",
                    data: {emp_ID: empID, key: "employeeDelete"},
                    success: function (data) {
                        if(parseInt(data)===200){
                            if(!alert("Employee removed successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/index"
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
            document.querySelector('#employeeMsgView').style.display = "block";
        }

    }
}