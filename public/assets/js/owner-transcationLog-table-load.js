$( document ).ready(function() {
    console.log( "ready!" );
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/ownerController/loadTransactionLogsTable",
        data: { key: "TransactionLogs"},
        dataType: 'html',
        success: function (data) {
            // console.log(data);
            $("#transcationLogTable").html(data);


        },
        error: function () {
            $("#transcationLogTable").html('<br><p>Something went wrong.</p>');
        }


    });
});