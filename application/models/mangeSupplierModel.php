<?php


class mangeSupplierModel extends database
{

    public function loadSupplierTable(){
        if($this->Query("SELECT * FROM supplier WHERE active=1")){

            return $this->fetchall();
        }
    }

     public function deleteSupplier($id){

     	 if($this->Query("UPDATE supplier SET active = ? WHERE supplier_ID = ?",[0,$id])){
            return true;
     	 }

     	
    }


}