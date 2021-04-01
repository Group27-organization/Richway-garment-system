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

    function updateTool() {
       // console.log("update tool called");

        let i, tblrows, toolID = "";

        tblrows = document.getElementsByClassName("tblrow");
        for (i = 0; i < tblrows.length; i++) {
            if (tblrows[i].className.includes('active-row')) {
                document.querySelector('#toolMsgView').style.display = "none";
                toolID = tblrows[i].firstElementChild.innerHTML;
                jQuery(function ($) {


                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/Richway-garment-system/manageToolController/setNewSession",
                        data: {tool_ID: toolID, key: "toolUpdate"},
                        dataType: 'html',
                        success: function (data) {
                            location.href = "http://localhost/Richway-garment-system/manageToolController/loadupdateToolform";
                        },
                        error: function () {
                             //console.log("update data not  load")
                            $("#tableParent").html('<br><p>Something went wrong.</p>');
                        }
                    });


                });
            }
            else{
                document.querySelector('#toolMsgView').style.display = "block";
            }
        }
    }








