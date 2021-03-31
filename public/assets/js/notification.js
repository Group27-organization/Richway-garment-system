$(document).ready(function () {
    let x=0;
    $("#CIN").on('click',function(){
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/notificationController/getNotificationCount",
            data: {   key: "notify"},
            success: function(data){
                document.getElementById('notifycount').innerText=1
                console.log(data);
                // alert(data);
            },
            error       : function() {
                console.log("error");
            }
        });


        // x =x+1;
        // document.getElementById('notifycount').innerText=x
    });
});