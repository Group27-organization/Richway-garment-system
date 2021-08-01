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




//    public function updateWorkloadTable()
//    {
//        echo("<script>console.log('PHP in index');</script>");
//        if (isset($_POST['key'])) {
//            if ($_POST['key'] == "workloadTableInDash") {
//
//                $result = $this->supervisorModel->workloadTable();
//                echo("<script>console.log('PHP in loadworkloadTable controller: " . json_encode($result) . "');</script>");
//
//                echo "
//
//                 <table class=\"table align-items-center table-flush\">
//                        <thead class=\"thead-light\">
//                        <tr>
//
//                            <th scope=col>ID</th>
//                            <th scope=col>Name</th>
//                            <th scope=col>Date</th>
//                            <th scope=col>Line</th>
//                            <th scope=col>Current Completed Workload</th>
//                            <th scope=col>Required Today Workload</th>
//
//                        </tr>
//                        </thead>
//                        <tbody>
//
//                ";
//
//                foreach ($result as $row) {
//                    echo "
//                          <tr class='tblrow' onclick='selectRow(event)'>
//                                <td>$row->ID</td>
//                                <td>$row->Name</td>
//                                <td>$row->Date</td>
//                                <td>$row->Line</td>
//                                <td>$row->current_completed_workload</td>
//                                <td>$row->required_workload</td>
//
//
//                            </tr>
//                        ";
//
//                }
//                echo "
//                        </tbody>
//                    </table>
//
//                    ";
//            }
//
//
//        }
//    }

    public function ongoingJobTable()
    {
//        echo("<script>console.log('PHP in index');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "ongoingJobTable") {

                $result = $this->supervisorModel->startedJobTable();
//                echo("<script>console.log('PHP in loadworkloadTable controller: " . json_encode($result) . "');</script>");

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
	

                        
                            <th scope=col>Job ID</th>
                            <th scope=col>status</th>           
                            <th scope=col>description</th>  
                            <th scope=col>order item ID</th>                   
                            <th scope=col>Type</th> 
                            <th scope=col>Item Info</th> 
                           
                        </tr>
                        </thead>
                        <tbody>

                ";

                foreach ($result as $row) {
                    echo "
                          <tr class='tblrow' onclick='selectRow(event)'>
                                <td>JOB$row->ID</td>
                                <td>$row->status</td>
                                <td>$row->description</td>
                                <td>OITM$row->odi</td>
                                <td>$row->type</td>
                                <td>$row->info</td>
                               
                              
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
        $total = $this->supervisorModel->totalItemQuntityForJob($ID);
        $current_complete =$this->supervisorModel->currentCompletedQuntityForJob($ID);

        $workloadEdit=[
            "jobID" =>$ID,
            "total" =>$total->quantity-$current_complete,
            "remaining" =>$total->quantity-$current_complete -$current_complete->currentComplete,
            "current" =>$current_complete->currentComplete,
        ];
        echo("<script>console.log('PHP in workloadEdit contoller: " . json_encode($workloadEdit) . "');</script>");
        $data = [
            'data'=>$workloadEdit,
            'TodayCompletedWorkloadError' => '',
        ];
        $this->view("supervisor/updateWorkloadForm",$data);
    }

    public function insertWorkload()
    {
//        {"jobID":"2","total":10011,"remaining":9717,"current":"294"}
        $ID= $this->input('hiddenID');


        $workloadData = [
             'jobID' => substr($this->input('jobID'),1),
             'total' => $this->input('total'),
             'remaining' => $this->input('remaining'),
             'current' => $this->input('current'),
             'today' => $this->input('today'),



        ];
        $data = [
            'data'=>$workloadData,
            'TodayCompletedWorkloadError' => '',
        ];

        echo("<script>console.log('PHP in insert workloadData  : " . json_encode($data) . "');</script>");





        if (empty($workloadData['today'])) {
            $data['TodayCompletedWorkloadError'] = "TodayCompletedWorkload is required";
        }
        if (intval($workloadData['today'])>intval($workloadData['total'])) {
            $data['TodayCompletedWorkloadError'] = "Today Completed Workload can't exceed Total quantity";
        }


        if (empty($data['TodayCompletedWorkloadError'])) {

            $Data=[intval($workloadData['jobID']),intval($workloadData['current']),intval($workloadData['total']),intval($workloadData['today'])];

            if ($this->supervisorModel->addDailyWorkLoad($Data)) {

                echo '
                      <script>
                                    if(!alert("workload added successfully")) {
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
            $this->view("supervisor/updateWorkloadForm", $data);

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