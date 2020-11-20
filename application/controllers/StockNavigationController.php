<?php 

class stockNavigationController extends framework {

    /**
     * @var mixed
     */
    private $ViewStockTable;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }
       $this->helper("link");
        $this->ViewStockTableModel = $this->model('ViewStockTableModel');
    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "selectOrderId") {
                $this->setSession("selected_orderforstock", $_POST['order_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }



    public function index(){
        $this->view("Stock/manageStock");
    }
    public function loadaddstockform(){
        $order_ID = $this->getSession('selected_orderforstock');
        $this->view("Stock/add-raw materials-item-form",$order_ID);

    }




    public function stockIssue(){
        $this->view("Stock/stockIssue");
    }

    public function stockManage(){
        $this->view("Stock/manageStock");
    }

    public function addSupplier(){
        $this->view("Stock/addSupplier");
    }

//    public  function loadRTMTable(){
//        if(isset($_POST['key'])) {
//            if ($_POST['key'] == "ItemType") {
//
//                if($_POST['tableName']=="RawMaterial"){
//                    $result = $this->ViewStockTableModel->getRawMaterialData();
//
//                    echo "
//                        <table class=\"table align-items-center table-flush\">
//                        <thead class=\"thead-light\">
//                        <tr>
//                            <th scope=col>Stock ID</th>
//                            <th scope=col>Order ID</th>
//                            <th scope=col>Raw Material ID</th>
//                            <th scope=col>order_item_ID</th>
//                            <th scope=col>type</th>
//                            <th scope=col>quantity</th>
//                            <th scope=col>unit_price</th>
//                            <th scope=col>Date</th>
//                        </tr>
//                        </thead>
//                        <tbody>
//
//                ";
//
//
//
//                    foreach($result as $row){
//
//                        echo "
//                            <tr class='tblrow' onclick='selectRow(event)'>
//                                <td id='empid' >$row->stock_ID </td>
//                                 <td>$row->order_ID</td>
//                                <td>$row->raw_material_ID</td>
//                                <td>$row->order_item_ID</td>
//                                <td>$row->type</td>
//                                <td>$row->quantity</td>
//                                <td>$row->unit_price</td>
//                                <td>$row->date</td>
//
//                            </tr>
//                        ";
//
//                    }
//
//
//
//
//
//
//                    echo "
//                        </tbody>
//                    </table>
//
//                    ";
//
//                }
//                return "Successfully set the session.";
//            }
//        }
//    }

    public function loadOrderTable(){
       if(isset($_POST['key'])) {
                if ($_POST['key'] == "orderTable") {

                    if($_POST['tableName']=="RawMaterial"){
                        $result = $this->ViewStockTableModel->orderTable();

                        echo "
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            
                            <th scope=col>Order ID</th>
                            <th scope=col>Order Name</th>
                            <th scope=col>Order Status</th>
                            <th scope=col>Order Description</th>
                            <th scope=col>Order Due Date</th>
                            <th scope=col>estimate_time</th>
                            <th scope=col>sales_manager_ID</th>
                            <th scope=col>customer_ID</th>
                            
                            
                            
                        </tr>
                        </thead>
                        <tbody>

                ";



                        foreach($result as $row){

                            echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid' >$row->order_ID </td>
                                 <td>$row->order_name</td>
                                <td>$row->order_status</td>
                                <td>$row->order_description</td>
                                <td>$row->order_due_date</td>
                                <td>$row->estimate_time</td>
                                
                                 <td>$row->sales_manager_ID</td>
                                 <td>$row->customer_ID</td>
                                
                            </tr>
                        ";

                        }






                        echo "
                        </tbody>
                    </table>
                    
                    ";

                    }
                    return "Successfully set the session.";
                }
            }
        }



    public function logout(){

        $this->destroy();
        $this->redirect("loginController/loginForm");

    }

}


?>