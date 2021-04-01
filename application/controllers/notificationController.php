<?php


class notificationController extends framework{
    private $notificationModel;

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->notificationModel = $this->model('notificationModel');
    }



    public function index(){

        $this->view("admin/NotificationView");
    }




    public function loadNotificationTable(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "notificationTable") {


                $role =$this->getSession('userId')['role'];
                $result = $this->notificationModel->loadNotificationTable($role);

                echo("<script>console.log('PHP in role  contoller: " . json_encode($role) . "');</script>");

                echo("<script>console.log('PHP in result  contoller: " . json_encode($result) . "');</script>");


                echo "
                 <table id='myTable' class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col style='display: none'>Notification ID</th>
                            <th scope=col style='display: none'>Sender ID</th>
                            <th scope=col>Sender Role</th>
                            <th scope=col style='display: none'>Receiver Role</th>
                            <th scope=col>Date</th>
                            <th scope=col>Message</th>
                            <th scope=col>Actions</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td style='display: none'>$row->ID</td>
                                <td style='display: none'>$row->sender_Id</td>
                                <td>$row->sender_role</td>
                                <td style='display: none'>$row->reciver_role</td>
                                <td>$row->date</td>
                                <td>$row->description</td>
                                <td>
                               
                                <button class='viewBtn' style='background-color: snow; color:orange; border: none' onclick='selectRowView(event)'>view</button>
                                   
                                </td>
                                
                            </tr>
                        ";

                }
                echo "
                                    </tbody>
                                </table>
                                
                                ";
            }
        }


    }
    public function loadDescrpition()
    {


        if (isset($_POST['key'])) {
            if ($_POST['key'] == "notificationDescrpition") {
                $notificationID =$_POST['notificationID'];
                $loginID = $this->getSession('userId')['user_id'];
                $result = $this->notificationModel->loadDescription($notificationID);
                $description =$result->description;


                echo $description;
                $readIds = $result->read_ids;
                $loginID = $this->getSession('userId')['user_id'];
                $readIdArr = explode(",",$readIds);

                if (in_array($loginID, $readIdArr)) {

                }else{
                    $updateReadIds = $readIds.','.$loginID;
                    $result = $this->notificationModel->readUpdateNotification($updateReadIds,$notificationID);
                }



            }
        }
    }






}






?>
