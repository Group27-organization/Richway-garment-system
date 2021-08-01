<?php 

class updateOrderController extends framework {
    private $updateOrderModel;
    /**
     * @var mixed
     */
    private $manageUserModel;

    public function __construct()
    {
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }

       $this->helper("link");
        $this->updateOrderModel = $this->model('updateOrderModel');
    }

    public function index(){


        $this->view("Salesmanjor/updateOrder");

    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "orderUpdate") {
                $this->setSession("selected_order", $_POST['orderID']);
//                echo("<script>console.log('selected_order !!!!!!');</script>");
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function loadOrderTable(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "ordersTable") {
                $result = $this->updateOrderModel->loadOrderTable();

                echo "

                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Order Id</th>
                            <th scope=col>Name</th>
                            <th scope=col>Order Status</th>
                            <th scope=col>Order Due Date</th>
                            <th scope=col>Customer Id</th>
                           
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid'>$row->order_ID</td>
                                <td>$row->order_name</td>
                                <td>$row->order_status</td>
                                <td>$row->order_due_date</td>
                                <td>$row->customer_ID</td>
                                
                                
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

    public function loadOrderItemTable(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "ordersItemTable") {

                $id =  $this->getSession('selected_order');
//                echo("<script>console.log('PHP: " . json_encode($id) . "');</script>");
                $result = $this->updateOrderModel->loadOrderItemTable($id);
//                echo("<script>console.log('loadOrderItemTable : " . $id ."');</script>");
                echo "

                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>

                            <th scope=col>Order Item</th>
                            <th scope=col>Collar Size</th>
                            <th scope=col>predefine ID</th>
                            <th scope=col>Quantity</th>
                            <th scope=col>Status</th>
                            <th scope=col>Action</th>


                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' >
                                <td id='supid'>$row->order_item_ID </td>
                                <td >$row->size</td>
                                <td id='size'>$row->p_ID </td>
                                <td>$row->quantity</td>
                                <td>$row->status</td>
                                <td>
                                    <a href='#'    style='margin: 2px;color: #00B4CC' onclick='abc($row->order_item_ID)'>Edit</a>                              
                                </td>

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

    public function loadUpdateOrderForm(){

        $this->view("Salesmanjor/updateOrderForms");
    }

    public function setOrderItemSize(){
        echo("<script>console.log('PHP in setOrderItemSize 1 : " .  "');</script>");

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "orderItemId") {


                $item =$this->updateOrderModel->getOrderItemType($_POST['orderItemId']);


//
                $type = "t_shirt";
                if(is_numeric($item)){
                    $type = "shirt";
                }




                $result = $this->updateOrderModel->getCollarSize($type);
                echo ' <option   value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){

                    echo '<option value="'.$row->size.'" data-value="'.$row->size.'">'.$row->size.'</option>';
                }
            }
        }
    }
    public function setOrderDescription(){
        if(isset($_POST['key'])){
            if($_POST['key']=="OrderDescription"){
                $id =$this->getSession('selected_order');
                $description =$this->updateOrderModel->getOrderDescription($id);
                echo $description;
            }
        }

    }

    public function updateOrderDescription(){
        if(isset($_POST['key'])){
            if($_POST['key']=="updateDescription"){
                $id =$this->getSession('selected_order');
                $description = $_POST['description'];


                if ($this->updateOrderModel->setOrderDescription($description,$id)) {
                    echo "200";

                } else {
                    echo "404";

                }

            }
        }

    }

    public function updateOrderItemSize(){
        if(isset($_POST['key'])){
            if($_POST['key']=="updateSize"){

                $orderItemId = $_POST['orderItemId'];
                $size = $_POST['size'];


                if ($this->updateOrderModel->updateOrderItemSize($size,$orderItemId)) {
                   echo "200";

                } else {
                    echo "404";
                }

            }
        }

    }

}