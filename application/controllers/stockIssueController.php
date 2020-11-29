<?php


class stockIssueController extends framework{
    private $mangeSupplierModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->stockIssueModel = $this->model('stockIssueModel');
    }
    public function index(){


        $this->view("stock/stock-issue-Form");

        $result = $this->stockIssueModel->loadSupplierTable();


    }


    public function getStockData(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "StockIssueTable") {
                $result = $this->stockIssueModel->getRawMaterialData();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");

                echo "

                <table class='table align-items-center table-flush'>
                        <thead class='thead-light'>
                        <tr>
                            <th scope=col>stock ID</th>
                            <th scope=col>Order ID</th>
                            <th scope=col>Raw Material ID</th>
                            <th scope=col>order_item_ID</th>
                            <th scope=col>type</th>
                            <th scope=col>quantity</th>
                            <th scope=col>unit_price</th>
                            <th scope=col>Date</th>
                            
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
        }

    }
    public function addIssueform(){

        $this->view("stock/stockIssueForm");

    }





}






;?>