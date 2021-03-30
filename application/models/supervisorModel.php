<?php

class supervisorModel extends database
{

    public function workloadTable(){
        if($this->Query("SELECT * FROM workload WHERE active=1")){

            return $this->fetchall();
        }
    }

    public function updateWorkload($id){
        if($this->Query("SELECT * FROM workload WHERE ID=?",[$id])){
            $row=$this->fetch();
            return $row;
        }
    }

    public function editWorkload($Data){
        $updateworkloadData=[
            $Data['TodayCompletedWorkload'],
            $Data['hiddenID'],

        ];
        if($this->Query("UPDATE workload SET today_completed_workload=? WHERE ID=?", $updateworkloadData) ){
            return true;
        }
    }


}

?>

