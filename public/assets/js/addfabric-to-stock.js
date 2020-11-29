$(document).ready(function(){

    $("#fabsubmitBtn").click(function(e){
        $(".error").hide();
        if($("#ItemType option:selected").val()=="0"){
            $("#A").show();
        }if($("#fabQuantity").val()=="" ||parseInt($("#fabQuantity").val())<0 || parseInt($("#fabQuantity").val())>9999999999 ||jQuery.trim($("#fabQuantity").val()).length == 0 ||$.isNumeric($("#fabQuantity").val())!=true){
            $("#B").show();
        }if(jQuery.trim($("#Description").val()).length == 0){
            $("#C").show();
        }else{
            $("#fabForm").submit();
        }

    });
});
