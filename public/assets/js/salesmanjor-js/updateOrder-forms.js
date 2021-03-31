let orderDesError=2;
let orderItemID =0;
let sizeChange='';
let sizeChangeFlag=0;
$(document).ready(function () {

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/loadOrderItemTable",
        data: {   key: "ordersItemTable"},
        success: function(data){

            $("#orderedItemTable").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });

    $("#UpdateSize").change(function () {


        if(typeof $('#UpdateSize option:selected').data('value') === 'undefined'){
            // $("label[for='AC']").show();
            console.log("not change ");
        }else{
            sizeChange =$('#UpdateSize option:selected').data('value');
            sizeChangeFlag=1;
            console.log("change");
            $("label[for='US']").show();
        }
    });

    $("#Description").on("change paste keyup", function() {

        let x =$(this).val();
        if($.isNumeric(x)==true){
            $("label[for*='OD']").html("Can't Keep a Number");
            $("label[for='OD']").show();
            $("label[for='UD']").hide();
            orderDesError=1;
        }else if(!x.trim()){
            $("label[for*='OD']").html("Can't Keep a empty spaces");
            $("label[for='OD']").show();
            $("label[for='UD']").hide();
            orderDesError=1;
        }else if(x == null || x==''){
            $("label[for*='OD']").html("This Field requred");
            $("label[for='OD']").show();
            $("label[for='UD']").hide();
            orderDesError=1;
        }else if(x.length<10){
            $("label[for*='OD']").html("Description should be at least 10 characters ");
            $("label[for='OD']").show();
            $("label[for='UD']").hide();
            orderDesError=1;
        }else{
            orderDesError=0;
            $("label[for='OD']").hide();
            $("label[for='UD']").show();
        }


    });



});
function abc(x) {

    orderItemID =x;

    // document.querySelector('.bg-modal').style.display = "flex";

    document.querySelector('#updateForm').style.display = "flex";
    document.querySelector('body').style.overflow = "hidden !important";

    // document.getElementById("myText").value = x;
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/setOrderItemSize",
        data: {  orderItemId: x,  key: "orderItemId"},
        success: function(data){

            $("#UpdateSize").html(data);

        },
        error       : function() {
            console.log("error");
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/setOrderDescription",
        data: {  orderItemId: x,  key: "OrderDescription"},
        success: function(data){


            $('#Description').text(data);
        },
        error       : function() {
            console.log("error");
        }
    });

}

function closeModel() {
    $("label[for='US']").hide();
    $("label[for='UD']").hide();
    $("label[for='OD']").hide();

    document.querySelector('#updateForm').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
function UpdateItem() {
    let Description= document.getElementById("Description").value;
    if(orderDesError==0 && sizeChangeFlag==0){


        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/updateOrderController/updateOrderDescription",
            data: {  description: Description,  key: "updateDescription"},
            success: function(data){
                if(data==200){
                    alert("successfully Description updated");
                }else if(data==404){
                    alert("Something Wrong");
                    window.location.href = "http://localhost/Richway-garment-system/updateOrderController";
                }
            },
            error       : function() {
                console.log("error");
            }
        });
    }else if(sizeChangeFlag==1 && orderDesError==2){

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/updateOrderController/updateOrderItemSize",
            data: {  orderItemId: orderItemID, size:sizeChange,  key: "updateSize"},
            success: function(data){
                console.log("updateOrderItemSize :"+data);
                if(data==200){
                    alert("successfully size updated");
                }else if(data==404){
                    alert("Something Wrong");
                    window.location.href = "http://localhost/Richway-garment-system/updateOrderController";
                }

            },
            error       : function() {
                console.log("error");
            }
        });
    }else if(sizeChangeFlag==1 && orderDesError==0){
        var data1=0;
        var data2=0;
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/updateOrderController/updateOrderDescription",
            data: {  description: Description,  key: "updateDescription"},
            success: function(data){
                if(data==200){

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/Richway-garment-system/updateOrderController/updateOrderItemSize",
                        data: {  orderItemId: orderItemID, size:sizeChange,  key: "updateSize"},
                        success: function(data){

                            if(data==200){
                               alert("success");

                            }else if(data==404){
                                alert("something wrong");

                            }
                        },
                        error       : function() {
                            console.log("error");
                        }
                    });


                }else if(data==404){
                    alert("something wrong");
                }
            },
            error       : function() {
                console.log("error");
            }
        });



    }


    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/updateOrderController/loadOrderItemTable",
        data: {   key: "ordersItemTable"},
        success: function(data){

            $("#orderedItemTable").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });

    $("label[for='US']").hide();
    $("label[for='UD']").hide();
    document.querySelector('#updateForm').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}

function back() {
    window.location.href = "http://localhost/Richway-garment-system/updateOrderController";
}

