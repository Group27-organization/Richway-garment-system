<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

class manageJobModel extends database {


    public function loadOrdTable(){



        if($this->Query("SELECT order_item_ID, quantity, order_item.order_ID, order_description, p_ID, order_due_date, due_date_status FROM orders INNER JOIN order_item ON orders.order_ID = order_item.order_ID WHERE order_item.status = 'pending' ORDER BY order_due_date DESC LIMIT 2")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

              // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function loadOngoingJobTableModel(){



        if($this->Query("SELECT assign.job_ID, job.status, p_ID, quantity, job.order_item_ID, count(assign.line_ID) as linesCount, end_date_and_time, pm_ID FROM assign INNER JOIN job ON assign.job_ID = job.job_ID INNER JOIN order_item ON order_item.order_item_ID = job.order_item_ID WHERE job.status = 'ongoing' GROUP BY assign.job_ID ORDER BY end_date_and_time DESC LIMIT 6")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                $finalData = [];
                $finalRow = [];
                foreach ($data as $row){
                    if($this->Query("SELECT  SUM(today_completed_workload) AS currentComplete FROM `workload` WHERE job_ID=? GROUP BY job_ID",[$row->job_ID])){

                        if($this->rowCount() > 0 ){

                            $data1 = $this->fetch();

                            $remain = intval($row->quantity) - intval($data1->currentComplete);

                            $row->pm_ID = $remain;
                        }
                    }
                }


                return ['status' => 'ok', 'data' => $data];
                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function loadCompleteJobTableModel(){



        if($this->Query("SELECT assign.job_ID, job.order_item_ID, p_ID, quantity, job.description, end_date_and_time FROM assign INNER JOIN job ON assign.job_ID = job.job_ID INNER JOIN order_item ON order_item.order_item_ID = job.order_item_ID WHERE job.status = 'complete' GROUP BY assign.job_ID ORDER BY end_date_and_time DESC LIMIT 6")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function loadCompleteOrderTableModel(){



        if($this->Query("SELECT order_ID, order_description, order_due_date, customer_ID FROM orders WHERE order_status = 'complete' LIMIT 6")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function loadSupervisorTableModel(){



        if($this->Query("SELECT supervisor.ID, supervisor.emp_ID, COUNT(job_id) as jobCount FROM supervisor_job RIGHT JOIN supervisor ON supervisor.ID = supervisor_job.sup_id GROUP by supervisor_job.sup_id")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function loadLinesTableModel(){



        if($this->Query("SELECT line.line_ID, COUNT(assign.job_ID) as jobCount, end_date_and_time as avilableOn FROM line INNER JOIN assign ON line.line_ID = assign.line_ID INNER JOIN job ON assign.job_ID = job.job_ID WHERE job.status = 'ongoing' GROUP BY assign.line_ID ORDER BY end_date_and_time DESC")){

            if($this->rowCount() > 0 ){

                $sortedAvailableLinesArray = [];
                $data = $this->fetchall();

                $d = new DateTime('now');
                $d->setTimezone(new DateTimeZone("Asia/Colombo"));
                $availableTime = $d->format('Y-m-d H:i:s');

                if($this->Query("SELECT DISTINCT line.line_ID FROM line WHERE line.line_ID NOT IN (SELECT DISTINCT assign.line_ID FROM assign)")) {

                    if ($this->rowCount() > 0) {

                        $sortedAvailableLine = [];
                        $notAssignIDs = $this->fetchall();
                        foreach ($notAssignIDs as $nalid){
                            $sortedAvailableLine['line_ID'] = $nalid->line_ID;
                            $sortedAvailableLine['avilableOn'] = $availableTime;
                            $sortedAvailableLine['jobCount'] = "0";
                            array_push($sortedAvailableLinesArray,$sortedAvailableLine);
                        }
                    }
                }

                foreach ($data as $row){
                    array_push($sortedAvailableLinesArray,$row);
                }

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $sortedAvailableLinesArray];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }

    public function createJobModel($data){

        $output['status'] = false;

        $logID = $data['logID'];

        $query = 'SELECT  production_manager.ID FROM production_manager JOIN per_role_login ON  production_manager.per_role_login_ID = per_role_login.ID WHERE per_role_login.role_ID = 4 AND per_role_login.login_ID=?';


        if($this->Query($query,[$logID])){

            if($this->rowCount() > 0){

                $pmID = $this->fetch()->ID;

                $data2  = [$data['desc'], $data['itemID'], $pmID];

                echo("<script>console.log('PHP: extra data " . json_encode($data) . "');</script>");


                if ($this->Query("INSERT INTO job (	description, order_item_ID, pm_ID) VALUES (?,?,?)", $data2)) {

                    $jobID = $this->getCurrentAIID();

                    echo("<script>console.log('PHP: extra data " . json_encode($data['lineData'][0]) . "');</script>");

                    $index = 0;
                    foreach ($data['lineData'][0] as $d){
                        $assignData = [$jobID, $d, $data['lineData'][2], $data['lineData'][1][$index]];
                        if ($this->Query("INSERT INTO assign (job_ID, line_ID, 	start_date_and_time, end_date_and_time) VALUES (?,?,?,?)", $assignData)) {
                        }
                        ++$index;
                    }

                    if($index > 0){
                        $output['status'] = true;
                    }

                }

            }
        }
//        echo("<script>console.log('PHP: extra data " . json_encode($role_login) . "');</script>");

        return $output;
    }

    public function getCurrentAIID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }

    public function getLPH($pid){
        if($this->Query("SELECT rate_per_hour_from_line FROM predefine WHERE predefine.p_ID = $pid")){

            if($this->rowCount() > 0 ){

                $data = $this->fetch();

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return $data->rate_per_hour_from_line;

            }

        }


        return 0;
    }

    public function getSortedAvailableLinesArr(){

        if($this->Query("SELECT DISTINCT(line.line_ID) as line_ID FROM line WHERE line.	standby_line = 0")){

            if($this->rowCount() > 0 ){

                $sortedAvailableLinesArray = [];
                $lineIds = $this->fetchall();

                $d = new DateTime('now');
                $d->setTimezone(new DateTimeZone("Asia/Colombo"));
                $availableTime = $d->format('Y-m-d H:i:s');

                if($this->Query("SELECT DISTINCT line.line_ID FROM line WHERE line.	standby_line = 0 && line.line_ID NOT IN (SELECT DISTINCT assign.line_ID FROM assign)")) {

                    if ($this->rowCount() > 0) {

                        $sortedAvailableLinesArray = [];
                        $notAssignIDs = $this->fetchall();
                        foreach ($notAssignIDs as $nalid){
                            $sortedAvailableLinesArray[$nalid->line_ID] = strtotime($availableTime);
                        }
                    }
                }

                foreach ($lineIds as $lid){
                    if($this->Query("CALL getSortedAvailableLinesSet($lid->line_ID,@p1)")){

                        if($this->Query("SELECT @p1 AS end_date")) {

                            if ($this->rowCount() > 0) {

                                $data = $this->fetch();
                                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                                $sortedAvailableLinesArray[$lid->line_ID] = strtotime($data->end_date);
                            }
                        }

                    }
                }
                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                asort($sortedAvailableLinesArray);
                return $sortedAvailableLinesArray;

            }

        }


        return 0;
    }


    public function getSortedAvailableExtraLinesArr(){

        if($this->Query("SELECT DISTINCT(line.line_ID) as line_ID FROM line WHERE line.	standby_line = 1")){

            if($this->rowCount() > 0 ){

                $sortedAvailableLinesArray = [];
                $lineIds = $this->fetchall();

                $d = new DateTime('now');
                $d->setTimezone(new DateTimeZone("Asia/Colombo"));
                $availableTime = $d->format('Y-m-d H:i:s');

                if($this->Query("SELECT DISTINCT line.line_ID FROM line WHERE line.	standby_line = 1 && line.line_ID NOT IN (SELECT DISTINCT assign.line_ID FROM assign)")) {

                    if ($this->rowCount() > 0) {

                        $sortedAvailableLinesArray = [];
                        $notAssignIDs = $this->fetchall();
                        foreach ($notAssignIDs as $nalid){
                            $sortedAvailableLinesArray[$nalid->line_ID] = strtotime($availableTime);
                        }
                    }
                }

                foreach ($lineIds as $lid){
                    if($this->Query("CALL getSortedAvailableLinesSet($lid->line_ID,@p1)")){

                        if($this->Query("SELECT @p1 AS end_date")) {

                            if ($this->rowCount() > 0) {

                                $data = $this->fetch();
                                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                                $sortedAvailableLinesArray[$lid->line_ID] = strtotime($data->end_date);
                            }
                        }

                    }
                }
                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                asort($sortedAvailableLinesArray);
                return $sortedAvailableLinesArray;

            }

        }


        return 0;
    }

    public function getWorkingDayData($day){
        $day = strtolower($day);
        if($this->Query("SELECT * FROM working_day where working_day.day = ?",[$day])){
            if($this->rowCount() > 0 ){
                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                return $this->fetch();
            }
        }
        return 0;
    }



}


