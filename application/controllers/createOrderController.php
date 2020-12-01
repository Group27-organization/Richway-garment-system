<?php


class createOrderController extends framework{
    private $createOrderModel;

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->createOrderModel = $this->model('createOrderModel');
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

                $result = $this->createOrderModel->getFabricDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->image_url.'" data-value="'.$row->ID.'">'.$row->fabric_code.'</option>';
                }
            }
        }
    }
    public function setButtonCode(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "buttonCode") {

                $result = $this->createOrderModel->getButtonDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->image_url.'" data-value="'.$row->ID.'"  >'.$row->code.'</option>';
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
    public function templateCardGenarator(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "PredefinePopup") {
                $result = $this->createOrderModel->getPredifineCard($_POST['Type']);


                foreach($result as $row){
                    echo "
                    <div class='option-card'  onclick='selectedCard(this);' style='margin: 10px;'>
                            <img src=$row->image_url style='width:100%;  opacity: 0.5; background-color: purple;' class=card-thumb>
                            
                                <div class='card-description'>
                                     <h4 ><b class='template-type'> $row->type</b></h4>
                                     <p class='template-handtype'></span>$row->hand_type</p>
                                     <p class='template-collartype'>$row->collar_type </p>
                                </div>
                                <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                <input type=text class='pImageURL'  value='$row->image_url' style='display: none;'>
                            
                    </div>
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
//                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
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








}