<?php

class supplierModel extends database {

	public function insertSupplier($Data){
		 if($this->Query("INSERT INTO supplier(name,email,address,contact_no,active) VALUES (?,?,?,?,?)", $Data) ){
                return true;
        }
    }
  
   


}


