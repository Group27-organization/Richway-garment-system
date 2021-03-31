<?php

class supervisorModel extends database
{

    public function updateWorkload($id){
        if($this->Query("SELECT * FROM workload WHERE job_ID=?",[$id])){
            $row=$this->fetch();
//            echo("<script>console.log('PHP in row controller: " . json_encode($row) . "');</script>");

            return $row;
        }
    }

    public function startedJobTable(){
        if($this->Query("SELECT job.job_ID AS ID ,job.status AS status ,job.description AS description  ,job.order_item_ID AS odi,predefine.type AS type,predefine.description AS info  FROM `job` JOIN order_item ON job.order_item_ID=order_item.order_item_ID JOIN predefine ON predefine.p_ID=order_item.p_ID WHERE job.status='ongoing'")){

            return $this->fetchall();
        }
    }
    public function addDailyWorkLoad($Data){

        echo("<script>console.log('PHP in insert addDailyWorkLoad model: " . json_encode($Data) . "');</script>");

        if($this->Query("INSERT INTO `workload`( job_ID, `current_completed_workload`, `total_workload`, `today_completed_workload`) VALUES (?,?,?,?)",$Data)){

            return true;
        }else{
            return false;
        }
    }

    public function totalItemQuntityForJob($ID){
        if($this->Query("SELECT order_item.quantity AS quantity FROM `job` JOIN order_item ON job.order_item_ID=order_item.order_item_ID WHERE job.job_ID=?",[$ID])){

            return $this->fetch();
        }
    }

    public function currentCompletedQuntityForJob($ID){
        if($this->Query("SELECT  SUM(today_completed_workload) AS currentComplete FROM `workload` WHERE job_ID=? GROUP BY job_ID",[$ID])){

            return $this->fetch();
        }
    }



}

?>

