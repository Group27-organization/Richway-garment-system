<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

class manageJobModel extends database {


    public function loadOrdTable(){



        if($this->Query("SELECT order_item_ID, quantity, order_item.order_ID, order_description, p_ID, order_due_date FROM orders INNER JOIN order_item ON orders.order_ID = order_item.order_ID WHERE order_item.status = 'pending' ORDER BY order_due_date DESC LIMIT 6")){

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


