<?php


class manageToolModel extends database
{

    public function loadToolTable()
    {

        if($this->Query("SELECT * FROM tool WHERE active=1" )){

            return $this->fetchall();
        }
    }

    public function inserttool($Data){
        if($this->Query("INSERT INTO tool(stock_ID,Name,Description,ReorderValue,ABCanalysis,active) VALUES (?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }

}
?>