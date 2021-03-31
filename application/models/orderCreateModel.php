<?php


class orderCreateModel extends database{

    public function getPredefineItemType(){
        if($this->Query("SELECT DISTINCT type FROM predefine")){
            return $this->fetchall();
        }
    }

    public function getCollarSize($type){
        if($this->Query("SELECT DISTINCT size FROM $type ")){
            return $this->fetchall();
        }

    }
    public function getPredifineCard($type){

        if($this->Query("SELECT  * FROM predefine where type=? ",[$type])){
            return $this->fetchall();
        }
    }
    public function loadDesignTemplateData($type){
        if($this->Query("SELECT * FROM predefine WHERE type = ?",[$type])) {
            return $this->fetchall();
        }

        return -1;
    }
    public function isButtonInPredefine($tble,$data){


        if($this->Query("SELECT  * FROM $tble WHERE p_ID =$data")){
            return $this->fetch()->button_quantity;
        }
    }

    public function getFabricDetails(){
        if($this->Query("SELECT * FROM predefine_fabric ")){

            return $this->fetchall();
        }
    }
    public function getButtonDetails(){
        if($this->Query("SELECT * FROM predefine_button ")){

            return $this->fetchall();
        }
    }
    public function getCustomerDetails(){
        if($this->Query("SELECT * FROM customer ")){

            return $this->fetchall();
        }
    }

    public function OrderAdd($orderArray){

//        order_ID
//        order_description
//        order_status
//        order_due_date
//        estimate_time
//        order_price
//        advance_price
//        sales_manager_ID
//        customer_ID


        if($this->Query("INSERT INTO orders  ( order_description, order_status, order_due_date, estimate_time, order_price, advance_price, sales_manager_ID, customer_ID) VALUES (?,?,?,?,?,?,?,?)",$orderArray)){
            return intval($this->getCurrentLoginID());
        }else{
            return false;
        }
    }


    // ["M","1","1","123","0","1"]
    //order_item_ID
    //fabric_ID
    //button_ID
    //nool_ID
    //quantity
    //order_ID
    //p_ID

    public function orderItemAdd($orderItemArray){
        if($this->Query("INSERT INTO order_item ( size,fabric_ID,button_ID , quantity, order_ID, p_ID) VALUES (?,?,?,?,?,?)",$orderItemArray)){
            return true;
        }else{
            return false;
        }
    }

    public function getCurrentLoginID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }
    public function getSalesManagerId($loginId){

        if($this->Query("SELECT sales_manager.ID FROM `sales_manager` JOIN per_role_login ON sales_manager.per_role_login_ID=per_role_login.ID WHERE per_role_login.login_ID=?",[$loginId])){
            return $this->fetch()->ID;
        }
    }

    public  function addCustomer($customer){
        if($this->Query("INSERT INTO customer (	name ,contact_no,email,address) VALUES (?,?,?,?)",$customer)){
            return intval($this->getCurrentLoginID());
        }else{
            return false;
        }
    }

    public function getFabricUnitPrice($fId){
        if($this->Query("SELECT * FROM predefine_fabric WHERE ID =? ",[$fId])){
            return $this->fetch()->price;
        }else{
            return -1;
        }
    }
    public function getButtonUnitPrice($bId){
        if($this->Query("SELECT * FROM predefine_button WHERE ID =? ",[$bId])){
            return $this->fetch()->price;
        }else{
            return -1;

        }
    }

    public function getNoolUnitPrice($fId){
        if($this->Query("SELECT * FROM predefine_nool WHERE fID =? ",[$fId])){
            return $this->fetch()->price;
        }else{
            return -1;
        }
    }

//    public function predefineRawMaterialsQuantity($predefineType,$pID,$maxsize){
//        if($this->Query("SELECT * FROM shirt  WHERE p_ID=? AND size=? ",[$pID,$maxsize])){
//            return $this->fetch();
//        }else{
//            return -1;
//        }
//    }
    public function predefineRawMaterialsQuantity($predefineType,$pID,$maxsize){

//        echo("<script>console.log('in model 1: " . json_encode($predefineType) . "');</script>");
//        echo("<script>console.log('in model 2: " . json_encode($pID) . "');</script>");
//        echo("<script>console.log('in model 3: " . json_encode($maxsize) . "');</script>");

        if($predefineType=="shirt"){
            if($this->Query("SELECT * FROM shirt  WHERE p_ID=? AND size=?",[$pID,$maxsize])){
                $arr =$this->fetch();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($arr) . "');</script>");
                return $arr;
            }else{
                return -1;
            }
        }else{
            if($this->Query("SELECT * FROM t_shirt   WHERE p_ID=? AND size=?",[$pID,$maxsize])){
                $arr =$this->fetch();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($arr) . "');</script>");
                return $arr;
            }else{
                return -1;
            }
        }


    }

    public function getPredifineDetails($pID){
        if($this->Query("SELECT * FROM predefine WHERE p_ID=? ",[$pID])){

            return $this->fetch();
        }else{
            return -1;
        }
    }

    public function getreceiverRole($loginid){
//        echo("<script>console.log(' model called: " . json_encode($loginid) . "');</script>");


        if($this->Query("SELECT title FROM user_role JOIN per_role_login ON per_role_login.role_ID=user_role.role_ID WHERE per_role_login.ID=?", [$loginid]) ){
            $result =$this->fetch()->title;
//            echo("<script>console.log('PHP in getreceiverRole model: " . json_encode($result) . "');</script>");
            return $result;
        }

    }

    public function getNotificationRecord($receiver_role){
        if($this->Query("SELECT read_ids FROM notification WHERE status=1 AND reciver_role=?",[$receiver_role]) ){
            return $this->fetchall();
        }

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
    public function getOneCustomer($ID){
        if($this->Query("SELECT * FROM customer WHERE customer_ID =?",[$ID])){

            return $this->fetch();
        }
    }















}