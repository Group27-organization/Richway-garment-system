<?php

class AccountantController extends framework
{

    /**
     * @var mixed
     */
    private $accountantModel;

    public function __construct()
    {
        if (!$this->getSession('userId')) {

            $this->redirect("loginController/loginForm");

        } elseif ($this->getSession('userId')['role'] != 'admin') {
            //$this->redirect("somePage");
            echo "You cannot access this page.";
            die();
        }

        $this->helper("link");
        $this->accountantModel = $this->model('accountantModel');
    }

    public function index()
    {
        $this->view("Accountant/dashboard");

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


    public function managePayments()
    {
        $this->view("Accountant/managePayments");
    }

    public function viewSalaryReport()
    {
        $this->view("Accountant/viewSalaryReport");
    }


    public function viewReports()
    {
        $this->view("Accountant/viewReports");
    }


    public function updateEmployee()
    {
        $this->view("Accountant/updateEmployee");
    }

    public function loadupdateEmployeeform()
    {
        $this->view("Accountant/editEmployeeform");
    }

    public function loadPaymentTable()
    {
        echo("<script>console.log('PHP in index');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "paymentTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Report ID</th>
                            <th scope=col>Generate Date</th>
                            <th scope=col>Total Employees</th>           
                            <th scope=col>Status</th>
                            <th scope=col>Actions</th>                                                              
                            
                        </tr>
                        </thead>
                        <tbody>

                ";


                echo "
                         <tr>
                            <td>Rid001</td>
                            <td>2021/02/06</td>                          
                            <td>10</td>
                            <td>pending</td>
                            <td>view</td>
                            
                        </tr>
                       
                        ";

            }
            echo "
                        </tbody>
                    </table>
                    
                    ";
        }


    }

    public function loadSalaryTable()
    {
        echo("<script>console.log('PHP in ndex');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "salaryDash") {

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Emp ID</th>
                            <th scope=col>Month</th>
                            <th scope=col>Attendance</th>
                            <th scope=col>Salary</th>
                            <th scope=col>Status</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
//                foreach ($result as $row) {
//
//                    echo "
//                            <tr class='tblrow' onclick='selectRow(event)'>
//                                <td id='supid'>$row->supplier_ID  </td>
//                                <td>$row->name</td>
//                                 <td>$row->email</td>
//                                  <td>$row->address</td>
//                                <td>$row->contact_no</td>
//
//                            </tr>
//                        ";
//
//                }
                echo "
                        </tbody>
                    </table>
                    
                    ";
            }
        }

    }

    public function generateMonthlySalary()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "payement") {
                $payment = $_POST['paymentReport'];
                $a=array();
                $b=array();
                $length=count($payment);
                $presentDays =array();

                for($x = 0; $x<$length; $x++){
                    array_push($a,$payment[$x]['Date']);
                    array_push($b,$payment[$x]['Emp_Id']);
                }
                $date=array_unique($a);
                $emp_id=array_unique($b);
                $unique_emp=$emp_id;

                foreach ($emp_id as $emp) {
                    $daysCount=0;

                    foreach($date as $d ){


                        for($x = 0; $x< $length; $x++){

                            if($payment[$x]['Emp_Id']==$emp){

                                if($payment[$x]['Date']==$d){

                                    if($payment[$x]['Present']==1){
                                        $daysCount++;
                                    }

                                }
                            }

                        }
                    }
                    $empID_Days[$emp]=$daysCount;
                }

               // echo("<script>console.log('PHP in generate salary: ". json_encode($empID_Days). "');</script>");
                $this->accountantModel->generateMonthlySalary($empID_Days);


            }
        }

    }
}