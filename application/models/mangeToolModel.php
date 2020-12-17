<?php


class mangeToolModel extends database
{

    public function loadSupplierTable(){
        if($this->Query("SELECT * FROM supplier WHERE active=1")){

            return $this->fetchall();
        }
    }


    public function getCustomerDetails(){
        if($this->Query("SELECT * FROM customer ")){

            return $this->fetchall();
        }
    }
    public function getSuppilerDetails(){
        if($this->Query("SELECT * FROM supplier ")){

            return $this->fetchall();
        }
    }


    public function insertTooltoStock($Data){
      //  echo("<script>console.log('PHP in  model: " . json_encode($Data) . "');</script>");

        if($this->Query("INSERT INTO stock_tool(quantity,price,description,supplier_ID,tool_ID) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }else{
            return false;
        }

    }


}