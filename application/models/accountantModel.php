<?php
class accountantModel extends database
{

    public function loadSalaryTable(){
        if($this->Query("SELECT * FROM payroll WHERE active=1")){

            return $this->fetchall();
        }
    }

    public function generateMonthlySalary(){
        if($this->Query("SELECT * FROM salary")){

            return $this->fetchall();
        }
    }

}
