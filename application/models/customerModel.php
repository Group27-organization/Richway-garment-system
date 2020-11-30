<?php

class customerModel extends database {


   
    public function updateCustomer($id){
	    if($this->Query("SELECT * FROM customer WHERE customer_ID=?",[$id])){
	        $row=$this->fetch();
	        return $row;
        }
    }

   public function editCustomer($Data){
       $updatecustomerData=[
           $Data['FullName'],
           $Data['Address'],
           $Data['contact_no'],
           $Data['Gender'],
           $Data['email'],
           $Data['hiddenID'],

       ];
    if($this->Query("UPDATE customer SET name = ?, address = ?,contact_no = ? , Gender=?, email=? WHERE customer_ID = ?",$updatecustomerData)){
        return true;
    }

   }


}
?>



   

   

   




