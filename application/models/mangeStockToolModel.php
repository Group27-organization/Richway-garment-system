<?php


class mangeStockToolModel extends database
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
    public function getPredefineTool(){
        if($this->Query("SELECT * FROM predefine_tool
                JOIN stock_tool 
                ON predefine_tool.tool_ID  =stock_tool.predefine_toolId
                JOIN stock
                ON stock.stock_ID  = stock_tool.stock_ID
                ORDER BY stock.date DESC;")){

            return $this->fetchall();
        }
    }

    public function getSuppilerDetails(){
        if($this->Query("SELECT * FROM supplier ")){

            return $this->fetchall();
        }
    }

    public function lastInsertID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }

    public function insertTooltoStock($SData,$TData){
      //  echo("<script>console.log('PHP in  model: " . json_encode($Data) . "');</script>");
        if($this->Query("INSERT INTO stock(type, date, supplier_ID, stock_keeper_ID) VALUES  (?,?,?,?)",$SData) ){
            $stockId = $this->lastInsertID();
            echo("<script>console.log('PHP in soo last insert id  contoller: " . json_encode($stockId) . "');</script>");

            $TData[2] =intval($stockId);
            echo("<script>console.log('PHP in soo new  contoller: " . json_encode($TData) . "');</script>");

            if($this->Query("INSERT INTO stock_tool(quantity,description,stock_ID,predefine_toolId) VALUES (?,?,?,?)", $TData) ){
                return true;
            }else{
                return false;
            }
        }


    }
    public function getStockKeeperId($loginId){

        if($this->Query("SELECT ID FROM stock_keeper WHERE login_ID =?",[$loginId])){
            return $this->fetch()->ID;
        }
    }




}