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

    public function updateEmployee(){
        $this->view("Accountant/updateEmployee");
    }

    public function loadupdateEmployeeform(){
        $this->view("Accountant/editEmployeeform");
    }

    public function loadEmployeeTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "employeeTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Employee number</th>
                            <th scope=col>Employee ID</th>
                            <th scope=col>Name</th>           
                            <th scope=col>Last paid Date</th>
                            <th scope=col>Last Paid Salary</th>                                                              
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                echo "
                         <tr>
                            <td>emp12</td>
                            <td>Saman Perera</td>                          
                            <td>8.30 am</td>
                            <td>7.30 pm</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>emp32</td>
                            <td>Kavishka Madushan</td>                           
                            <td>9.30 am</td>
                            <td>7.00 pm</td>
                            <td>1.30</td>
                        </tr>
                        <tr>
                            <td>emp53</td>
                            <td>Sadew Amantha</td>                            
                            <td>8.00 am</td>
                            <td>6.30 pm</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>emp46</td>
                            <td>Kusal Mendis</td>                            
                            <td>8.30 am</td>
                            <td>7.30 pm</td>
                            <td>2</td>
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

}