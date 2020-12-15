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

    public function addToolForm(){

        $this->view("stock/addToolForm");

    }


}






?>