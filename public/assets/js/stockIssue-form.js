$(document).ready(function () {


    // let OTID =$("#orderItemId").val().substring(10);
    // console.log("OTTID :");
    // console.log(OTID);

let FabricCode =$("#FabricCode").val().substring(6);
    console.log("OTTID :");
    console.log(FabricCode);
let FabricQuantity =$("#FabricQuantity").val();
let ButtonCode =$("#ButtonCode").val().substring(6);
let ButtonQuantity =$("#ButtonQuantity").val();
let NoolCode =$("#NoolCode").val().substring(6);
let NoolQuantity =$("#NoolQuantity").val();

    $("#btnIssue").click(function(e){
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/stockIssueController/IssueRawMaterialforJob",
            data: { FabricCode:FabricCode,FabricQuantity:FabricQuantity,ButtonCode:ButtonCode,ButtonQuantity:ButtonQuantity,NoolCode:NoolCode,NoolQuantity:NoolQuantity , key: "IssueRawMaterial"},
            success: function(data){
                if(data==1){
                   if(!alert("scussfully Issued")){
                       window.location.href = "http://localhost/Richway-garment-system/StockNavigationController/stockIssue"

                   }


                }else{
                    alert("can't Issue")
                }




            },
            error       : function() {
                console.log("error");
            }
        });
    });

});





