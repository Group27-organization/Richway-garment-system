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

        if($this->Query("SELECT rate_per_hour_from_line FROM predefined WHERE predefined.p_ID = $pid")){

            if($this->rowCount() > 0 ){

                $data = $this->fetch();

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return $data->rate_per_hour_from_line;

            }

        }


        return 0;
    }

    public function getSortedAvailableLinesArr(){

        if($this->Query("SELECT line_ID FROM line")){

            if($this->rowCount() > 0 ){

                $sortedAvailableLinesArray = [];
                $lineIds = $this->fetchall();

                foreach ($lineIds as $lid){
                    if($this->Query("CALL getSortedAvailableLinesSet(?, @p1)",[$lid->line_ID])){

                        if($this->Query("SELECT @p0 AS lineID, @p1 AS end_date")) {

                            if ($this->rowCount() > 0) {

                                $data = $this->fetch();

                                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                                $sortedAvailableLinesArray[$data->lineID] = strtotime($data->end_date);

                            }
                        }

                    }
                }

                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return asort($sortedAvailableLinesArray);

            }

        }


        return 0;
    }

    public function getWorkingDayData($day){
        if($this->Query("SELECT * FROM working_day where working_day.day = $day")){
            if($this->rowCount() > 0 ){
                // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");
                return $this->fetch();
            }
        }
        return 0;
    }



}


