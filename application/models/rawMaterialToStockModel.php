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
    public function insertfabric($Data){
        if($this->Query("INSERT INTO predefine_fabric(fabric_code,type,Description,color,band,quality_grade,brand,price,active) VALUES (?,?,?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }


    public function deleteFabric($id){

        if($this->Query("UPDATE predefine_fabric SET active = ? WHERE ID = ?",[0,$id])){
            echo("<script>console.log('PHP in model select: " . json_encode($id) . "');</script>");
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



}