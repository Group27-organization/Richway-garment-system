<?php

class manageProductModel extends database {


    public function loadTable($table){

      // echo("<script>console.log('PHP: " . json_encode($table) . "');</script>");

        if($this->Query("SELECT * FROM $table INNER JOIN predefine ON $table.p_ID = predefine.p_ID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();
                echo("<script>console.log('PHP: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }

        return ['status' => 'error'];

    }


    public function getProductTypes(){
        if($this->Query("SELECT DISTINCT type FROM predefine")) {
            return $this->fetchall();
        }

        return -1;
    }


    public function addSubProductData($data,$role){
        $loginData = [
            $data['username'],
            $data['password']
        ];
        $empData = [
            $data['empID'],
        ];

        if($this->Query("INSERT INTO login (user_name, password) VALUES (?,?)", $loginData)){

            $clogid = $this->getCurrentLoginID();

            array_push($empData, $clogid);

            $role_login = [
                $clogid,
                $data['roleID'],
                date("Y-m-d"),
                1
            ];

            if ($this->Query("INSERT INTO per_role_login (login_ID, role_ID, assign_date, default_role) VALUES (?,?,?,?)", $role_login)){

                if($role == 'owner') {
                    if($this->Query("UPDATE owner SET login_ID = $empData[1] WHERE owner_ID =  '$empData[0]' AND login_ID IS NULL")){
                        return true;
                    }
                }

                if($this->Query("INSERT INTO $role (emp_ID, login_ID) VALUES (?,?)", $empData)){
                    return true;
                }

            }

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


