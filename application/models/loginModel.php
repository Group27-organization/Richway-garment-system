<?php

class loginModel extends database {


    public function userLogin($email, $password){

        if($this->Query("SELECT * FROM login WHERE user_name = ? ", [$email])){
            
            if($this->rowCount() > 0){

                $row = $this->fetch();
                $dbPassword = $row->password;

                if(password_verify($password, $dbPassword)){

                    $userId = $row->login_ID;

                    $user_name = $row->user_name;

                    $sql1 = "SELECT role_ID FROM per_role_login WHERE login_ID = $userId ORDER BY default_role desc";
                    $this->Query($sql1);
                    $rolesIDs = $this->fetchall();
                    $rolesIdsArr = [];
                    foreach ($rolesIDs as $r){
                        array_push($rolesIdsArr, intval($r->role_ID));
                    }
                    $rolesIdsArr = join(",",$rolesIdsArr);

                    if($this->Query("SELECT title FROM user_role WHERE role_ID in ($sql1) ORDER BY FIELD(role_ID,$rolesIdsArr)")){
                        $roles = $this->fetchall();

                        //echo("<script>console.log('PHP: " . json_encode($roles) . "');</script>");


                        $rolesarr = [];
                        foreach ($roles as $r){
                            array_push($rolesarr, $r->title);
                        }

                        $user_data = [
                            'user_id' => $userId,
                            'user_name' => $user_name,
                            'role' => $rolesarr[0],
                            'all_roles' => $rolesarr
                        ];

                        return ['status' => 'ok', 'data' => $user_data];

                    }

                } else {
                    return ['status' => 'passwordNotMacthed'];
                }

            }else{
                return ['status' => 'emailNotFound'];
            }

        }


    }




}


?>