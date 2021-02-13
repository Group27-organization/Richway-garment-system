
openEmp(null,'owner');

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
        url: "http://localhost/Richway-garment-system/AccountantController/loadEmployeeTable",
        data: {  key: "employeeTableInDash"},
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

$(document).ready(function() {

    $("#view-salary-report").click(function () {
        location.href = "http://localhost/Richway-garment-system/AccountantController/viewSalaryReport";

    });

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/AccountantController/loadSalaryReport",
        data: {  key: "salaryReportTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#table-salaryReport").html(data);


        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

});

$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/AccountantController/loadSalaryDetails",
    data: {  key: "SalaryDetailsInDash"},
    dataType: 'html',
    success: function(data){
        $("#table-responsive").html(data);


    },
    error       : function() {
        console.log("Table data not  load")
        $("#tableParent").html('<br><p>Something went wrong.</p>');
    }
});

$("#approvepay").click(function () {
    location.href = "http://localhost/Richway-garment-system/ownerController/loadpayform";

});
