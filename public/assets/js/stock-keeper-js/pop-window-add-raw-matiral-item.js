$(document).ready(function(){
    let variable="";
    $(".cbn").click(function(){
        variable =  this.id;
        let itemid =$("#OrderItemsID").val();
        console.log("item id"+itemid);

        document.querySelector('.bg-modal').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden";
        $("#supplierWap").css("display", "none");


        $("#Quantity").prop('disabled', true);
        $("#UnitPrice").prop('disabled', true);
        $("#findsupbtn").prop('disabled', true);
        $("#cpydbtn").prop('disabled', true);
        $("#SuppliesId").prop('disabled', true);
        $('#Quantity').attr("placeholder", "");

        if (variable=="buttonbtn"){
            console.log("butn");
            $("#h3-tag").html("ADD Button");
            $("#lbl1").html(" Button Style");
            $("#lbl2").html("Button Color Code");
            $("#trdtextbox").css("display", "none");
            $("#lbl4").html("Quantity");
            $("#lbl5").html("Unit Price");
            $("#footer-txt").html("* Please select an button style to assign!");



            ///////////////////////////////button type  coor code from orer item/////////////////////////////////////////////////////////


            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/addRawMaterialController/loadOrderedbuttons",
                data: { role: itemid,  key: "orderItemId"},
                success: function(data){
                    $("#slt1").html(data);
                    // console.log(data)
                     itemid="";
                },
                error       : function() {

                }
            });

           ///////////////////////////////button qunatity from order item/////////////////////////////////////////////////////////
            console.log("check selected")

            $("select#slt1").change(function(){

                if($(this).children("option:selected").val() != "0"){
                    $("#Quantity").prop('disabled', false);
                    $("#UnitPrice").prop('disabled', false);
                    $("#SuppliesId").prop('disabled', false);
                    $("#findsupbtn").prop('disabled', false);
                    $("#cpydbtn").prop('disabled', false);
                }



                var selectedCountry = $(this).children("option:selected").val();
                //alert("You have selected the country - " + selectedCountry);
                $.ajax({
                    type: 'POST',
                    url: "http://localhost/Richway-garment-system/addRawMaterialController/loadButtonQuantity",
                    data: { role: itemid,  key: "orderItemId"},
                    success: function(data){

                        $('#Quantity').attr("placeholder", "Number of Buttons :"+data+"required");


                    },
                    error       : function() {

                    }
                });
            });



        }else if(variable=="fabricbtn"){
            console.log("fab");
            $("#h3-tag").html("ADD Fabric");
            $("#lbl1").html(" Fabric Matiral");
            $("#lbl2").html("Fabric Matiral Design");
            $("#trdtextbox").css("display", "block");
            $("#lbl3").html(" Fabric Matiral Color");
            $("#lbl4").html("Quantity");
            $("#lbl5").html("Unit Price");

            $("#Quantity").prop('disabled', false);
            $("#UnitPrice").prop('disabled', false);
            $("#SuppliesId").prop('disabled', false);
            $("#findsupbtn").prop('disabled', false);
            $("#cpydbtn").prop('disabled', false);

            $.ajax({    //fabric type  material ,type,color code//
                type: 'POST',
                url: "http://localhost/Richway-garment-system/addRawMaterialController/loadOrderedfabric",
                data: { role: itemid,  key: "orderItemId"},
                success: function(data){
                    $("#slt1").html(data);
                    // console.log(data)
                },
                error       : function() {
                }
            });   // end fabric type  material ,type,color code//


        }else if(variable=="noolbtn"){
            console.log("fab");
            $("#h3-tag").html("ADD Nool");
            $("#lbl1").html(" Nool Design");
            $("#lbl2").html("Nool Color");
            $("#trdtextbox").css("display", "none");
            $("#lbl4").html("Quantity");
            $("#lbl5").html("Unit Price");
            $("#Quantity").prop('disabled', false);
            $("#UnitPrice").prop('disabled', false);
            $("#SuppliesId").prop('disabled', false);
            $("#findsupbtn").prop('disabled', false);
            $("#cpydbtn").prop('disabled', false);


            $.ajax({    //nool code//
                type: 'POST',
                url: "http://localhost/Richway-garment-system/addRawMaterialController/loadOrderedNoolColor",
                data: { role: itemid,  key: "orderItemId"},
                success: function(data){
                    $("#slt1").html(data);
                    // console.log(data)
                },
                error       : function() {
                }
            });  //end nool color code//

        }

    });
    $("#findsupbtn").click(function() { //find supplires button clicked
        console.log("find supplires table show clicked");




        $.ajax({              //******supplier table load*****//
            type: 'POST',
            url: "http://localhost/Richway-garment-system/addRawMaterialController/setsuppliertable",
            data: {  key: "supliertablepop"},
            success: function(data,status){
                console.log("success")
                $('#tableParent-suppliresTable').html(data);



            },
            error       : function() {
                console.log('somting wrrong')
            }
        });  //******end supplier table load*****//




        $("#supplierWap").css("display", "block");
        $('.flexbox-container-popup').animate({
                scrollTop: $(".second").offset().top},
            'slow');
    }); //end  supplires button clicked

    $("#addBFNBtn2").click(function(){

        let B=$("#OrderItemsID").val();
        let A = $('#OrderId option:selected').val();
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


            $('body').css("overflow","auto");

            $('#BFNAddTable').show();
            $('#rawmaterialformpopup').hide();


            if(variable=="buttonbtn"){
                type="button";
                $('input[type=text]').val('');
                $("label[for='SuppliesIdLabel']").text("");
                $("#OrderItemsID").val("");


            }else if(variable=="fabricbtn"){
                type="fabric";
                $('input[type=text]').val('');
                let sid =$("label[for='SuppliesIdLabel']").text("");
                $("#OrderItemsID").val("");


            }else if(variable=="noolbtn"){
                type="nool";
                $('input[type=text]').val('');
                let sid =$("label[for='SuppliesIdLabel']").text("");
                $("#OrderItemsID").val("");

            }

            $('#BFNAddTable tbody tr:last').after(
                '<tr data-label="">' +
                '<td data-label="">'+A+'</td>' +
                '<td data-label="">'+B+'</td>' +
                '<td data-label="">'+type+'</td>' +
                '<td data-label="">'+material+'</td>' +
                '<td data-label="">'+quantity+'</td>' +
                '<td data-label="">'+unitPrice+'</td>' +
                '<td data-label="Complete">'+sid+'</td>' +
                '<td><div class="table__button-group">' +
                '<a href="#" onclick="productDelete(this) ;">Delete</a>' +

                '</div></td>'+
                '</tr>\n'
            );
        }else{
            document.querySelector('#rawmaterial-error').style.display = "block";


        }
    });

    $("#closePopup").click(function(){
        document.querySelector('#rawmaterial-error').style.display = "none ";
        $("#rawmaterialformpopup").hide();
        $('body').css("overflow","auto");
        $('input[type=text]').val('');
    });


});


function selectSupplier() {

    let i, tblrows, empID="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
        }
    }
    if(empID.length>0){
        $("#SuppliesId").val(empID);
        // document.getElementById("SuppliesId").value = empID;

    }
    else {
        document.querySelector('.model-footer').style.display = "block";
    }
}


