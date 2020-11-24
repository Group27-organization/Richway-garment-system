<?php

class AccountantController extends framework {

    /**
     * @var mixed
     */
    private $accountantModel;

    public function __construct()
    {
        if(!$this->getSession('userId')){

            $this->redirect("loginController/loginForm");

        }
       elseif ($this->getSession('userId')['role'] != 'admin'){
            //$this->redirect("somePage");
            echo "You cannot access this page.";
            die();
        }

        $this->helper("link");
       // $this->accountantModel = $this->model('accountantModel');
    }

    public function index(){
        $this->view("Accountant/dashboard");

    }





    public function managePayments(){
        $this->view("Accountant/managePayments");
    }

    public function viewReports(){
        $this->view("Accountant/viewReports");
    }

    public function updateEmployee(){
        $this->view("Accountant/updateEmployee");
    }

    public function loadupdateEmployeeform(){
        $this->view("Accountant/editEmployeeform");
    }
}