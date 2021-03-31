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

createJobBtn = document.getElementById("createJob");
searchJobBtn = document.getElementById("jobSearch");

function openProduct(evt,btnName) {
    let i, tablinks;

    if(evt != null){
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";

    }

    if(btnName === 'pending'){
        createJobBtn.style.display = "block";
        searchJobBtn.placeholder = "#Item ID?";
        loadOrderTbl();
    }
    else if(btnName === 'ongoing'){
        createJobBtn.style.display = "none";
        searchJobBtn.placeholder = "#Job ID?";
        loadOngoingJobTbl();
    } else if(btnName === 'completeJob'){
        createJobBtn.style.display = "none";
        searchJobBtn.placeholder = "#Job ID?";
        loadCompleteJobTbl();
    }
    else if(btnName === 'completeOrder'){
        createJobBtn.style.display = "none";
        searchJobBtn.placeholder = "#Order ID?";
        loadCompleteOrderTbl();
    }


}

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

function loadOngoingJobTbl() {

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/manageJobController/loadOngoingJobTable",
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

function loadCompleteJobTbl() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageJobController/loadCompleteJobTable",
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

function loadCompleteOrderTbl() {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/manageJobController/loadCompleteOrderTable",
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

createJobBtn.onclick = function() {

    let i, tblrows, itemID = "",quantityV = 0,dueDate = "",status = "",pid = 0, act=false;

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if (tblrows[i].className.includes('active-row')) {
            act = true;
            document.querySelector('#jobMsgView').style.display = "none";
            itemID = tblrows[i].firstElementChild.innerHTML;
            quantityV = tblrows[i].children[1].innerHTML;
            pid = tblrows[i].children[4].innerHTML;
            dueDate = tblrows[i].children[5].innerHTML;
            status = tblrows[i].children[6].innerHTML;

            if(status === 'normal'){
                dueDate = "";
            }

            var obj = {};
            var obj1 = {};
            obj1.order_item_id = itemID;
            obj1.quantity  = quantityV;
            obj1.p_ID = pid;
            obj.orderItem = obj1;
            obj.cus_date = dueDate;
            var jstring = JSON.stringify(obj);

            let jdata = JSON.parse(jstring);

            jQuery(function ($) {

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/manageJobController/setItemIDSession",
                    data: { itemID: itemID,  key: "manageJobData", jsondata:jdata},
                    success: function(data,status){
                        location.href = "http://localhost/Richway-garment-system/manageJobController/creatJobFormView";
                    },
                    error       : function() {
                    }
                });


            });
        }
    }
    if(!act){
        document.querySelector('#jobMsgView').style.display = "block";
    }


    //
    // let jdata = JSON.parse('{"order":[{"order_item_id":122,"quantity":5000,"p_ID":2},{"order_item_id":103,"quantity":2000,"p_ID":1}],"cus_date":"2021-04-19"}');
    //
    // $.ajax({
    //     type: 'POST',
    //     url: "http://localhost/Richway-garment-system/manageJobController/calculateOrderDueDate",
    //     data: { data: jdata,  key: "manageJobData"},
    //     success: function(data,status){
    //         console.log(data);
    //         alert(data);
    //     },
    //     error       : function() {
    //     }
    // });

}
