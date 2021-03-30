<?php


class createOrderController extends framework{
    private $createOrderModel;


    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->createOrderModel = $this->model('orderCreateModel');
    }





    public function createOrder(){

        $PredefineItemType = $this->createOrderModel->getPredefineItemType();

        $this->view("Salesmanjor/createOrder",$PredefineItemType);
    }

    public function setPredefineItemType(){
        $result = $this->createOrderModel->getPredefineItemType();
        echo ' <option value="0" selected="" disabled="">--SELECT--</option>';

        foreach($result as $row){
            //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
            echo '<option value="100" data-value="'.$row->type.'">'.$row->type.'</option>';
        }


    }
//    public function setPredefineHandType(){
//
//        if(isset($_POST['key'])){
//            if($_POST['key'] == "ItemType"){
//
//                $type =strtolower($_POST['ItemType']);
//                $result = $this->createOrderModel->getHandType($type);
////                echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($result) . "');</script>");
//
//                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';
//                foreach($result as $row){
//                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
//                    echo '<option value="'.$row->hand_type.'" data-value="'.$row->hand_type.'">'.$row->hand_type.'</option>';
//                }
//            }
//        }
//
//
//
//    }

    public function setPredefineSize(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "ItemType") {

                $type =strtolower($_POST['ItemType']);
                if($type =="t-shirt"){
                    $type = "t_shirt";
                }

                $result = $this->createOrderModel->getCollarSize($type);

                echo ' <option data-value="0"  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->size.'" data-value="'.$row->size.'">'.$row->size.'</option>';
                }
            }
        }
    }





    public function setFabricCode(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "fabricCode") {
                $imagel="http://localhost/Richway-garment-system/public/assets/img/";
                $result = $this->createOrderModel->getFabricDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$imagel.$row->image_url.'" data-value="'.$row->ID.'">'.$row->fabric_code.'</option>';
                }
            }
        }
    }
    public function setButtonCode(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "buttonCode") {

                $result = $this->createOrderModel->getButtonDetails();
                $imagel="http://localhost/Richway-garment-system/public/assets/img/";
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$imagel.$row->image_url.'" data-value="'.$row->ID.'"  >'.$row->code.'</option>';
                }
            }
        }
    }


    public function setFabricType(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "fabricType") {

                $result = $this->createOrderModel->getFabricDetails();
                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->ID.'" data-value="'.$row->ID.'">'.$row->type.'</option>';
                }
            }
        }
    }
    public function setButtonType(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "buttonType") {

                $result = $this->createOrderModel->getButtonDetails();
                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->ID.'" data-value="'.$row->ID.'">'.$row->type.'</option>';
                }
            }
        }
    }

    public function loadDesignTemplates(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "loadDesignTemplateData"){

                $result = $this->manageProductModel->loadDesignTemplateData($this->getSession('selected_product'));

                //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

                $count = 0;
                if($result !== -1){

                    foreach($result as $row){

                        if($count == 0){
                            echo '<div class="first-row">';
                        }
                        elseif ($count == 2){
                            echo '<div class="second-row">';
                            $count = -2;
                        }

                        $imgurl = str_replace('.png','',$row->image_url);
                        $imgurl = $imgurl."-trans.png";
// <div id='productSizes' style='display: none'>$row->size</div>

//                        $sizesStr = $this->manageProductModel->getRemainedSizes($this->getSession('selected_product'),$row->p_ID);

                        echo "
                                <div class=\"product-container\">
                                <div class=\"product\">
                                    <div class=\"product-preview\">
                                        <img src=\"".BASEURL."/public/assets/img/$imgurl\" style=\"width: 100%; height: 100%; object-fit: scale-down;\">
                                    </div>
                                    <div class=\"product-info\">
                                        <div class=\"product-top\">
                                            <h6>Description</h6>
                                            <h4 id='desc'>$row->description</h4>
                                        </div>
                                        <div class=\"product-bottom\">
                                            <button type=\"button\" class=\"slctbtn cripple\" onclick=\"selectPID(event,'$row->p_ID','$row->description')\">Select
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ";

                        $count += 1;
                    }
                }
                else{
                    echo "
                        <br><p  style=\"text-align: center;\">There is no design template to the display!</p>
                   ";
                }


            }


        }

    }




    public function templateCardGenarator(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "PredefinePopup") {
                $result = $this->createOrderModel->getPredifineCard($_POST['Type']);


                foreach($result as $row){
                    $imagel="http://localhost/Richway-garment-system/public/assets/img/";
                    echo "
                    <div class='option-card'  onclick='selectedCard(this);' style='margin: 10px;'>
                            <img src=$imagel$row->image_url style='width:100%;  opacity: 0.5; background-color: purple;' class=card-thumb>
                            
                                <div class='card-description'>
                                     <h4 ><b class='template-type'> $row->type</b></h4>
                                     <p class='template-handtype'></span>$row->hand_type</p>
                                     <p class='template-collartype'>$row->collar_type </p>
                                </div>
                                <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                <input type=text class='pImageURL'  value='$imagel$row->image_url' style='display: none;'>
                            
                    </div>
                    ";
                }
            }
        }
    }
    public function templateCardGenarator2(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "PredefinePopup"){

                $result = $this->createOrderModel->getPredifineCard($_POST['Type']);
                //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

                $count = 0;
                if($result !== -1){

                    foreach($result as $row){

                        if($count == 0){
                            echo '<div class="first-row">';
                        }
                        elseif ($count == 2){
                            echo '<div class="second-row">';
                            $count = -2;
                        }
                        $imagel="http://localhost/Richway-garment-system/public/assets/img/";


                        echo "
                                <div class=\"product-container \" >
                                <div class=\"product option-card \" onclick='selectedCard(this);'>
                                    <div class=\"product-preview\">
                                        <img src=$imagel$row->image_url style=\"width: 100%; height: 100%; object-fit: scale-down;\">
                                    </div>
                                    <div class=\"product-info\">
                                        <div class=\"product-top\">
                                            <h6>Description</h6>
                                            <h4 id='desc' class='card-description'>$row->description</h4>
                                        </div>
                                        <div class=\"product-bottom\">
                                            <button type=\"button\" class=\"slctbtn cripple option-card choice\"   onclick=\"addTemplate(this)\" >
                                            Select
                                            <span>
                                             
                                                 <input type=text  class='template-type' value=' $row->type' style='display: none;'>
                                                <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                                <input type=text  class='pImageURL'  value=$imagel$row->image_url style='display: none;'>
                                                <input type=text  class='selectedDescription' value='$row->description' style='display: none;' >
                                            </span>
                                            

                                            

                                            </button>
                                        </div>
                                    </div>
                                      
                                               
                                </div>
                            </div>
                            
                            ";

                        $count += 1;
                    }
                }
                else{
                    echo "
                        <br><p  style=\"text-align: center;\">There is no design template to the display!</p>
                   ";
                }


            }


        }

    }




    public function isbuttoninpredefineCheck(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "numberofbuttoncheck") {
                if($_POST['table']=='t-shirt'){
                    $_POST['table']='t_shirt';
                }
                $result = $this->createOrderModel->isButtonInPredefine($_POST['table'],(int)$_POST['predefineId']);
//               echo("<script>console.log('PHP in  result : " . json_encode($result) . "');</script>");

                echo((int)$result);

            }
        }
    }

//    public function loadCustomerTable(){
//        if(isset($_POST['key'])) {
//            if ($_POST['key'] == "customer") {
//                $result = $this->createOrderModel->getCustomerDetails();
//                //  echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($result) . "');</script>");
//
//                echo "
//
//                <table class=\"table align-items-center table-flush\">
//                        <thead class=\"thead-light\">
//                        <tr>
//
//                            <th scope=col style='display:none;'>Customer ID</th>
//                            <th scope=col>Name</th>
//                            <th scope=col>Contact Number</th>
//                            <th scope=col>Email</th>
//                            <th scope=col>Address</th>
//
//                        </tr>
//                        </thead>
//                        <tbody>
//
//                ";
//                foreach ($result as $row) {
//
//                    echo "
//                            <tr class='tblrow' onclick='selectRow(event)'>
//                                <td id='supid' style='display:none;'>$row->customer_ID   </td>
//                                <td>$row->name</td>
//                                <td>$row->contact_no</td>
//                                <td>$row->email</td>
//                                <td>$row->address</td>
//
//                            </tr>
//                        ";
//
//                }
//                echo "
//                        </tbody>
//                    </table>
//
//                    ";
//            }
//        }
//
//    }
    public function setcustomerdropdown(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "customerdrop") {

                $result = $this->createOrderModel->getCustomerDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->customer_ID .'" data-value="'.$row->customer_ID.'"  >'.$row->name.'-'.$row->contact_no.'</option>';
                }
            }
        }
    }





    public function addNewCustomer(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "NewCustomer") {
                $result = $this->createOrderModel->addCustomer($_POST['newCustomer']);
                echo(intval($result));
            }
        }

    }

    public function setTaileringCost(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "ItemType") {

                $type =strtolower($_POST['ItemType']);
                if($type !="shirt"){
                    $type = t-shirt;
                }
                $result = $this->createOrderModel->getCollarSize($type);
                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->size.'" data-value="'.$row->size.'">'.$row->size.'</option>';
                }
            }
        }
    }




    public function priceCalculate(){

        if(isset($_POST['key'])) {

            if ($_POST['key'] == "priceCal") {

                $rate =$_POST['rate'];
                $length = $_POST['Arrlength'];
                $paymentCart = array();
                $orderItemCart = array();

                $ItemCountCart = array();
                $ItemCostCart = array();




                for ($x = 0; $x < $length; $x++) {

                    //these are string that string start " charactor and end " charator
                    //"200" ->lenth is 5

                    $predefine_ID =json_encode($_POST['dataArr'][$x]['PreId']);
                    $button_ID =json_encode($_POST['dataArr'][$x]['ButtonID']);
                    $fabric_ID =json_encode($_POST['dataArr'][$x]['FabricID']);
                    $quantity =json_encode($_POST['dataArr'][$x]['Quantity']);





                    $pID=intval(trim($predefine_ID, '"'));
                    $FabricID=intval(trim($fabric_ID, '"'));
                    $ButtonID=intval(trim($button_ID, '"'));
                    $ItemqQuntity=intval(trim($quantity, '"'));

//                    echo "\npID unit pice : :".$pID;
//                    echo "\nFabricID unit pice :".$FabricID;
//                    echo "\nButtonID unit pice : :".$ButtonID;
//                    echo "\nItemqQuntity unit pice :".$ItemqQuntity;

                    $fabric_uprice =$this->createOrderModel->getFabricUnitPrice($FabricID);
                    $button_uprice =$this->createOrderModel->getButtonUnitPrice($ButtonID);
                    $nool_uprice =$this->createOrderModel->getNoolUnitPrice($FabricID);

//                echo "\nFabric unit pice : :";
//                echo $fabric_uprice;
//                echo "\nButton unit pice : :".$button_uprice;
//                echo "\nNool unit pice :".$nool_uprice;

                    $predefines =$this->createOrderModel->getPredifineDetails($pID);

//                echo print_r("$predefines->normal_tailoring_cost");

//                echo "\nnormal_tailoring_cost  :".$predefines['normal_tailoring_cost'];






                    $pt= $predefines->type;
//                echo "\npredefineType details :".$pt;

                    $predefineType =strtolower($pt);
//                echo "\npredefineType details :".$predefineType;

                    if($predefineType !="shirt"){
                        $predefineType = "t_shirt";
                    }



                    $sizes= $predefines->sizes;
                    $array = explode(",", $sizes);
                    $maxsize =end($array);
//                    echo "\nmaxsize is                       :".$maxsize;
//                    echo "\npredefineType is                       :".$predefineType;
//                    echo "\npID is                       :".$pID;


                    $unitnormal_tailoring_cost =$predefines->normal_tailoring_cost;
//                    echo "\ntailoring_cost :";
//                    echo $unitnormal_tailoring_cost;


                    $largeRawMaterialQuantity =$this->createOrderModel->predefineRawMaterialsQuantity($predefineType,$pID,$maxsize);
//                    echo "\nfabQuantity   :";
//                    echo $largeRawMaterialQuantity->fabric_quantity;
//
//                    echo "\nbutton_quantity   :";
//                    echo $largeRawMaterialQuantity->button_quantity;
//
//                    echo "\nnool_quantity   :";
//                    echo $largeRawMaterialQuantity->real_thread_quantity;



                    $unit_fabric_quantity =$largeRawMaterialQuantity->fabric_quantity;
                    $unit_button_quantity =$largeRawMaterialQuantity->button_quantity;
                    $unit_real_thread_quantity =$largeRawMaterialQuantity->real_thread_quantity;

//                    echo "\nfabric_quantity :".$largeRawMaterialQuantity->fabric_quantity;
//                    echo "\nbutton_quantity :".$largeRawMaterialQuantity->button_quantity;
//                    echo "\nreal_thread_quantity :".$largeRawMaterialQuantity->real_thread_quantity;





//                $rawmaterialQuantity =$this->createOrderModel->rawMaterialQuantity($ptype,$p_ID,$size);

//                $unit_fabric_quantity =0;
//                $unit_button_quantity =0;
//                $unit_real_thread_quantity =0;

                    $total_fabric_quantity =$unit_fabric_quantity*$ItemqQuntity;
                    $total_button_quantity =$unit_button_quantity*$ItemqQuntity;
                    $total_real_thread_quantity =$unit_real_thread_quantity*$ItemqQuntity;

                    $fabric_totalprice=$total_fabric_quantity*$fabric_uprice;
                    $button_totalprice=$total_button_quantity*$button_uprice;
                    $nool_totalprice=$total_real_thread_quantity*$nool_uprice;
                    $total_taileringcost=$unitnormal_tailoring_cost*$ItemqQuntity;

//                    echo "\nfabric_totalprice :".$fabric_totalprice;
//                    echo "\nbutton_totalprice :".$button_totalprice;
//                    echo "\nnool_totalprice :".$nool_totalprice;
//                    echo "\ntotal_taileringcost :".$total_taileringcost;

                    $profit_margin =$predefines->minimum_profit_margin;
//                    echo "\nminimumprofit_margin :".$profit_margin;
                    $status_precentage=1;

                    $costperItem =($fabric_totalprice+$button_totalprice+$nool_totalprice+$total_taileringcost)*$profit_margin;
//                    echo "\ncostperItem :".$costperItem;


                    $profit_marginfororderItem =$costperItem*$profit_margin;
//                    echo "\nprofit_marginfororderItem :".$profit_marginfororderItem;


                    $totalPriceOfOrderItem=$costperItem+$profit_marginfororderItem;
//                    echo "\ntotalPrice :".$totalPriceOfOrderItem;
                    array_push($paymentCart, $totalPriceOfOrderItem);
                    array_push($orderItemCart, $pID);
                    array_push($ItemCountCart, $ItemqQuntity);
                    array_push($ItemCostCart, $costperItem);

//                    global $globalPaymentCart; = $paymentCart;
//                    global  $globalOrderPredefineIdCart = $orderItemCart;
//                    global $globalItemQuantityCart = $ItemqQuntity;

//                    global $globalPaymentCart;
//                    global  $globalOrderPredefineIdCart;
//                    global $globalItemQuantityCart;
//                    $globalPaymentCart = $paymentCart;
//                    $globalOrderPredefineIdCart = $orderItemCart;
//                    $globalItemQuantityCart = $ItemqQuntity;





                }
                $this->setSession(globalPaymentCart,$paymentCart);
                $this->setSession(globalOrderPredefineIdCart,$orderItemCart);
                $this->setSession(globalItemQuantityCart,$ItemCountCart);
                $this->setSession(globalItemCostCart,$ItemCostCart);
                $this->setSession(globalrate,$rate);


                echo array_sum($paymentCart)*$rate ;
//                echo "total payment :".array_sum($paymentCart);
//                echo "<pre>";
//                print_r($paymentCart);
//                echo "</pre>";
//                echo "<pre>";
//                print_r($orderItemCart);
//                echo "</pre>";

            }

        }
    }


    public function genarateInvoice2(){
//        echo "".$globalPaymentCart;
//        echo"".$globalOrderPredefineIdCart;
//        echo"".$globalItemQuantityCart ;


//        $result=[1,2,3,4];
//        $globleArrItemPrice=[200,250,300,400];
//        $globleArrItemCout =[108,205,350,88];
//        $globalItemCost =[108,205,350,88];





        $result= $this->getSession(globalOrderPredefineIdCart);
        $globleArrItemPrice= $this->getSession(globalPaymentCart);
        $globleArrItemCout = $this->getSession(globalItemQuantityCart);
        $globalRate =$this->getSession(globalrate);




        if(isset($_POST['key'])){
            if(  $_POST['key'] == "Invoice2"){

                $customerId= $_POST['customerID'];

                $customerDetails=$this->createOrderModel->getOneCustomer(intval($customerId));
                $TotalAmount=$_POST['TotalAmount'];
                $amountpaid=$_POST['amountPaid'];
                $orderdueDate=$_POST['orderDuedate'];
                $BalanceDue=$TotalAmount-$amountpaid;


                echo "
                <style>
        #invoiceID {background-color: #DDEEFF;padding: 15px;border-radius:0px; margin: 0;left: calc(50% - 30vw);
            width: 60vw;}
        #InvoiceHadername {margin:auto;color: white;text-align:center; margin-bottom: 10px;}
        #invoiceheader { margin:  3em auto 3em auto;}
        #invoiceheader:after { clear: both;  display: table; }

        #invoiceheader h1 { background: #172B4D; border-radius: 0.25em; color: #FFF; margin: auto; padding: 0.5em 0; }
        header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
        #invoiceheader address p { margin: 0 0 0.25em; }
        header span, header img { display: block; float: right; }
        header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
        header img { max-height: 100%; max-width: 100%; }
        
        /* article */

        article, article address, table.meta, table.inventory { margin: 0 0 3em; }
        article:after { clear: both;  display: table; }
        article h1 { clip: rect(0 0 0 0); position: absolute; }

        article address { float: left; font-size: 125%; font-weight: bold; }

        table.meta, table.balance { float: right; width: 36%; }
        table.meta:after, table.balance:after { clear: both;  display: table; }

        .tb table { font-size: 40%; table-layout: fixed; width: 100%; }
        .tb table { border-collapse: separate; border-spacing: 2px; }
        .tb th,.tb td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
        .tb th, .tb td { border-radius: 0.01em; border-style: solid; }
        .tb  th { background: #5e72e4; border-color: #172B4D; color: white; }
        .tb td { border-color: #172B4D; }



        /* table meta */

        table.meta th { width: 40%; }
        table.meta td { width: 60%; }

        /* table items */

        table.inventory { clear: both; width: 100%; }
        table.inventory th { font-weight: bold; text-align: center; }

        table.inventory td:nth-child(1) { width: 26%; }
        table.inventory td:nth-child(2) { width: 38%; }
        table.inventory td:nth-child(3) { text-align: right; width: 12%; }
        table.inventory td:nth-child(4) { text-align: right; width: 12%; }
        table.inventory td:nth-child(5) { text-align: right; width: 12%; }

        /* table balance */

        table.balance th, table.balance td { width: 50%; }
        table.balance td { text-align: right; }
        
        @media print {
    .print {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}




    </style>
                ";

                echo "
                <div class='invoTop' style=margin-bottom: 30px>
                <ol class=progtrckr data-progtrckr-steps>
                    <li class=progtrckr-done>Order Processing</li>
                    <li class=progtrckr-done>Order Details</li>
                    <li class=progtrckr-done >Order Schedule</li>
                    <li class=progtrckr-done>Order Invoice</li>
                </ol>
            </div>
                        ";
//                echo "Customer details";
//                echo "<pre>";
//                print_r($customerDetails);
//                echo "</pre>";
//                echo "<pre>";
//
//                echo "globalPaymentCart";
//                echo "<pre>";
//                print_r(globalPaymentCart);
//                echo "</pre>";
//                echo "<pre>";
//
//                echo "total item  price";
//                echo "<pre>";
//                print_r($globleArrItemPrice);
//                echo "</pre>";
//                echo "<pre>";
//
//                echo "Item count";
//                echo "<pre>";
//                print_r($globleArrItemCout);
//                echo "</pre>";
//                echo "<pre>";


                echo "
              
                <header id=\"invoiceheader\">
               <h1 id=\"InvoiceHadername\">Invoice</h1>
                <address contenteditable style='font-size: medium;>
                       <p style='margin-top:10px;'>".$customerDetails->name."</p>
                        <p>".$customerDetails->address."</p>
                       <p>".$customerDetails->email."</p>
                       <p>".$customerDetails->contact_no."</p>
                </address>
                
                 
                </header>
            <article>
               
                ";

                echo "

                 <table class=\"tb meta\">
            
            <tr>
                <th><span contenteditable>Date</span></th>
                <td><span contenteditable>". date("Y/m/d") ."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Order Due Date</span></th>
                <td><span id=\"prefix\" contenteditable></span><span>".$orderdueDate."</span></td>
            </tr>
        </table>
                    ";


                echo "

                 <table class=\"tb inventory\">
            <thead>
            <tr>
                <th><span contenteditable>Item</span></th>
                <th><span contenteditable>Description</span></th>
                <th><span contenteditable>Unit Price</span></th>
                <th><span contenteditable>Quantity</span></th>
                <th><span contenteditable>Price</span></th>
            </tr>
            </thead>
            <tbody>

                ";
                $x=0;
                foreach ($result as $row) {

                   $predefineDetails =$this->createOrderModel->getPredifineDetails($row);
//                    echo("<script>console.log('PHP in predefine details contoller: " . json_encode($predefineDetails->type) . "');</script>");
//                    echo("<script>console.log('PHP in predefine ArrItemCout contoller: " . json_encode($globleArrItemCout[$x]) . "');</script>");



                    echo "
                            <tr>
                                    <td><a class=\"cut\"></a><span contenteditable>".$predefineDetails->type."</span></td>
                                    <td><span contenteditable>".$predefineDetails->description."</span></td>
                                    <td><span contenteditable>".floatval($globleArrItemPrice[$x])/floatval($globleArrItemCout[$x])."</span></td>
                                     <td><span contenteditable>".$globleArrItemCout[$x]."</span></td>
                                    <td><span data-prefix></span><span>".$globleArrItemPrice[$x]."</span></td>
                            </tr>
                        ";

                    ++$x;
                }
                echo "
                        </tbody>
                    </table>

                    ";



                echo "

                <table class=\"tb balance\">
            <tr>
                <th><span contenteditable>Rate</span></th>
                <td><span data-prefix></span><span>".$globalRate."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Total Price</span></th>
                <td><span data-prefix></span><span>".$TotalAmount."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Advance Price</span></th>
                <td><span data-prefix></span><span contenteditable>".$amountpaid."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Balance Due</span></th>
                <td><span data-prefix></span><span>".$BalanceDue."</span></td>
            </tr>
        </table>
      

                    ";
            }
        }




    }


    public function genarateInvoice(){
        echo '
        
        <div class="container print" style="display: none;">
    <header>
        <h1>Invoice</h1>
        <address contenteditable>
            <p>Richway Garment</p>
            <p>101 E. Chapman Ave<br>Matara</p>
            <p>(800) 555-1234</p>
        </address>
        <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
    </header>
    <article>
        <h1>Recipient</h1>
        <address contenteditable>
            <p>Supervisor<br></p>
        </address>
        <table class="meta">
            <tr>
                <th><span contenteditable>Invoice #</span></th>
                <td><span contenteditable>101138</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Date</span></th>
                <td><span contenteditable>January 1, 2012</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Amount Due</span></th>
                <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
            <tr>
                <th><span contenteditable>Item</span></th>
                <th><span contenteditable>Description</span></th>
                <th><span contenteditable>Rate</span></th>
                <th><span contenteditable>Quantity</span></th>
                <th><span contenteditable>Price</span></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
                <td><span contenteditable>Experience Review</span></td>
                <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
                <td><span contenteditable>4</span></td>
                <td><span data-prefix>$</span><span>600.00</span></td>
            </tr>
            </tbody>
        </table>
       
        <table class="balance">
            <tr>
                <th><span contenteditable>Total</span></th>
                <td><span data-prefix>$</span><span>600.00</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Amount Paid</span></th>
                <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Balance Due</span></th>
                <td><span data-prefix>$</span><span>600.00</span></td>
            </tr>
        </table>
    </article>
    <aside>
        <h1><span contenteditable>Additional Notes</span></h1>
        <div contenteditable>
            <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
        </div>
    </aside>



<input style="padding:5px;" value="Print Document" type="button" onclick="myFunction()" class="button">
</div>
        
        ';
    }


    public function OrderAdd(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "orderArrayS") {

                $orderArray = $_POST['orderArray'];
                echo("<script>console.log('PHP in order array contoller: " . json_encode($orderArray) . "');</script>");


                //["John Keells","start","2021-04-24","110","82800","41400","0","24"]



                //                echo("order array 1".json_encode($orderArray)) ;
                // order_ID             auto
                //  order_description   0
                // order_status         1
                // order_due_date       2
                // estimate_time        3
                $orderArray[3] =intval( $orderArray[3]);
                $orderArray[4] =intval( $orderArray[4]);
                $orderArray[5] =intval( $orderArray[5]);
                $orderArray[6] =intval( $orderArray[6]);
                // order_price          4
                // advance_price        5
                // salesmanger_ID        6
                // customer_ID          7

                $loginID = $this->getSession('userId')['user_id'];
//                echo("<br>login id : ".json_encode($loginID)) ;
//                $A =$this->createOrderModel->getSalesManagerId(intval($loginID));
                $orderArray[6] = intval($this->createOrderModel->getSalesManagerId(intval($loginID)));
                echo("<br>ge t selsmanger id : ".json_encode($orderArray[6])) ;
//                echo("<br>orderArray2:".json_encode($orderArray)) ;

              //  echo("orderArray:".json_encode($orderArray)) ;
                $orderId = intval($this->createOrderModel->OrderAdd($orderArray));
               // echo("orderId:".json_encode($orderId)) ;
                $ct=0;
                if($orderId){

                    $orderItemList =$_POST['orderItemList'];
//                    ["M","1","1","123","0","1"]
                   echo("orderItemList:".json_encode($orderItemList));
                    //echo("<script>console.log('PHP in ordet item list: " . json_encode($orderItemList) . "');</script>");
                    foreach ($orderItemList as $row){


                        //size
                        // fabric id
                        // button_id
                        // quantity
                        // $row[4]=$orderId;  // order_ID
                        // predefine_ID
                        $row[1] =intval($row[1]);
                        $row[2] =intval($row[2]);
                        $row[3] =intval($row[3]);
                        $row[4] =intval($row[4]);
                        $row[4]=$orderId;
                        $row[5] =intval($row[5]);




                        if ($this->createOrderModel->orderItemAdd($row)) {
                            $ct =$ct+1;
                        }

                        else {

//                            echo '
//
//                    <script>
//                                if(!alert("Something went wrong! please try again.")) {
//                                    window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"
//                                }
//                    </script>
//                    ';

                        }

                    }
                    if($ct>0){
                        echo"ok";
//                        echo("<script>console.log('PHP ct: " . json_encode($ct) . "');</script>");
//
//                        echo("<script>console.log('ok');</script>");
//                        echo '
//                      <script>
//                                    if(!alert("Order added successfully")) {
//                                        window.location.href = "http://localhost/Richway-garment-system/createOrderController/createOrder"
//
//                                    }
//                      </script>
//
//                    ';
                    }


                }//

            } //
        }//key
    }//orderadd

    public function getNotificationCount()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "notifycount") {
                $loginID = $this->getSession('userId')['user_id'];
//                echo "\nLogin Id called :".$loginID;

                $receiverRole =$this->createOrderModel->getreceiverRole(intval($loginID));
//                echo "\nreceiverRole Id called :".$receiverRole;

                $result = $this->createOrderModel->getNotificationRecord($receiverRole);

                $count=0;


                foreach ($result as $rows) {

                    $readIds = $rows->read_ids;
//                    echo "\nreadIds :" .$readIds;
                    $idsArr = explode(",",$readIds);
//                    echo "\nreadIdsArr :" ;
//                    echo '<pre>',print_r($idsArr),'</pre>';



                    if (in_array($loginID, $idsArr)) {
                        ++$count;
                    }else{

                    }
//                    echo "type" . gettype($readIds);



                }
                echo $count;

            }
        }
    }

    public function calculateOrderDueDate(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageJobData") {
                $data = $_POST['data'];

                $orderDetails = $data["order"];
                $ttt = $this->calculateTotalTailoringTime($orderDetails);

                $returnData = $this->calculateNormalDueDate($ttt);
                $normalDueDate = date('Y-m-d H:i:s', $returnData[0] );


                $cus_date = $data["cus_date"];
                if(!empty($cus_date)){
                    //make final customer due date
                    $cus_date_Day = date('D', strtotime($cus_date));
                    $workingDayData = $this->createOrderModel->getWorkingDayData($cus_date_Day);
                    $cus_time = $workingDayData->round1_end;
                    $final_cus_date = date("Y-m-d H:i:s", strtotime("$cus_date $cus_time"));

                    $data = $this->calculateCustomerDueDate($final_cus_date,0, $ttt);
                    echo $data[2];
                }
                else{
                    echo $normalDueDate;
                }
            }
        }
    }

    public function calculateTotalTailoringTime($data){

        $ttt = 0.0;
        foreach ($data as $item ){
            $lph =  $this->createOrderModel->getLPH($item['p_ID']);

            if($lph == 0) continue;
            $ttt += ($item['quantity'] / $lph);
        }
        $ttt = $ttt * 60.0; //add 30 minutes interval to start the next job
        return ceil($ttt);
    }


    public function calculateNormalDueDate($ttt){
        $sortedLinesArr = $this->sortAvailableLines();
        $arrKeys = array_keys($sortedLinesArr);
        $normalDueDate = $sortedLinesArr[$arrKeys[0]];
        $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);

        $orderStartDate = $this->getOrderStartDate($normalDueDate);
        $useLineIDs = [];
        $line1FinalizeDate = $this->getFinishedDatetimeFromLine($orderStartDate,$ttt+30);
        array_push($useLineIDs,$arrKeys[0]);
        //code use line 2 to 8
        $preFinalizeDate = $line1FinalizeDate;
        $key = 1;
        if ($preFinalizeDate > $sortedLinesArr[$arrKeys[$key]]){
            $data = $this->recurDueDateCal($key, $arrKeys, $sortedLinesArr, $ttt, 0);
            for ($x = 1; $x < $data[1]; $x++) {
                array_push($useLineIDs,$arrKeys[$x]);
            }
            $preFinalizeDate = $data[0];
        }


        return array($preFinalizeDate,$useLineIDs);
    }


    public function calculateCustomerDueDate($final_cus_date,$stdLines,$ttt){
        if($stdLines == 0){
            $sortedLinesArr = $this->sortAvailableLines();
            $status = "normal";
        }else{
            $sortedLinesArr = $this->sortAvailableExtraLines();
            $status = "Extra Lines";
        }
        $arrKeys = array_keys($sortedLinesArr);
        $normalDueDate = $sortedLinesArr[$arrKeys[0]];
        $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);

        $orderStartDate = $this->getOrderStartDate($normalDueDate);

        $TP = $this->getFinishedTTT($orderStartDate, strtotime($final_cus_date));
        $key = 1;
        $lastLineTTT = 0;
        static $cus_date_lineIDs = [];
        static $cus_date_line_final_dates = [];
        $inLimit = true;
        while($ttt > $TP){
            array_push($cus_date_lineIDs, $arrKeys[$key-1]);
            array_push($cus_date_line_final_dates, $final_cus_date);
            if($key > sizeof($arrKeys)-1) {
                $inLimit = false;
                $ttt = $ttt - $TP;
                break;
            }
            $normalDueDate = $sortedLinesArr[$arrKeys[$key]];
            $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);
            $orderStartDate = $this->getOrderStartDate($normalDueDate);
            $lastLineTTT = $this->getFinishedTTT($orderStartDate, strtotime($final_cus_date));
            $TP += $lastLineTTT;
            ++$key;
        }
        if($inLimit){
            $ttt = $ttt - ($TP - $lastLineTTT);
            --$key;
            $normalDueDate = $sortedLinesArr[$arrKeys[$key]];
            $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);
            $orderStartDate = $this->getOrderStartDate($normalDueDate);
            $lastLineFinalDate = $this->getFinishedDatetimeFromLine($orderStartDate, $ttt);
            $lastLineFinalDate = date('Y-m-d H:i:s',$lastLineFinalDate);
            array_push($cus_date_lineIDs, $arrKeys[$key]);
            array_push($cus_date_line_final_dates, $lastLineFinalDate);
            return array($cus_date_lineIDs, $cus_date_line_final_dates, $status);
        }else{
            if($stdLines == 1) {
                $status = "Optimize";
                return array(-1,-1,$status);
            }
            return $this->calculateCustomerDueDate($final_cus_date, 1, $ttt);
        }

    }

    private function recurDueDateCal($key, $arrKeys, $sortedLinesArr, $ttt, $remainMins){
        $preLineAvilDate = $sortedLinesArr[$arrKeys[$key-1]];
        $nextLineAvilDate = $sortedLinesArr[$arrKeys[$key]];
        $preLineAvilDate = date('Y-m-d H:i:s',$preLineAvilDate);
        $nextLineAvilDate = date('Y-m-d H:i:s',$nextLineAvilDate);

        //already available line but add 2 days to settle the order stock
        $preLineAvilDate = $this->getOrderStartDate($preLineAvilDate);
        $nextLineAvilDate = $this->getOrderStartDate($nextLineAvilDate);

        $preLineStartDate = $this->getFinishedDatetimeFromLine($preLineAvilDate,30);
        $nextLineStartDate = $this->getFinishedDatetimeFromLine($nextLineAvilDate,30);
        $preLineStartDate = date('Y-m-d H:i:s',$preLineStartDate);
        $mins = $this->getFinishedTTT($preLineStartDate, $nextLineStartDate);
        $mins = $mins * $key;
        $tttVar = $ttt - ($mins + $remainMins);
        $tttVar = intval(ceil( ( $tttVar/($key+1) ) ));
        $nextLineStartDate = date('Y-m-d H:i:s',$nextLineStartDate);
        $preFinalizeDate = $this->getFinishedDatetimeFromLine($nextLineStartDate, $tttVar);
        if($key < sizeof($arrKeys)-1 && $preFinalizeDate > $sortedLinesArr[$arrKeys[$key+1]]){
            //recursion
            return $this->recurDueDateCal($key+1, $arrKeys, $sortedLinesArr, $ttt, $mins);
        }else{
            return array($preFinalizeDate,$key+1);
        }

    }

    private function getOrderStartDate($datetime){

        $d = new DateTime('now');
        $d->setTimezone(new DateTimeZone("Asia/Colombo"));
        $today = $d->format('Y-m-d H:i:s');

//        echo "#### ".$datetime." / ".$today." / ".date("a",strtotime($datetime) - strtotime($today))." ####";
        if(strtotime($datetime) > strtotime("+2 days".$today)){
            $orderStartDate = $datetime;
        }
        else if(strtotime($today) - strtotime($datetime) > 0 ){
            $orderStartDate = $this->getFinishedDatetimeFromLine($today, 960); // add 2 days from now in minutes
            $orderStartDate = date("Y-m-d H:i:s", $orderStartDate);
        }
        else{
            $orderStartDate = $this->getFinishedDatetimeFromLine($datetime, 960); // add 2 days to line available date in minutes
            $orderStartDate = date("Y-m-d H:i:s", $orderStartDate);
        }

        return $orderStartDate;

    }

    private function getFinishedTTT($start, $end){

        $startTime = date('H:i:s', strtotime($start));
        $startTime = strtotime($startTime);
        $startDay = date('D', strtotime($start));

        $workingDayData = $this->createOrderModel->getWorkingDayData($startDay);
        $round1Start = strtotime($workingDayData->round1_start);
        $round1End = strtotime($workingDayData->round1_end);
        $round2Start = strtotime($workingDayData->round2_start);
        $round2End = strtotime($workingDayData->round2_end);
        $round3Start = strtotime($workingDayData->round3_start);
        $round3End = strtotime($workingDayData->round3_end);
        $round4Start = strtotime($workingDayData->round4_start);
        $round4End = strtotime($workingDayData->round4_end);


        $round = 1;
        //in round 1
        if($startTime - $round1Start >= 0 && $round1End - $startTime >= 0){
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime >= 0){
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime >= 0){
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime >= 0){
            $round = 4;
        }

        $actualDatetime = strtotime($start);
        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        $minutes = 0;
        while ($end - $actualDatetime > 0){
            $time = strtotime("+1 minutes",$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 2;
                    $min = ($round2Start - $round1End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 3;
                    $min = ($round3Start - $round2End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $min = ($round4Start - $round3End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
                $round = 4;
            }
            else if($round == 4 && $time - $round4End > 0){

                $start = date('Y-m-d', strtotime("+1 days".$start));

                $startDay = date('D', strtotime($start));

                $workingDayData = $this->createOrderModel->getWorkingDayData($startDay);
                $round1Start = strtotime($workingDayData->round1_start);
                $round1End = strtotime($workingDayData->round1_end);
                $round2Start = strtotime($workingDayData->round2_start);
                $round2End = strtotime($workingDayData->round2_end);
                $round3Start = strtotime($workingDayData->round3_start);
                $round3End = strtotime($workingDayData->round3_end);
                $round4Start = strtotime($workingDayData->round4_start);
                $round4End = strtotime($workingDayData->round4_end);


                if($round1Start == $zeroTime){
                    $round = 4;
                }else{
                    $round = 1;
                    ++$minutes;
                }
                $time = strtotime("+1 minutes", $round1Start);

            }else{
                ++$minutes;
            }

            $time = date('H:i:s', $time);
            $start = date('Y-m-d', strtotime($start));
            $actualDatetime = strtotime(date('Y-m-d H:i:s', strtotime("$start $time")));
            $time = strtotime($time);

        }

        return $minutes;

    }

    private function getFinishedDatetimeFromLine($datetime, $tttTime){
        $startTime = date('H:i:s', strtotime($datetime));
        $startTime = strtotime($startTime);
        $startDay = date('D', strtotime($datetime));

        $workingDayData = $this->createOrderModel->getWorkingDayData($startDay);
        $round1Start = strtotime($workingDayData->round1_start);
        $round1End = strtotime($workingDayData->round1_end);
        $round2Start = strtotime($workingDayData->round2_start);
        $round2End = strtotime($workingDayData->round2_end);
        $round3Start = strtotime($workingDayData->round3_start);
        $round3End = strtotime($workingDayData->round3_end);
        $round4Start = strtotime($workingDayData->round4_start);
        $round4End = strtotime($workingDayData->round4_end);


        $round = 1;
        //in round 1
        if($startTime - $round1Start >= 0 && $round1End - $startTime >= 0){
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime >=0){
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime >= 0){
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime >= 0){
            $round = 4;
        }

        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        while ($tttTime > 0){
            $time = strtotime("+1 minutes",$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 2;
                    $min = ($round2Start - $round1End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 3;
                    $min = ($round3Start - $round2End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $min = ($round4Start - $round3End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
                $round = 4;
            }
            else if($round == 4 && $time - $round4End > 0){
                $datetime = date('Y-m-d', strtotime("+1 days".$datetime));
                $startDay = date('D', strtotime($datetime));

                $workingDayData = $this->createOrderModel->getWorkingDayData($startDay);
                $round1Start = strtotime($workingDayData->round1_start);
                $round1End = strtotime($workingDayData->round1_end);
                $round2Start = strtotime($workingDayData->round2_start);
                $round2End = strtotime($workingDayData->round2_end);
                $round3Start = strtotime($workingDayData->round3_start);
                $round3End = strtotime($workingDayData->round3_end);
                $round4Start = strtotime($workingDayData->round4_start);
                $round4End = strtotime($workingDayData->round4_end);


                if($round1Start == $zeroTime){
                    $round = 4;
                }else{
                    $round = 1;
                    --$tttTime;
                }
                $time = strtotime("+1 minutes", $round1Start);
            }
            else{
                --$tttTime;
            }
        }

        $time = date('H:i:s', $time);
        $date = date('Y-m-d', strtotime($datetime));
        return strtotime(date('Y-m-d H:i:s', strtotime("$date $time")));

    }

    //scheduling earliest available lines
    public function sortAvailableLines(){
        return $this->createOrderModel->getSortedAvailableLinesArr();
    }

    //scheduling earliest available extra lines
    public function sortAvailableExtraLines(){
        return $this->createOrderModel->getSortedAvailableExtraLinesArr();
    }

    //job-shop scheduling (use earliest available lines)
    public function useStandByLines(){
        $this->calculateNormalDueDate();
        return 0;
    }

    public function optimize(){
        return 0;
    }

    //remove available lines hours
    public function getRemainingHoursOfNewOrd(){
        return 0;
    }








}