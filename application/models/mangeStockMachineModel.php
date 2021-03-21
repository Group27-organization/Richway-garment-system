<?php


class mangeStockMachineModel extends database
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
    public function getPredefineMachine(){
        if($this->Query("SELECT * FROM predefine_machine
                JOIN stock_machine 
                ON predefine_machine.machine_ID  =stock_machine.predefine_machineId
                JOIN stock
                ON stock.stock_ID  = stock_machine.stock_ID
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

    public function insertMachinetoStock($SData,$TData){
      //  echo("<script>console.log('PHP in  model: " . json_encode($Data) . "');</script>");
        if($this->Query("INSERT INTO stock(type, date, supplier_ID, stock_keeper_ID) VALUES  (?,?,?,?)",$SData) ){
            $stockId = $this->lastInsertID();
            echo("<script>console.log('PHP in soo last insert id  contoller: " . json_encode($stockId) . "');</script>");

            $TData[2] =intval($stockId);
            echo("<script>console.log('PHP in soo new  contoller: " . json_encode($TData) . "');</script>");

            if($this->Query("INSERT INTO stock_machine(quantity,description,stock_ID,predefine_machineId) VALUES (?,?,?,?)", $TData) ){
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