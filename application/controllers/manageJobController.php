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


//  {
//      {
//            order_id: 122,
//            quantity: 5000,
//            p_ID: 2,
//      }
//      {
//            order_id: 103,
//            quantity: 2000,
//            p_ID: 1,
//      }
//  }

    //Calculate Order Due Date Process
    public function calculateOrderDueDate($data){
        $ttt = $this->calculateTotalTailoringTime($data);
        $this->calculateNormalDueDate($ttt);
        return 0;
    }

    public function calculateTotalTailoringTime($data){
        $ttt = 0;
        foreach ($data as $item ){
            $lph =  $this->manageJobModel->getLPH($item['p_ID']);
            $ttt += $item['quantity'] / $lph;
        }
        return ceil($ttt);
    }


    public function calculateNormalDueDate($ttt){
        $sortedLinesArr = $this->sortAvailableLines();
        $normalDueDate = $sortedLinesArr[array_key_first($sortedLinesArr)];

        $startTime = date('H:i:s', $normalDueDate);
        $startTime = strtotime("+30 minutes",$startTime);
        $startDay = date('D', $normalDueDate);

        $workingDayData = $this->manageJobModel->getWorkingDayData($startDay);
        $round1Start = strtotime($workingDayData->round1_start);
        $round1End = strtotime($workingDayData->round1_end);
        $round2Start = strtotime($workingDayData->round2_start);
        $round2End = strtotime($workingDayData->round2_end);
        $round3Start = strtotime($workingDayData->round3_start);
        $round3End = strtotime($workingDayData->round3_end);
        $round4Start = strtotime($workingDayData->round4_start);
        $round4End = strtotime($workingDayData->round4_end);

        $tailoringDueDate = [];
        $remainTimeInStartDay = 0;
        $round = 1;
        //in round 1
        if($startTime - $round1Start >= 0 && $round1End - $startTime > 0){
            $remain = strtotime('05:30:00');
            $remainTimeInStartDay = ($round1End - $startTime) + $remain;
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime > 0){
            $remain = strtotime('03:15:00');
            $remainTimeInStartDay = ($round2End - $startTime) + $remain;
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime > 0){
            $remain = strtotime('01:15:00');
            $remainTimeInStartDay = ($round3End - $startTime) + $remain;
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime > 0){
            $remainTimeInStartDay = $round4End - $startTime;
            $round = 4;
        }

        $remainTimeInStartDay = date('H:i:s', $remainTimeInStartDay);
        if($ttt * 60 < $this->minutes($remainTimeInStartDay) ){
            $tttInMin = $ttt * 60;
            if($round == 1){

            }
            $date = strtotime("+{$tttInMin} minutes",$startTime);
        }
        //fill dates under ttt is over
        while ($ttt>0){
            //line 1
            $counterDueDate = date('Y-m-d', strtotime('+1 day', $normalDueDate ));
            $counterDay = date('D', strtotime('+1 day', $normalDueDate ));
            $counterDayData = $this->manageJobModel->getWorkingDayData($counterDay);


            //in round 1
            if($startTime - $round1Start >= 0 && $round1End - $startTime > 0){
                $remainTimeInStartDay = $round1End - $startTime;
            }
            //in round 2
            else if($startTime - $round2Start >= 0 && $round2End - $startTime > 0){
                $remainTimeInStartDay = $round2End - $startTime;
            }
            //in round 3
            else if($startTime - $round3Start >= 0 && $round3End - $startTime > 0){
                $remainTimeInStartDay = $round3End - $startTime;
            }
            //in round 4
            else if($startTime - $round4Start >= 0 && $round4End - $startTime > 0){
                $remainTimeInStartDay = $round4End - $startTime;
            }

        }


        return 0;
    }

    private function minutes($time){
        $time = explode(':', $time);
        return ($time[0]*60) + ($time[1]) + ($time[2]/60);
    }

    private function getNextOrderStartTime($datetime, $sumTime){


        $startTime = date('H:i:s', $datetime);
        $startTime = strtotime($startTime);
        $startDay = date('D', $datetime);

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
        if($startTime - $round1Start >= 0 && $round1End - $startTime > 0){
            $round = 1;
        }
        //in round 2
        else if($startTime - $round2Start >= 0 && $round2End - $startTime > 0){
            $round = 2;
        }
        //in round 3
        else if($startTime - $round3Start >= 0 && $round3End - $startTime > 0){
            $round = 3;
        }
        //in round 4
        else if($startTime - $round4Start >= 0 && $round4End - $startTime > 0){
            $round = 4;
        }


        $time = $startTime;
        $zeroTime = strtotime('00:00:00');
        while ($sumTime > 0){
            $time = strtotime("+1 minutes",$time);
            if($round == 1 && $time - $round1End > 0) {
                if($round2Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 2;
                    $min = $this->minutes( date('H:i:s', $round2Start - $round1End) );
                    $time = strtotime("+{$min} minutes",$time);
                }
            }
            else if($round == 2 && $time - $round2End > 0){
                if($round3Start == $zeroTime){
                    $round = 4;
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $round = 3;
                    $min = $this->minutes( date('H:i:s', $round3Start - $round2End) );
                    $time = strtotime("+{$min} minutes",$time);
                }
            }
            else if($round == 3 && $time - $round3End > 0){
                if($round4Start == $zeroTime){
                    $time = strtotime("-1 minutes",$time);
                }else{
                    $min = $this->minutes( date('H:i:s', $round4Start - $round3End) );
                    $time = strtotime("+{$min} minutes",$time);
                }
                $round = 4;
            }
            else if($round == 4 && $time - $round4End > 0){

                $datetime = date('Y-m-d', strtotime("+1 days",$datetime));

                $startDay = date('D', $datetime);

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
                }
                $time = strtotime("+1 minutes", $round1Start);

            }
            $sumTime--;
        }


        $time = date('H:i:s', strtotime($round1Start));
        $date = date('Y-m-d', strtotime($datetime));
        return date('Y-m-d H:i:s', strtotime("$date $time"));

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
