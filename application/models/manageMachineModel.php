<?php


class manageMachineModel extends database
{

    public function loadMachineTable()
    {
        if ($this->Query("SELECT * FROM machine WHERE active=1")) {

            return $this->fetchall();
        }
    }



    public function insertmachine($Data){
        if($this->Query("INSERT INTO machine(stock_ID,line_ID,Name,Description,ReorderValue,ABCanalysis,Warrenty,active) VALUES (?,?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }

}
?>
