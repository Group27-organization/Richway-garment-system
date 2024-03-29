<?php

class manageEmployeeController extends framework
{

    /**
     * @var mixed
     */
    private $manageEmployeeModel;

    public function __construct()
    {
        if (!$this->getSession('userId')) {

            $this->redirect("loginController/loginForm");

        }
        $this->helper("link");
        $this->manageEmployeeModel = $this->model('manageEmployeeModel');
    }

    public function index()
    {
        $this->view("admin/manageEmployee", $data);
        echo("<script>console.log('PHP in index');</script>");
    }

    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "manageEmployeeData") {
                $this->setSession("selected_role", $_POST['role']);
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


    public function loadTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "manageEmployeeData2") {
                $role = $_POST['employeerole'];
                $data = [
                    'role' => ucwords(str_replace("_", " ", $role))
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
                            <th scope=col>Email</th> 
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
                                <td>$row->email</td>
                                <td>$row->salary_basic</td>
                                <td>$row->job_start_date</td>
                                 <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #11cdef'> View </a>
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

    public function addEmployeeform()
    {

        // echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");
        $role = $this->getSession('selected_role');

        $data = [
            'employeeRole' => ucwords(str_replace("_", " ", $role))
        ];


        $this->view("admin/addEmployee", $data);
    }



    public function addEmployee(){
        $role = $this->getSession('selected_role');

        $employeeData = [
            'FullName'=> $this->input('name'),
            'Address'=>$this->input('address'),
            'ContactNumber'=>$this->input('contact_no'),
            'email'=>$this->input('email'),
            'BloodGroup'=>$this->input('blood_group'),
            'employeeRole'=>ucwords(str_replace("_", " ", $role)),
            'bank_name'=>$this->input('bank_name'),
            'BankAccName'=>$this->input('bank_account_name'),
            'BankBranch'=>$this->input('bank_branch'),
            'AccountNumber'=>$this->input('account_no'),
            'SalaryBasic'=>$this->input('salary_basic'),
            'job_start_date'=>$this->input('job_start_date'),
            'nameError'=> '',
            'nameErrorCheckFormat'=>'',
            'addressError'=> '',
            'contact_noError'=> '',
            'emailError'=>'',
            'emailErrorFormat'=>'',
            'blood_groupError'=> '',
            'bank_nameError'=>'',
            'bank_account_nameError'=> '',
            'bank_branchError'=> '',
            'account_noError'=> '',
            'salary_basicError'=> '',
            'job_start_dateError'=> ''
        ];



        if(empty( $employeeData['FullName'])){
            $employeeData['nameError']="Full name is required";
        }
        if (!preg_match("/^([a-zA-Z' ]+)$/",$employeeData['FullName'])) {
            $employeeData['nameErrorCheckFormat']= "Only letters allowed";
        }
        if(empty( $employeeData['Address'])){
            $employeeData['addressError']="Address is required";
        }
        if(empty( $employeeData['ContactNumber'])){
            $employeeData['contact_noError']="Contact Number is required";
        }
        if(empty( $employeeData['email'])){
            $employeeData['emailError']="Email address is required";
        }
        if(!filter_var($employeeData['email'], FILTER_VALIDATE_EMAIL)){
            $employeeData['emailErrorFormat']="Invalid email address ";
        }

        if(empty( $employeeData['BloodGroup'])){
            $employeeData['blood_groupError']="Blood group is required";
        }
        if(empty( $employeeData['bank_name'])){
            $employeeData[ 'bank_nameError']="Bank name is required";
        }

        if(empty( $employeeData['BankAccName'])){
            $employeeData['bank_account_nameError']="Bank account  name is required";
        }
        if(empty( $employeeData['BankBranch'])){
            $employeeData['bank_branchError']="Bank branch is required";
        }
        if(empty( $employeeData[ 'AccountNumber'])){
            $employeeData['account_noError']="Account number is required";
        }
        if(empty( $employeeData[ 'SalaryBasic'])){
            $employeeData['salary_basicError']="Salary basic is required";
        }
        if(empty( $employeeData['job_start_date'])){
            $employeeData['job_start_dateError']="Job start date is required";
        }




        if(empty($employeeData['nameError'])&&empty($employeeData['nameErrorCheckFormat'])&&empty($employeeData['addressError'])&&empty($employeeData['contact_noError'])&&
            empty($employeeData['emailError'])&& empty($employeeData['emailErrorFormat'])&&empty($employeeData['blood_groupError'])&&
            empty($employeeData['bank_IDError'])&&empty($employeeData['bank_nameError'])&&empty($employeeData['bank_account_nameError'])&&empty($employeeData['salary_basicError'])&&empty($employeeData['job_start_dateError'])) {


                    echo("<script>console.log('PHP in edit: " . json_encode($employeeData) . "');</script>");

                    if ($this->manageEmployeeModel->insertemployee($employeeData)) {

                        echo '
                              <script>
                                            if(!alert("Employee added successfully")) {
                                                window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/index"
                                            }
                              </script>
        
                            ';
                    }
                    else {
                        echo '
        
                            <script>
                                        if(!alert("Something went wrong! please try again.")) {
                                            window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/addEmployeeform"
                                        }
                            </script>
                            ';

                    }


        }


        else {
            $this->view("admin/addEmployee", $employeeData);

        }

    }



    public function loadupdateEmployeeform()
    {

        $empID = $this->getSession('selected_employee');
        $employeeEdit = $this->manageEmployeeModel->loadupdateEmployeedetails($empID);

        $data = [
            'data'=>$employeeEdit,
            'nameError'=> '',
            'nameErrorCheckFormat'=>'',
            'addressError'=> '',
            'contact_noError'=> '',
            'emailError'=>'',
            'emailErrorFormat'=>'',
            'blood_groupError'=> '',
            'bank_nameError'=>'',
            'bank_account_nameError'=> '',
            'bank_IDError'=> '',
            'bank_branchError'=> '',
            'account_noError'=> '',
            'salary_basicError'=> '',
            'job_start_dateError'=> ''

        ];

        echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");

        $this->view("admin/editEmployeeform", $data);
    }


    public function updateEmployee()
    {
        $employee_ID = $this->input('hiddenID');
        $employeeEdit = $this->manageEmployeeModel->loadupdateEmployeedetails( $employee_ID);

        $employeeData = [

            'FullName' => $this->input('name'),
            'Address' => $this->input('address'),
            'ContactNumber' => $this->input('contact_no'),
            'email'=>$this->input('email'),
            'BloodGroup' => $this->input('blood_group'),
            'employeeRole' => $this->input('employee_role'),
            'bank_name'=>$this->input('bank_name'),
            'BankAccName' => $this->input('bank_account_name'),
            'BankBranch' => $this->input('bank_branch'),
            'AccountNumber' => $this->input('account_no'),
            'SalaryBasic' => $this->input('salary_basic'),
            'job_startdate' => $this->input('startJobDate'),
            'hiddenID' => $this->input('hiddenID'),
            'data'=> $employeeEdit,
            'nameError'=> '',
            'nameErrorCheckFormat'=>'',
            'addressError'=> '',
            'contact_noError'=> '',
            'emailError'=>'',
            'emailErrorFormat'=>'',
            'blood_groupError'=> '',
            'bank_nameError'=>'',
            'bank_account_nameError'=> '',
            'bank_branchError'=> '',
            'account_noError'=> '',
            'salary_basicError'=> '',
            'job_start_dateError'=> ''

        ];



        if(empty( $employeeData['FullName'])){
            $employeeData['nameError']="Full name is required";
        }
        if (!preg_match("/^([a-zA-Z' ]+)$/",$employeeData['FullName'])) {
            $employeeData['nameErrorCheckFormat']= "Only letters allowed";
        }
        if(empty( $employeeData['Address'])){
            $employeeData['addressError']="Address is required";
        }
        if(empty( $employeeData['ContactNumber'])){
            $employeeData['contact_noError']="Contact Number is required";
        }
        if(empty( $employeeData['email'])){
            $employeeData['emailError']="Email address is required";
        }
        if(!filter_var($employeeData['email'], FILTER_VALIDATE_EMAIL)){
            $employeeData['emailErrorFormat']="Invalid email address ";
        }

        if(empty( $employeeData['BloodGroup'])){
            $employeeData['blood_groupError']="Blood group is required";
        }
        if(empty( $employeeData['bank_name'])){
            $employeeData[ 'bank_nameError']="Bank name is required";
        }

        if(empty( $employeeData['BankAccName'])){
            $employeeData['bank_account_nameError']="Bank account  name is required";
        }
        if(empty( $employeeData['BankBranch'])){
            $employeeData['bank_branchError']="Bank branch is required";
        }
        if(empty( $employeeData[ 'AccountNumber'])){
            $employeeData['account_noError']="Account number is required";
        }
        if(empty( $employeeData[ 'SalaryBasic'])){
            $employeeData['salary_basicError']="Salary basic is required";
        }
        if(empty( $employeeData['job_startdate'])){
            $employeeData['job_start_dateError']="Job start date is required";
        }
        echo("<script>console.log('PHP in edit: " . json_encode($employeeData) . "');</script>");



        if(empty($employeeData['nameError'])&&empty($employeeData['nameErrorCheckFormat'])&&empty($employeeData['addressError'])&&empty($employeeData['contact_noError'])&&
            empty($employeeData['emailError'])&& empty($employeeData['emailErrorFormat'])&&empty($employeeData['blood_groupError'])&&
            empty($employeeData['bank_nameError'])&&empty($employeeData['bank_account_nameError'])&&empty($employeeData['salary_basicError'])&&empty($employeeData['job_start_dateError'])) {


                    if ($this->manageEmployeeModel->editEmployee($employeeData)) {


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

        }
        else {
            $this->view("admin/editEmployeeform", $employeeData);



        }


    }


    public function deleteEmployee()
    {
        $id=$_POST['emp_ID'];
        if($this->manageEmployeeModel->deleteEmployee($id)){
            echo "200";

        }

    }
}
?>