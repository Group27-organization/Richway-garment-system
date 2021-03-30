$( document ).ready(function() {
    console.log( "ready!" );
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/ownerController/loadPayRollTable",
        data: { key: "OwnerManagePayRoleTable"},
        dataType: 'html',
        success: function (data) {
            // console.log(data);
            $("#ownerManagePayRoll").html(data);


        },
        error: function () {
            $("#ownerManagePayRoll").html('<br><p>Something went wrong.</p>');
        }


    });
});