
openEmp(null,'sales_manager');

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
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });




}



$(document).ready(function(){


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/supervisorController/updateWorkloadTable",
        data: {  key: "workloadTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#updateDailyWorkloadtable").html(data);


        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#updateworkload").click(function(){
        location.href = "http://localhost/Richway-garment-system/supervisorController/loadUpdateworkloadForm";

    });


});

