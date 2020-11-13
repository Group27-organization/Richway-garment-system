
$(document).ready(function(){

    $("#StockId").prop('disabled', true);
    $("#OrderItemsID").prop('disabled', true);
    $("#slt-orderitems").prop('disabled', true);

    $("#cpydbtn").prop('disabled', true);
    $("#buttonbtn").prop('disabled', true);
    $("#fabricbtn").prop('disabled', true);
    $("#noolbtn").prop('disabled', true);

    console.log('called raw material form js');

     $('#SelectedMButton').prop('disabled', true);
     $('#SelectedMaterial').prop('disabled', true);
     $('#SelectedNool').prop('disabled', true);
     $('#bg-modal-oI-Table').hide();
     $('#BFNAddTable').hide();


    $("#OrderId").change(function() {
        $("#slt-orderitems").prop('disabled', false);

    });

    ///////////////////////////////////////////order item table load/////////////////////////////////////////////////
        $('#OrderId').on('change', function() {
            $("label[for='FM1']").text("");
             let orderId = $('option:selected',this).data("value");

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/addRawMaterialController/loadOrderItemsTable",
                     data: { role: orderId,  key: "OrderId"},
                    success: function(data){
                        $("#tableParent-oI-Table").html(data);


                    },
                    error       : function() {
                        $("#tableParent-oI-Table").html('<br><p>Something went wrong.</p>');
                    }
                });
        });
/////////////////////////////////////////////////////////////////////////////////////////////

    $('#submitForm').on('click', function() {

        let i = 0;
        let StockItemList = [];
        $("#BFNAddTable table > tbody > tr").each(function () {
            let arr = [$(this).find('td').eq(0).text()];
            var num = $(this).find('td').eq(0).text();
            orderItem = [
                $(this).find('td').eq(0).text(),
                $(this).find('td').eq(1).text(),
                $(this).find('td').eq(2).text(),
                $(this).find('td').eq(3).text(),
                $(this).find('td').eq(4).text(),
                $(this).find('td').eq(5).text(),
                $(this).find('td').eq(6).text(),

            ];
            if (i > 0) {
                StockItemList.push(orderItem);
            }

            i = i + 1

        });

             if (StockItemList === undefined || StockItemList.length == 0) {
                $("label[for='FM3']").text("Material Requeird");

            }else {

                $.ajax({

                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/addRawMaterialController/addItemToStock",
                    data: {RawMaterial:StockItemList, key: "ButtonDetails"},
                    success: function (data) {
                        console.log("dta :"+data.toString());
                        if(!data.toString().includes("404")){
                            if(!alert("Raw Materials Successfully Added.")) {
                                window.location.href = "http://localhost/Richway-garment-system/StockNavigationController";
                            }


                        }
                        // alert(data);

                    },
                    error: function () {

                    }
                });
            }

    });



});

function productDelete(ctl) {
    $(ctl).parents("tr").remove();
}




