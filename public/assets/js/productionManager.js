$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/productionManagerController/loadJobTable",
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

    $("#createJob").click(function(){
        location.href = "http://localhost/Richway-garment-system/productionManagerController/loadcreateJobform";

    });

    $("#updateJob").click(function(){
        location.href = "http://localhost/Richway-garment-system/productionManagerController/loadupdateJobform";

    });

});