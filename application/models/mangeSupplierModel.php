<?php


class mangeSupplierModel extends database
{

    public function loadSupplierTable(){
        if($this->Query("SELECT * FROM supplier WHERE active=1")){
            return $this->fetchall();
        }else{
            return 100;
        }

    }

    


}