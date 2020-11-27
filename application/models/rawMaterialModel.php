<?php

class rawMaterialModel extends database {
    public function loadTable($data){

        if($this->Query("SELECT * FROM predefine_fabric WHERE raw_type=?",[$data['role']])){

            echo("<script>console.log('PHP in model select: " . json_encode($data['role']) . "');</script>");
            return $this->fetchall();

        }

        return ['status' => 'error'];

    }



    public function insertfabric($Data){
        if($this->Query("INSERT INTO predefine_fabric(fabric_code,fabric_type,Description,color,band,quality_grade,brand,price,active) VALUES (?,?,?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }






}

