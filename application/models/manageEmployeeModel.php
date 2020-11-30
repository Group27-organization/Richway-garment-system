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
        $employeeData = [
            $Data['FullName'],
            $Data['Address'],
            $Data['ContactNumber'],
            $Data['email'],
            $Data['BloodGroup'],
            $Data['employeeRole'],
            $Data[ 'SalaryBasic'],
            $Data['job_start_date'],
            1
        ];

        //echo("<script>console.log('PHP: " . json_encode($employeeData) . "');</script>");

        if($this->Query("INSERT INTO employee(name,address,contact_no,email,blood_group,employee_role,salary_basic,job_start_date,active) VALUES (?,?,?,?,?,?,?,?,?)",$employeeData) ) {

            $bankID = $this->getCurrentAIID();

            $bankdetails = [
                $Data['bank_name'],
                $Data['BankAccName'],
                $Data['BankBranch'],
                $Data['AccountNumber'],
                $bankID,
            ];


            echo("<script>console.log('PHP: " . json_encode($bankdetails) . "');</script>");

            if ($this->Query("INSERT INTO  bank_account(bank_name,acc_name,branch,ac_number,employee_ID) VALUES (?,?,?,?,?)", $bankdetails)) {
                return true;
            }


        }

    }

    public function getCurrentAIID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }



    public function loadupdateEmployeedetails($empID){
        if($this->Query("SELECT * FROM employee INNER JOIN bank_account ON employee.emp_ID=bank_account.employee_ID WHERE employee.emp_ID=?",[$empID])) {
            $row = $this->fetch();
            return $row;
       }

    }


    public function editEmployee($Data){

        $updateemployeeData=[
            $Data['FullName'],
            $Data['Address'],
            $Data['ContactNumber'],
            $Data['email'],
            $Data['BloodGroup'],
            $Data['SalaryBasic'],
            $Data['job_startdate'],
            $Data['hiddenID'],

        ];

        if($this->Query("UPDATE employee SET name = ?,address = ?,contact_no = ?,email=?,blood_group = ?,salary_basic = ?,job_start_date = ? WHERE emp_ID = ?",$updateemployeeData)) {

            $bankdetails = [
                $Data['bank_name'],
                $Data['BankAccName'],
                $Data['BankBranch'],
                $Data['AccountNumber'],
                $Data['hiddenID'],

            ];
            echo("<script>console.log('PHP in bank details contoller: " . json_encode($bankdetails) . "');</script>");
            if($this->Query("UPDATE bank_account SET bank_name=?,acc_name=?,branch=?,ac_number=? WHERE employee_ID = ?",  $bankdetails)){
                return true;
            }
        }
    }



    public function deleteEmployee($id){

        if($this->Query("UPDATE employee SET active = ? WHERE emp_ID=?", [0,$id])){
            return true;
        }
    }

}

