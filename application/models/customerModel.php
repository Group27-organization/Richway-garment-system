<?php

class customerModel extends database {

	

   
    public function updateCustomer($id){
	    if($this->Query("SELECT * FROM customer WHERE customer_ID=?",[$id])){
	        $row=$this->fetch();
	        return $row;
        }
    }

   public function editCustomer($updateData){
    if($this->Query("UPDATE customer SET name = ?, address = ?,contact_no = ? , Gender=?, email=? WHERE customer_ID = ?",$updateData)){
        return true;
    }

   }


}
?>



   

   

   




