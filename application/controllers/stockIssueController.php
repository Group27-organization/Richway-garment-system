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
    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "selectJobToIssue") {
                $this->setSession("selected_jobId", $_POST['jobId']);
                return "Successfully set the session.";
            }
        }
        return "error";
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

    public function stockIssueRequest(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "IssueRequest") {
                $result = $this->stockIssueModel->getRequestJob();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");

                echo "

                <table class='table align-items-center table-flush'>
                        <thead class='thead-light'>
                        <tr>
                            <th scope=col>Job ID</th>
                            <th scope=col>Job Name</th>
                            <th scope=col>Description</th>
                            <th scope=col>order ID</th>
                            <th scope=col>order description</th> 
                            <th scope=col>order Item Id</th>
                            
                           
                            
                        </tr>
                        </thead>
                        <tbody>

                ";



                foreach($result as $row){

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid' >$row->job_ID  </td>
                                 <td>$row->name</td>
                                <td>$row->job_description</td>
                                <td>$row->order_ID</td>
                                <td>$row->order_description</td>
                                <td>$row->order_item_ID</td>
                                
                                
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

        $jobId = $this->getSession('selected_jobId');
        $data = $this->stockIssueModel->stockIssueDetails($jobId);
        $this->view("stock/stockIssueForm",$data);


    }
    public function  IssueRawMaterialforJob(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "IssueRawMaterial") {
             $check = $this->stockIssueModel->isStockAvailable($_POST['FabricCode'],$_POST['FabricQuantity'],$_POST['ButtonCode'],$_POST['ButtonQuantity'],$_POST['NoolCode'],$_POST['NoolQuantity']);
             if($check==1){

                    $result = $this->stockIssueModel->issueRawMaterial($_POST['FabricCode'],$_POST['FabricQuantity'],$_POST['ButtonCode'],$_POST['ButtonQuantity'],$_POST['NoolCode'],$_POST['NoolQuantity']);


                    if($result ==1 ){
                        echo '1';

       }

                }else{
                    echo '0';
                }



            }
        }
        return "error";


    }





}






;?>