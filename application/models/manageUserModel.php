<?php

class manageUserModel extends database {


    public function loadTable($table){



        if($this->Query("SELECT * FROM login INNER JOIN ($table INNER JOIN per_role_login ON $table.per_role_login_ID = per_role_login.ID AND per_role_login.default_role = 1) ON per_role_login.login_ID = login.login_ID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                if($table == 'owner') {
                    return ['status' => 'ok', 'data' => $data];
                }


                foreach($data as $key => $row) {

                    $row->password = "";

                    $empId = $row->emp_ID;
                    if ($this->Query("SELECT name FROM employee WHERE emp_ID = ? ", [$empId])) {
                        $emp_name = $this->fetch()->name;
                        $data[$key]->emp_name = $emp_name;
                    }

                    $loginId = $row->login_ID;
                    $Sql1 = "SELECT role_ID FROM per_role_login WHERE login_ID = ".$loginId." AND default_role = 0";
                    if ($this->Query("SELECT title FROM user_role WHERE role_ID in ($Sql1)")) {
                        $rslt = $this->fetchall();
                        $data[$key]->extra_roles = $rslt;
                    }

                }


              // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

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

            $clogid = $this->getCurrentAIID();

            $role_login = [
                $clogid,
                $data['roleID'],
                date("Y-m-d"),
                1
            ];

            if ($this->Query("INSERT INTO per_role_login (login_ID, role_ID, assign_date, default_role) VALUES (?,?,?,?)", $role_login)){

                $prlogid = $this->getCurrentAIID();

                array_push($empData, $prlogid);

                if($role == 'owner') {
                    if($this->Query("UPDATE owner SET per_role_login_ID = $empData[1] WHERE owner_ID =  '$empData[0]' AND per_role_login_ID IS NULL")){
                        return true;
                    }
                }

                if($this->Query("INSERT INTO $role (emp_ID, per_role_login_ID) VALUES (?,?)", $empData)){
                    return true;
                }

            }

        }
        return false;
    }


    public function getCurrentAIID(){

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
            $sql2 = "select w.owner_ID, w.name, w.address, contact_no from owner w where per_role_login_ID is null";
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


