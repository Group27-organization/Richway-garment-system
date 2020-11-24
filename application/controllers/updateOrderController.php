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
        echo("<script>console.log('PHP add sup');</script>");

        $this->view("Salesmanjor/updateOrder");

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



}