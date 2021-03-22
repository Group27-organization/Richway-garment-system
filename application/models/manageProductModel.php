<?php

class manageProductModel extends database {


    public function loadTable($table){

      // echo("<script>console.log('PHP: " . json_encode($table) . "');</script>");

        if($this->Query("SELECT * FROM $table INNER JOIN predefine ON $table.p_ID = predefine.p_ID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();
                //echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }

        return ['status' => 'error'];

    }

    public function getRemainedSizes($table, $preID){

        // echo("<script>console.log('PHP: " . json_encode($table) . "');</script>");

        if($this->Query("SELECT sizes,size FROM $table INNER JOIN predefine ON $table.p_ID = predefine.p_ID WHERE predefine.p_ID = $preID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();
                $sizes = explode(",",$data[0]->sizes);
                //echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");
                foreach ($data as $row){
                    unset($sizes[array_search($row->size, $sizes)]);
                }

                $sizesStr = join(",",$sizes);

                return $sizesStr;

            }

        }

        return  0;
    }


    public function getProductTypes(){
        if($this->Query("SELECT DISTINCT type FROM predefine")) {
            return $this->fetchall();
        }

        return -1;
    }


    public function loadDesignTemplateData($type){
        if($this->Query("SELECT * FROM predefine WHERE type = ?",[$type])) {
            return $this->fetchall();
        }

        return -1;
    }

    public function addSubProductData($data,$product){

        echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");

        if($this->Query("INSERT INTO $product VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)", $data)){

            return true;

        }
        return false;
    }


    public function getCurrentLoginID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }


    public function getNextProductID($product){

        if($this->Query("SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'richway_db' AND   TABLE_NAME = ?",[$product])) {

            return $this->fetch()->AUTO_INCREMENT;
        }
        return -1;
    }


    public function getProductTableColumns($product){
        if($this->Query("SELECT COLUMN_NAME, DATA_TYPE FROM  INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND COLUMN_KEY = '' ",[$product])) {
            //echo("<script>console.log('PHP: " . json_encode($this->fetchall()) . "');</script>");
            return $this->fetchall();
        }
        return -1;
    }
}


