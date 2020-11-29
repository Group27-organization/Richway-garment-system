
$(document).ready(function(){

    $("#noolsubmitBtn").click(function(e){
        $(".error").hide();
        if($("#ItemType option:selected").val()=="0"){
            $("#A").show();
        }if($("#noolQuantity").val()=="" ||parseInt($("#noolQuantity").val())<0 ||jQuery.trim($("#noolQuantity").val()).length == 0 ||$.isNumeric($("#noolQuantity").val())!=true){
            $("#B").show();
        }if(jQuery.trim($("#Description").val()).length == 0){
            $("#C").show();
        }else{
            $("#noolForm").submit();
        }

    });
});