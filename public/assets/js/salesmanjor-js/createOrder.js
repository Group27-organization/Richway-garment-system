$(document).ready(function () {
    console.log("jqvary load");
    $("#createOrderForm2").hide();
    $("#bucketTable").hide();

    $("#NoolColorDiv").hide();
    // $("#PredefineModel").hide();


    //****************************************create order form one *************************************************//


    //**************************************** order shirt or t shirt selected  hand type change*************************************************//
    $('#ItemType').on('change', function() {
        // $("label[for='FM1']").text("");
        let ItemType = $('option:selected',this).data("value");
        console.log(ItemType);




        // $.ajax({
        //     type: 'POST',
        //     url: "http://localhost/Richway-garment-system/createOrderController/setPredefineHandType",
        //     data: { ItemType: ItemType,  key: "ItemType"},
        //     success: function(data){
        //
        //         $("#ItemStyle").html(data);
        //
        //
        //     },
        //     error       : function() {
        //         console.log("error");
        //     }
        // });

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/createOrderController/setPredefineSize",
            data: { ItemType: ItemType,  key: "ItemType"},
            success: function(data){
                $("#CollarSize").html(data);


            },
            error       : function() {
                console.log("error");
            }
        });



    });
    //********************************************************//
    $("#ChooseTemplateID").on('click',function(){
        if($("#ItemType").children("option:selected").val()=="0"){

        }else{
            $('html, body').animate({
                scrollTop: $("#createOrderForm2").offset().top   //id of div to be scrolled
            }, 1000);

            document.querySelector('#PredefineModel').style.display = "flex";
            document.querySelector('body').style.overflow = "hidden !important";
            let Type =  $( "#ItemType option:selected" ).text();
            let colorType =$( "#CollarSize option:selected" ).text();
            let handType =$( "#ItemStyle option:selected" ).text();



            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/templateCardGenarator",
                data: { Type: Type, colorType:colorType, handType:handType,  key: "PredefinePopup"},
                success: function(data){

                    $("#template-container").html(data);


                },
                error       : function() {
                    console.log("error");
                }
            });
        }



    });

    $("#closeTemplatePopup").click(function () {

        document.querySelector('#PredefineModel').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });
//********************************************************//

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/createOrderController/setFabricType",
        data: {   key: "fabricType"},
        success: function(data){

            $("#FabricType").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });
    //****************************************************//

    $('#FabricDesign').on('change', function() {

        let FabricDesign = $('option:selected', this).val();

        if(FabricDesign=="Plane"){
            $("#FabricColorDiv").show();
            $("#FabricDesignCodeDiv").hide();

        }else if(FabricDesign=="Custom"){
            $("#FabricColorDiv").hide();
            $("#FabricDesignCodeDiv").show();
        }

    });

    //**************add fabric design******************************************//
    $('#ADDFabricDesignID').on('click', function() {
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });



    });

    //********************************************************//

    $('#ItemType').on('change', function() {

        let type = $('option:selected', this).val();

        if(type=="t-shirt"){
            $("#ButtonDesignDiv").hide();
            $("#ButtonColorDiv").hide();

        }else if(type=="shirt"){
            $("#ButtonDesignDiv").show();
            $("#ButtonColorDiv").show();
        }

    });
//*****************************************order shirt or t shirt selected  hand type change************************************************//

    let count=0;
    let countQuantity=0;
    $("#addToBucket").on('click',function(){



        let PredefineId = $("label[for='ChooseTemplate']").html();
        let Template =  imgurltemp;

        let CollarSize = $('#CollarSize option:selected').val();

        let FabricType =$('#FabricType option:selected').val();
        let FabricDesign =$('#FabricDesign option:selected').val();
        let FabricDesignCode =$("#FabricDesignCode").val();
        if(FabricDesignCode==""){
            FabricDesignCode="none";
        }
        let FabricColor =$("#FabricColor").val();
        let FabricDesignImage="none";
        let NoolColor = $("#NoolColor").val();
        let ButtonDesign =$('#ButtonDesign option:selected').val();
        let ButtonColor =$("#ButtonColor").val();
        let Quantity = $("#Quantity").val();

        if((PredefineId=="")||(CollarSize=="")||(PredefineId=="")||(FabricType=="") ||(FabricDesign=="") ||(Quantity=="") ){
            alert("Some Field Are Missing!");
        }else if((FabricDesignCode=="")||(FabricColor=="")){
            alert("Some Field Are Missing!");

        }else if(!$.isNumeric(Quantity) || parseInt(Quantity)<1  ||Quantity.length>=10){
            alert("Plase Add Valid Quantity!");
        }
        else {

            /*******************************************************/
            count =count+1;
            alert("Item "+count+"Added!");
            $('html, body').animate({
                scrollTop: $("#header-gradant-form").offset().top   //id of div to be scrolled
            }, 1000);


            $("#cardP").append("<a href=\"#\">"+ItemType+" "+count+"</a> <span class=\"price\">"+Quantity+"</span><br>");
            $("label[for='ItemCountCard']").text(count);
            countQuantity =countQuantity+parseInt(Quantity);
            $("label[for='ItemQuantityCount']").text(countQuantity);
            console.log("Template :"+Template);
            // let imgpath ="++";
            // $("table").find("tr").eq(1).find("td").eq(1).append("<img src='https://kbob.github.io/images/sample-5.jpg' style='display:block;' width='100%' height='auto'/>");
            $('#addItemBucketTable tbody tr:last').after(

                '<tr data-label="Pending Approval">' +
                '<td data-label="" style="display: none">'+PredefineId+'</td>' +
                '<td data-label=""><img src='+Template+'  style="width: 40px; height:40px; text-align:center;"/></td>' +
                '<td data-label="" >'+CollarSize+'</td>' +
                '<td data-label="" >'+FabricType+'</td>' +
                '<td data-label=""  >'+FabricDesign+'</td>' +
                '<td data-label="" >'+FabricDesignImage+'</td>' +
                '<td data-label="" >'+FabricDesignCode+'</td>' +
                '<td data-label="" >'+FabricColor+'</td>' +
                '<td data-label="" style="display: none">'+ButtonDesign+'</td>' +
                '<td data-label="" style="display: none">'+ButtonColor+'</td>' +
                '<td data-label="" style="display: none">'+NoolColor+'</td>' +
                '<td data-label="" >'+Quantity+'</td>' +
                '<td><div class="table__button-group">' +
                '<a href="#" class="viewBtn"style="margin: 2px;color: #00B4CC">View  |</a>' +
                '<a href="#" class="viewBtn" style="margin: 2px;color: salmon" ;">Edit  |</a>' +
                '<a href="#" style="margin: 2px; color: red;" onclick="productDelete(this);">Delete</a>' +
                '</div></td>'+
                '</tr>\n'
            );
            $('input[type=text]').val('');
            // $('html, body').animate({
            //     scrollTop: $("#rowTop").offset().top   //id of div to be scrolled
            // }, 1000);

        }

    });

    $("#nextBtnf1").click(function(){
        if(count==0){
            alert("You Did not Add any Item To Bucket!");
        }else{
            $('input[type=text]').val('');
            $("#createOrderForm1").hide();
            $("#header-gradant-form").hide();
            $("#bucketTable").show();

            $('html, body').animate({
                scrollTop: $("#addItemBucketTable").offset().top   //id of div to be scrolled
            }, 1000);
        }

    });

    $("#itemTableNextTbn").click(function(){
        console.log("Item table button cllickd");

        $("#bucketTable").hide();
        $("#createOrderForm1").hide();
        $("#bucketTable").hide();
        $("#createOrderForm2").show();
        $("#header-gradant-form").show();

        // $("#createOrderForm2").show();

        $('html, body').animate({
            scrollTop: $("#createOrderForm1").offset().top   //id of div to be scrolled
        }, 1000);

        let i =0;
        $("table > tbody > tr").each(function () {
            i=i+1
        });
        $("label[for='ItemCount']").text(i-1);


    });

    $('.formTable tbody').on('click','.viewBtn',function () {
        var currow =$(this).closest('tr');
        var col1 =currow.find('td:eq(0)').text();
        var col2 =currow.find('td:eq(1)').text();
        var col3 =currow.find('td:eq(2)').text();
        var col4 =currow.find('td:eq(3)').text();
        var col5 =currow.find('td:eq(4)').text();
        var col6 =currow.find('td:eq(5)').text();
        var result =col1+'\n'+col2+'\n'+col3+'\n'+col4+'\n'+col5+'\n'+col6;
        alert(result);
    });

    // $('#ViewAllTbn').click(function () {
    //
    //     let i =0;
    //     let orderItemList= [];
    //     $("table > tbody > tr").each(function () {
    //         let arr =[$(this).find('td').eq(0).text()];
    //         var num =$(this).find('td').eq(0).text();
    //         orderItem = {
    //             "Item" : $(this).find('td').eq(0).text(),
    //             "Style" : $(this).find('td').eq(1).text(),
    //             "Size" : $(this).find('td').eq(2).text(),
    //             "Mateial" : $(this).find('td').eq(3).text(),
    //             "Button" : $(this).find('td').eq(4).text(),
    //             "Nool" : $(this).find('td').eq(5).text(),
    //             "Quantity" : $(this).find('td').eq(6).text(),
    //         };
    //
    //         var myJSON = JSON.stringify(orderItem);
    //         orderItemList[i]=myJSON;
    //         // console.log("myJSONList :"+orderItemList[i]);
    //         console.log("i  :"+i);
    //         i=i+1
    //
    //
    //
    //     });
    //     console.log("myJSONList :"+orderItemList[1]);
    //     console.log("length :"+orderItemList.length);
    //
    //     // console.log("Arra is:"+Array);
    //     // console.log("Arra0 is:"+Array[0]);
    //     // console.log("Arra00 is:"+Array[0][0]);
    // });

    $('#backBtn').click(function () {
        $("#header-gradant-form").show();
        $("#createOrderForm1").show();
        $("#bucketTable").hide();
    });


    $("#NewCustomerBtn").click(function(){
        $('html, body').animate({
            scrollTop: $("#createOrderForm1").offset().top   //id of div to be scrolled
        }, 1);

        document.querySelector('#newCustomerForm').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden !important";
    });

    $(".close").click(function(){
        document.querySelector('.model-footer').style.display = "none";
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });


    $("#ExistingCustomerBtn").click(function () {
        $('html, body').animate({
            scrollTop: $("#createOrderForm1").offset().top   //id of div to be scrolled
        }, 1);

        document.querySelector('#bg-modal-existing-customer-Table').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden";
        ///////////////////////////////////////////customer table load/////////////////////////////////////////////////

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/createOrderController/loadCustomerTable",
            data: {  key: "customer"},
            success: function(data){
                $("#tableParent-oI-Table").html(data);


            },
            error       : function() {
                $("#tableParent-oI-Table").html('<br><p>Something went wrong.</p>');
            }
        });
    });

    $("#addnewCustomerBtn").click(function () {


        let CustomerName    = $("#CustomerName").val();
        let CustomerContactNumber   = $("#CustomerContactNumber").val();
        let Email   = $("#Email").val();
        let CustomerAddress = $("#CustomerAddress").val();




        if( (CustomerName=="") || (CustomerContactNumber=="") || (Email=="") || (CustomerAddress=="") ||(CustomerContactNumber.length==0)  ){
            $("#newcustomer-error").html("Some Field Empty!");
            document.querySelector('#model-footer-newcustomer').style.display = "flex";


        }else if( parseInt(CustomerContactNumber)<1 || parseInt(CustomerContactNumber)>999999999 || CustomerContactNumber.charAt(0) != '0' ||(CustomerContactNumber.length>10)){
            $("#newcustomer-error").html("Incorrect Contact Number!");
            document.querySelector('#model-footer-newcustomer').style.display = "flex";
         }else if( IsName(CustomerName)==false){
            $("#newcustomer-error").html("Invalid Customer Name!");
             document.querySelector('#model-footer-newcustomer').style.display = "flex";
         }else if(IsEmail(Email)==false){
            $("#newcustomer-error").html("Invalid Email!");
           document.querySelector('#model-footer-newcustomer').style.display = "flex";
        }
        else {
            let customerArr = [CustomerName,CustomerContactNumber,Email,CustomerAddress];
            ///////////////////////////////////////////customer table load/////////////////////////////////////////////////

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/addNewCustomer",
                data: { newCustomer:customerArr ,  key: "NewCustomer"},
                success: function(data){
                    $("label[for='customerLabel']").text(data);
                    $('#newCustomerForm input[type=text]').val('');
                    $('#newCustomerForm').hide();


                    document.querySelector('body').style.overflow = "auto";

                },
                error       : function() {

                }
            });
        }

    });


    $("#excustomerCloseBtn").click(function () {
        console.log("customerCloseBtn")
        // document.querySelector('.model-footer-oI-Table').style.display = "none";
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });
    $(".close").click(function () {
        console.log("customerCloseBtn")
        $('#newCustomerForm input[type=text]').val('');
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });

    $("#saveOrder").click(function () {
        //order id
        let order_name =$("#OrderName").val();
        let order_status =$('#OrderStatus option:selected').val();
        let order_description =$("#Description").val();
        let order_due_date =$("#DueDate").val();
        let estimate_time =$("label[for='EstimateTime']").html();
        let estimate_price =$("label[for='EstimateTotalPrice']").html();
        let advance_price =$("label[for='EstimateAdvance']").html();

        let customer_ID =parseInt($("label[for='customerLabel']").html());

        if(order_name=="" || order_status=="0" || order_due_date=="" || customer_ID=="" ){
           alert("Some Field Missing");
        }else{
            let orderArray =[order_name,order_status,order_description,order_due_date,estimate_time,estimate_price,advance_price,0,customer_ID];

        }


        // order_item_ID
        // Item_type
        // Item_style

        // material
        // material_design
        // material_design_image
        // material_design_code
        // material_color

        // button_shape
        // button_color

        // nool_color

        // quantity

        // order_ID
        // p_ID
////////////////////////////////////////////////////////////////////////////////////////
        // <th scope="col">Predefine Id</th>
        // <th scope="col">Template</th>
        // <th scope="col">Size</th>

        // <th scope="col">Fabric Type</th>
        // <th scope="col">Fabric Design</th>
        // <th scope="col">Fabric Design Image</th>
        // <th scope="col">Fabric Design Code</th>
        // <th scope="col">Fabric Color</th>

        // <th scope="col">Button Design </th>
        // <th scope="col">Button Color</th>

        // <th scope="col">Quantity</th>

        let i =0;
        let orderItemList= [];
        $("#addItemBucketTable table > tbody > tr").each(function () {
            let arr =[$(this).find('td').eq(0).text()];
            var num =$(this).find('td').eq(0).text();
            orderItem = [

                // Template


                $(this).find('td').eq(3).text(),    //Fabric Type
                $(this).find('td').eq(4).text(), //Fabric Design
                $(this).find('td').eq(5).text(), //Fabric Design Image
                $(this).find('td').eq(6).text(), //Fabric Design Code
                $(this).find('td').eq(7).text(), //Fabric Color

                $(this).find('td').eq(8).text(),  //Button Design
                $(this).find('td').eq(9).text(),  //Button Color
                $(this).find('td').eq(10).text(), //nool color
                $(this).find('td').eq(11).text(),  //Quantity
                parseInt(0),                                  //order id
                parseInt( $(this).find('td').eq(0).text())//Predefine Id

            ];

            //var myJSON = JSON.stringify(orderItem);
            if(i>0){
                //orderItemList[i-1]=myJSON;
                orderItemList.push(orderItem);
            }
            // console.log("myJSONList :"+orderItemList[i]);
            console.log("i  :"+i);
            i=i+1



        });

        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/createOrderController/OrderAdd",
            data: { orderArray: orderArray, orderItemList: orderItemList,  key: "orderArrayS"},
            success: function(data){

                console.log("orderArray ? :"+data);

            },
            error       : function() {
                console.log("error");
            }
        });

    });
    $('#imageUploadForm').on('submit',(function() {

        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

    $("#ImageBrowse").on("change", function() {
        $("#imageUploadForm").submit();
    });
});




function productDelete(ctl) {
    $(ctl).parents("tr").remove();
}

function assignCustomer() {

    let i, tblrows, empID="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('#bg-modal-existing-customer-Table').style.display = "none";

        // document.querySelector('.bg-modal-oI-Table').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
        jQuery(function($) {
            $("label[for='customerLabel']").text(empID);
        });

    }
    else {
        // document.querySelector('.model-footer').style.display = "block";
    }

}


// function uploadFabric(){
// fetch('api-upload-image.php',{
//     method :"POST",
//     body : new FormData(document.getElementById('uploadFabric'))
// })
// }

function selectedCard(ctl){

    $(".choice").removeClass("choice");
    $(ctl).toggleClass("choice");



}
let imgurltemp ="";
function addTemplate() {
    if($(".option-card").hasClass("choice")){
        let id =0;


        $(".choice .preID").each(function() {
            id =$(this).val();
        });
        $(".choice .pImageURL").each(function() {
            imgurltemp =$(this).val();

        });
        $("label[for='ChooseTemplate']").text(id);

        document.querySelector('#PredefineModel').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    }else{

    }
}
function closeModel() {
    document.querySelector('#PredefineModel').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}

function closeNewCutomerPopup() {
    document.querySelector('#newCustomerForm').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

function IsName(name) {
    var regex = /^(([A-Za-z]+[\-\']?)*([A-Za-z]+)?\s)+([A-Za-z]+[\-\']?)*([A-Za-z]+)?$/;
    if(!regex.test(name)) {
        return false;
    }else{
        return true;
    }
}