<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

class manageJobController extends framework {

    /**
     * @var mixed
     */
    private $manageJobModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }

       $this->helper("link");
       $this->manageJobModel = $this->model('manageJobModel');
    }


    public function index(){
        $this->view("admin/createJob");
    }


//    public function setNewSession(){
//        if(isset($_POST['key'])) {
//            if ($_POST['key'] == "manageUserData") {
//                $this->setSession("selected_role", $_POST['role']);
//                return "Successfully set the session.";
//            }
//        }
//        return "error";
//    }

    public function setItemIDSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageJobData") {
                $this->setSession("selected_order_item", $_POST['itemID']);
                $this->setSession("jsonData", $_POST['jsondata']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function setLineDataSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageJobData") {
                $this->setSession("line_data_json", $_POST['lineDataJson']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadOrderTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadOrdTable();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Order Item ID</th>
                            <th scope=col>Quantity</th>
                            <th scope=col>Order ID</th>
                            <th scope=col>Order Description</th>
                            <th scope=col>Predefined ID</th>
                            <th scope=col>Order Due Date</th>
                            <th scope=col>Due Date Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>OITM$row->order_item_ID</td>
                                <td>$row->quantity</td>
                                <td>ORD$row->order_ID</td>
                                <td>$row->description</td>
                                <td>$row->p_ID</td>
                                <td>$row->order_due_date</td>                           
                                <td>$row->due_date_status</td>                           
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function loadOngoingJobTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadOngoingJobTableModel();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Job ID</th>
                            <th scope=col>Order Item ID</th>
                            <th scope=col>Predefined ID</th>
                            <th scope=col>Total Quantity</th>
                            <th scope=col>Remaining Quantity</th>
                            <th scope=col>Lines Count</th>
                            <th scope=col>Job Due Date</th> 
                            <th scope=col>Status</th>
                            <th scope=col></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){
                    foreach($result['data'] as $row){
                        $remain = $row->pm_ID;
                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>JID$row->job_ID</td>
                                <td>OITM$row->order_item_ID</td>
                                <td>PID$row->p_ID</td>
                                <td>$row->quantity</td>
                                <td style='color: #f5365c'>$remain</td>
                                <td>$row->linesCount</td>
                                <td>$row->end_date_and_time</td>     
                                <td>$row->status</td>                      
                                <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #11cdef'> View </a>
                                </th>                         
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function loadCompleteJobTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadCompleteJobTableModel();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Job ID</th>
                            <th scope=col>Order Item ID</th>
                            <th scope=col>Predefined ID</th>
                            <th scope=col>Quantity</th>
                            <th scope=col>Description</th>
                            <th scope=col>Job Complete Date</th> 
                            <th scope=col></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                               <td>JID$row->job_ID</td>
                                <td>OITM$row->order_item_ID</td>
                                <td>PID$row->p_ID</td>
                                <td>$row->quantity</td>
                                <td>$row->description</td>
                                <td>$row->end_date_and_time</td>                           
                                <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #11cdef'> View </a>
                                </th>                       
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function loadCompleteOrderTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadCompleteOrderTableModel();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Order ID</th>
                            <th scope=col>Order Description</th>
                            <th scope=col>Complete Date</th>
                            <th scope=col>Customer ID</th>
                            <th scope=col></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                               <td>ORD$row->order_ID</td>
                                <td>$row->order_description</td>
                                <td>$row->order_due_date</td>
                                <td>$row->customer_ID</td>
                                <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #11cdef'> View </a>
                                </th>                       
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function createJobView(){
        $this->view("admin/createJob");
    }

    public function creatJobFormView(){

        $data['itemID'] = $this->getSession('selected_order_item');

        $this->view("admin/createJobForm",$data);
    }


    public function createJobMethod(){

        $isError = false;

        $desc = $this->input('description');
        $itemID = $this->getSession('selected_order_item');

        $lineData = $this->getSession('line_data_json');

        $logid = $this->getSession('userId')['user_id'];

        $data = [
            'logID' => $logid,
            'itemID' => preg_replace('/\D/', '', $itemID),
            'desc' => $desc,
            'lineData' => $lineData
        ];


        if(!$isError){

            $result = $this->manageJobModel->createJobModel($data);

            if($result['status']){

                $msg = "Job is Successfully Created.";

                echo "
                    <div id=\"alert_msg\" style=\"display: none\">$msg</div>
                    <script>
                        const msg = document.getElementById('alert_msg').innerText;
                        if(!alert(msg)) {
                            window.location.href = \"http://localhost/Richway-garment-system/manageJobController/index\"
                        }
                    </script>
                ";

            }
            else{
                echo '
            <script>
                if(!alert("Something went wrong. Please try again!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageJobController/createJobView"
                }
            </script>
            ';

            }

        }else{
            echo '
            <script>
                if(!alert("Required data are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageJobController/createJobView"
                }
            </script>
            ';
        }


    }

    public function loadLinesTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $data = $this->getSession('jsonData');

                $resultArr = $this->loadLinesJobData($data);

                $result = $this->manageJobModel->loadLinesTableModel();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Line ID</th>
                            <th scope=col>Available On</th>
                            <th scope=col>Running Jobs Count</th>
                            <th scope=col>Select</th>
                            <th scope=col>New Job End Date</th>
                        </tr>
                        </thead>
                        <tbody >
                        
                ";

                if($result['status'] === 'ok'){

                    $lineDateArr = [];
                   if(empty($data["cus_date"])) {
                       foreach ($resultArr[0] as $lid){
                           array_push($lineDateArr, $resultArr[1]);
                       }
                   }else{
                       $lineDateArr = $resultArr[1];
                   }
                   $lineData = json_encode($resultArr);
                   echo "<div id='lineData' style='display: none'>$lineData</div>";

                    foreach($result['data'] as $row){


                        $lindID = $row->line_ID == null ? $row['line_ID'] : $row->line_ID;
                        $avilableOn = $row->avilableOn == null ? $row['avilableOn'] : $row->avilableOn;
                        $jobCount = $row->jobCount == null ? $row['jobCount'] : $row->jobCount;

                        $key = array_search($lindID, $resultArr[0]);
                        $endDate = "";
                        if(in_array($lindID, $resultArr[0])){
                            $endDate = $lineDateArr[$key];
                            $check = 'checked';
                        }else{
                            $check = '';
                        }

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                               <td>LID$lindID</td>
                                <td>$avilableOn</td>
                                <td>$jobCount</td>                     
                                <th>
                                 <input type='checkbox' id='$lindID' name='$lindID' value='Select' $check>
                                </th>     
                                <td>$endDate</td>           
                            </tr>
                        ";
                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function loadSupervisorTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadSupervisorTableModel();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Supervisor ID</th>
                            <th scope=col>Employee ID</th>
                            <th scope=col>Assign Job Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                               <td>SUP$row->ID</td>
                                <td>EMP$row->emp_ID</td>
                                <td>$row->jobCount</td>                     
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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

    public function loadLinesJobData($data){

        $orderItemDetails = $data["orderItem"];
        $ttt = $this->calTTTForCreateJob($orderItemDetails);
        $returnData = $this->calculateNormalDueDate($ttt);
        $normalDueDate = date('Y-m-d H:i:s', $returnData[0] );


        $cus_date = $data["cus_date"];
        if(!empty($cus_date)){
            $final_cus_date = date("Y-m-d H:i:s", strtotime($cus_date));

            $data = $this->calculateCustomerDueDate($final_cus_date,0, $ttt);
           // echo "status: ".$data[2]." use line ids: ".json_encode($data[0])." use line final dates: ".json_encode($data[1]);
            return array($data[0],$data[1], $data[3], $data[1][0]);
        }
        else{
            //echo "Normal Due Date Is: ".$normalDueDate." Used Lines: ".json_encode($returnData[1]);
            return array($returnData[1],$normalDueDate, $returnData[2], $normalDueDate);
        }

    }

    public function calTTTForCreateJob($data){
        $ttt = 0.0;
        $lph =  $this->manageJobModel->getLPH($data['p_ID']);
        if($lph != 0)
            $ttt = ($data['quantity'] / $lph);

        $ttt = $ttt * 60.0; //add 30 minutes interval to start the next job
        return ceil($ttt);
    }

//{"order":[{"order_item_id":122,"quantity":5000,"p_ID":2},{"order_item_id":103,"quantity":2000,"p_ID":1}],"cus_date":"2021-04-25"}

    //Calculate Order Due Date Process
    public function calculateOrderDueDate(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageJobData") {
                $data = $_POST['data'];
                $orderDetails = $data["order"];
                $ttt = $this->calculateTotalTailoringTime($orderDetails);
                $returnData = $this->calculateNormalDueDate($ttt);
                $normalDueDate = date('Y-m-d H:i:s', $returnData[0] );


                $cus_date = $data["cus_date"];
                if(!empty($cus_date)){
                    //make final customer due date
                    $cus_date_Day = date('D', strtotime($cus_date));
                    $workingDayData = $this->manageJobModel->getWorkingDayData($cus_date_Day);
                    $cus_time = $workingDayData->round1_end;
                    $final_cus_date = date("Y-m-d H:i:s", strtotime("$cus_date $cus_time"));

                    $data = $this->calculateCustomerDueDate($final_cus_date,0, $ttt);
                    echo "status: ".$data[2]." use line ids: ".json_encode($data[0])." use line final dates: ".json_encode($data[1]);
                }
                else{
                    echo "Normal Due Date Is: ".$normalDueDate." Used Lines: ".json_encode($returnData[1]);
                }
            }
        }
    }

    public function calculateTotalTailoringTime($data){
        echo json_encode($data);
        $ttt = 0.0;
        foreach ($data as $item ){
            $lph =  $this->manageJobModel->getLPH($item['p_ID']);
            if($lph == 0) continue;
            $ttt += ($item['quantity'] / $lph);
        }
        $ttt = $ttt * 60.0; //add 30 minutes interval to start the next job
        return ceil($ttt);
    }


    public function calculateNormalDueDate($ttt){
        $sortedLinesArr = $this->sortAvailableLines();
        $arrKeys = array_keys($sortedLinesArr);
        $normalDueDate = $sortedLinesArr[$arrKeys[0]];
        $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);

        $orderStartDate = $this->getOrderStartDate($normalDueDate);
        $startDateORI = $orderStartDate;
        $useLineIDs = [];
        $line1FinalizeDate = $this->getFinishedDatetimeFromLine($orderStartDate,$ttt+30);
        array_push($useLineIDs,$arrKeys[0]);
        //code use line 2 to 8
        $preFinalizeDate = $line1FinalizeDate;
        $key = 1;
        if ($preFinalizeDate > $sortedLinesArr[$arrKeys[$key]]){
            $data = $this->recurDueDateCal($key, $arrKeys, $sortedLinesArr, $ttt, 0);
            for ($x = 1; $x < $data[1]; $x++) {
                array_push($useLineIDs,$arrKeys[$x]);
            }
            $preFinalizeDate = $data[0];
        }


        return array($preFinalizeDate,$useLineIDs,$startDateORI);
    }


    public function calculateCustomerDueDate($final_cus_date,$stdLines,$ttt){
        if($stdLines == 0){
            $sortedLinesArr = $this->sortAvailableLines();
            $status = "normal";
        }else{
            $sortedLinesArr = $this->sortAvailableExtraLines();
            $status = "Extra Lines";
        }
        $arrKeys = array_keys($sortedLinesArr);
        $normalDueDate = $sortedLinesArr[$arrKeys[0]];
        $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);

        $orderStartDate = $this->getOrderStartDate($normalDueDate);
        $startDateORI = $orderStartDate;

        $TP = $this->getFinishedTTT($orderStartDate, strtotime($final_cus_date));
        $key = 1;
        $lastLineTTT = 0;
        static $cus_date_lineIDs = [];
        static $cus_date_line_final_dates = [];
        $inLimit = true;
        while($ttt > $TP){
            array_push($cus_date_lineIDs, $arrKeys[$key-1]);
            array_push($cus_date_line_final_dates, $final_cus_date);
            if($key > sizeof($arrKeys)-1) {
                $inLimit = false;
                $ttt = $ttt - $TP;
                break;
            }
            $normalDueDate = $sortedLinesArr[$arrKeys[$key]];
            $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);
            $orderStartDate = $this->getOrderStartDate($normalDueDate);
            $lastLineTTT = $this->getFinishedTTT($orderStartDate, strtotime($final_cus_date));
            $TP += $lastLineTTT;
            ++$key;
        }
        if($inLimit){
            $ttt = $ttt - ($TP - $lastLineTTT);
            --$key;
            $normalDueDate = $sortedLinesArr[$arrKeys[$key]];
            $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);
            $orderStartDate = $this->getOrderStartDate($normalDueDate);
            $lastLineFinalDate = $this->getFinishedDatetimeFromLine($orderStartDate, $ttt);
            $lastLineFinalDate = date('Y-m-d H:i:s',$lastLineFinalDate);
            array_push($cus_date_lineIDs, $arrKeys[$key]);
            array_push($cus_date_line_final_dates, $lastLineFinalDate);
            return array($cus_date_lineIDs, $cus_date_line_final_dates, $status, $startDateORI);
        }else{
            if($stdLines == 1) {
                $status = "Optimize";
                return array(-1,-1,$status);
            }
            return $this->calculateCustomerDueDate($final_cus_date, 1, $ttt);
        }

    }

    private function recurDueDateCal($key, $arrKeys, $sortedLinesArr, $ttt, $remainMins){
        $preLineAvilDate = $sortedLinesArr[$arrKeys[$key-1]];
        $nextLineAvilDate = $sortedLinesArr[$arrKeys[$key]];
        $preLineAvilDate = date('Y-m-d H:i:s',$preLineAvilDate);
        $nextLineAvilDate = date('Y-m-d H:i:s',$nextLineAvilDate);

        //already available line but add 2 days to settle the order stock
        $preLineAvilDate = $this->getOrderStartDate($preLineAvilDate);
        $nextLineAvilDate = $this->getOrderStartDate($nextLineAvilDate);

        $preLineStartDate = $this->getFinishedDatetimeFromLine($preLineAvilDate,30);
        $nextLineStartDate = $this->getFinishedDatetimeFromLine($nextLineAvilDate,30);
        $preLineStartDate = date('Y-m-d H:i:s',$preLineStartDate);
        $mins = $this->getFinishedTTT($preLineStartDate, $nextLineStartDate);
        $mins = $mins * $key;
        $tttVar = $ttt - ($mins + $remainMins);
        $tttVar = intval(ceil( ( $tttVar/($key+1) ) ));
        $nextLineStartDate = date('Y-m-d H:i:s',$nextLineStartDate);
        $preFinalizeDate = $this->getFinishedDatetimeFromLine($nextLineStartDate, $tttVar);
        if($key < sizeof($arrKeys)-1 && $preFinalizeDate > $sortedLinesArr[$arrKeys[$key+1]]){
            //recursion
            return $this->recurDueDateCal($key+1, $arrKeys, $sortedLinesArr, $ttt, $mins);
        }else{
            return array($preFinalizeDate,$key+1);
        }

    }

    private function getOrderStartDate($datetime){

        $d = new DateTime('now');
        $d->setTimezone(new DateTimeZone("Asia/Colombo"));
        $today = $d->format('Y-m-d H:i:s');

//        echo "#### ".$datetime." / ".$today." / ".date("a",strtotime($datetime) - strtotime($today))." ####";
        if(strtotime($datetime) > strtotime("+2 days".$today)){
            $orderStartDate = $datetime;
        }
        else if(strtotime($today) - strtotime($datetime) > 0 ){
            $orderStartDate = $this->getFinishedDatetimeFromLine($today, 960); // add 2 days from now in minutes
            $orderStartDate = date("Y-m-d H:i:s", $orderStartDate);
        }
        else{
            $orderStartDate = $this->getFinishedDatetimeFromLine($datetime, 960); // add 2 days to line available date in minutes
            $orderStartDate = date("Y-m-d H:i:s", $orderStartDate);
        }

        return $orderStartDate;

    }

    private function getFinishedTTT($start, $end){

        $startTime = date('H:i:s', strtotime($start));
        $startTime = strtotime($startTime);
        $startDay = date('D', strtotime($start));

        $workingDayData = $this->manageJobModel->getWorkingDayData($startDay);
        $round1Start = strtotime($workingDayData->round1_start);
        $round1End = strtotime($workingDayData->round1_end);
        $round2Start = strtotime($workingDayData->round2_start);
        $round2End = strtotime($workingDayData->round2_end);
        $round3Start = strtotime($workingDayData->round3_start);
        $round3End = strtotime($workingDayData->round3_end);
        $round4Start = strtotime($workingDayData->round4_start);
        $round4End = strtotime($workingDayData->round4_end);


        $round = 1;
        //in round 1
        if($startTime - $round1Start >= 0 && $round1End - $startTime >= 0){
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime >= 0){
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime >= 0){
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime >= 0){
            $round = 4;
        }

        $actualDatetime = strtotime($start);
        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        $minutes = 0;
        while ($end - $actualDatetime > 0){
            $time = strtotime("+1 minutes",$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 2;
                    $min = ($round2Start - $round1End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 3;
                    $min = ($round3Start - $round2End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $min = ($round4Start - $round3End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    ++$minutes;
                }
                $round = 4;
            }
            else if($round == 4 && $time - $round4End > 0){

                $start = date('Y-m-d', strtotime("+1 days".$start));

                $startDay = date('D', strtotime($start));

                $workingDayData = $this->manageJobModel->getWorkingDayData($startDay);
                $round1Start = strtotime($workingDayData->round1_start);
                $round1End = strtotime($workingDayData->round1_end);
                $round2Start = strtotime($workingDayData->round2_start);
                $round2End = strtotime($workingDayData->round2_end);
                $round3Start = strtotime($workingDayData->round3_start);
                $round3End = strtotime($workingDayData->round3_end);
                $round4Start = strtotime($workingDayData->round4_start);
                $round4End = strtotime($workingDayData->round4_end);


                if($round1Start == $zeroTime){
                    $round = 4;
                }else{
                    $round = 1;
                    ++$minutes;
                }
                $time = strtotime("+1 minutes", $round1Start);

            }else{
                ++$minutes;
            }

            $time = date('H:i:s', $time);
            $start = date('Y-m-d', strtotime($start));
            $actualDatetime = strtotime(date('Y-m-d H:i:s', strtotime("$start $time")));
            $time = strtotime($time);

        }

        return $minutes;

    }

    private function getFinishedDatetimeFromLine($datetime, $tttTime){
        $startTime = date('H:i:s', strtotime($datetime));
        $startTime = strtotime($startTime);
        $startDay = date('D', strtotime($datetime));

        $workingDayData = $this->manageJobModel->getWorkingDayData($startDay);
        $round1Start = strtotime($workingDayData->round1_start);
        $round1End = strtotime($workingDayData->round1_end);
        $round2Start = strtotime($workingDayData->round2_start);
        $round2End = strtotime($workingDayData->round2_end);
        $round3Start = strtotime($workingDayData->round3_start);
        $round3End = strtotime($workingDayData->round3_end);
        $round4Start = strtotime($workingDayData->round4_start);
        $round4End = strtotime($workingDayData->round4_end);


        $round = 1;
        //in round 1
        if($startTime - $round1Start >= 0 && $round1End - $startTime >= 0){
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime >=0){
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime >= 0){
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime >= 0){
            $round = 4;
        }

        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        while ($tttTime > 0){
            $time = strtotime("+1 minutes",$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 2;
                    $min = ($round2Start - $round1End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 3;
                    $min = ($round3Start - $round2End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $min = ($round4Start - $round3End)/60;
                    $time = strtotime("+{$min} minutes",$time);
                    --$tttTime;
                }
                $round = 4;
            }
            else if($round == 4 && $time - $round4End > 0){
                $datetime = date('Y-m-d', strtotime("+1 days".$datetime));
                $startDay = date('D', strtotime($datetime));

                $workingDayData = $this->manageJobModel->getWorkingDayData($startDay);
                $round1Start = strtotime($workingDayData->round1_start);
                $round1End = strtotime($workingDayData->round1_end);
                $round2Start = strtotime($workingDayData->round2_start);
                $round2End = strtotime($workingDayData->round2_end);
                $round3Start = strtotime($workingDayData->round3_start);
                $round3End = strtotime($workingDayData->round3_end);
                $round4Start = strtotime($workingDayData->round4_start);
                $round4End = strtotime($workingDayData->round4_end);


                if($round1Start == $zeroTime){
                    $round = 4;
                }else{
                    $round = 1;
                    --$tttTime;
                }
                $time = strtotime("+1 minutes", $round1Start);
            }
            else{
                --$tttTime;
            }
        }

        $time = date('H:i:s', $time);
        $date = date('Y-m-d', strtotime($datetime));
        return strtotime(date('Y-m-d H:i:s', strtotime("$date $time")));

    }

    //scheduling earliest available lines
    public function sortAvailableLines(){
        return $this->manageJobModel->getSortedAvailableLinesArr();
    }

    //scheduling earliest available extra lines
    public function sortAvailableExtraLines(){
        return $this->manageJobModel->getSortedAvailableExtraLinesArr();
    }

    //job-shop scheduling (use earliest available lines)
    public function useStandByLines(){
        $this->calculateNormalDueDate();
        return 0;
    }

    public function optimize(){
        return 0;
    }

    //remove available lines hours
    public function getRemainingHoursOfNewOrd(){
        return 0;
    }
}
