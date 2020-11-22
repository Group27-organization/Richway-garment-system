<?php


class productionManagerController extends framework{
    private $manageSupplierModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->manageSupplierModel = $this->model('mangeSupplierModel');
        $this->supplierModel = $this->model('supplierModel');
    }



    public function index(){


        $this->view("productionManager/createJob");
        echo("<script>console.log('PHP in index');</script>");



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




    public function loadSupplierTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierTableInDash") {
                $result = $this->manageSupplierModel->loadSupplierTable();
                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Supplier ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Email Address</th>
                            <th scope=col>Address</th>
                            <th scope=col>Contact Number</th>
                           
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


        $this->view("admin/addSupplier");




    }

    public function deleteSupplier(){
        $id=$_POST['supplierID'];
        if($this->manageSupplierModel->deleteSupplier($id)){
            echo "200";

        }


    }

    public function loadupdateSupplierform(){

        $supID = $this->getSession('selected_supplier');
        $data = $this->supplierModel->updateSupplier($supID);
        $this->view("admin/editSupplierform",$data);
    }


    public function updateSupplier(){
        $supplier_ID=intval($this->input('hiddenID'));

        $supplierEdit=$this->supplierModel->editSupplier( $supplier_ID);
        $supplierData = [
            'supplierName'=> $this->input('suplierName'),
            'emailAddress'=>$this->input('Eemailaddress'),
            'data'=>$supplierEdit,
            'hiddenID'=>$this->input('hiddenID'),
            'address'=>$this->input('address'),
            'contactNo'=>$this->input('contactno'),

        ];



        foreach ($supplierData as $key => $value){
            if(empty($value)){
                $isEmpty= true;
            }


            $updateData=[$supplierData['supplierName'],$supplierData['emailAddress'],$supplierData['address'],$supplierData['contactNo'],$supplierData[ 'hiddenID'],];

            if(!$isEmpty){
                if($this->supplierModel->editSupplier($updateData)){

                    echo '
                  <script>
                                if(!alert("Supplier Updated successfully")) {
                                    window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/index";
                                }
                  </script>

                ';

                }

                else {
                    echo '

                <script>
                            if(!alert("Something went wrong! please try again.")) {
                                window.location.href = "http://localhost/Richway-garment-system/editSupplierController/index";
                            }
                </script>
                ';

                }

            }//if(!isempty)
            else{
                echo '
              <script>
                  if(!alert("Some required fields are missing!")) {
                      window.location.href = "http://localhost/Richway-garment-system/editSupplierController/index";
                  }
              </script>
              ';
            }


        }

    }

    public function createJob(){
        $this->view("productionManager/createJob");
    }

    public function loadcreateJobform(){
        $this->view("productionManager/createJobform");
    }

    public function updateJob(){
        $this->view("productionManager/updateJob");
    }

    public function loadupdateJobform(){
        $this->view("productionManager/updateJobform");
    }


    public function cancelJob(){
        $this->view("productionManager/cancelJob");
    }


    public function loadJobTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "jobTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Order Id</th>
                            <th scope=col>Name</th>                            
                            <th scope=col>Item Count</th>
                            <th scope=col>Customer</th>
                            <th scope=col>Due Date</th>
                            
                            
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                    echo "
                         <tr>
                            <td>o12</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Sampath Perera</td>
                            <td>2020-10-23</td>
                        </tr>
                        <tr>
                            <td>o13</td>
                            <td>John Keels</td>
                            <td>12</td>
                            <td>Sadew Amantha</td>
                            <td>2020-11-01</td>
                        </tr>
                        <tr>
                            <td>O14</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Kavishka Madhushan</td>
                            <td>2020-11-04</td>
                        </tr>
                        <tr>
                            <td>O15</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Sithum Dulanjana</td>
                            <td>2020-11-10</td>
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






?>