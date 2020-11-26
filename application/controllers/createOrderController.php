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

                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
                    //   echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->button_shape) . "');</script>");
                    echo '<option value="'.$row->size.'" data-value="'.$row->size.'">'.$row->size.'</option>';
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
                $result = $this->createOrderModel->getPredifineCard($_POST['Type'],$_POST['handType'],$_POST['colorType']);


                foreach($result as $row){
                    echo "
                    <div class='option-card'  onclick='selectedCard(this);' style='margin: 10px;'>
                            <img src=$row->image_url style='width:100%;  opacity: 0.5; background-color: purple;' class=card-thumb>
                            
                                 <h4><b>$row->type</b></h4>
                                
                                <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                   
                               
                                 <p>$row->hand_type</p>
                                
                                 <input type=text class='pImageURL'  value='$row->image_url' style='display: none;'>
                             </div>
                    </div>
                    ";
                }
            }
        }
    }

    public function loadCustomerTable(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "customer") {
                $result = $this->createOrderModel->getCustomerDetails();
                //  echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($result) . "');</script>");

                echo "

                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Customer ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Contact Number</th>
                            <th scope=col>Email</th>
                            <th scope=col>Address</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid'>$row->customer_ID   </td>
                                <td>$row->name</td>
                                <td>$row->contact_no</td>
                                <td>$row->email</td>
                                <td>$row->address</td>
                                
                            </tr>
                        ";

                }
                echo "
                        </tbody>
                    </table>
                    
                    ";
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
                echo("order array 1".json_encode($orderArray)) ;
                // order_ID             auto
                // order_name           0
                // order_status         1
                // order_description    2
                // order_due_date       3
                // estimate_time        4
                // order_price          5
                // advance_price        6
                // supervisor_ID        7
                // customer_ID          8

                $loginID = $this->getSession('userId');
                echo("login id".json_encode($loginID)) ;
                $orderArray[7] = intval($this->createOrderModel->getSalesManagerId($loginID));
                echo("orderArray2:".json_encode($orderArray)) ;


                $orderId = intval($this->createOrderModel->OrderAdd($orderArray));
                echo("orderId:".json_encode($orderId)) ;

                if($orderId){

                    $loginID = $this->getSession('userId');




                    $orderItemList =$_POST['orderItemList'];
                    echo("orderItemList:".json_encode($orderItemList));
                    foreach ($orderItemList as $row){

                        // order_item_ID


                        // material
                        // material_design
                        // material_design_image
                        // material_design_code
                        // material_color

                        // button_shape
                        // button_color

                        // nool_color

                        // quantity

                        $row[9]=$orderId;  // order_ID
                        // p_ID

                        echo("orderItemList final:".json_encode($row));
                            if($this->createOrderModel->orderItemAdd($row)){
                                echo("Succefully added");
                            }else{
                                echo("Order Item Not Added");
                            }

                    }
                }

            }
        }
    }








}