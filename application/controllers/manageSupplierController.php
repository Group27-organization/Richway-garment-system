<?php


class manageSupplierController extends framework{
private $mangeSupplierModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->mangeSupplierModel = $this->model('mangeSupplierModel');
    }
    public function index(){

        $this->view("Stock/stock-issue-Form");

        $result = $this->mangeSupplierModel->loadSupplierTable();


    }


    public function loadSupplierTable(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierTableInDash") {
                $result = $this->mangeSupplierModel->loadSupplierTable();
                 echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");

                echo "

                <table class=content-table>
                        <thead>
                        <tr>
                        
                            <th>Supplier ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event),selectSupplier()'>
                                <td id='supid'>$row->supplier_ID  </td>
                                <td>$row->name</td>
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





}






;?>