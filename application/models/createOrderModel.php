<?php


class createOrderModel extends database{

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
    public function isButtonInPredefine($tble,$data){


        if($this->Query("SELECT  * FROM $tble WHERE p_ID =$data")){
            return $this->fetch()->button_count;
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

        if($this->Query("SELECT ID FROM sales_manager WHERE login_ID =?",[$loginId])){
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

}