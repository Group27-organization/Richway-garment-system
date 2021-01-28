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






