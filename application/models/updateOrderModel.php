<?php


class updateOrderModel extends database
{

    public function loadOrderTable($status1="pending",$status2="start"){
        if($this->Query("SELECT * FROM orders WHERE order_status=? OR order_status=?",[$status1,$status2])){

            return $this->fetchall();
        }
    }
    public function loadOrderItemTable($id){
        if($this->Query("SELECT * FROM order_item WHERE order_ID  =?",[$id])){

            return $this->fetchall();
        }
    }

    public function getCollarSize($type){
        if($this->Query("SELECT DISTINCT size FROM $type ")){
            return $this->fetchall();
        }

    }

    public function getOrderItemType($id,$status="pending"){
        if($this->Query("SELECT  size FROM order_item WHERE order_item_ID =? AND status=?",[$id,$status])){
            return $this->fetch()->size;
        }

    }
    public function getOrderDescription($id){
        if($this->Query("SELECT  order_description FROM orders WHERE order_ID  =?",[$id])){
            return $this->fetch()->order_description;
        }

    }

    public function setOrderDescription($description,$id){

        if($this->Query("UPDATE orders SET order_description = ? WHERE order_ID=?", [$description,$id])){
            return true;


        }

    }


    public function updateOrderItemSize($size,$id){

        if($this->Query("UPDATE order_item SET size = ? WHERE order_item_ID =?", [$size,$id])){
            return true;


        }

    }
}