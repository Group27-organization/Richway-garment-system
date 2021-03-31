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


    public function forgotPasswordView(){
        $this->view("forgotPassword");
    }

    public function forgotPassword(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "forgotPasswordData") {

                $email = $_POST['email'];

                $msg_data = [
                    'status' => 0,
                    'msg' => ""
                ];

                if(empty($email)){
                    $msg_data['status'] = 1;
                    $msg_data['msg'] = "Enter an email address";
                }
                else {
                    if($this->loginModel->checkEmail($email)){
                        if($this->loginModel->forgotPasswordSendEmail($email)){
                            $msg_data['status'] = 4;
                            $msg_data['msg'] = "Password reset OTP just sent via email to ".$email.". Login with OTP for reset your password.";
                        }
                        else{
                            $msg_data['status'] = 3;
                            $msg_data['msg'] = "Email verification OTP sending failed! Please try again.";
                        }
                    }else{
                        $msg_data['status'] = 2;
                        $msg_data['msg'] = "Sorry, your entered email is not registered in our system! Try again with different email.";
                    }

                }

                echo json_encode($msg_data);

            }
        }

    }


}


?>
