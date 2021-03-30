<?php
class accountantModel extends database
{

    public function generateMonthlySalary($empID_Days,$Date,$daysofmonth)
    {

        $emp_ID=array_keys($empID_Days);
        $days=array_values($empID_Days);
        $length=count($days);
        echo("<script>console.log('days of month: ". json_encode($daysofmonth). "');</script>");

         for($i=0;$i<$length;$i++){
             if($this->Query("SELECT salary_basic FROM employee WHERE emp_ID = ?",[$emp_ID[$i]])){

                 $basic_salary=$this->fetch()->salary_basic;
             }

            if($days[$i]>$daysofmonth){
                $emp_salary=$basic_salary;
            }
            else{
                $emp_salary=$basic_salary*$days[$i]/$daysofmonth;
            }

             echo("<script>console.log('PHP in generate salary: ". json_encode($emp_salary). "');</script>");

             $this->Query("INSERT INTO attendance(emp_id,month_And_Year,attendance,salary) VALUES (?,?,?,?)", [$emp_ID[$i],substr($Date, 3, 9), $days[$i],$emp_salary]) ;

         }
        echo("<script>console.log('PHP in generate salary: ". json_encode($emp_salary). "');</script>");

        $date = date('d.m.y');
        $this->Query("INSERT INTO salary_report(Month,generate_Date,total_employee) VALUES (?,?,?)", [substr($Date, 3, 9),$date,$length]) ;


    }

    public function loadSalaryTable($Date){

        if($this->Query("SELECT * FROM attendance WHERE month_And_Year=?",[$Date])){
            echo("<script>console.log('PHP in generate salary Model: ". json_encode($Date). "');</script>");
            return $this->fetchall();
        }

    }

    public function loadSalaryReport(){
        if($this->Query("SELECT * FROM salary_report ORDER BY report_id DESC")){

            return $this->fetchall();
        }

    }
    public function loadNotificationTable(){
        if($this->Query("SELECT * FROM notification")){

            return $this->fetchall();
        }

    }
    public function loadDescription($id){
        if($this->Query("SELECT * FROM notification WHERE ID=?",[$id])){

            return $this->fetch();
        }
    }

    public function readUpdateNotification($readID, $id){
       if($this->Query("UPDATE notification SET read_ids = ? WHERE ID = ?",[$readID,$id])){
            return true;
        }
    }








}
