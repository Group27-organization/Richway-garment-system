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




//[{"order_item_id":122,"quantity":5000,"p_ID":2},{"order_item_id":103,"quantity":2000,"p_ID":1}]

    //Calculate Order Due Date Process
    public function calculateOrderDueDate(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageJobData") {
                $data = $_POST['data'];
                $ttt = $this->calculateTotalTailoringTime($data);
                $returnData = $this->calculateNormalDueDate($ttt);
                $normalDueDate = date('Y-m-d H:i:s', $returnData[0] );
               // echo "Normal Due Date Is: ".$ttt." - ".$normalDueDate." ".json_encode($returnData[1]);
                //echo json_encode($data);
            }
        }
    }

    public function calculateTotalTailoringTime($data){
        $ttt = 0;
        foreach ($data as $item ){
            $lph =  $this->manageJobModel->getLPH($item['p_ID']);
            if($lph == 0) continue;
            $ttt += ($item['quantity'] / $lph);
        }
        $ttt = ($ttt * 60) + (30 * sizeof($data)); //add 30 minutes interval to start the next job
        return intval(ceil($ttt));
    }


    public function calculateNormalDueDate($ttt){
        $sortedLinesArr = $this->sortAvailableLines();
        $arrKeys = array_keys($sortedLinesArr);
        $normalDueDate = $sortedLinesArr[$arrKeys[0]];
        $normalDueDate = date('Y-m-d H:i:s',$normalDueDate);


        $useLineIDs = [];
        $line1FinalizeDate = $this->getFinishedDatetimeFromLine($normalDueDate,$ttt);
        echo date('Y-m-d H:i:s', $line1FinalizeDate);
        return;
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

    private function recurDueDateCal($key, $arrKeys, $sortedLinesArr, $ttt, $remainMins){
        $preLineAvilDate = $sortedLinesArr[$arrKeys[$key-1]];
        $nextLineAvilDate = $sortedLinesArr[$arrKeys[$key]];
        $nextLineStartDate = $this->getFinishedDatetimeFromLine($nextLineAvilDate,30);
        $mins = $this->getFinishedTTT($preLineAvilDate, $nextLineStartDate);
        $mins = $mins * $key;
        $mins -= 30;
        $tttVar = $ttt - ($mins + $remainMins);
        $tttVar = ceil($tttVar/$key+1);
        $preFinalizeDate = $this->getFinishedDatetimeFromLine($nextLineStartDate, $tttVar);

        if($preFinalizeDate > $sortedLinesArr[$arrKeys[$key+1]]){
            //recursion
            $this->recurDueDateCal($key+1, $arrKeys, $sortedLinesArr, $ttt, $mins);
        }else{
            return array($preFinalizeDate,$key);
        }

        return 0;

    }

    private function minutes($time){
        $time = explode(':', $time);
        return ($time[0]*60) + ($time[1]) + ($time[2]/60);
    }

    private function getFinishedTTT($start, $end){

        $startTime = date('H:i:s', $start);
        $startTime = strtotime($startTime);
        $startDay = date('D', $start);

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

        $actualDatetime = $start;
        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        $minutes = 0;
        while ($end - $actualDatetime > 0){
            $time = strtotime("+1 minutes".$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes".$time);
                }else{
                    $round = 2;
                    $min = $this->minutes( date('H:i:s', $round2Start - $round1End) );
                    $time = strtotime("+{$min} minutes".$time);
                    $minutes++;
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes".$time);
                }else{
                    $round = 3;
                    $min = $this->minutes( date('H:i:s', $round3Start - $round2End) );
                    $time = strtotime("+{$min} minutes".$time);
                    $minutes++;
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes".$time);
                }else{
                    $min = $this->minutes( date('H:i:s', $round4Start - $round3End) );
                    $time = strtotime("+{$min} minutes".$time);
                    $minutes++;
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
                    $minutes++;
                }
                $time = strtotime("+1 minutes". $round1Start);

            }

            $actualDatetime = strtotime(date('Y-m-d H:i:s', strtotime("$start $time")));


        }

        return $minutes;

    }

    private function getFinishedDatetimeFromLine($datetime, $tttTime){
        echo $tttTime." ";
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
        $date = $datetime;
        return strtotime(date('Y-m-d H:i:s', strtotime("$date $time")));

    }

    //job-shop scheduling (use earliest available lines)
    public function sortAvailableLines(){
        return $this->manageJobModel->getSortedAvailableLinesArr();
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
