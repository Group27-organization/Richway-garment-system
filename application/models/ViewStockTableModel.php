<?php


class ViewStockTableModel extends database{

    public function getRawMaterialData(){
        if($this->Query("SELECT * FROM order_item INNER JOIN raw_material ON order_item.order_item_ID = raw_material.order_item_ID")){

            return $this->fetchall();
        }

    }
    public function getToolData(){

    }
    public function getMachinesData(){

    }

    public function orderTable(){
        if($this->Query("SELECT * FROM orders ")){

            return $this->fetchall();
        }
    }
}