$(document).ready(function(){

    $("#findsupbtn").click(function () {
        $('html, body').animate({
            scrollTop: $("#right").offset().top   //id of div to be scrolled
        }, 1);

        document.querySelector('#selectsuppliertable').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden";
        ///////////////////////////////////////////customer table load/////////////////////////////////////////////////

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadSupplierTable",
            data: {  key: "supplierinstock"},
            success: function(data){
                $("#suppliertablestock").html(data);


            },
            error       : function() {
                $("#suppliertablestock").html('<br><p>Something went wrong.</p>');
            }
        });
    });

    $("#btnsubmitBtn").click(function(e){
        $(".error").hide();
        if($("#ItemType option:selected").val()=="0"){
            $("#A").show();
        }if($("#btnQuantity").val()=="" ||parseInt($("#btnQuantity").val())<0 ||jQuery.trim($("#btnQuantity").val()).length == 0 || $.isNumeric($("#btnQuantity").val())!=true  ){
            $("#B").show();
        }if(jQuery.trim($("#Description").val()).length == 0){
            $("#C").show();
        }else{
            $("#btnForm").submit();
        }

    });
});

function closeModel(){
    document.querySelector('#selectsuppliertable').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}

function assignsupplier(){

    let i, tblrows, empID="",cname="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
            name =  tblrows[i].children[1].innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('#selectsuppliertable').style.display = "none";


        document.querySelector('body').style.overflow = "auto";
        jQuery(function($) {
            $("#SuppliesId").val(empID);
            $("label[for='SuppliesLabel']").text(name);
        });

    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }
}