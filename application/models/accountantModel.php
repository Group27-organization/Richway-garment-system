<?php
class accountantModel extends database
{

    public function generateMonthlySalary(){
        if($this->Query("SELECT * FROM salary")){

            return $this->fetchall();
        }
    }

}
