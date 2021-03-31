<?php


class addCustomerModel extends database {


    public function insertCustomer($Data){
        if($this->Query("INSERT INTO customer(name,contact_no,email,address,gender,active) VALUES (?,?,?,?,?,?)", $Data) ){
            return true;
        }

    }
}