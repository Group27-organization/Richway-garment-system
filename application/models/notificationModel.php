<?php


class notificationModel extends database
{

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