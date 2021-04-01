<?php


class eventCalenderController extends framework{
    private $eventCalenderModel;

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->eventCalenderModel = $this->model('eventCalenderModel');
    }




    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }




    public function orderEvent(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "orderEventCalender") {

                $result = $this->eventCalenderModel->loadOrderEvent();

                echo json_encode($result);

            }
        }
    }
    public function employeeGender(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "gender") {
                $result=[];
                $result1 = $this->eventCalenderModel->loadCount();
                $result2 = $this->eventCalenderModel->loadCount();
                array_push($result,$result1[0]);
                array_push($result,$result2[0]);


                echo json_encode($result);

            }
        }
    }






}






?>