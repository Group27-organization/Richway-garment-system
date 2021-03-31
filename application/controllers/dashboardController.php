<?php

class dashboardController extends framework {

    /**
     * @var mixed
     */
    private $dashboardModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }
//      elseif ($this->getSession('userId')['role'] == 'admin'){
//          //$this->redirect("somePage");
//          echo "You cannot access this page.";
//          die();
//      }

       $this->helper("link");
       $this->dashboardModel = $this->model('dashboardModel');
    }
    public function index(){
        $roleTitles = $this->getSession('userId')['all_roles'];
        $result = $this->dashboardModel->getUserRoleObject($roleTitles);
        $this->view("dashboard",$result);
        $this->setSession("userRolesList", $result);
        echo("<script>console.log('PHP idex sup');</script>");
    }


    public function logout(){

        $this->destroy();
        $this->redirect("loginController/loginForm");

    }

}


?>
