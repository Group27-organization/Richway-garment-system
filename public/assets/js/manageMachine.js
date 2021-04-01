$(document).ready(function() {


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageMachineController/loadMachineTable",
        data: {key: "machineTableInDash"},
        dataType: 'html',
        success: function (data) {
            $("#machineTableFormanageMachine").html(data);
            console.log("Table data load" + data);

        },
        error: function () {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#addmachine").click(function () {
        location.href = "http://localhost/Richway-garment-system/manageMachineController/addmachineform";

    });
});

function updateMachine() {

    let i, tblrows, machID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#machineMsgView').style.display = "none";
            machID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageMachineController/setNewSession",
                    data: {machine_ID: machID, key: "MachineUpdate"},
                    dataType: 'html',
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/manageMachineController/loadupdateMachineform";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        $("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            });
        }
        else{
            document.querySelector('#machineMsgView').style.display = "block";
        }
    }
}



    /*function updateMachine() {

        let i, tblrows, machID = "";

        tblrows = document.getElementsByClassName("tblrow");
        for (i = 0; i < tblrows.length; i++) {
            if (tblrows[i].className.includes('active-row')) {
                document.querySelector('#machineMsgView').style.display = "none";
                machID = tblrows[i].firstElementChild.innerHTML;
                jQuery(function ($) {

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/Richway-garment-system/manageMachineController/setNewSession",
                        data: {machine_ID: machID, key: "MachineUpdate"},
                        dataType: 'html',
                        success: function (data) {
                            location.href = "http://localhost/Richway-garment-system/manageMachineController/loadupdateMachineform";
                        },
                        error: function () {
                            console.log("update data not  load")
                            $("#tableParent").html('<br><p>Something went wrong.</p>');
                        }
                    });


                });
            } else {
                document.querySelector('#machineMsgView').style.display = "block";
            }
        }
    }*/







