<?php


class ownerController extends framework{
    private $ownerModel;

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->ownerModel = $this->model('ownerModel');
    }



    public function index(){

        $this->view("owner/dashboard");
        echo("<script>console.log('PHP in index');</script>");
    }


    public function managePayroll(){
        $this->view("owner/managePayroll");
    }

    public function stockusageReport(){
        $this->view("owner/ stockusageReport");
    }

    public function viewReportAndChart(){
        $this->view("owner/viewReportAndChart");
    }

    public function loadpayform(){
        $this->view("owner/payform");

    }
    public function viewTransactionLogs(){
        $this->view("owner/transcationLog");
    }
    public function ownerDashbord(){
        $this->view("owner/dashboard");
    }


    public function loadTransactionLogsTable(){
        echo("<script>console.log('PHP add loadTransactionLogsTable');</script>");

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "TransactionLogs") {


                $result = $this->ownerModel->loadTransactionLogsTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                             <th scope=col style='display: none'> ID</th>
                             <th scope=col>Date</th>   
                             <th scope=col>Time</th> 
                             <th scope=col>Action Name</th>
                             <th scope=col>Action Holder Role</th> 
                             <th scope=col>Holder Id</th>
                             <th scope=col>Type</th>  
                            
                         </tr>
                       </thead>
                       <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                 <td style='display: none'>$row->ID</td>
                                 <td>$row->date</td>   
                                 <td>$row->time</td>                                
                                 <td>$row->action_name</td>                                
                                 <td>$row->holder_role</td>
                                  <td>$row->holder_ID</td>
                                  <td>$row->type</td>    
                                                             
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



    public function loadPayRollTable(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "OwnerManagePayRoleTable") {


                $result = $this->ownerModel->loadSalaryReportTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                             <th scope=col style='display: none'> ID</th>
                            <th scope=col>generate Date</th> 
                             <th scope=col>Year & Month</th>
                             <th scope=col>status</th>
                             <th scope=col>Holder ID</th>
                             <th scope=col>Action</th>    
                            
                         </tr>
                       </thead>
                       <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                 <td style='display: none'>$row->report_id</td>
                                 <td>$row->generate_Date</td>   
                                 <td>$row->Month</td>                                
                                 <td>$row->status</td>
                                 <td>$row->holder_ID</td>
                                 <td>
                                 <style>
                                 *:focus {
                                        outline: 0 !important;
                                  }
                                  </style>
                                  <button class='viewBtn' style='background-color: snow; color:orange; border: none;' >view</button>
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






}






?>