<?php


class createOrderModel extends database{

    public function getPredefineItemType(){
        if($this->Query("SELECT DISTINCT type FROM predefine")){
            return $this->fetchall();
        }
    }
//    public function getHandType($type){
//        if($this->Query("SELECT DISTINCT hand_type FROM predefine WHERE type = ?",[$type])){
//            return $this->fetchall();
//        }
//    }
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

    public function getCustomerDetails(){
        if($this->Query("SELECT * FROM customer ")){

            return $this->fetchall();
        }
    }

    public function OrderAdd($orderArray){
        // order_ID             auto
        // order_name           0
        // order_status         1
        // order_description    2
        // order_due_date       3
        // estimate_time        4
        // order_price          5
        // advance_price        6
        // supervisor_ID        7
        // customer_ID          8

        if($this->Query("INSERT INTO orders  ( order_name, order_status, order_description, order_due_date, estimate_time, order_price, advance_price, sales_manager_ID, customer_ID) VALUES (?,?,?,?,?,?,?,?,?)",$orderArray)){
            return intval($this->getCurrentLoginID());
        }else{
            return false;
        }
    }


    public function orderItemAdd($orderItemArray){
        if($this->Query("INSERT INTO order_item ( material, material_design,material_design_image, material_design_code, material_color, button_shape, button_color, nool_color, quantity, order_ID, p_ID) VALUES (?,?,?,?,?,?,?,?,?,?,?)",$orderItemArray)){
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
    public  function selectPredefineIDFOrOrderItem($shirtType,$handType,$size){
    //  SELECT predefine.p_ID FROM predefine INNER JOIN shirt ON predefine.p_ID = shirt.p_ID WHERE predefine.type ='shirt' AND predefine.hand_type='long sleevs' AND shirt.size='M'
        if($this->Query("SELECT predefine.p_ID 
                                FROM predefine 
                                INNER JOIN $shirtType 
                                ON predefine.p_ID = $shirtType.p_ID 
                                WHERE predefine.type =$shirtType 
                                AND predefine.hand_type=$handType 
                                AND $shirtType.size=$size
        ")){
            return intval($this->getCurrentLoginID());
        }else{
            return false;
        }
    }
}