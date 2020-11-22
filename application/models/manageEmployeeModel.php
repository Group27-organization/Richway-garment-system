<?php

class manageEmployeeModel extends database {


    public function loadTable($data){

        if($this->Query("SELECT * FROM employee WHERE employee_role=? AND active=1",[$data['role']])){

            return $this->fetchall();

        }

        return ['status' => 'error'];

    }

    public function getRoleID($role){
        if($this->Query("SELECT role_ID FROM user_role WHERE title = ? ", [$role])) {
            return $this->fetch();
        }
        return -1;
    }


    public function insertemployee($Data){
        if($this->Query("INSERT INTO employee(name,address,contact_no,blood_group,employee_role,bank_ID,bank_account_name,bank_branch,account_no,salary_basic,job_start_date,active) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", $Data) ){
            return true;
        }
    }

    public function updateEmployee($empID){
        if($this->Query("SELECT * FROM employee WHERE emp_ID=?",[$empID])){
            $row=$this->fetch();
            return $row;
        }


    }

    public function editEmployee($updateData){
        echo("<script>console.log('PHP in loademployeeTable contoller: " . json_encode($updateData) . "');</script>");
        if($this->Query("UPDATE employee SET name = ?,address = ?,contact_no = ?,blood_group = ?,bank_ID = ?,bank_account_name = ?,bank_branch = ?,account_no = ?,salary_basic = ?,job_start_date = ? WHERE emp_ID = ?",$updateData)){
            return true;
        }
    }



public function deleteEmployee($id){

    if($this->Query("UPDATE employee SET active = ? WHERE emp_ID=?", [0,$id])){
        return true;
    }
}

}

