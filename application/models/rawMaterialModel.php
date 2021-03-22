<?php

class rawMaterialModel extends database {

    public function loadFabricTable(){

        if($this->Query("SELECT * FROM predefine_fabric WHERE active=1" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }


    public function insertfabric($Data){
        if($this->Query("INSERT INTO predefine_fabric(fabric_code,type,Description,quality_grade,brand,price,active) VALUES (?,?,?,,?,?,?,?)", $Data) ){
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

        if($this->Query("SELECT * FROM predefine_button WHERE active=1" )){

            return $this->fetchall();

        }

    }


    public function loadThreadTable(){
        if($this->Query("SELECT * FROM predefine_nool WHERE active=1" )){

            return $this->fetchall();

        }

    }
    public function insertbutton($Data){

        if($this->Query("INSERT INTO predefine_button(code,Description,price,active) VALUES (?,?,?,?)", $Data) ){
            echo("<script>console.log('PHP in loademployeeTable contoller: " . json_encode($Data) . "');</script>");
            return true;
        }
    }

    public function insertnool($Data){
        if($this->Query("INSERT INTO predefine_nool(color_code,type,active) VALUES (?,?,?)", $Data) ){
            return true;
        }
    }




}