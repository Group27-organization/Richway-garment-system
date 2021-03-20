<?php

class rawMaterialToStockModel extends database {

    public function loadFabricTable2(){
        //SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.fabric_Id = predefine_fabric.ID JOIN raw_material ON raw_material.raw_material_ID = stock_fabric.raw_material_ID JOIN stock ON stock.stock_ID = raw_material.stock_ID
        if($this->Query("SELECT * FROM stock_fabric LEFT JOIN predefine_fabric ON stock_fabric.predefind_fabricID = predefine_fabric.ID" )){

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

                if($this->Query("INSERT INTO stock_fabric (predefind_fabricID, raw_material_id) VALUES (?,?)", $subTableData) ){
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
        if($this->Query("SELECT 
            stock.date AS date,
            
            
            stock_fabric.ID AS ID,
            
            predefine_fabric.fabric_code AS FC,
            
            predefine_fabric.brand AS Brand,
            
            predefine_fabric.quality_grade AS QG,
            
            predefine_fabric.price AS Price,
            
            
            raw_material.quantity AS quantity,
            date
            
            
            
            FROM stock
            JOIN raw_material 
                ON stock.stock_ID  =raw_material.stock_ID
            JOIN stock_fabric
              ON stock_fabric.raw_material_ID  = raw_material.raw_material_ID
            JOIN predefine_fabric
                ON  predefine_fabric.ID=stock_fabric.predefind_fabricID
            ORDER BY stock.date DESC" )){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }

    public function loadButtonTable(){

        if($this->Query("SELECT 
            stock.date AS date,
            
            
            stock_button.ID AS ID,
            predefine_button.code AS code,
            predefine_button.price AS price,
            raw_material.quantity AS quantity
            
            
            
            FROM stock
            JOIN raw_material 
                ON stock.stock_ID  =raw_material.stock_ID
            JOIN stock_button
              ON stock_button.raw_material_ID  = raw_material.raw_material_ID
            JOIN predefine_button
                ON  predefine_button.ID=stock_button.predefine_buttonID
            ORDER BY stock.date DESC" )){

            return $this->fetchall();

        }

    }


    public function loadThreadTable(){
        if($this->Query("SELECT 
                    stock.date AS date,
                    
                    
                    stock_nool.ID AS ID,
                    predefine_nool.color_code AS code,
                    predefine_nool.type AS type,
                    predefine_nool.price AS price,
                    raw_material.quantity AS quantity
                    
                    
                    
                    FROM stock
                    JOIN raw_material 
                        ON stock.stock_ID  =raw_material.stock_ID
                    JOIN stock_nool
                      ON stock_nool.raw_material_ID  = raw_material.raw_material_ID
                    JOIN predefine_nool
                        ON  predefine_nool.ID=stock_nool.predefine_noolID
                    ORDER BY stock.date DESC" )){

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



    public function setFabricData($ID){

    }


}