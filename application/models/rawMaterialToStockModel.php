<?php

class rawMaterialToStockModel extends database {

    public function loadFabricTable(){

        if($this->Query("SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.fabric_Id = predefine_fabric.ID" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }

//    public function getRoleID($role){
//        if($this->Query("SELECT role_ID FROM user_role WHERE title = ? ", [$role])) {
//            return $this->fetch();
//        }
//        return -1;
//    }
    public function insertfabrictostock($Data){
        if($this->Query("INSERT INTO stock_fabric(quantity,description,date,fabric_Id,supplier_ID) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }
    }
    public function insertbuttonstock($Data){
        if($this->Query("INSERT INTO stock_button(quantity,description,date,predefine_buttonID,supplier_ID) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }
    }
    public function insertthreadstock($Data){
        if($this->Query("INSERT INTO stock_nool(quantity,description,date,predefine_noolID,supplier_ID ) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }
    }




    public function loadButtonTable(){

        if($this->Query("SELECT * FROM stock_button LEFT JOIN predefine_button ON stock_button.predefine_buttonID = predefine_button.ID " )){

            return $this->fetchall();

        }

    }


    public function loadThreadTable(){
        if($this->Query("SELECT * FROM stock_nool LEFT JOIN predefine_nool ON stock_nool.predefine_noolID = predefine_nool.ID" )){

            return $this->fetchall();

        }

    }
    public function getpredefinefabricdata(){
        if($this->Query("SELECT * FROM predefine_fabric" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];
    }


    public function getpredefinebuttondata(){
        if($this->Query("SELECT * FROM predefine_button" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];
    }


public function getpredefinethreaddata(){
    if($this->Query("SELECT * FROM predefine_nool" )){

        return $this->fetchall();

    }

    return ['status' => 'error'];
}

    public function loadSupplierTable(){
        if($this->Query("SELECT * FROM supplier WHERE active=1")){

            return $this->fetchall();
        }
    }

}