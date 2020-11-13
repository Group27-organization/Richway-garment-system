<?php

class addRawMaterialModel extends database {




    public function addNewItem($stockData,$rmData,$subTableData){



        if($this->Query("INSERT INTO stock (type,date,stock_keeper_ID,supplier_ID ) VALUES (?,?,?,?)",$stockData) ){
            $stockId = $this->getCurrentLoginID();
            $rmData[4] =intval($stockId);

            //raw_material_ID	type	quantity	unit_price	order_item_ID	stock_ID

            if($this->Query("INSERT INTO raw_material (type, quantity, unit_price, order_item_ID, stock_ID) VALUES (?,?,?,?,?)", $rmData) ){

                $rmID=$this->getCurrentLoginID();



                if($rmData[0]=='button'){
                    $subTableData[2]=intval($rmID);

                    if($this->Query("INSERT INTO button ( style, color_code, raw_material_id) VALUES (?,?,?)", $subTableData) ){
                        return true;
                    }

                }elseif ($rmData[0]=='fabric'){
                    $subTableData[3]=intval($rmID);

                    if($this->Query("INSERT INTO fabric (type, style, color_code, raw_material_ID ) VALUES (?,?,?,?)", $subTableData) ){
                        return true;
                    }
                }elseif ($rmData[0]=='nool'){
                    $subTableData[2]=intval($rmID);

                    if($this->Query("INSERT INTO nool  (type, color_code, raw_material_ID ) VALUES (?,?,?)", $subTableData) ){
                        return true;
                    }
                }

            }
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



//    public function addNewFabric($stockData,$rmData,$subTableData){
//
//        if($this->Query("INSERT INTO stocks (stock_ID, type, sk_id ) VALUES (?,?,?)",$stockData) ){
//            if($this->Query("INSERT INTO row_material (raw_material_ID, type, quantity, unit_price, order_item_ID, stock_ID) VALUES (?,?,?,?,?,?)", $rmData) ){
//                if($this->Query("INSERT INTO fabric (button_ID, style, color_code, raw_material_id) VALUES (?,?,?,?)", $subTableData) ){
//                    return true;
//                }
//            }
//        }
//    }
//
//    public function addNewNool($stockData,$rmData,$subTableData){
//
//        if($this->Query("INSERT INTO stocks (stock_ID, type, sk_id ) VALUES (?,?,?)",$stockData) ){
//            if($this->Query("INSERT INTO row_material (raw_material_ID, type, quantity, unit_price, order_item_ID, stock_ID) VALUES (?,?,?,?,?,?)", $rmData) ){
//                if($this->Query("INSERT INTO nool (button_ID, style, color_code, raw_material_id) VALUES (?,?,?,?)", $subTableData) ){
//                    return true;
//                }
//            }
//        }
//    }

    public function getData(){
        //cant create order table order is akeyword
        $order ='order';
        if($this->Query("SELECT order_ID  ,order_name FROM orders")){
            return $this->fetchall();
        }
    }
    public function getorderItems($order_ID){
        if($this->Query("SELECT order_item_ID,Item_type FROM order_item WHERE order_ID=?",[$order_ID])){
            return $this->fetchall();
        }
    }


    public function getOrderItemTable($order_ID){
        $final="";
        if($this->Query("SELECT order_item_ID,Item_type,p_ID,material,material_design  FROM order_item WHERE order_ID=?",[$order_ID])){
            $result = $this->fetchall();

            foreach ($result as $row ){
                if($this->Query("SELECT type FROM predefine WHERE p_ID=?",[$row->p_ID])){
                    $row->material = $this->fetch()->type;
               }
              if($this->Query("SELECT size from strtolower($row->type) where strtolower($row->type).p_ID =$row->p_ID ")){
                  $row->material_design = $this->fetch()->type;
              }

            }
        return $result;
        }

    }
    public function getOrderedButtonStyle($order_item_ID){
        if($this->Query("SELECT button_shape,button_color FROM order_item WHERE order_item_ID=?",[$order_item_ID])){

            return $this->fetchall();
        }
    }

    public function getOrderedFabricStyle($order_item_ID){
        if($this->Query("SELECT material,material_design,material_color FROM order_item WHERE order_item_ID=?",[$order_item_ID])){
           return $this->fetchall();
        }
    }
    public function getOrderedNoolColor($order_item_ID){
        if($this->Query("SELECT material , nool_color FROM order_item WHERE order_item_ID=?",[$order_item_ID])){
           return $this->fetchall();
        }
    }


    public function getsuplliersDetails(){
        if($this->Query("SELECT * FROM supplier ")){

            return $this->fetchall();
        }
    }
    public function getEstimateQuantity($order_item_ID){
        if($this->Query("SELECT quantity,nool_color,p_ID  FROM order_item WHERE order_item_ID=?",[$order_item_ID])){
           $result = $this->fetch();
            if($this->Query("SELECT button_quantity FROM predefine WHERE p_ID=?",[$result->p_ID])){
                $result->nool_color = $this->fetch()->button_quantity;
                return $result;
            }

        }
    }





}

?>
