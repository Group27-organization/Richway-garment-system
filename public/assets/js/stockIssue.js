$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/stockIssueController/stockIssueRequest",
        data: {   key: "IssueRequest"},
        success: function(data){
            console.log("data :"+data);
            $("#stock-issue-table").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
});



// function openEmp(evt,elementID) {
//     let i, tablinks, addItemBtn;
//
//     if(evt != null){
//         tablinks = document.getElementsByClassName("tablinks");
//         for (i = 0; i < tablinks.length; i++) {
//             tablinks[i].className = tablinks[i].className.replace(" active", "");
//         }
//         evt.currentTarget.className += " active";
//         addItemBtn = document.getElementById("addItem");
//         addItemBtn.onclick = function() {
//             if(elementID=="RawMaterial"){
//                 location.href = "http://localhost/Richway-garment-system/addRawMaterialController";
//             }else if(elementID=="Tools"){
//
//             }else if(elementID=="Machine"){
//
//             }
//
//
//
//
//         }
//     }

    // $.ajax({
    //     type: 'POST',
    //     url: "http://localhost/Richway-garment-system/stockIssueController/getStockData",
    //     data: { key: "StockIssueTable"},
    //     dataType: 'html',
    //     success: function(data){
    //         $("#stock-issue-table").html(data);
    //         console.log("Table data load")
    //
    //     },
    //     error       : function() {
    //         $("#table-responsive2").html('<br><p>Something went wrong.</p>');
    //     }
    // });

//}

function StockIssue() {

    let i, tblrows, jobID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            jobID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/stockIssueController/setNewSession",
                    data: {jobId: jobID, key: "selectJobToIssue"},
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/stockIssueController/addIssueform";
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


