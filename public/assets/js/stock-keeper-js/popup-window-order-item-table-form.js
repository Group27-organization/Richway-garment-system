$(document).ready(function(){
    $("#slt-orderitems").click(function(){
        document.querySelector('#bg-modal-Order-Item-Popup').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden";
    });
    ///////////////////////////////////////////order item table load/////////////////////////////////////////////////
    $('#slt-orderitems').on('click', function() {
        $("label[for='FM1']").text("");
        // let orderId = $('#OrderId option:selected').data("value");
        let orderId =$("label[for='OrderIdLabel']").html();
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/addRawMaterialController/loadOrderItemsTable",
            data: { role: orderId,  key: "OrderId"},
            success: function(data){
                $("#table-responsive-orderitem").html(data);
                // alert(data);

            },
            error       : function() {
                $("#table-responsive-orderitem").html('<br><p>Something went wrong.</p>');
            }
        });
    });
/////////////////////////////////////////////////////////////////////////////////////////////

});




function assignOrderItem() {

    let i, tblrows, itemID="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            itemID = tblrows[i].firstElementChild.innerHTML;
        }
    }
    console.log("itemID :"+itemID);
    if(itemID.length>0){
        document.querySelector('#bg-modal-Order-Item-Popup').style.display = "none";
        //document.getElementById("OrderItemsID").value = itemID;
       // document.querySelector('.bg-modal-oI-Table').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
////////////////////////////////////////////////////////////////////////////////////////////////////////
        jQuery(function($) {
            // ...
            $("#buttonbtn").prop('disabled', false);
            $("#fabricbtn").prop('disabled', false);
            $("#noolbtn").prop('disabled', false);
            $("#OrderItemsID").val(itemID);
            $("label[for='FM2']").text("");
        });
///////////////////////////////////////////////////////////////////////
    }
    else {
        console.log("awa :");
        document.querySelector('#model-footer-orderitem').style.display = "block";
    }

}

function closeOrderItemModel() {
    document.querySelector('#bg-modal-Order-Item-Popup').style.display = "none";
    //document.querySelector('.bg-modal-oI-Table').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
    document.querySelector('#model-footer-orderitem').style.display = "none";
}

