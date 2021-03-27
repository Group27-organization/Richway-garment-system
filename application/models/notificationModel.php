<?php


class notificationModel extends database {


    public function getreceiverRole($loginid){
//        echo("<script>console.log(' model called: " . json_encode($loginid) . "');</script>");


        if($this->Query("SELECT title FROM user_role JOIN per_role_login ON per_role_login.role_ID=user_role.role_ID WHERE per_role_login.ID=?", [$loginid]) ){
            $result =$this->fetch()->title;
//            echo("<script>console.log('PHP in getreceiverRole model: " . json_encode($result) . "');</script>");
            return $result;
        }

    }

    public function getNotificationRecord($receiver_role){
        if($this->Query("SELECT read_ids FROM notification WHERE status=1 AND reciver_role=?",[$receiver_role]) ){
            return $this->fetchall();
        }

    }

}