$(document).ready(function () {

    $("#createOrderForm2").hide();
    $("#bucketTable").hide();
    $(".error").hide();
    $("#NoolColorDiv").hide();
    $("label[for='TemplateDescription']").text("");
    $("#CollarSize").prop("disabled", true);

    //****************************************create order form one *************************************************//


    //**************************************** order shirt or t shirt selected  hand type change*************************************************//
    $('#ItemType').on('change', function() {
        // $("label[for='FM1']").text("");
        let ItemType = $('option:selected',this).data("value");
        $("#CollarSize").prop("disabled", false);

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
                scrollTop: $("#right").offset().top   //id of div to be scrolled
            }, 1);

            document.querySelector('#PredefineModel').style.display = "flex";
            document.querySelector('body').style.overflow = "hidden !important";
            let Type =  $( "#ItemType option:selected" ).text();
            let colorType =$( "#CollarSize option:selected" ).text();
            let handType =$( "#ItemStyle option:selected" ).text();



            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/templateCardGenarator",
                data: { Type: Type,   key: "PredefinePopup"},
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
//********************fabric design code************************************//
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/createOrderController/setFabricCode",
        data: {   key: "fabricCode"},
        success: function(data){
            // console.log("fabrc "+data);
            $("#fabricdesigncode").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });


    $("#fabricdesigncode").select2({
        templateResult: formatOptions
    });
    //********************button design code************************************//
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/createOrderController/setButtonCode",
        data: {   key: "buttonCode"},
        success: function(data){
            // console.log("buttonCode"+data);
            $("#buttondesigncode").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });


    $("#buttondesigncode").select2({
        templateResult: formatOptions
    });


//*****************************************order shirt or t shirt selected  hand type change************************************************//

    let count=0;
    let countQuantity=0;
    $("#addToBucket").on('click',function(){


        let PredefineId = 0;
        let FabricDesignID =0;
        let ButtonDesignID=0;;


        PredefineId = parseInt($("#ChooseTemplate").val());

        let Template =  imgurltemp;

        let CollarSize = $('#CollarSize option:selected').val();

        let FabricType =$('#FabricType option:selected').val();

         FabricDesignID =$('#fabricdesigncode option:selected').data('value');
        let FabricDesignImage =$("#fabricdesigncode option:selected").val();
        let FabricDesignCode = $("#fabricdesigncode option:selected").text();

         ButtonDesignID =$('#buttondesigncode option:selected').data('value');
        // console.log("FabricDesignID"+FabricDesignID);

        let Quantity = parseInt($("#orderItemQuantity").val());
        // console.log("Quantity :"+Number.isInteger(Quantity));
        // console.log("Quantity2 :"+Number.isInteger($("#orderItemQuantity").val()));

        // if($('#ItemType option:selected').val()=="0"){
        //     $("label[for='IT']").show();
        // } if(PredefineId==""||PredefineId==0 ||PredefineId===undefined){
        //     $("label[for='CT']").show();
        // } if(CollarSize=="0"){
        //     $("label[for='CS']").show();
        // } if(Number.isInteger(FabricDesignID) == false){
        //     $("label[for='FDC']").show();
        // }if(isbuttonInclude=='yes'){
        //     if(Number.isInteger(ButtonDesignID) == false){
        //         $("label[for='BDC']").show();
        //     }
        //
        // }if(Number.isInteger(Quantity)==false){
        //     $("label[for='Q']").show();
        // }



        if($('#ItemType option:selected').val()=="0"){
            $("label[for='IT']").show();
        }else{
            if(CollarSize=="0"){
                $("label[for='CS']").show();
            }else{
                if(Number.isInteger(PredefineId) == false){
                    $("label[for='CT']").show();
                }else{
                    if(Number.isInteger(FabricDesignID) == false){
                        $("label[for='FDC']").show();
                    }else{
                        if(isbuttonInclude=='yes'){
                            if(Number.isInteger(ButtonDesignID) == false){
                                $("label[for='BDC']").show();
                            }else{
                                if(Number.isInteger(Quantity)==false){
                                    $("label[for='Q']").show();
                                }else{

                                    /*******************************************************/
                                    count =count+1;
                                    alert("Item "+count+"Added!");
                                    $("label[for='TemplateDescription']").text("");

                                    $("#orderItemQuantity").val("");

                                    $('html, body').animate({
                                        scrollTop: $("#right").offset().top   //id of div to be scrolled
                                    }, 1);


                                    $("#cardP").append("<a href=\"#\">"+ItemType+" "+count+"</a> <span class=\"price\">"+Quantity+"</span><br>");
                                    $("label[for='ItemCountCard']").text(count);
                                    countQuantity =countQuantity+parseInt(Quantity);
                                    $("label[for='ItemQuantityCount']").text(countQuantity);


                                    $('#addItemBucketTable tbody tr:last').after(

                                        '<tr data-label="Pending Approval">' +
                                        '<td data-label="" style="display: none">'+PredefineId+'</td>' +
                                        '<td data-label=""><img src='+Template+'  style="width: 100px; height:100px; text-align:center;"/></td>' +
                                        '<td data-label="" >'+CollarSize+'</td>' +
                                        '<td data-label=""  style="display: none">'+FabricDesignID+'</td>' +
                                        '<td data-label="" ><img src='+FabricDesignImage+'  style="width: 100px; height:100px; text-align:center;"/></td>' +
                                        '<td data-label="" >'+FabricDesignCode+'</td>' +
                                        '<td data-label="" style="display: none">'+ButtonDesignID+'</td>' +
                                        '<td data-label="" >'+Quantity+'</td>' +
                                        '<td><div class="table__button-group">' +
                                        '<a href="#" class="viewBtn"style="margin: 2px;color: #00B4CC">View  |</a>' +
                                        '<a href="#" class="viewBtn" style="margin: 2px;color: salmon" ;">Edit  |</a>' +
                                        '<a href="#" style="margin: 2px; color: red;" onclick="productDelete(this);">Delete</a>' +
                                        '</div></td>'+
                                        '</tr>\n'
                                    );
                                    console.log("P2 :"+PredefineId);
                                    console.log("F2 :"+FabricDesignID);
                                    console.log("B2 :"+ButtonDesignID);
                                    $('input[type=text]').val('');
                                    $('[name=options] option').filter(function() {
                                        return ($(this).text() == '--SELECT--'); //To select Blue
                                    }).prop('selected', true);
                                    PredefineId = 0;
                                    $("#CollarSize").prop("disabled", true);
                                    FabricDesignCode="--SELECT--";

                                    $(".error").hide();


                                }
                            }

                        }else{
                            if(Number.isInteger(Quantity)==false){
                                $("label[for='Q']").show();
                            }else{

                                /*******************************************************/
                                count =count+1;
                                alert("Item "+count+"Added!");
                                $("label[for='TemplateDescription']").text("");

                                $("#orderItemQuantity").val("");

                                $('html, body').animate({
                                    scrollTop: $("#right").offset().top   //id of div to be scrolled
                                }, 1);


                                $("#cardP").append("<a href=\"#\">"+ItemType+" "+count+"</a> <span class=\"price\">"+Quantity+"</span><br>");
                                $("label[for='ItemCountCard']").text(count);
                                countQuantity =countQuantity+parseInt(Quantity);
                                $("label[for='ItemQuantityCount']").text(countQuantity);


                                $('#addItemBucketTable tbody tr:last').after(

                                    '<tr data-label="Pending Approval">' +
                                    '<td data-label="" style="display: none">'+PredefineId+'</td>' +
                                    '<td data-label=""><img src='+Template+'  style="width: 100px; height:100px; text-align:center;"/></td>' +
                                    '<td data-label="" >'+CollarSize+'</td>' +
                                    '<td data-label=""  style="display: none">'+FabricDesignID+'</td>' +
                                    '<td data-label="" ><img src='+FabricDesignImage+'  style="width: 100px; height:100px; text-align:center;"/></td>' +
                                    '<td data-label="" >'+FabricDesignCode+'</td>' +
                                    '<td data-label="" style="display: none">'+ButtonDesignID+'</td>' +
                                    '<td data-label="" >'+Quantity+'</td>' +
                                    '<td><div class="table__button-group">' +
                                    '<a href="#" class="viewBtn"style="margin: 2px;color: #00B4CC">View  |</a>' +
                                    '<a href="#" class="viewBtn" style="margin: 2px;color: salmon" ;">Edit  |</a>' +
                                    '<a href="#" style="margin: 2px; color: red;" onclick="productDelete(this);">Delete</a>' +
                                    '</div></td>'+
                                    '</tr>\n'
                                );
                                console.log("P2 :"+PredefineId);
                                console.log("F2 :"+FabricDesignID);
                                console.log("B2 :"+ButtonDesignID);
                                $('input[type=text]').val('');
                                $('[name=options] option').filter(function() {
                                    return ($(this).text() == '--SELECT--'); //To select Blue
                                }).prop('selected', true);
                                PredefineId = 0;
                                $("#CollarSize").prop("disabled", true);
                                FabricDesignCode="--SELECT--";

                                $(".error").hide();


                            }

                        }
                    }
                }
            }
        }


        // else {
        //
        //     /*******************************************************/
        //     count =count+1;
        //     alert("Item "+count+"Added!");
        //     $("label[for='TemplateDescription']").text("");
        //
        //
        //     $('html, body').animate({
        //         scrollTop: $("#right").offset().top   //id of div to be scrolled
        //     }, 1);
        //
        //
        //     $("#cardP").append("<a href=\"#\">"+ItemType+" "+count+"</a> <span class=\"price\">"+Quantity+"</span><br>");
        //     $("label[for='ItemCountCard']").text(count);
        //     countQuantity =countQuantity+parseInt(Quantity);
        //     $("label[for='ItemQuantityCount']").text(countQuantity);
        //
        //
        //     $('#addItemBucketTable tbody tr:last').after(
        //
        //         '<tr data-label="Pending Approval">' +
        //         '<td data-label="" style="display: none">'+PredefineId+'</td>' +
        //         '<td data-label=""><img src='+Template+'  style="width: 160px; height:160px; text-align:center;"/></td>' +
        //         '<td data-label="" >'+CollarSize+'</td>' +
        //         '<td data-label=""  style="display: none">'+FabricDesignID+'</td>' +
        //         '<td data-label="" ><img src='+FabricDesignImage+'  style="width: 160px; height:160px; text-align:center;"/></td>' +
        //         '<td data-label="" >'+FabricDesignCode+'</td>' +
        //         '<td data-label="" style="display: none">'+ButtonDesignID+'</td>' +
        //         '<td data-label="" >'+Quantity+'</td>' +
        //         '<td><div class="table__button-group">' +
        //         '<a href="#" class="viewBtn"style="margin: 2px;color: #00B4CC">View  |</a>' +
        //         '<a href="#" class="viewBtn" style="margin: 2px;color: salmon" ;">Edit  |</a>' +
        //         '<a href="#" style="margin: 2px; color: red;" onclick="productDelete(this);">Delete</a>' +
        //         '</div></td>'+
        //         '</tr>\n'
        //     );
        //     console.log("P2 :"+PredefineId);
        //     console.log("F2 :"+FabricDesignID);
        //     console.log("B2 :"+ButtonDesignID);
        //     $('input[type=text]').val('');
        //     $('[name=options] option').filter(function() {
        //         return ($(this).text() == '--SELECT--'); //To select Blue
        //     }).prop('selected', true);
        //     PredefineId = 0;
        //     $("#CollarSize").prop("disabled", true);
        //     FabricDesignCode="--SELECT--";
        //
        //     $(".error").hide();
        //     console.log("P3 :"+PredefineId);
        //     console.log("F3 :"+FabricDesignID);
        //     console.log("B3 :"+ButtonDesignID);
        //
        // }

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
                scrollTop: $("#right").offset().top   //id of div to be scrolled
            }, 1);
        }

    });

    $("#itemTableNextTbn").click(function(){
       // console.log("Item table button cllickd");

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



    $('#backBtn').click(function () {
        $("#header-gradant-form").show();
        $("#createOrderForm1").show();
        $("#bucketTable").hide();
    });


    $("#NewCustomerBtn").click(function(){
        $('html, body').animate({
            scrollTop: $("#right").offset().top   //id of div to be scrolled
        }, 1);

        document.querySelector('#newCustomerForm').style.display = "flex";
        document.querySelector('body').style.overflow = "hidden !important";
    });

    $(".close").click(function(){
        document.querySelector('.model-footer').style.display = "none";
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });


    // $("#ExistingCustomerBtn").click(function () {
    //     $('html, body').animate({
    //         scrollTop: $("#right").offset().top   //id of div to be scrolled
    //     }, 1);
    //
    //     document.querySelector('#bg-modal-existing-customer-Table').style.display = "flex";
    //     document.querySelector('body').style.overflow = "hidden";
    //     ///////////////////////////////////////////customer table load/////////////////////////////////////////////////
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: "http://localhost/Richway-garment-system/createOrderController/loadCustomerTable",
    //         data: {  key: "customer"},
    //         success: function(data){
    //             $("#tableParent-oI-Table").html(data);
    //
    //
    //         },
    //         error       : function() {
    //             $("#tableParent-oI-Table").html('<br><p>Something went wrong.</p>');
    //         }
    //     });
    // });
    //********************customer select************************************//
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/createOrderController/setcustomerdropdown",
        data: {   key: "customerdrop"},
        success: function(data){
            // console.log("fabrc "+data);
            $("#selectcustomerdop").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });


    $("#selectcustomerdop").select2({
        templateResult: formatOptions2
    });



    // $("#addnewCustomerBtn").click(function () {
    //
    //
    //     let CustomerName    = $("#CustomerName").val();
    //     let CustomerContactNumber   = $("#CustomerContactNumber").val();
    //     let Email   = $("#Email").val();
    //     let CustomerAddress = $("#CustomerAddress").val();
    //
    //
    //
    //
    //     if( (CustomerName=="") || (CustomerContactNumber=="") || (Email=="") || (CustomerAddress=="") ||(CustomerContactNumber.length==0)  ){
    //         $("#newcustomer-error").html("Some Field Empty!");
    //         document.querySelector('#model-footer-newcustomer').style.display = "flex";
    //
    //
    //     }else if( parseInt(CustomerContactNumber)<1 || parseInt(CustomerContactNumber)>999999999 || CustomerContactNumber.charAt(0) != '0' ||(CustomerContactNumber.length>10)){
    //         $("#newcustomer-error").html("Incorrect Contact Number!");
    //         document.querySelector('#model-footer-newcustomer').style.display = "flex";
    //      }else if( IsName(CustomerName)==false){
    //         $("#newcustomer-error").html("Invalid Customer Name!");
    //          document.querySelector('#model-footer-newcustomer').style.display = "flex";
    //      }else if(IsEmail(Email)==false){
    //         $("#newcustomer-error").html("Invalid Email!");
    //        document.querySelector('#model-footer-newcustomer').style.display = "flex";
    //     }
    //     else {
    //         let customerArr = [CustomerName,CustomerContactNumber,Email,CustomerAddress];
    //         ///////////////////////////////////////////customer table load/////////////////////////////////////////////////
    //
    //         $.ajax({
    //             type: 'POST',
    //             url: "http://localhost/Richway-garment-system/createOrderController/addNewCustomer",
    //             data: { newCustomer:customerArr ,  key: "NewCustomer"},
    //             success: function(data){
    //                 $("label[for='customerLabel']").text(data);
    //                 $('#newCustomerForm input[type=text]').val('');
    //                 $('#newCustomerForm').hide();
    //
    //
    //                 document.querySelector('body').style.overflow = "auto";
    //
    //             },
    //             error       : function() {
    //
    //             }
    //         });
    //     }
    //
    // });


    // $("#excustomerCloseBtn").click(function () {
    //    // console.log("customerCloseBtn")
    //     // document.querySelector('.model-footer-oI-Table').style.display = "none";
    //     document.querySelector('.bg-modal').style.display = "none";
    //     document.querySelector('body').style.overflow = "auto";
    // });
    $(".close").click(function () {
      //  console.log("customerCloseBtn")
        $('#newCustomerForm input[type=text]').val('');
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });

    $("#saveOrder").click(function () {

        let orderArray;
        let order_description =$("#OrderName").val();
        let order_status =$('#OrderStatus option:selected').val();
        let order_due_date =$("#DueDate").val();
        // let estimate_time =$("label[for='EstimateTime']").html();
        // let order_price =$("label[for='EstimateTotalPrice']").html();
        // let advance_price =$("label[for='EstimateAdvance']").html();
        let estimate_time =0;
        let order_price =0;
        let advance_price =0;
        let customer_ID =$('#selectcustomerdop option:selected').data('value');

        $("#selectcustomerdop").change(function () {
            let customer_ID =$('#selectcustomerdop option:selected').data('value');
            console.log("customer id :"+customer_ID);
        });

        // let customer_ID =parseInt($("label[for='customerLabel']").html());

        if(order_description=="" ){
            $("label[for='OD']").show();
        }if(order_due_date == "" ){
            $("label[for='DD']").show();
        }

        else{
            // order_ID
            // order_description
            // order_status
            // order_due_date
            // estimate_time
            // order_price
            // advance_price
            // sales_manager_ID
            // customer_ID
            let orderItemList= [];
             orderArray =[order_description,"start",order_due_date,parseInt(110),parseInt(500),parseInt(250), parseInt(0),customer_ID];

            let i =0;
             $("#addItemBucketTable table > tbody > tr").each(function () {

                var num =$(this).find('td').eq(3).text();
               // console.log("fabric id "+num);
                // ["M","1","100","","0","1"]

                orderItem = [

                    // Template
                    $(this).find('td').eq(2).text(), //Size
                    $(this).find('td').eq(3).text(), //Fabric Design Id
                    $(this).find('td').eq(6).text(),  //Button Design id
                    $(this).find('td').eq(7).text(),  //Quantity
                    parseInt(0),                                  //order id
                    parseInt( $(this).find('td').eq(0).text()),//Predefine Id

                ];
                if(i>0){
                    //orderItemList[i-1]=myJSON;
                    orderItemList.push(orderItem);
                }

               // console.log("i  :"+i);
                i=i+1

            });

             $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/OrderAdd",
                data: { orderArray: orderArray, orderItemList: orderItemList,  key: "orderArrayS"},
                success: function(data){
                    alert("Succesfully Added!")
                    if(data=="ok"){
                        alert("Succesfully Added!")
                        window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"

                    }else{
                        window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"

                    }
                    //window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"




                },
                error       : function() {
                    console.log("error");
                }
            });

        }



////////////////////////////////////////////////////////////////////////////////////////







    });



});




function productDelete(ctl) {
    $(ctl).parents("tr").remove();
}

function assignCustomer() {

    let i, tblrows, empID="",cname="";

    tblrows = document.getElementsByClassName("tblrow");
    for (i = 0; i < tblrows.length; i++) {
        if(tblrows[i].className.includes('active-row')){
            empID = tblrows[i].firstElementChild.innerHTML;
            cname =  tblrows[i].children[1].innerHTML;
        }
    }

    if(empID.length>0){
        document.querySelector('#bg-modal-existing-customer-Table').style.display = "none";

        // document.querySelector('.bg-modal-oI-Table').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
        jQuery(function($) {
            $("label[for='customerLabel']").text(empID);
            $("label[for='customerDetailsLabel']").text(cname);
        });

    }
    else {
        // document.querySelector('.model-footer').style.display = "block";
    }

}


function selectedCard(ctl){

    $(".choice").removeClass("choice");
    $(ctl).toggleClass("choice");



}
let imgurltemp ="";
let isbuttonInclude='no';
function addTemplate() {
    if($(".option-card").hasClass("choice")){
        let id =0;
        let type="";
        let handType ="";
        let collorType="";

        $(".choice .card-description").each(function() {
            type =$('.template-type').html();
            handType = $('.template-handtype').html();
            collorType = $('.template-collartype').html();

        });

        $(".choice .preID").each(function() {
            id =$(this).val();

        });
        $(".choice .pImageURL").each(function() {
            imgurltemp =$(this).val();

        });
        // $("label[for='ChooseTemplate']").text(id);
        $("#ChooseTemplate").val(id);
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/createOrderController/isbuttoninpredefineCheck",
            data: { table:type, predefineId: id,  key: "numberofbuttoncheck"},
            success: function(data){

                // console.log("numberofbuttoncheck  :"+data);
                if(data>0){
                    $("#ButtonDesignDiv").show();
                    isbuttonInclude ='yes';
                }else{
                    isbuttonInclude ='no';
                    $("#ButtonDesignDiv").hide();
                }
            },
            error       : function() {
                console.log("error");
            }
        });

        $("label[for='TemplateDescription']").text(type+" with "+handType+" with "+collorType+" collar.");
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
/********************image in dropdownlist *********************/
// function formatOptions2 (state) {
//     if (!state.id) { return state.text; }
//     if(state.id>1){}
//     // console.log("sale val :"+state.element.value);
//     var $state = $(
//         '<span class="dropdownList" ><img class="dropdownimage" src="http://localhost/Richway-garment-system/public/assets/img/' + state.element.value.toLowerCase() + '.jpg"  /> ' + state.text + '</span>'
//     );
//     return $state;
// }
function formatOptions (state) {
    if (!state.id) { return state.text; }

    var $state;
    $state = $(
        '<span class="dropdownList" ><img class="dropdownimage" src="' + state.element.value+ '"  /> ' + state.text + '</span>'
    );
    if(state.element.value=='0'){
        $state = $(
            '<span class="dropdownList" id="impt" >--SELECT--</span>'
        );
    }

    return $state;
}
function formatOptions2 (state) {
    if (!state.id) { return state.text; }

    var $state;
    $state = $(
        '<span class="dropdownList" >' + state.text + '</span>'
    );
    // if(state.element.value=='0'){
    //     $state = $(
    //         '<span class="dropdownList" id="impt" >--SELECT--</span>'
    //     );
    // }

    return $state;
}