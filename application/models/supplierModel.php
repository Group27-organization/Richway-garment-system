<?php

class supplierModel extends database {



   public function loadupdateSupplier($id){
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
    public function insertSupplier($Data){
        if($this->Query("INSERT INTO supplier(name,email,address,contact_no,active) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }else{
        return false;
        }
    }


}


