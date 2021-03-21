<?php


class manageStockMachineController extends framework{
private $mangeToolModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->mangeToolModel = $this->model('mangeStockMachineModel');

    }



    public function index(){


        $this->view("stock/manageStockMachine");


        

    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierUpdate") {
                $this->setSession("selected_supplier", $_POST['supplierID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }




    public function loadMachineTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierTableInDash") {
                $result = $this->mangeToolModel->getPredefineTool();

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Tool ID</th>
                            <th scope=col>Name</thl>
                            <th scope=col>ABCanalysis</thl>
                            <th scope=col>quantity</th>
                             <th scope=col>date</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid'>$row->tool_ID  </td>
                                   <td>$row->Name</td>
                                   <td>$row->ABCanalysis</td>
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
    public function setMachineCategoryDropdown(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "selectmachinedopdown") {

                $result = $this->mangeToolModel->getPredefineMachine();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->machine_ID  .'" data-value="'.$row->machine_ID .'"  >'.$row->Name.'-'.$row->ABCanalysis.'</option>';
                }
            }
        }
    }

    public function setSupplierDropdown(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "selectsupplierdopdown") {

                $result = $this->mangeToolModel->getSuppilerDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->supplier_ID  .'" data-value="'.$row->supplier_ID .'"  >'.$row->name.'-'.$row->contact_no.'</option>';
                }
            }
        }
    }


    public function addStockMachineForm(){

        $this->view("stock/addStockMachineForm");

    }
    public function addMachine()
    {
        echo("<script>console.log('PHP addTool');</script>");
        $machineData = [

            'quantity' => $this->input('quantity'),

            'description' => $this->input('description'),
            'supplier' => $this->input('supplierOptions'),
            'machineId' => $this->input('category')
        ];
        //{"quantity":"1","description":"vdvdgd","supplier":"27","toolId":"25"}
        //type, date, supplier_ID, stock_keeper_ID
        $loginID = $this->getSession('userId');

        $stockData =["machine",date("Y-m-d"),intval($machineData['supplier']),intval($loginID)];
        //quantity,description,stock_ID
        $stockTool =[intval($machineData['quantity']), $machineData['description'],0,intval($machineData['machineId'])];

//        $addData = [intval($toolData['quantity']),floatval($toolData['price']), $toolData['description'], intval($toolData['supplier']),intval($toolData['toolId'])];


        echo("<script>console.log('PHP in  st contoller: " . json_encode($stockData) . "');</script>");
        echo("<script>console.log('PHP in soo  contoller: " . json_encode($stockTool) . "');</script>");



        if ($this->mangeToolModel->insertMachinetoStock($stockData,$stockTool)) {
            echo("<script>console.log('true');</script>");
            echo '
              <script>
                            if(!alert("Tools Added successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageStockMachineController";
                            }
              </script>

            ';

        } else {
            echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageStockMachineController";
                        }
            </script>
            ';

        }


    }



}






?>