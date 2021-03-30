<?php


class ownerModel extends database
{

    public function loadTransactionLogsTable(){
        echo("<script>console.log('Model Called');</script>");
        if($this->Query("SELECT * FROM transaction_log ORDER BY date DESC ")){

            return $this->fetchall();
        }else{
            return -1;
        }
    }
    public function loadSalaryReportTable(){
        echo("<script>console.log('Model Called');</script>");
        if($this->Query("SELECT * FROM salary_report ORDER BY generate_Date DESC ")){

            return $this->fetchall();
        }else{
            return -1;
        }
    }




}