$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/AccountantController/loadJobTable",
        data: {  key: "jobTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#tableForJob").html(data);


        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#updateEmployee").click(function(){
        location.href = "http://localhost/Richway-garment-system/AccountantController/loadupdateEmployeeform";

    });



});