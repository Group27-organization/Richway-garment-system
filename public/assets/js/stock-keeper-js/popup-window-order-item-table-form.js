$(document).ready(function(){
    $("#slt-orderitems").click(function(){
        document.querySelector('#bg-modal-Order-Item-Popup').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden";
    });
});



function assignOrderItem() {

    let i, tblrows, empID="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
            jQuery(function($) {
                var value=$(this).find('td:first').html();
                var value2=$(this).find('td').eq(1).text();

            });


        }
    }

    if(empID.length>0){
        document.querySelector('#bg-modal-Order-Item-Popup').style.display = "none";
        //document.getElementById("OrderItemsID").value = empID;
       // document.querySelector('.bg-modal-oI-Table').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
////////////////////////////////////////////////////////////////////////////////////////////////////////
        jQuery(function($) {
            // ...
            $("#buttonbtn").prop('disabled', false);
            $("#fabricbtn").prop('disabled', false);
            $("#noolbtn").prop('disabled', false);
            $("label[for='OrderItemsID']").text(empID);
            $("label[for='FM2']").text("");
        });
///////////////////////////////////////////////////////////////////////
    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }

}

function closeOrderItemModel() {
    document.querySelector('#bg-modal-Order-Item-Popup').style.display = "none";
    //document.querySelector('.bg-modal-oI-Table').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
