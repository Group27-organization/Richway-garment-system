<?php

class manageUserModel extends database {


    public function loadTable($table){



        if($this->Query("SELECT * FROM $table INNER JOIN login ON $table.login_ID = login.login_ID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                $final_data = [];

                if($table == 'owner') {
                    return ['status' => 'ok', 'data' => $data];
                }


                foreach($data as $row) {
                    $empId = $row->emp_ID;
                    if ($this->Query("SELECT name FROM employee WHERE emp_ID = ? ", [$empId])) {
                        $emp_name = $this->fetch()->name;
                        $row->password = $emp_name;

                    }

                    $loginId = $row->login_ID;
                    if ($this->Query("SELECT role_ID FROM per_role_login WHERE login_ID = ? ", [$loginId])) {
                        $rslt = $this->fetchall();
                        echo("<script>console.log('PHP: " . json_encode($rslt) . "');</script>");

                    }
                    array_push($final_data, $row);
                }

                return ['status' => 'ok', 'data' => $final_data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }

        return ['status' => 'error'];

    }


    public function addUserData($data,$role){
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


    public function getNextLoginID(){

        if($this->Query("SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'richway_db' AND   TABLE_NAME   = 'login'")) {

            return $this->fetch()->AUTO_INCREMENT;
        }
        return -1;
    }

    public function getEmployeeData($role){

        $sql2 = "";

        if($role == 'owner'){
            $sql2 = "select w.owner_ID, w.name, w.address, contact_no from owner w where login_id is null";
        }
        else{
            $sql1 = "SELECT emp_ID FROM sales_manager Union SELECT emp_ID FROM production_manager UNION SELECT emp_ID FROM supervisor Union SELECT emp_ID FROM accountant Union SELECT emp_ID FROM stock_keeper Union SELECT emp_ID FROM tailor";
            $sql2 = "select e.emp_ID, e.name, e.job_start_date, e.contact_no, e.employee_role from employee as e where e.emp_ID NOT IN ($sql1)";
        }

        if($this->Query($sql2)) {

            if($this->rowCount() > 0 ){
                $data =  $this->fetchall();
                return ['status' => 'ok', 'data' => $data];
            }
            else{
                return ['status' => 'tableIsEmpty'];
            }



        }
        return ['status' => 'error'];

    }


    public function getRoleID($role){
        if($this->Query("SELECT role_ID FROM user_role WHERE title = ? ", [$role])) {
            return $this->fetch();
        }
        return -1;
    }

}


