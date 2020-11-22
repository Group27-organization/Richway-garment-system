<?php

class supplierModel extends database {



   public function updateSupplier($id){
	    if($this->Query("SELECT * FROM supplier WHERE supplier_ID=?",[$id])){
	        $row=$this->fetch();
	        return $row;
        }
    }

   public function editSupplier($updateData){
       echo("<script>console.log('PHP in loademployeeTable contoller: " . json_encode($updateData) . "');</script>");
    if($this->Query("UPDATE supplier SET name = ?,email = ?, address = ?,contact_no = ? WHERE supplier_ID = ?",$updateData)){
        return true;
    }

   }


}


