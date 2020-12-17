<?php


class manageToolController extends framework{
private $mangeToolModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->mangeToolModel = $this->model('mangeToolModel');

    }



    public function index(){


        $this->view("stock/manageTool");


        

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




    public function loadToolTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierTableInDash") {
                $result = $this->mangeToolModel->loadSupplierTable();

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Tool ID</th>
                            <th scope=col>Category</thl>
                            <th scope=col>Level</thl>
                            <th scope=col>Description</th>
                            <th scope=col>Unit Price</th>
                            <th scope=col>Quantity</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid'>$row->supplier_ID  </td>
                                <td>$row->name</td>
                                 <td>$row->email</td>
                                  <td>$row->address</td>
                                <td>$row->contact_no</td>
                                
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
    public function setToolCategoryDropdown(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "selecttooldopdown") {

                $result = $this->mangeToolModel->getCustomerDetails();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->customer_ID .'" data-value="'.$row->customer_ID.'"  >'.$row->name.'-'.$row->contact_no.'</option>';
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


    public function addToolForm(){

        $this->view("stock/addToolForm");

    }
    public function addTool()
    {
        echo("<script>console.log('PHP addTool');</script>");
        $toolData = [

            'quantity' => $this->input('quantity'),
            'price' => $this->input('price'),
            'description' => $this->input('description'),
            'supplier' => $this->input('supplier'),
            'toolId' => $this->input('category')
        ];
        //{"quantity":"1","price":"1","description":"vdvdgd","supplier":"27","toolId":"25"}
        $addData = [intval($toolData['quantity']),floatval($toolData['price']), $toolData['description'], intval($toolData['supplier']),intval($toolData['toolId'])];


        echo("<script>console.log('PHP in  contoller: " . json_encode($addData) . "');</script>");



        if ($this->mangeToolModel->insertTooltoStock($addData)) {
            echo("<script>console.log('true');</script>");
            echo '
              <script>
                            if(!alert("Tools Added successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageToolController";
                            }
              </script>

            ';

        } else {
            echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageToolController";
                        }
            </script>
            ';

        }


    }



}






?>