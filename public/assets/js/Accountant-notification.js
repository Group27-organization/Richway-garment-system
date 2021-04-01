$(document).ready(function(){


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/AccountantController/loadNotificationTable",
        data: {  key: "notificationTableDash"},
        dataType: 'html',
        success: function(data){
            $("#Acc-notification").html(data);


        },
        error       : function() {
            console.log("Table data not  load")
            $("#tableParent").html('<br><p>Something went wrong.</p>');
        }
    });

});


function closeModel() {
    document.querySelector('.model-footer').style.display = "none";
    document.querySelector('.bg-modal').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
function selectRowView(evt) {

    if (!document.getElementsByTagName || !document.createTextNode) return;
    var rows = document.getElementById('myTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function() {
            let celldata = this.getElementsByTagName("td")[0];

            // alert(id.innerHTML);
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/AccountantController/loadDescrpition",
                data: {notificationID: celldata.innerHTML, key: "notification"},
                dataType: 'html',
                success: function (data) {
                    console.log(data);
                    $("span.test").eq(0).text(data);
                    document.querySelector('.bg-modal').style.display = "flex";


                },


            });
        }

    }
}