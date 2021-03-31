<?php

class notificationController extends framework {


    /**
     * @var mixed
     */
    private $loginModel;

    public function __construct(){

        if($this->getSession('userId')){
            $this->redirect("dashboardController");
        }

        $this->helper("link");
        $this->notificationModel = $this->model('notificationModel');
        
    }

    public function getNotificationCount()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "notifycount") {
                $loginID = $this->getSession('userId')['user_id'];
//                echo "\nLogin Id called :".$loginID;

                $receiverRole =$this->notificationModel->getreceiverRole(intval($loginID));
//                echo "\nreceiverRole Id called :".$receiverRole;

                $result = $this->notificationModel->getNotificationRecord($receiverRole);

                $count=0;


                foreach ($result as $rows) {

                    $readIds = $rows->read_ids;
//                    echo "\nreadIds :" .$readIds;
                    $idsArr = explode(",",$readIds);
//                    echo "\nreadIdsArr :" ;
//                    echo '<pre>',print_r($idsArr),'</pre>';



                    if (in_array($loginID, $idsArr)) {
                        ++$count;
                    }else{

                    }
//                    echo "type" . gettype($readIds);



                }
                echo $count;

            }
        }
    }





}


?>