<?php


class ownerController extends framework{

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");

    }



    public function index(){

        $this->view("owner/dashboard");
        echo("<script>console.log('PHP in index');</script>");
    }


    public function managePayroll(){
        $this->view("owner/managePayroll");
    }

    public function stockusageReport(){
        $this->view("owner/ stockusageReport");
    }

    public function viewReportAndChart(){
        $this->view("owner/viewReportAndChart");
    }

    public function loadpayform(){
        $this->view("owner/payform");

    }

   





}






?>