$(document).ready(function () {


    $("#addBFNBtn").click(function(){
        let material = $('#slt1 option:selected').text();
        let quantity = $("#Quantity").val();
        let unitPrice = $("#UnitPrice").val();
        let sid =$("label[for='SuppliesIdLabel']").html();
        let type="";

        if ((material != "") && (quantity != "") && (unitPrice != "") && (sid != "") ){

            $("#Quantity").prop('disabled', true);
            $("#UnitPrice").prop('disabled', true);
            $("#findsupbtn").prop('disabled', true);
            $("#cpydbtn").prop('disabled', true);
            $("#SuppliesId").prop('disabled', true);
            $('#Quantity').attr("placeholder", "");
            $('.model-footer').hide();
            $('.bg-modal').hide();
            $('body').css("overflow","auto");

            if(variable=="buttonbtn"){
                type="button";
                $('input[type=text]').val('');

            }else if(variable=="fabricbtn"){
                type="fabric";
                $('input[type=text]').val('');

            }else if(variable=="noolbtn"){
                type="nool";
                $('input[type=text]').val('');
            }

            $('#BFNAddTable tbody tr:last').after(
                '<tr data-label="">' +
                '<td data-label="">'+type+'</td>' +
                '<td data-label="">'+material+'</td>' +
                '<td data-label="">'+quantity+'</td>' +
                '<td data-label="">'+unitPrice+'</td>' +
                '<td data-label="">'+sid+'</td>' +
                '<td><div class="table__button-group">' +
                '<a href="#" class="viewBtn" ;">View</a>' +

                '</div></td>'+
                '</tr>\n'
            );
        }else{

            $('.model-footer').show();
            console.log("can t add");
        }
    });

});