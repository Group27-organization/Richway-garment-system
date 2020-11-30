<?php

class loginController extends framework {


    /**
     * @var mixed
     */
    private $loginModel;

    public function __construct(){

        if($this->getSession('userId')){
            $this->redirect("dashboardController");
        }

        $this->helper("link");
        $this->loginModel = $this->model('loginModel');
        
    }

    public function index(){

        $this->view("login");
    }

    public function loginForm(){
        $this->view("login");
    }

    public function userLogin(){

        $user = [

         'email'         => $this->input('email'),
         'password'      => $this->input('password'),
         'emailError'    => '',
         'passwordError' => ''

        ];

        if(empty($user['email'])){
            $user['emailError'] = "Email is required!";
        }

        if(empty($user['password'])){
            $user['passwordError'] = "Password is required!";
        }

        if(empty($user['emailError']) && empty($user['passwordError'])){

            $result = $this->loginModel->userLogin($user['email'], $user['password']);
            if($result['status'] === 'emailNotFound'){
                $user['emailError'] = "Sorry invalid email.";
                $this->view("login", $user);
            } else if($result['status'] === 'passwordNotMacthed'){
                $user['passwordError'] = "Sorry invalid password.";
                $this->view("login", $user);
            } else if($result['status'] === "notVerified"){
                $this->setSession("userId", $result['data']);

                if (!isset($_SESSION['CREATED'])) {
                    $_SESSION['CREATED'] = time();
                }

                $this->redirect("manageUserController/changePasswordView");

            } else if($result['status'] === "ok"){
                $this->setSession("userId", $result['data']);

                if (!isset($_SESSION['CREATED'])) {
                    $_SESSION['CREATED'] = time();
                }

                $this->redirect("dashboardController");

            }
        } else {
            $this->view("login", $user);
        }

    }

    public function logout(){

        $this->destroy();
        $this->redirect("loginController/loginForm");

    }

}


?>