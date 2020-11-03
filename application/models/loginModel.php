<?php

class loginModel extends database {


    public function userLogin($email, $password){

        if($this->Query("SELECT * FROM login WHERE user_name = ? ", [$email])){
            
            if($this->rowCount() > 0 ){

                $row = $this->fetch();
                $dbPassword = $row->password;
                $userId = $row->login_ID;
                if(password_verify($password, $dbPassword)){

                    return ['status' => 'ok', 'data' => $userId];

                } else {
                    return ['status' => 'passwordNotMacthed'];
                }

            } else {
                return ['status' => 'emailNotFound'];
            }

        }


    }

}


?>