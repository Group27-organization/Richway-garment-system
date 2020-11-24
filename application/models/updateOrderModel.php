<?php


class updateOrderModel extends database
{

    public function loadOrderTable(){
        if($this->Query("SELECT * FROM orders ")){

            return $this->fetchall();
        }
    }




}