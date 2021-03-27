const errorCheck = {itemType: 0, collarSize: 0, templateSelect: 0,fabricDesign: 0, buttonDesign: 0,quantity:0};

$(document).ready(function () {

    //notification
    // $("#CIN").on('click',function(){

    setInterval(function() {
            console.log("called after 100 ");
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/getNotificationCount",
                data: {   key: "notifycount"},
                success: function(data){
                    document.getElementById('notifycount').innerText=parseInt(data);
                    console.log("called after time ");
                     console.log("data:"+data);
                    // alert(data);
                },
                error       : function() {
                    console.log("error");
                }
            });
        }, 50000);





    // });





    $("#createOrderForm2").hide();
    $("#bucketTable").hide();
    $(".error").hide();
    $("#NoolColorDiv").hide();
    $("#ButtonDesignDiv").hide();
    $("label[for='TemplateDescription']").text("");
    $("#CollarSize").prop("disabled", true);

    $('#customerGiveDateDive').hide();
    $('#generateOrderStatusDiv').hide();





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
                url: "http://localhost/Richway-garment-system/createOrderController/templateCardGenarator2",
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


    $("#ItemType").change(function () {

        if($('#ItemType option:selected').val()=="0"){
            $("label[for='itemType']").show();

        }else{
            errorCheck['itemType']=1;
            $("label[for='itemType']").hide();
        }
    });
    $("#CollarSize").change(function () {

        if($('#ItemType option:selected').val()=="0"){
            $("label[for='collarSize']").show();
        }else{
            errorCheck['collarSize']=1;
            $("label[for='collarSize']").hide();
        }
    });
    $("#fabricdesigncode").change(function () {


        if(typeof $('#fabricdesigncode option:selected').data('value') === 'undefined'){
            $("label[for='fabricDesign']").show();
        }else{
            errorCheck['fabricDesign']=1;
            $("label[for='fabricDesign']").hide();
        }
    });
    $("#buttondesigncode").change(function () {

        if( isbuttonInclude=='yes' && typeof $('#buttondesigncode option:selected').data('value') === 'undefined'){

            $("label[for='buttonDesign']").show();
        }else{
            errorCheck['buttonDesign']=1;
            // $("#buttondesigncode").select2("val", "");
            $("label[for='buttonDesign']").hide();
        }
    });

    $("#orderItemQuantity").on("change paste keyup", function() {
        console.log("orderItemQuantity :"+$(this).val());
        if($.isNumeric($(this).val())==true && $(this).val()>0){
            console.log("TRUE");
            errorCheck['quantity']=1;
            $("label[for='quantity']").hide();
        }else{
            console.log("FALSE");
            errorCheck['quantity']=0;
            $("label[for='quantity']").show();
        }


    });



    let count=0;
    let countQuantity=0;
    $("#addToBucket").on('click',function(){
        // $("#fabricdesigncode").select2("val", "");
        // $("#buttondesigncode").select2("val", "");

        $(".error").hide();
        let flag =1;
        for (const [key, value] of Object.entries(errorCheck)) {
            if(value==0){
                console.log("value is zero");
                $("label[for="+key+"]").show();
                flag =0;
            }
            console.log(key,value);
        }
        console.log("flag is :"+flag);





        let PredefineId = 0;
        let FabricDesignID = 0;
        let ButtonDesignID= 0;


        PredefineId = parseInt($("#ChooseTemplate").val());

        let Template =  imgurltemp;

        let CollarSize = $('#CollarSize option:selected').val();

        let FabricType =$('#FabricType option:selected').val();

         FabricDesignID =$('#fabricdesigncode option:selected').data('value');
        let FabricDesignImage =$("#fabricdesigncode option:selected").val();
        let FabricDesignCode = $("#fabricdesigncode option:selected").text();

         ButtonDesignID =$('#buttondesigncode option:selected').data('value');





        let Quantity = parseInt($("#orderItemQuantity").val());






            /*******************************************************/
           if(flag==1){
               flag =0;
               count =count+1;
               console.log("count :"+count);
               alert("Item "+count+"Added!");
               $("#fabricdesigncode").select2("val", "");
               $("#buttondesigncode").select2("val", "");

               for (const [key, value] of Object.entries(errorCheck)) {
                   if(value==1){
                       errorCheck[key]=0;
                       console.log("value is zero");

                   }
               }



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

               $('input[type=text]').val('');
               $('[name=options] option').filter(function() {
                   return ($(this).text() == '--SELECT--'); //To select Blue
               }).prop('selected', true);

               PredefineId = 0;
               $("#CollarSize").prop("disabled", true);
               FabricDesignCode="--SELECT--";

               $(".error").hide();


           }








    });
//go to step 2
    $("#nextBtnf1").click(function(){
        console.log("count is :::"+count);
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


//step 2

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




    $(".close").click(function(){
        document.querySelector('.model-footer').style.display = "none";
        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    });

//step 3
    //**************************selectOrderDueDateType**************************************//

//back to step 2
    $("#backstep2").click(function(){
        $("#createOrderForm2").hide();
        $("#header-gradant-form").hide();
        $("#bucketTable").show();
    });


    $( ".selectOrderDueDateType" ).on( "change", function() {

        if($( "input:checked" ).val() == "normal" ){
            $('#customerGiveDateDive').hide();
            $('#customerNotGiveDateDive').show();
            $('#generateOrderStatusDiv').hide();

            $("label[for='OS']").hide();
            $("label[for='TP']").hide();
            $("label[for='EA']").hide();
            $("label[for='DD']").hide();
            $("label[for='AC']").hide();
            $("label[for='OD']").hide();
            $("label[for='GeneratedOrderStatus']").text("");
            $("label[for='EstimateTotalPrice']").text("");
            $("label[for='EstimateAdvance']").text("");


        }else{
            $('#customerNotGiveDateDive').hide();
            $('#customerGiveDateDive').show();
            $('#generateOrderStatusDiv').show();
            $("label[for='GeneratedDueDate']").text("");
            $("label[for='OS']").hide();
            $("label[for='TP']").hide();
            $("label[for='EA']").hide();
            $("label[for='DD']").hide();
            $("label[for='AC']").hide();
            $("label[for='OD']").hide();
            $("label[for='EstimateTotalPrice']").text("");
            $("label[for='EstimateAdvance']").text("");
        }
    });



    //********************customer select************************************//
    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/createOrderController/setcustomerdropdown",
        data: {   key: "customerdrop"},
        success: function(data){
            // console.log("fabrc "+data);
            $("#customer").html(data);


        },
        error       : function() {
            console.log("error");
        }
    });


    $("#selectcustomerdop").select2({
        templateResult: formatOptions2
    });




//dynamic validation

    $("#customerGiveDate").on("change paste keyup", function() {
        console.log("customer due date select :"+$(this).val());
        let x =$(this).val();
        if($(this).val()){
            $("label[for='CD']").hide();
        }else{

        }
    });

    $("#OrderName").change(function () {

        if($('#ItemType option:selected').val()=="0"){
            $("label[for='collarSize']").show();
        }else{
            errorCheck['collarSize']=1;
            $("label[for='collarSize']").hide();
        }
    });
    $("#OrderName").on("change paste keyup", function() {
        console.log("orderItemQuantity :"+$(this).val());
        let x =$(this).val();
        if($.isNumeric(x)==true){
            $("label[for*='OD']").html("Can't Keep a Number");
            $("label[for='OD']").show();
        }else if(!x.trim()){
            $("label[for*='OD']").html("Can't Keep a empty spaces");
            $("label[for='OD']").show();
        }else if(x == null || x==''){
            $("label[for*='OD']").html("This Field requred");
            $("label[for='OD']").show();
        }else if(x.length<10){
            $("label[for*='OD']").html("Description should be at least 10 characters ");
            $("label[for='OD']").show();
        }else{

            $("label[for='OD']").hide();
        }


    });


    $("#customer").change(function () {
        if(typeof $('#customer option:selected').data('value') === 'undefined'){
            $("label[for='AC']").show();
            console.log("customer id :undifine");
        }else{
            $("label[for='AC']").hide();
        }
    });

    $("#customer").select2({
        templateResult: formatOptions2
    });


    //cancel order****************************************

    $('#generateNormalDueDate').click( function() {
        console.log("grnarated normal due date button called");
        let rate =1;
        let flag=1;
        if($("input[name='dateType']:checked").val()=="normal"){
            console.log(" normal clicked");
            let flag=1;
        }else{
            console.log("customer clicked");
            let status_percentage=$("label[for='GeneratedOrderStatus']").html();
            if(status_percentage =="extra_line"){
                 rate =1.20;

            }else if(status_percentage=="optimize"){
                rate =1.50;
            }else if(status_percentage="overflow"){
                flag=0;
                rate=0;
            }
        }

        console.log("befor flag");
        if(flag==1){
            console.log("flag 1 called");
            let table = $("#addItemBucketTable table > tbody ");
            let jsonArr = [];

            table.find('tr').each(function (i) {
                var $tds = $(this).find('td'),
                    PredefineId = $tds.eq(0).text(),
                    FabricDesignID = $tds.eq(3).text(),
                    ButtonDesignID = $tds.eq(6).text(),
                    q = $tds.eq(7).text();

                var feed = {PreId: parseInt(PredefineId.trim()), FabricID: parseInt(FabricDesignID.trim()), ButtonID: parseInt(ButtonDesignID.trim()), Quantity: parseInt(q.trim())};
                if(i>0){
                    jsonArr.push(feed);
                }
            });

            let abc = JSON.stringify(jsonArr);
            console.log("myJSON :"+abc);
            console.log( jsonArr.length);

            let x =[{
                ButtonID: 2,
                FabricID: 20,
                PreId: 1,
                Quantity: 1000
            }, {
                ButtonID: 2,
                FabricID: 20,
                PreId: 1,
                Quantity: 2000
            }];

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/priceCalculate",
                data: {  dataArr:jsonArr, Arrlength:jsonArr.length, rate:rate, key: "priceCal"},
                success: function(data){

                    $("label[for='EstimateTotalPrice']").text(data);
                    $("label[for='EstimateAdvance']").text(parseFloat(data)/2);
                    console.log(data);

                    },
                error       : function() {
                    console.log("error");
                }
            });

        }



    });
//customer give due date
    $('#GeneratedOrderStatusBtn').click( function() {
        let due_date="";
        if($("input[name='dateType']:checked").val()=="normal"){
            let x = $("label[for='GeneratedDueDate']").html();
            due_date =x.substring(0, 10);
        }else{
            let x = $("#customerGiveDate").val();
            due_date =x.substring(0, 10);
        }


        let table2 = $("#addItemBucketTable table > tbody ");
        let jsonArr3 = [];

        table2.find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                PredefineId = $tds.eq(0).text(),
                quantity = $tds.eq(7).text();

            var feed = {PreId: parseInt(PredefineId.trim()), Quantity: parseInt(quantity.trim())};
            if(i>0){
                jsonArr3.push(feed);
            }
        });

        let s = JSON.stringify(jsonArr3);
        console.log("jsonArr3 :"+s);

        let checkStatusArr={
            "order":jsonArr3,
            "cus_date":due_date
        };

        let SJson = JSON.stringify(checkStatusArr);
        console.log("checkStatusArr :"+SJson);

        let rate =1;
        let flag=1;
        if($("input[name='dateType']:checked").val()=="normal"){
            flag=1;
        }else{
            let status_percentage=$("label[for='GeneratedOrderStatus']").html();
                if(status_percentage =="extra_line"){
                    rate =1.20;
                }else if(status_percentage=="optimize"){
                    rate =1.50;
                }else if(status_percentage=="overflow"){
                    flag=0;
                    rate=0;
                }
        }
        console.log("select customer date befor flag :"+flag);

        if(flag==1){
            console.log("select customer date after");

            let table = $("#addItemBucketTable table > tbody ");
            let jsonArr = [];

            table.find('tr').each(function (i) {
                let $tds = $(this).find('td'),
                    PredefineId = $tds.eq(0).text(),
                    FabricDesignID = $tds.eq(3).text(),
                    ButtonDesignID = $tds.eq(6).text(),
                    q = $tds.eq(7).text();

                let feed = {PreId: parseInt(PredefineId.trim()), FabricID: parseInt(FabricDesignID.trim()), ButtonID: parseInt(ButtonDesignID.trim()), Quantity: parseInt(q.trim())};
                if(i>0){
                    jsonArr.push(feed);
                }
            });
            let ddd = JSON.stringify(jsonArr);
            console.log("Customer give date JSON :"+ddd);
            console.log("length is :"+jsonArr.length);


            let x =[{
                ButtonID: 2,
                FabricID: 20,
                PreId: 1,
                Quantity: 1000
            }, {
                ButtonID: 2,
                FabricID: 20,
                PreId: 1,
                Quantity: 2000
            }];

            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/priceCalculate",
                data: {  dataArr:jsonArr, Arrlength:jsonArr.length, rate:rate, key: "priceCal"},
                success: function(data){

                    $("label[for='EstimateTotalPrice']").text(data);
                    $("label[for='EstimateAdvance']").text(parseFloat(data)/2);
                    console.log(data);

                },
                error       : function() {
                    console.log("error");
                }
            });

        }




    });




    $('#makeInvoiceBtn').click( function() {

        let orderArray;
        let order_description =$("#OrderName").val();
        let order_status ="";
        let order_due_date ="";


        if($("input[name='dateType']:checked").val()=="normal"){
            order_status ="normal";
            order_due_date = $("label[for='GeneratedDueDate']").html().substring(0, 9);
        }else{
            order_status = $("label[for='GeneratedOrderStatus']").html();
            order_due_date = $("#customerGiveDate").val().substring(0, 9);
        }
        console.log("order_due_date :"+order_due_date);
        console.log("order_status :"+order_status);


        // let estimate_time =$("label[for='EstimateTime']").html();
        // let order_price =$("label[for='EstimateTotalPrice']").html();
        // let advance_price =$("label[for='EstimateAdvance']").html();
        let estimate_time =0;
        let order_price =0;
        let advance_price =0;
        let customer_ID =$('#customer option:selected').data('value');

        if(order_status==""){
            $("label[for='OS']").show();
            $("label[for='TP']").show();
            $("label[for='EA']").show();

        }if(order_due_date == ""){
            $("label[for='DD']").show();
            $("label[for='TP']").show();
            $("label[for='EA']").show();

        }if(typeof $('#customer option:selected').data('value') === 'undefined'){
            $("label[for='AC']").show();
        }if(order_description==""){
            $("label[for='OD']").show();
        }
        else if(order_status!="" && order_due_date != "" && order_description!="" && typeof $('#customer option:selected').data('value') !== 'undefined') {

            $('#saveToOrder').hide();
            let x = document.getElementById("invoiceID");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            let y = document.getElementById("lastbuttoncupple");
            if (y.style.display === "none") {
                y.style.display = "block";
            }

            let totalprice=100;
            let paidamount=20;
            $.ajax({
                type: 'POST',
                url: "http://localhost/Richway-garment-system/createOrderController/genarateInvoice2",
                data: { TotalAmount: totalprice,amountPaid:paidamount, key: "Invoice2"},
                success: function(data){
                    $("#invoiceID").html(data);

                },
                error       : function() {
                    console.log("error");
                }
            });

        }
    });

    $('#InvoicePopbtn').click( function() {

        let totalprice=100;
        let paidamount=20;
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/createOrderController/genarateInvoice2",
            data: { TotalAmount: totalprice,amountPaid:paidamount, key: "Invoice2"},
            success: function(data){
                $("#invoiceID").html(data);
                // console.log(data);




            },
            error       : function() {
                console.log("error");
            }
        });

    });

//step 4

    $('#backtoStep3').click( function() {
        $('#saveToOrder').show();
        $('#invoiceID').hide();
        $('#lastbuttoncupple').hide();



    });
    $('#stp4Cancelbtn').click( function() {
        window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"




    });


    $("#saveOrder").click(function () {

        let orderArray;
        let order_description =$("#OrderName").val();

        let order_status ="";
        let order_due_date ="";


        if($("input[name='dateType']:checked").val()=="normal"){
            order_status ="normal";
            order_due_date = $("label[for='GeneratedDueDate']").html().substring(0, 9);
        }else{
            order_status = $("label[for='GeneratedOrderStatus']").html();
            order_due_date = $("#customerGiveDate").val().substring(0, 9);
        }
        console.log("order_due_date :"+order_due_date);
        console.log("order_status :"+order_status);


        // let estimate_time =$("label[for='EstimateTime']").html();
        // let order_price =$("label[for='EstimateTotalPrice']").html();
        // let advance_price =$("label[for='EstimateAdvance']").html();
        let estimate_time =0;
        let order_price =$("label[for='EstimateTotalPrice']").html();;
        let advance_price =$("label[for='EstimateAdvance']").html();;
        let customer_ID =$('#customer option:selected').data('value');

        // if(typeof $('#selectcustomerdop option:selected').data('value') === 'undefined'){
        //     $("label[for='AC']").show();
        //     console.log("customer dopdown undifine");
        // }



        console.log("selectcustomerdopdown >>>>>>:"+customer_ID);
        // let customer_ID =parseInt($("label[for='customerLabel']").html());

        if(order_status==""){
            $("label[for='OS']").show();
            $("label[for='TP']").show();
            $("label[for='EA']").show();

        }if(order_due_date == ""){
            $("label[for='DD']").show();
            $("label[for='TP']").show();
            $("label[for='EA']").show();

        }if(typeof $('#customer option:selected').data('value') === 'undefined'){
            $("label[for='AC']").show();
        }if(order_description==""){
            $("label[for='OD']").show();
        }
        else if(order_status!="" && order_due_date != "" && order_description!="" && typeof $('#customer option:selected').data('value') !== 'undefined') {

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
             orderArray =[order_description,"start",order_due_date,parseInt(110),parseInt(order_price),parseInt(advance_price), parseInt(0),customer_ID];

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

////////////////////////document////////////////////////////////////////////////////////////////


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



let imgurltemp ="";
let isbuttonInclude='no';
function addTemplateOLD() {

    $("#fabricdesigncode").select2("val", "");
    $("#buttondesigncode").select2("val", "");
    errorCheck['templateSelect']=1;
    $("label[for='templateSelect']").hide();

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
                    errorCheck['fabricDesign']=0;
                    errorCheck['buttonDesign']=0;
                    $("#ButtonDesignDiv").show();
                    $("label[for='buttonDesign']").show();

                       isbuttonInclude ='yes';
                    console.log("isbuttonInclude :"+isbuttonInclude);
                }else{
                    errorCheck['fabricDesign']=0;
                    errorCheck['buttonDesign']=1;
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

function selectedCard(ctl){

    $(".choice").removeClass("choice");
    $(ctl).toggleClass("choice");



}

function addTemplate(ctl) {

    $(".choice").removeClass("choice");
    $(ctl).toggleClass("choice");

    $("#fabricdesigncode").select2("val", "");
    $("#buttondesigncode").select2("val", "");
    errorCheck['templateSelect']=1;
    $("label[for='templateSelect']").hide();

    if($(".option-card").hasClass("choice")){
        let id =0;
        let type="";
        let description="";


        $(".choice .selectedDescription").each(function() {
            description =$(this).val();
            console.log("description  :"+description);


        });
        $(".choice .template-type").each(function() {
            type =$(this).val();


        });

        $(".choice .preID").each(function() {
            id =$(this).val();
            console.log("preID  :"+id);

        });
        $(".choice .pImageURL").each(function() {
            imgurltemp =$(this).val();
            console.log("select image  :"+imgurltemp);

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
                    errorCheck['fabricDesign']=0;
                    errorCheck['buttonDesign']=0;
                    $("#ButtonDesignDiv").show();
                    $("label[for='buttonDesign']").show();

                    isbuttonInclude ='yes';
                    console.log("isbuttonInclude :"+isbuttonInclude);
                }else{
                    errorCheck['fabricDesign']=0;
                    errorCheck['buttonDesign']=1;
                    isbuttonInclude ='no';
                    $("#ButtonDesignDiv").hide();
                }
            },
            error       : function() {
                console.log("error");
            }
        });

        $("label[for='TemplateDescription']").text(description);
        document.querySelector('#PredefineModel').style.display = "none";
        document.querySelector('body').style.overflow = "auto";
    }else{

    }
}




function closeModel() {
    document.querySelector('#PredefineModel').style.display = "none";
    document.querySelector('body').style.overflow = "auto";
}


function IsEmail(email) {
    let regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

function IsName(name) {
    let regex = /^(([A-Za-z]+[\-\']?)*([A-Za-z]+)?\s)+([A-Za-z]+[\-\']?)*([A-Za-z]+)?$/;
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


function selectPID(evt,pid,desc) {

    if(evt != null){

        document.getElementById('Select_Design_Category').value = "PID" + pid + " - " + desc;

        document.querySelector('.bg-modal').style.display = "none";
        document.querySelector('body').style.overflowY = "auto";

        let tmphtml = " <option value=\"\" disabled selected>Select Size</option>";
        let arr = sizes.split(',');
        arr.forEach(function(item) {
            tmphtml += "<option value=\"?\">?</option>".replaceAll("?",item);
        });

        console.log(tmphtml);
        document.getElementById('size').innerHTML = tmphtml;

    }

}



function printdiv(printpage)
{

    document.querySelector('.invoTop').style.display = "none";
    var headstr = "<html><head><title></title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
}

function PrintDive()
{

    var divContents = document.getElementById("invoiceID").innerHTML;
    var printWindow = window.open('', '', 'height=1000,width=800');
    printWindow.document.write('<html><head><title></title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}