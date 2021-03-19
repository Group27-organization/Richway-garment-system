<?php

class AccountantController extends framework {

    /**
     * @var mixed
     */
    private $accountantModel;

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
        $this->accountantModel = $this->model('accountantModel');
    }

    public function index(){
        $this->view("Accountant/dashboard");

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



    public function managePayments(){
        $this->view("Accountant/managePayments");
    }

    public function viewReports(){
        $this->view("Accountant/viewReports");
    }

    public function viewSalary(){
        $this->view("Accountant/viewSalary");
    }

    public function updateEmployee(){
        $this->view("Accountant/updateEmployee");
    }

    public function loadupdateEmployeeform(){
        $this->view("Accountant/editEmployeeform");
    }

    public function loadPaymentTable(){
        echo("<script>console.log('PHP in index');</script>");
        if(isset($_POST['key'])) {
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

    public function viewSalaryReport()
    {
        $this->view("Accountant/viewSalaryReport");

    }

    public function loadSalaryReport(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "salaryReportTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Salary Report</th>                    
                            <th scope=col>Genarated date</th>
                            <th scope=col>accept/not</th>                            
                            <th scope=col></th>   
                        </tr>
                        </thead>
                        <tbody>

                ";


                echo "
                         <tr>
                            <td></td>
                            <td>2020-10-10</td>
                            <td>
                                 <button class='three-set-btn2' >Accept</button>
                            </td>                     
                            <th>
                                 <button class='three-set-btn3' >Print</button>
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

    public function loadSalaryTable(){
        echo("<script>console.log('PHP in index');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "payrollTableInDash") {
                $result = $this->accountantModel->loadSalaryTable();
                echo("<script>console.log('PHP in loadSalaryTable controller: " . json_encode($result) . "');</script>");

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                      
                            <th scope=col>Employee ID</th>
                            <th scope=col>Name</th> 
                             <th scope=col>Gross</th> 
                               <th scope=col>Deductions</th>
                                 <th scope=col>Cash Advance</th> 
                                   <th scope=col>Net Pay</th>            
                                                                                        
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event),selectPayroll()'>
                                <td id='emp_ID'>$row->emp_ID  </td>
                                <td>$row->Name</td>
                                <td>$row->gross</td>
                                <td>$row->deduction</td>
                                <td>$row->cashadvance</td>
                                <td>$row->netpay</td>
                              


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

    public function generateMonthlySalary(){

        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "monthlysalary") {
                $result = $this->accountantModel->generateMonthlySalary();

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Generate Report ID</th>
                            <th scope=col>Total Employee Count</th>
                            <th scope=col>Date</th>
                            <th scope=col></th> 
                                                       
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid'>$row->report_ID  </td>
                                <td>$row->emp_count</td>
                                <td>$row->date</td> 
                                <th>
                                 <a href='http://localhost/Richway-garment-system/AccountantController/viewSalary' class='viewBtn' style='margin: 4px;color: #00B4CC'> View </a>
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

}