$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/stockIssueController/loadSupplierTable",
        data: {  key: "supplierTableInDash"},
        dataType: 'html',
        success: function(data){
            $("#supplierTableForManageSupplier").html(data);
            console.log("Table data load")

        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

    $("#StockIssue").click(function(){
        location.href = "http://localhost/Richway-garment-system/stockIssueController ";

    });



});


