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
                        $predefineType = t-shirt;
                    }



                    $sizes= $predefines->sizes;
                    $array = explode(",", $sizes);
                    $maxsize =end($array);
//                    echo "\nmaxsize  :".$maxsize;

                    $unitnormal_tailoring_cost =$predefines->normal_tailoring_cost;
//                    echo "\ntailoring_cost :";
//                    echo $unitnormal_tailoring_cost;


                    $largeRawMaterialQuantity =$this->createOrderModel->predefineRawMaterialsQuantity($predefineType,$pID,$maxsize);
//                    echo "\nfabQuantity   :";
//                    echo $largeRawMaterialQuantity->fabric_quantity;


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
//                    echo "\nprofit_margin :".$profit_margin;
                    $status_precentage=1;

                    $costperItem =($fabric_totalprice+$button_totalprice+$nool_totalprice+$total_taileringcost)*$profit_margin;
                    $profit_marginfororderItem =$costperItem*$profit_margin;
                    $totalPriceOfOrderItem=$costperItem+$profit_marginfororderItem;
//                    echo "\ncostperItem :".$totalPriceOfOrderItem;
                    array_push($paymentCart, $totalPriceOfOrderItem);
                    array_push($orderItemCart, $pID);
                    array_push($orderItemCart, $pID);

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


        $result=[1,2,3,4];
        $globleArrItemPrice=[200,250,300,400];
        $globleArrItemCout =[108,205,350,88];

        $TotalAmount=$_POST['TotalAmount'];

        $amountpaid=$_POST['amountPaid'];
        $BalanceDue=$TotalAmount-$amountpaid;

        if(isset($_POST['key'])){
            if(  $_POST['key'] == "Invoice2"){
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



                echo "
              
                <header id=\"invoiceheader\">
               <h1 id=\"InvoiceHadername\">Invoice</h1>
                <address contenteditable style='margin-top:10px '>
                    <p>Jonathan Neal</p>
                    <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                    <p>(800) 555-1234</p>
                </address>
                </header>
            <article>
                <h1>Recipient</h1>
                <address contenteditable>
                    <p>Richway Garment<br>supervisor</p>
                </address>
                ";

                echo "

                 <table class=\"tb meta\">
            <tr>
                <th><span contenteditable>Invoice</span></th>
                <td><span contenteditable>101138</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Date</span></th>
                <td><span contenteditable>". date("Y/m/d") ."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Amount Due</span></th>
                <td><span id=\"prefix\" contenteditable></span><span>".$TotalAmount."</span></td>
            </tr>
        </table>
                    ";


                echo "

                 <table class=\"tb inventory\">
            <thead>
            <tr>
                <th><span contenteditable>Item</span></th>
                <th><span contenteditable>Description</span></th>
               
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


                   ++$x;
                    echo "
                            <tr>
                                    <td><a class=\"cut\">-</a><span contenteditable>".$predefineDetails->type."</span></td>
                                    <td><span contenteditable>".$predefineDetails->description."</span></td>
                                    <td><span contenteditable>".$globleArrItemCout[$x]."</span></td>
                                    <td><span data-prefix></span><span>".$globleArrItemPrice[$x]."</span></td>
                            </tr>
                        ";


                }
                echo "
                        </tbody>
                    </table>

                    ";



                echo "

                <table class=\"tb balance\">
            <tr>
                <th><span contenteditable>Total</span></th>
                <td><span data-prefix></span><span>".$TotalAmount."</span></td>
            </tr>
            <tr>
                <th><span contenteditable>Amount Paid</span></th>
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
//                echo("<br>ge t selsmanger id : ".json_encode($A)) ;
//                echo("<br>orderArray2:".json_encode($orderArray)) ;

              //  echo("orderArray:".json_encode($orderArray)) ;
                $orderId = intval($this->createOrderModel->OrderAdd($orderArray));
               // echo("orderId:".json_encode($orderId)) ;
                $ct=0;
                if($orderId){

                    $orderItemList =$_POST['orderItemList'];
//                    ["M","1","1","123","0","1"]
                  // echo("orderItemList:".json_encode($orderItemList));
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










}