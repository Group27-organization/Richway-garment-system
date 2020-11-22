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
            if($_POST['key'] == "manageEmployeeData2"){
                $role = $_POST['employeerole'];
                $data = [
                    'role' => ucwords(str_replace("_"," ",$role))
                ];
                echo("<script>console.log('PHP in role slect: " . json_encode($role) . "');</script>");

                $result = $this->manageEmployeeModel->loadTable($data);



                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Employee ID</th>
                            <th scope=col>Full Name</th>                          
                            <th scope=col>Contact Number</th>                         
                            <th scope=col>Account Number</th> 
                            <th scope=col>Salary Basic</th> 
                            <th scope=col>Job Start Date</th>  
                             <th scope=col></th>                            
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                    foreach ($result as $row) {

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid'>$row->emp_ID</td>
                                <td>$row->name</td>                               
                                <td>$row->contact_no</td>                         
                                <td>$row->account_no</td>
                                <td>$row->salary_basic</td>
                                <td>$row->job_start_date</td>
                                 <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #00B4CC'> View </a>
                                </th>
                               
                                
                                
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

        echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");
        $role =  $this->getSession('selected_role');

        $data = [
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

        $empID = $this->getSession('selected_employee');
        $data = $this->manageEmployeeModel->updateEmployee($empID);
        $this->view("admin/editEmployeeform",$data);
    }

    public function updateEmployee()
    {
        $employee_ID = $this->input('hiddenID');


        $employeeData = [

            'FullName' => $this->input('name'),
            'Address' => $this->input('address'),
            'ContactNumber' => $this->input('contact_no'),
            'BloodGroup' => $this->input('blood_group'),
            'employeeRole' => $this->input('role'),
            'bank_ID' => $this->input('bank_ID'),
            'BankName' => $this->input('bank_account_name'),
            'BankBranch' => $this->input('bank_branch'),
            'AccountNumber' => $this->input('account_no'),
            'SalaryBasic' => $this->input('salary_basic'),
            'job_startdate' => $this->input('startJobDate'),
            'hiddenID' => $this->input('hiddenID'),

        ];
        foreach ($employeeData as $key => $value) {
            if (empty($value)) {
                $isEmpty = true;
            }
        }


        $updateData = [$employeeData['FullName'], $employeeData['Address'], $employeeData['ContactNumber'], $employeeData['BloodGroup'], $employeeData['bank_ID'], $employeeData['BankName'], $employeeData['BankBranch'], $employeeData['AccountNumber'], $employeeData['SalaryBasic'], $employeeData['job_startdate'], $employeeData['hiddenID']];

        if (!$isEmpty) {

            if ($this->manageEmployeeModel->editEmployee($updateData)) {


                echo '
              <script>
                            if(!alert("Employee Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/index"
                            }
              </script>

            ';

            } else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform"
                        }
            </script>
            ';

            }

        }//if(!isempty)
        else {
            echo '
            <script>
                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform"
                }
            </script>
            ';


        }


    }
}