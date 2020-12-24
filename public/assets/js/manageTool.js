$(document).ready(function() {


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageToolController/loadToolTable",
        data: {key: "toolTableInDash"},
        dataType: 'html',
        success: function (data) {
            $("#toolTableFormanageTool").html(data);
            console.log("Table data load" + data);

        },
        error: function () {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#addtool").click(function () {
        location.href = "http://localhost/Richway-garment-system/manageToolController/addtoolform";

    });
});

   




