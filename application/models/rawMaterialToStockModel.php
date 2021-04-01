<?php

class rawMaterialToStockModel extends database {

    public function loadFabricTable2(){
        //SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.fabric_Id = predefine_fabric.ID JOIN raw_material ON raw_material.raw_material_ID = stock_fabric.raw_material_ID JOIN stock ON stock.stock_ID = raw_material.stock_ID
        if($this->Query("SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.fabric_Id = predefine_fabric.ID" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }


    public function insertfabrictostock($stockData,$rmData,$subTableData){


        if($this->Query("INSERT INTO stock (type,date,stock_keeper_ID,supplier_ID ) VALUES (?,?,?,?)",$stockData) ){
            $stockId = $this->getCurrentLoginID();
            $rmData[3] =intval($stockId);

            //raw_material_ID	type	quantity	unit_price	order_item_ID	stock_ID

            if($this->Query("INSERT INTO raw_material (type, quantity,description, stock_ID) VALUES (?,?,?,?)", $rmData) ){

                $rmID=$this->getCurrentLoginID();



                $subTableData[1]=intval($rmID);

                if($this->Query("INSERT INTO stock_fabric (fabric_Id, raw_material_id) VALUES (?,?)", $subTableData) ){
                     return true;
                }

            }
        }

    }

    public function insertbuttonstock($stockData,$rmData,$subTableData){


        if($this->Query("INSERT INTO stock (type,date,stock_keeper_ID,supplier_ID ) VALUES (?,?,?,?)",$stockData) ){
            $stockId = $this->getCurrentLoginID();
            $rmData[3] =intval($stockId);

            //raw_material_ID	type	quantity	unit_price	order_item_ID	stock_ID

            if($this->Query("INSERT INTO raw_material (type, quantity,description, stock_ID) VALUES (?,?,?,?)", $rmData) ){

                $rmID=$this->getCurrentLoginID();



                $subTableData[1]=intval($rmID);

                if($this->Query("INSERT INTO stock_button (predefine_buttonID, raw_material_id) VALUES (?,?)", $subTableData) ){
                    return true;
                }

            }
        }

    }
    public function insertthreadstock($stockData,$rmData,$subTableData){


        if($this->Query("INSERT INTO stock (type,date,stock_keeper_ID,supplier_ID ) VALUES (?,?,?,?)",$stockData) ){
            $stockId = $this->getCurrentLoginID();
            $rmData[3] =intval($stockId);

            //raw_material_ID	type	quantity	unit_price	order_item_ID	stock_ID

            if($this->Query("INSERT INTO raw_material (type, quantity,description, stock_ID) VALUES (?,?,?,?)", $rmData) ){

                $rmID=$this->getCurrentLoginID();



                $subTableData[1]=intval($rmID);

                if($this->Query("INSERT INTO stock_nool (predefine_noolID, raw_material_id) VALUES (?,?)", $subTableData) ){
                    return true;
                }

            }
        }

    }

    public function loadFabricTable(){
        //
        if($this->Query("SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.fabric_Id = predefine_fabric.ID JOIN raw_material ON raw_material.raw_material_ID = stock_fabric.raw_material_ID JOIN stock ON stock.stock_ID = raw_material.stock_ID" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }

    public function loadButtonTable(){

        if($this->Query("SELECT * FROM stock_button LEFT JOIN predefine_button ON stock_button.predefine_buttonID = predefine_button.ID JOIN raw_material ON raw_material.raw_material_ID = stock_button.raw_material_ID JOIN stock ON stock.stock_ID = raw_material.stock_ID" )){

            return $this->fetchall();

        }

    }


    public function loadThreadTable(){
        if($this->Query("SELECT * FROM stock_nool LEFT JOIN predefine_nool ON stock_nool.predefine_noolID = predefine_nool.ID JOIN raw_material ON raw_material.raw_material_ID = stock_nool.raw_material_ID JOIN stock ON stock.stock_ID = raw_material.stock_ID" )){

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
    public function getCurrentLoginID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }
    public function getStockKeeperId($loginId){

        if($this->Query("SELECT ID FROM stock_keeper WHERE login_ID =?",[$loginId])){
            return $this->fetch()->ID;
        }
    }


}