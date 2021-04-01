$( document ).ready(function() {
    console.log( "ready!" );
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/notificationController/loadNotificationTable",
        data: { key: "notificationTable"},
        dataType: 'html',
        success: function (data) {
            console.log(data);
            $("#Notification").html(data);


        },
        error: function () {
            $("#Notification").html('<br><p>Something went wrong.</p>');
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
    var rows = document.getElementById('Notification').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function() {
            let celldata = this.getElementsByTagName("td")[0];

            // alert(id.innerHTML);
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/notificationController/loadDescrpition",
                data: {notificationID: celldata.innerHTML, key: "notificationDescrpition"},
                dataType: 'html',
                success: function (data) {

                    alert(data);

                },


            });
        }

    }
}

function removeNotification(clicked) {
    // console.log(clicked)
    $(clicked).parents("tr").remove();
}

function selectRowView(evt) {

    if (!document.getElementsByTagName || !document.createTextNode) return;
    var rows = document.getElementById('Notification').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function() {
            let celldata = this.getElementsByTagName("td")[0];

            // alert(id.innerHTML);
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/notificationController/loadDescrpition",
                data: {notificationID: celldata.innerHTML, key: "notificationDescrpition"},
                dataType: 'html',
                success: function (data) {

                    alert(data);

                },


            });
        }

    }
}