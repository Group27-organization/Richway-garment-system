<?php 

class manageEmployeeController extends framework {

    /**
     * @var mixed
     */
    private $manageEmployeeModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }
      elseif ($this->getSession('userId')['role'] != 'admin'){
          //$this->redirect("somePage");
          echo "You cannot access this page.";
          die();
      }

       $this->helper("link");
       $this->manageEmployeeModel = $this->model('manageEmployeeModel');
    }

    public function index(){
      $this->view("admin/manageEmployee");
    }

    public function setNewSession(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageEmployeeData") {
                $this->setSession("selected_role", $_POST['role']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function NewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "employeeUpdate") {
                $this->setSession("selected_employee", $_POST['emp_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageEmployeeData"){

                $result = $this->manageEmployeeModel->loadTable($_POST['tableName']);

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Login ID</th>
                            <th scope=col>".(($_POST['tableName']=='owner')?'Owner ID':'Employee ID')."</th>
                            <th scope=col>".(($_POST['tableName']=='owner')?'Owner Name':'Employee Name')."</th>
                            <th scope=col>User Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>lid$row->login_ID</td>
                                <td>".(($_POST['tableName']=='owner')?$row->owner_ID:$row->emp_ID)."</td>
                                <td>".(($_POST['tableName']=='owner')?$row->name:$row->password)."</td>
                                <td>$row->user_name</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">Something went wrong!</td>
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

    public function addEmployeeform(){

//        $result = $this->manageUserModel->getNextLoginID();
        echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");
        $role =  $this->getSession('selected_role');

        $data = [
//            'login_ID' => "lid".($result),
            'role' => ucwords(str_replace("_"," ",$role))
        ];


        $this->view("admin/addEmployee",$data);
    }


    public function loadEmployeeTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageUserData"){

                $role = $this->getSession('selected_role');

                $result = $this->manageEmployeeModel->getEmployeeData($role);

                echo "
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>".(($role=='owner')?'Owner ID':'Employee ID')."</th>
                            <th scope=col>".(($role=='owner')?'Owner Name':'Employee Name')."</th>
                            ".(($role=='owner')?'':'<th>Employee Role</th>')."
                            <th scope=col>".(($role=='owner')?'Address':'Job Start Date')."</th>
                            <th scope=col>Contact</th>
                        </tr>
                        </thead>
                        <tbody>

                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        //echo("<script>console.log('PHP: " . json_encode($row) . "');</script>");

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid'>".(($role=='owner')?$row->owner_ID:$row->emp_ID)."</td>
                                <td>$row->name</td>
                                 ".(($role=='owner')?'':"<td>$row->employee_role</td>")."
                                <td>".(($role=='owner')?$row->address:$row->job_start_date)."</td>
                                <td>$row->contact_no</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">There are no employees without a login account.</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">Something went wrong!</td>
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


    public function loadupdateEmployeeform(){

        $role =  $this->getSession('selected_role');
        $empID = $this->getSession('selected_employee');
        //$data = $this->supplierModel->updateSupplier($supID);
      //  $this->view("admin/editSupplierform",$data);


        $data = [
//            'login_ID' => "lid".($result),
            'role' => ucwords(str_replace("_"," ",$role))
        ];


        //$this->view("admin/editEmployeeform",$data);
    }



}