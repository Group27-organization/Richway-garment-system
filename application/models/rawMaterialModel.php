<?php

class rawMaterialModel extends database {

    public function loadFabricTable(){

        if($this->Query("SELECT * FROM predefine_fabric WHERE active=1" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }


    public function insertfabric($Data){
        if($this->Query("INSERT INTO predefine_fabric(fabric_code,type,Description,quality_grade,brand,price,active) VALUES (?,?,?,?,?,?,?)", $Data) ){
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

    public function insertnool($Data){
        if($this->Query("INSERT INTO predefine_nool(fabric_ID,color_code,type,price,active) VALUES (?,?,?,?,?)", $Data) ){
            return true;
        }
    }

    public function insertbutton($Data){

        if($this->Query("INSERT INTO predefine_button(code,Description,price,active) VALUES (?,?,?,?)", $Data) ){
            echo("<script>console.log('PHP in loademployeeTable contoller: " . json_encode($Data) . "');</script>");
            return true;
        }
    }



    public function loadupdateFabric($id){
        if($this->Query("SELECT * FROM predefine_fabric WHERE ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editFabric($Data){

        $updatefabricData=[
            $Data['FabricCode'],
            $Data['Type'],
            $Data['Description'],
            $Data['QualityGrade'],
            $Data['Brand'],
            $Data['Price'],
            $Data['hiddenID'],

        ];
        //echo("<script>console.log('PHP in loadfabricTable controller: " . json_encode($updateData) . "');</script>");
        if($this->Query("UPDATE predefine_fabric SET fabric_code = ?,type = ?, Description = ?,quality_grade = ?, brand = ?, price = ? WHERE ID = ?",$updatefabricData)){
            return true;
        }

    }

    public function loadupdateButton($id){
        if($this->Query("SELECT * FROM predefine_button WHERE ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editButton($Data){

        $updatebuttonData=[
            $Data['ButtonCode'],
            $Data['Description'],
            $Data['Price'],
            $Data['hiddenID'],

        ];
        //echo("<script>console.log('PHP in loadbuttonTable controller: " . json_encode($updateData) . "');</script>");
        if($this->Query("UPDATE predefine_button SET code = ?, Description = ?, price = ? WHERE ID = ?",$updatebuttonData)){
            return true;
        }

    }

    public function loadupdateThread($id){
        if($this->Query("SELECT predefine_fabric.ID AS fabID, predefine_fabric.type AS fabType ,predefine_fabric.fabric_code AS fabricCode , predefine_nool.type AS type ,predefine_nool.color_code AS color_code ,predefine_nool.price AS price  FROM predefine_nool 
                            JOIN predefine_fabric 
                            ON predefine_nool.fabric_ID=predefine_fabric.ID
                            WHERE predefine_nool.ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editThread($Data){

        $updatenoolData=[
            $Data['ColorCode'],
            $Data['Type'],
            $Data['Price'],
            $Data['hiddenID'],

        ];
        //echo("<script>console.log('PHP in loadbuttonTable controller: " . json_encode($updateData) . "');</script>");
        if($this->Query("UPDATE predefine_nool SET color_code = ?, type = ?, price = ? WHERE ID = ?",$updatenoolData)){
            return true;
        }

    }

}