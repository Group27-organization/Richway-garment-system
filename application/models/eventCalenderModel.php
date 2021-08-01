<?php

class eventCalenderModel extends database {


   
    public function loadOrderEvent(){
	    if($this->Query("SELECT order_description AS title,start_date AS start,order_due_date AS end,order_status AS color FROM orders WHERE order_status='starts'")){

	        return $this->fetchall();
        }
    }
    public function loadCount(){
        if($this->Query("SELECT order_ID  AS y , order_description AS label FROM orders WHERE order_ID=95")){

            return $this->fetchall();
        }

    }




}
?>



   

   

   




