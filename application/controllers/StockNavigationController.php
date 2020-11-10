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

    public function index(){
        $this->view("Stock/index");
    }

    public function stockIssue(){
        $this->view("Stock/stockIssue");
    }

    public function stockManage(){
        $this->view("Stock/manageStock");
    }

    public function manageSupplier(){
        $this->view("Stock/manageSupplier");
    }

    public  function loadRTMTable(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "ItemType") {

                if($_POST['tableName']=="RawMaterial"){
                    $result = $this->ViewStockTableModel->getRawMaterialData();

                    echo "

                <table class=content-table>
                        <thead>
                        <tr>
                            <th>Stock ID</th>
                            <th>Order ID</th>
                            <th>Raw Material ID</th>
                            <th>order_item_ID</th>
                            <th>type</th>
                            <th>quantity</th>
                            <th>unit_price</th>
                            <th>Date</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                ";



                    foreach($result as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid' >$row->stock_ID </td>
                                 <td>$row->order_ID</td>
                                <td>$row->raw_material_ID</td>
                                <td>$row->order_item_ID</td>
                                <td>$row->type</td>
                                <td>$row->quantity</td>
                                <td>$row->unit_price</td>
                                <td>$row->date</td>
                                
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