//
 loadOrderTbl();
// addUserBtn = document.getElementById("adduser");
// addUserBtn.onclick = function() {
//
//     $.ajax({
//         type: 'POST',
//         url: "http://localhost/Richway-garment-system/manageUserController/setNewSession",
//         data: { role: 'sales_manager',  key: "manageUserData"},
//         success: function(data,status){
//             location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView";
//         },
//         error       : function() {
//         }
//     });
//
// }
//
//

function loadOrderTbl() {

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageJobController/loadOrderTable",
            data: { key: "manageJobData"},
            dataType: 'html',
            success: function(data){
                $("#table-responsive").html(data);

            },
            error       : function() {
                $("#table-responsive").html('<br><p>Something went wrong.</p>');
            }
        });

}


createJobBtn = document.getElementById("createJob");
createJobBtn.onclick = function() {

    let jdata = JSON.parse('[{"order_item_id":122,"quantity":5000,"p_ID":2},{"order_item_id":103,"quantity":2000,"p_ID":1}]');

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageJobController/calculateOrderDueDate",
        data: { data: jdata,  key: "manageJobData"},
        success: function(data,status){
            console.log(data);
            alert(data);
        },
        error       : function() {
        }
    });

}
