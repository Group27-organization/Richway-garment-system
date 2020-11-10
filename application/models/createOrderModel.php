<?php


class createOrderModel extends database{

    public function getPredefineItemType(){
        if($this->Query("SELECT DISTINCT type FROM predefine")){
            return $this->fetchall();
        }
    }
    public function getItemStyle($type){
        if($this->Query("SELECT DISTINCT hand_type FROM predefine WHERE type = ?",[$type])){
            return $this->fetchall();
        }
    }
    public function getCollarSize($type){
        if($this->Query("SELECT DISTINCT size FROM $type ")){
            return $this->fetchall();
        }

    }

    public function getCustomerDetails(){
        if($this->Query("SELECT * FROM customer ")){

            return $this->fetchall();
        }
    }

    public function OrderAdd($stockData){
        if($this->Query("INSERT INTO order (stock_ID, type, sk_id ) VALUES (?,?,?)",$stockData)){

            return true;
        }
    }


}