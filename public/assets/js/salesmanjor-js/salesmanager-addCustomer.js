$(document).ready(function(){

    // $("#findsupbtn").click(function () {
    //     $('html, body').animate({
    //         scrollTop: $("#right").offset().top   //id of div to be scrolled
    //     }, 1);
    //
    //     document.querySelector('#selectsuppliertable').style.display = "flex";
    //     document.querySelector('body').style.overflow = "hidden";
    //     ///////////////////////////////////////////customer table load/////////////////////////////////////////////////
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: "http://localhost/Richway-garment-system/rawMaterialToStockController/loadSupplierTable",
    //         data: {  key: "supplierinstock"},
    //         success: function(data){
    //             $("#suppliertablestock").html(data);
    //
    //
    //         },
    //         error       : function() {
    //             $("#suppliertablestock").html('<br><p>Something went wrong.</p>');
    //         }
    //     });
    // });

    $("#btnsubmitC").click(function(e){
        $(".error").hide();
        if($("#CustomerName").val()==""||jQuery.trim($("#CustomerName").val()).length == 0){
            $("#A").show();
        }
        if($("#CustomerContactNumber").val()=="" ||jQuery.trim($("#CustomerContactNumber").val()).length == 0||jQuery.trim($("#CustomerContactNumber").val()).length == 10){
            $("#B").show();
        }
        if($("#Address").val()=="" ||jQuery.trim($("#Address").val()).length == 0){
            $("#C").show();
        }
        if($("#gender option:selected").val()=="0") {
            $("#D").show();
        }if ($("#Email").val() == "") {
                $("#E").show();
        }else{
                $("#cstaddForm").submit();
        }

    });
});

