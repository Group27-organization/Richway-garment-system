
openEmp(null,'supervisor');

function openEmp(evt,elementID) {
    let i, tablinks, addEmployeeBtn;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
    }


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/supervisorController/attendanceTable",
        data: {  key: "attendanceTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#table-responsive").html(data);


        },
        error       : function() {
            // console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });




}



$(document).ready(function(){


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/supervisorController/ongoingJobTable",
        data: {  key: "ongoingJobTable"},
        dataType: 'html',
        success: function(data){
            $("#ongoingJobTable").html(data);
            // console.log("Table data load"+data);

        },
        error       : function() {
            // console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });




});

function updateWorkload() {

    let i, tblrows, workID = "";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            document.querySelector('#workloadMsgView').style.display = "none";
            workID = tblrows[i].firstElementChild.innerHTML;
            let res = workID.substring(3);
            // console.log("wokID :"+res);
            // jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/supervisorController/setNewSession",
                    data: {ID: parseInt(res), key: "workloadUpdate"},
                    dataType: 'html',
                    success: function (data) {
                        location.href = "http://localhost/Richway-garment-system/supervisorController/loadUpdateworkloadForm";
                    },
                    error: function () {
                        // console.log("update data not  load")
                        $("#tableParent").html('<br><p>Something went wrong.</p>');
                    }
                });


            // });
        }
        else{
            document.querySelector('#workloadMsgView').style.display = "block";
        }
    }
}



