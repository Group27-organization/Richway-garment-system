<?php


class manageSupplierController extends framework{
private $manageSupplierModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->manageSupplierModel = $this->model('mangeSupplierModel');
    }



    public function index(){


        $this->view("manageSupplier");
        echo("<script>console.log('PHP in index');</script>");

        

    }





    public function loadSupplierTable(){



        if(isset($_POST['key'])) {

            if ($_POST['key'] == "supplierTableInDash") {

                $result = $this->manageSupplierModel->loadSupplierTable();


                echo "

                <table class=content-table>
                        <thead>
                        <tr>
                        
                            <th>Supplier ID</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                           
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

    public function addSupplierform(){

        $this->view("addSupplier");

    }




}






?>