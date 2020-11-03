<?php 

class dashboardController extends framework {

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }
       $this->helper("link");
    }
    public function index(){
      $this->view("dashboard");
    }


    public function logout(){

        $this->destroy();
        $this->redirect("loginController/loginForm");

    }

}


?>