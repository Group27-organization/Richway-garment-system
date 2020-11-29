<?php

class  rawMaterialToStockController extends  framework
{

    /**
     * @var mixed
     */
    private $rawMaterialModel;

//    public function __construct()
//    {
//        if (!$this->getSession('userId')) {
//
//            $this->redirect("loginController/loginForm");
//
//        } elseif ($this->getSession('userId')['role'] != 'stock_keeper') {
//
//            echo "You cannot access this page.";
//            die();
//        }
//
//        $this->helper("link");
//        $this->rawMaterialModel = $this->model('rawMaterialToStockModel');
//    }

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->rawMaterialModel = $this->model('rawMaterialToStockModel');
    }


    public function index()
    {
        $this->view("stock/addRawMaterialToStock");
        echo("<script>console.log('PHP in index controller');</script>");
    }
    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData") {
                $this->setSession("selected_role", $_POST['type']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function NewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "employeeUpdate") {
                $this->setSession("selected_employee", $_POST['emp_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }

//////////////////////////////////////////////////load fabric

    public function loadFabricTable(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData1") {



                $result = $this->rawMaterialModel->loadFabricTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col> ID</th>
                            <th scope=col>Fabric Code</th>   
                            <th scope=col>Band</th> 
                            <th scope=col>Quality Grade</th>
                            <th scope=col>Uint Price</th> 
                            <th scope=col>Description</th> 
                            <th scope=col>Quantity</th> 
                            <th scope=col>Date</th> 
                              
                               
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                 <td>$row->ID</td>
                                 <td>$row->fabric_code</td>   
                                 <td>$row->band</td>                                
                                 <td>$row->quality_grade</td>                                
                                 <td>$row->unit_price</td>
                                 <td>$row->description</td>
                                 <td>$row->quantity</td>   
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
    public function addFabricform(){
        $this->view("stock/addfabricform");

    }






    public function loadButtonTable(){

        if (isset($_POST['key'])) {

            if ($_POST['key'] == "rawMaterialData2") {



                $result = $this->rawMaterialModel->loadButtonTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>ID</th> 
                             <th scope=col>Code</th> 
                             <th scope=col>Unit Price</th> 
                            <th scope=col>Description</th>   
                            <th scope=col>Quantity</th>                        
                            <th scope=col>Date</th> 
                             
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                 <td>$row->code</td>
                                 <td>$row->unit_price</td>
                                 <td>$row->description</td>
                                 <td>$row->quantity</td>   
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
    public function addButtonform(){
        $this->view("stock/addButtonform");

    }

/////////////////////////////////////////////////////////////////////////////////////

    public function loadThreadTable(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData3") {


                $result = $this->rawMaterialModel->loadThreadTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Thread ID</th>
                            <th scope=col>Type</th>   
                            <th scope=col>Color_code</th>                        
                            <th scope=col>Unit Price</th> 
                            <th scope=col>Description</th>   
                            <th scope=col>Quantity</th>                        
                            <th scope=col>Date</th>                             
                                                         
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                <td>$row->type</td>
                                <td>$row->color_code</td>
                                <td>$row->unit_price</td>
                                 <td>$row->description</td>
                                 <td>$row->quantity</td>   
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
    public function addThreadform(){
        $this->view("stock/addThreadform");

    }










}
?>