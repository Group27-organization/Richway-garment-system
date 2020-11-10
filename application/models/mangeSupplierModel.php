<?php


class mangeSupplierModel extends database
{

    public function loadSupplierTable(){
        if($this->Query("SELECT * FROM supplier ")){

            return $this->fetchall();
        }
    }

}