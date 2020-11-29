$(document).ready(function(){

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