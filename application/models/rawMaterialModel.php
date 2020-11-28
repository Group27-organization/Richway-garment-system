<?php

class rawMaterialModel extends database {

    public function loadFabricTable(){

        if($this->Query("SELECT * FROM predefine_fabric WHERE active=1" )){

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

        if($this->Query("SELECT * FROM button WHERE active=1" )){

            return $this->fetchall();

        }

    }





}