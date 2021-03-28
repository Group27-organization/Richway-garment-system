<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

class manageUserModel extends database {


    public function loadTable($table){



        if($this->Query("SELECT * FROM login INNER JOIN ($table INNER JOIN per_role_login ON $table.per_role_login_ID = per_role_login.ID AND per_role_login.default_role = 1) ON per_role_login.login_ID = login.login_ID")){

            if($this->rowCount() > 0 ){

                $data = $this->fetchall();

                if($table == 'owner') {
                    return ['status' => 'ok', 'data' => $data];
                }


                foreach($data as $key => $row) {

                    $row->password = "";

                    $empId = $row->emp_ID;
                    if ($this->Query("SELECT name FROM employee WHERE emp_ID = ? ", [$empId])) {
                        $emp_name = $this->fetch()->name;
                        $data[$key]->emp_name = $emp_name;
                    }

                    $loginId = $row->login_ID;
                    $Sql1 = "SELECT role_ID FROM per_role_login WHERE login_ID = ".$loginId." AND default_role = 0";
                    if ($this->Query("SELECT title FROM user_role WHERE role_ID in ($Sql1)")) {
                        $rslt = $this->fetchall();
                        $data[$key]->extra_roles = $rslt;
                    }

                }


              // echo("<script>console.log('PHP: data: " . json_encode($data) . "');</script>");

                return ['status' => 'ok', 'data' => $data];

            } else {
                return ['status' => 'tableIsEmpty'];
            }

        }


        return ['status' => 'error'];

    }


    public function addUserData($data,$role){


        $user_otp = rand(100000, 999999);

        $password = password_hash($user_otp, PASSWORD_DEFAULT);

        $login_data = array(
            ':user_name' => $data['username'],
            ':password' => $password,
        );


        $query = "
		INSERT INTO login (user_name, password) 
		SELECT * FROM (SELECT :user_name, :password) AS tmp
		WHERE NOT EXISTS (
		    SELECT user_name FROM login WHERE user_name = :user_name
		) LIMIT 1
		";


        $empData = [
            $data['empID'],
        ];

        $output = [
            'email_msg' => "",
            'status' => false
            ];


        //echo("<script>console.log('PHP: mail: " . json_encode($output) . "');</script>");

        if($this->Query($query, $login_data)) {

            if ($this->rowCount() > 0) {

                echo("<script>console.log('PHP: mail - user-data: " . json_encode($login_data) . "');</script>");
                $clogid = $this->getCurrentAIID();

                $role_login = [
                    $clogid,
                    $data['roleID'],
                    1
                ];

                if ($this->Query("INSERT INTO per_role_login (login_ID, role_ID, default_role) VALUES (?,?,?)", $role_login)) {

                    $prlogid = $this->getCurrentAIID();

                    array_push($empData, $prlogid);

                    if ($role == 'owner') {
                        if ($this->Query("UPDATE owner SET per_role_login_ID = $empData[1] WHERE owner_ID =  '$empData[0]' AND per_role_login_ID IS NULL")) {
                            $output['status'] = true;
                        }
                    } else {
                        if ($this->Query("INSERT INTO $role (emp_ID, per_role_login_ID) VALUES (?,?)", $empData)) {
                            $output['status'] = true;
                        }
                    }


                }

                require_once(DOCROOT . "public/services/Exception.php");

                require_once(DOCROOT . "public/services/PHPMailer.php");

                require_once(DOCROOT . "public/services/SMTP.php");


                $mail = new PHPMailer(TRUE);

                try {

                    $mail->setFrom('info.richwaygarments@gmail.com', 'Richway Garments');
                    $mail->addAddress($data['username']);
                    $mail->IsHTML(true);
                    $mail->Subject = 'One Time Password OTP Confirmation Richway Account';
                    $mail->AddEmbeddedImage(DOCROOT . 'public/assets/img/image2.png', 'logo');
                    $message_body = '
            <p>Dear Sir/ Madam,</p>
			<p>Please use the following OTP <b>' . $user_otp . '</b> to first time login Richway account.</p>
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
                    $mail->Password = 'ishara@richway';
                    $mail->Port = 587;

                    /* Disable some SSL checks. */
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    echo("<script>console.log('PHP: email: " . json_encode($output) . "');</script>");

                    /* Finally send the mail. */
                    if ($mail->send()) {
                        $output['email_msg'] = "mail_sended";
                        return $output;
                    } else {
                        $output['email_msg'] = $mail->ErrorInfo;
                        return $output;
                    }
                } catch (Exception $e) {
                    echo("<script>console.log('PHP: email: " . $e->errorMessage() . "');</script>");
                } catch (\Exception $e) {
                    echo("<script>console.log('PHP: email: " . json_encode("Email send successfully.") . "');</script>");
                }

            } else {
                return $output;
            }
        }
        else{
            return $output;
        }

    }

    public function getUsername($logID){

        if($this->Query("SELECT user_name from login where login_ID = ?",[$logID])) {
            if($this->rowCount() > 0){
                return $this->fetch()->user_name;
            }
        }
        return -1;
    }

    public function getUserRoles(){
        if($this->Query("SELECT title from user_role where title <> 'admin'")) {
            if($this->rowCount() > 0){
                return $this->fetchall();
            }
        }
        return -1;
    }

    public function addExtraRoleModel($data){

        $output['status'] = false;

        $empData = [
            $data['empID'],
        ];

        $role = $data['extraRole'];

        $roleID = $this->getRoleID($role);

        $role_login = [
            $data['logID'],
            $roleID->role_ID,
            0
        ];

//        echo("<script>console.log('PHP: extra data " . json_encode($role_login) . "');</script>");

        if ($this->Query("INSERT INTO per_role_login (login_ID, role_ID, default_role) VALUES (?,?,?)", $role_login)) {

            $prlogid = $this->getCurrentAIID();

            array_push($empData, $prlogid);

            if ($role == 'owner') {
                if ($this->Query("UPDATE owner SET per_role_login_ID = $empData[1] WHERE owner_ID =  '$empData[0]' AND per_role_login_ID IS NULL")) {
                    $output['status'] = true;
                }
            } else {
                if ($this->Query("INSERT INTO $role (emp_ID, per_role_login_ID) VALUES (?,?)", $empData)) {
                    $output['status'] = true;
                }
            }

        }

        return $output;
    }

    public function getCurrentAIID(){

        if($this->Query("SELECT last_insert_id() as lastid")) {

            return $this->fetch()->lastid;
        }
        return -1;
    }


    public function getNextLoginID(){

        if($this->Query("SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'richway_db' AND   TABLE_NAME   = 'login'")) {

            return $this->fetch()->AUTO_INCREMENT;
        }
        return -1;
    }

    public function changePasswordAndAccountVerify($psw, $lid){

        $psw = password_hash($psw, PASSWORD_DEFAULT);

        if($this->Query("UPDATE login SET password = ?, email_status = ? WHERE login_ID = ?", [$psw,"verified",$lid])){
            return true;
        }
        return false;
    }

    public function getEmployeeData($role){

        $sql2 = "";

        if($role == 'owner'){
            $sql2 = "select w.owner_ID, w.name, w.address, contact_no from owner w where per_role_login_ID is null";
        }
        else{
            $sql1 = "SELECT emp_ID FROM sales_manager Union SELECT emp_ID FROM production_manager UNION SELECT emp_ID FROM supervisor Union SELECT emp_ID FROM accountant Union SELECT emp_ID FROM stock_keeper";
            $sql2 = "select e.emp_ID, e.name, e.job_start_date, e.contact_no, e.email, e.employee_role from employee as e where e.emp_ID NOT IN ($sql1) AND e.employee_role <> 'tailor'";
        }

        if($this->Query($sql2)) {

            if($this->rowCount() > 0 ){
                $data =  $this->fetchall();
                return ['status' => 'ok', 'data' => $data];
            }
            else{
                return ['status' => 'tableIsEmpty'];
            }



        }
        return ['status' => 'error'];

    }


    public function getRoleID($role){
        if($this->Query("SELECT role_ID FROM user_role WHERE title = ? ", [$role])) {
            return $this->fetch();
        }
        return -1;
    }

    public function checkEmployeeEmail($empid, $email){
        if($this->Query("SELECT * FROM employee WHERE emp_ID = ? AND email = ? ", [$empid,$email])) {
            if($this->rowCount()>0){
                return true;
            }
        }
        return false;
    }

}


