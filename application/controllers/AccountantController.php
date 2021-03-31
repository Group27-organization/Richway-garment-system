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
    public function setNewSession(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "notificationID") {
                $this->setSession("selected_ID", $_POST['NotificationId']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }




    public function managePayments()
    {
        $this->view("Accountant/managePayments");
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
    public function Notification()
    {
        $this->view("Accountant/notification");
    }

    public function loadPaymentTable()
    {
        echo("<script>console.log('PHP in index');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "paymentTableInDash") {
                $result = $this->accountantModel->loadSalaryReport();

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Report ID</th>                            
                            <th scope=col>Month</th>
                            <th scope=col>Total Employees</th>           
                            <th scope=col>Status</th>
                            <th scope=col>Actions</th>                                                              
                            
                        </tr>
                        </thead>
                        <tbody>

                ";

            foreach ($result as $row) {

                echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td >$row->report_id </td>                               
                                <td>$row->Month</td>
                                <td>$row->total_employee</td>
                                <td>$row->status</td>
                                <th>
                                 <a href='http://localhost/Richway-garment-system/AccountantController/viewSalaryReport?month=$row->Month' class='viewBtn' style='margin: 4px;color: #00B4CC'>View</a>                                
                                 
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





    public function generateMonthlySalary()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "payement") {
                $payment = $_POST['paymentReport'];
                $a=array();
                $b=array();
                $length=count($payment);
                $presentDays =array();

                echo("<script>console.log('PHP in generate salary: ". json_encode( $length). "');</script>");

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

                echo("<script>console.log('PHP in generate salary: ". json_encode($payment[1]['Date']). "');</script>");
                $this->accountantModel->generateMonthlySalary($empID_Days,$payment[1]['Date'],count($date));

            }
        }

    }


    public function viewSalaryReport()
    {
        $Date=$_GET['month'];
        $this->setSession("selected_Date",$Date);
        echo("<script>console.log('PHP in view salary report: ". json_encode($Date). "');</script>");
        $this->view("Accountant/viewSalaryReport");
    }


    public function loadSalaryTable()
    {

        $Date =  $this->getSession('selected_Date');

        echo("<script>console.log('Selected Date: ". json_encode($Date). "');</script>");

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "salaryDash") {

                $result = $this->accountantModel->loadSalaryTable($Date);

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
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td >$row->emp_id</td>
                                <td>$row->month_And_Year</td>
                                <td>$row->attendance</td>
                                <td>$row->salary</td>
                                <td>$row->status</td>

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

    public function loadNotificationTable(){
          echo("<script>console.log('PHP in acc-notification');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "notificationTableDash") {
                $result = $this->accountantModel->loadNotificationTable();
                //echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");

                echo "

                 <table id='myTable' class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col style='display: none'>Notification ID</th>
                            <th scope=col style='display: none'>Sender ID</th>
                            <th scope=col>Sender Role</th>
                            <th scope=col style='display: none'>Receiver Role</th>
                            <th scope=col>Date</th>
                            <th scope=col>Description</th>
                            <th scope=col>Actions</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td style='display: none'>$row->ID</td>
                                <td style='display: none'>$row->sender_Id</td>
                                <td>$row->sender_role</td>
                                <td style='display: none'>$row->reciver_role</td>
                                <td>$row->date</td>
                                <td>$row->description</td>
                                <td>
                               
                                <button class='viewBtn' style='background-color: snow; color:orange; border: none' onclick='selectRowView(event)'>view</button>
                                   
                                </td>
                                
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
    public function loadDescrpition()
    {


        if (isset($_POST['key'])) {
            if ($_POST['key'] == "notification") {
                $notificationID =$_POST['notificationID'];
                $loginID = $this->getSession('userId')['user_id'];
                $result = $this->accountantModel->loadDescription($notificationID);
                $description =$result->description;


                echo $description;
                $readIds = $result->read_ids;
                $loginID = $this->getSession('userId')['user_id'];
                $readIdArr = explode(",",$readIds);

                if (in_array($loginID, $readIdArr)) {

                }else{
                  $updateReadIds = $readIds.','.$loginID;
                    $result = $this->accountantModel->readUpdateNotification($updateReadIds,$notificationID);
                }



            }
        }
    }


    public function change_status_after_approved(){

        $Date =  $this->getSession('selected_Date');
      if($this->accountantModel->change_Status($Date)){
          echo '
              <script>
                            if(!alert("Payment Approved successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/AccountantController/viewSalaryReport"
                            }
              </script>

            ';
      }
    }



}