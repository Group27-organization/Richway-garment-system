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


    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageUserData") {
                $this->setSession("selected_role", $_POST['role']);
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


        return array($preFinalizeDate,$useLineIDs);
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
            return array($cus_date_lineIDs, $cus_date_line_final_dates, $status);
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
