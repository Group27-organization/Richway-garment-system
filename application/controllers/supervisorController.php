<?php


class supervisorController extends framework{
    private $supervisorModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->supervisorModel = $this->model('supervisorModel');

    }



    public function index(){

        $this->view("supervisor/markAttendance");
        $this->view("supervisor/loadupdateworkload");
        echo("<script>console.log('PHP in index');</script>");
    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "workloadUpdate") {
                $this->setSession("selected_workload", $_POST['ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function markAttendance(){
        $this->view("supervisor/markAttendance");
    }

    public function loadupdateWorkload(){
        $this->view("supervisor/updateWorkload");
    }




    public function updateWorkloadTable()
    {
        echo("<script>console.log('PHP in index');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "workloadTableInDash") {

                $result = $this->supervisorModel->workloadTable();
                echo("<script>console.log('PHP in loadworkloadTable controller: " . json_encode($result) . "');</script>");

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>ID</th>
                            <th scope=col>Name</th>           
                            <th scope=col>Date</th>  
                            <th scope=col>Line</th>                   
                            <th scope=col>Current Completed Workload</th> 
                            <th scope=col>Required Today Workload</th> 
                           
                        </tr>
                        </thead>
                        <tbody>

                ";

                foreach ($result as $row) {
                    echo "
                          <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                <td>$row->Name</td>
                                <td>$row->Date</td>
                                <td>$row->Line</td>
                                <td>$row->current_completed_workload</td>
                                <td>$row->required_workload</td>
                               
                              
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

    public function loadUpdateworkloadForm(){
        $ID = $this->getSession('selected_workload');

        $workloadEdit = $this->supervisorModel->updateWorkload($ID);
        $data = [
            'data'=>$workloadEdit,
            'NameError' => '',
            'DateError' => '',
            'LineError' => '',
            'CurrentCompletedWorkloadError' => '',
            'RemainingWorkloadError' => '',
            'RequiredTodayWorkloadError' => '',
            'TodayCompletedWorkloadError' => '',


        ];
        $this->view("supervisor/updateWorkloadForm",$data);

    }

    public function updateWorkload()
    {
        $ID= $this->input('hiddenID');
        $workloadEdit=$this->supervisorModel->updateWorkload($ID);
        $workloadData = [
            'Name' => $this->input('Name'),
            'Date' => $this->input('Date'),
            'Line' => $this->input('Line'),
            'CurrentCompletedWorkload' => $this->input('current_completed_workload'),
            'RemainingWorkload' => $this->input('remaining_workload'),
            'RequiredTodayWorkload' => $this->input('required_workload'),
            'TodayCompletedWorkload' => $this->input('today_completed_workload'),
            'hiddenID' => $this->input('hiddenID'),
            'data' => $workloadEdit,
            'NameError' => '',
            'DateError' => '',
            'LineError' => '',
            'CurrentCompletedWorkloadError' => '',
            'RemainingWorkloadError' => '',
            'RequiredTodayWorkloadError' => '',
            'TodayCompletedWorkloadError' => '',

        ];

        echo("<script>console.log('PHP in loadworkloadTable controller: " . json_encode($workloadData) . "');</script>");


        if (empty($workloadData['Name'])) {
            $workloadData['NameError'] = "Name is required";
        }

        if (empty($workloadData['Date'])) {
            $workloadData['DateError'] = "Date is required";
        }

        if (empty($workloadData['Line'])) {
            $workloadData['LineError'] = "Line is required";
        }

        if (empty($workloadData['CurrentCompletedWorkload'])) {
            $workloadData['CurrentCompletedWorkloadError'] = "CurrentCompletedWorkload is required";
        }

        if (empty($workloadData['RemainingWorkload'])) {
            $workloadData['RemainingWorkloadError'] = "RemainingWorkload is required";
        }

        if (empty($workloadData['RequiredTodayWorkload'])) {
            $workloadData['RequiredTodayWorkloadError'] = "RequiredTodayWorkload is required";
        }

        if (empty($workloadData['TodayCompletedWorkload'])) {
            $workloadData['TodayCompletedWorkloadError'] = "TodayCompletedWorkload is required";
        }


        if (empty($workloadData['NameError']) && empty($workloadData['DateError']) && empty($workloadData['LineError']) && empty($workloadData['CurrentCompletedWorkloadError']) && empty($workloadData['RemainingWorkloadError']) && empty($workloadData['RequiredTodayWorkloadError']) && empty($workloadData['TodayCompletedWorkloadError'])) {


            if ($this->supervisorModel->editWorkload($workloadData)) {

                echo '
                      <script>
                                    if(!alert("workload updated successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/supervisorController/loadupdateWorkload"
                                    }
                      </script>

                    ';
            } else {

                echo '
 
                    <script>
                    
                                if(!alert("Something went wrong! please try again.")) {
                                   window.location.href = "http://localhost/Richway-garment-system/supervisorController/loadUpdateworkloadForm"
                                }
                    </script>
                    ';

            }
        } else {
            $this->view("supervisor/updateWorkloadForm", $workloadData);

        }


    }


    public function attendanceTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "attendanceTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Employee Id</th>
                            <th scope=col>Name</th>           
                            <th scope=col>Arrival Time</th>
                            <th scope=col>Departure Time</th>
                            <th scope=col>OT Hours</th>                      
                            
                           
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











}






?>