<?php

use PHPMailer\PHPMailer\PHPMailer;

class loginModel extends database {


    public function userLogin($email, $password){

        if($this->Query("SELECT * FROM login WHERE user_name = ? ", [$email])){

            if($this->rowCount() > 0 ){

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

                        $email_status = $row->email_status;

                        $user_data = [
                            'user_id' => $userId,
                            'user_name' => $user_name,
                            'role' => $rolesarr[0],
                            'all_roles' => $rolesarr,
                            'email_status' => $email_status
                        ];

                        if($email_status == "not verified"){
                            return ['status' => 'notVerified', 'data' => $user_data];
                        }

                        return ['status' => 'ok', 'data' => $user_data];

                    }

                } else {
                    return ['status' => 'passwordNotMacthed'];
                }

            } else {
                return ['status' => 'emailNotFound'];
            }

        }


    }


    public function forgotPasswordSendEmail($email){


        $user_otp = rand(100000, 999999);

        $password = password_hash($user_otp, PASSWORD_DEFAULT);

        $login_data = array(
            'not verified',
             $password,
             $email
        );

        //echo("<script>console.log('PHP: email: " . json_encode("Email send successfully.") . "');</script>");


        if($this->Query("UPDATE login SET email_status = ? , password = ? WHERE user_name = ?",$login_data)){

            require_once (DOCROOT . "public/services/Exception.php");

            require_once (DOCROOT . "public/services/PHPMailer.php");

            require_once (DOCROOT . "public/services/SMTP.php");



            $mail = new PHPMailer(TRUE);

            try {

                $mail->setFrom('info.richwaygarments@gmail.com', 'Richway Garments');
                $mail->addAddress($email);
                $mail->IsHTML(true);
                $mail->Subject = 'Password Reset OTP Confirmation Richway Account';
                $mail->AddEmbeddedImage(DOCROOT.'public/assets/img/image2.png', 'logo');
                $message_body = '
            <p>Dear Sir/ Madam,</p>
            <p>Your password reset with OTP.</p>
			<p>Please use the following OTP <b>'.$user_otp.'</b> to login Richway account.</p>
			<br>
			<p>Thanks & Regards,<br>
            <b>Avishka Fernando<br>
               Administrator,<br>
               Richway Garments (Pvt) Ltd</b></p>
               <br><img src="cid:logo" style="height: auto; width: 100px;"></a>
			';
                $mail->Body = $message_body;

                /* SMTP parameters. */
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'info.richwaygarments@gmail.com';
                $mail->Password = 'admin@richway2020';
                $mail->Port = 587;

                /* Disable some SSL checks. */
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                /* Finally send the mail. */
                if($mail->send()){
                    //echo("<script>console.log('PHP: email: " . json_encode("dan awe") . "');</script>");
                    $output['email_msg'] = "mail_sended";
                    return true;
                }
                else{
                    $output['email_msg'] = $mail->ErrorInfo;
                    return false;
                }
            }
            catch (Exception $e)
            {
                echo("<script>console.log('PHP: email: " . $e->errorMessage() . "');</script>");
            }
            catch (\Exception $e)
            {
                echo("<script>console.log('PHP: email: " . json_encode("Email send successfully.") . "');</script>");
            }

        }

    }

    public function checkEmail($email){
        if($this->Query("SELECT * FROM login WHERE user_name = ? ", [$email])) {
            if($this->rowCount()>0){
                return true;
            }
        }
        return false;
    }

}


?>
