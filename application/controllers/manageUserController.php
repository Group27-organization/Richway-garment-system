<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);

class manageUserController extends framework {

    /**
     * @var mixed
     */
    private $manageUserModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }

       $this->helper("link");
       $this->manageUserModel = $this->model('manageUserModel');
    }

    public function index(){
      $this->view("admin/manageUser");
    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageUserData") {
                $this->setSession("selected_role", $_POST['role']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function setExtraRoleSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageUserData") {
                $this->setSession("selected_user_data", array($_POST['logID'],$_POST['role'],$_POST['empID']));
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function loadTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageUserData"){

                $result = $this->manageUserModel->loadTable($_POST['tableName']);

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Login ID</th>
                            <th scope=col>".(($_POST['tableName']=='owner')?'Owner ID':'Employee ID')."</th>
                            <th scope=col>".(($_POST['tableName']=='owner')?'Owner Name':'Employee Name')."</th>
                            <th scope=col>User Name</th>
                            <th scope=col>Extra Roles</th>
                            <th scope=col>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        $extraRoles = "";
                        $tmparr = [];
                        foreach ($row->extra_roles as $er){
                            if(!empty($er->title)){
                                array_push($tmparr,ucwords(str_replace("_"," ",$er->title)));
                            }
                        }
                        if(!empty($tmparr)){
                            $extraRoles = join(" | ",$tmparr);
                        }
                        else{
                            $extraRoles = "None";
                        }


                        $extraRoles = empty($extraRoles)? "None" : $extraRoles;

                        $src = '';
                        $display = 'none';
                        if($row->email_status == 'verified'){
                            $src = 'http://localhost/Richway-garment-system/public/assets/img/circle-solid-success.svg';
                            $display = 'none';
                        }
                        else{
                            $src = 'http://localhost/Richway-garment-system/public/assets/img/circle-solid-danger.svg';
                            $display = 'flex';
                        }

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>LID$row->login_ID</td>
                                <td>".(($_POST['tableName']=='owner')?'OWN'.$row->owner_ID:'EMP'.$row->emp_ID)."</td>
                                <td>".(($_POST['tableName']=='owner')?$row->name:$row->emp_name)."</td>
                                <td>$row->user_name</td>
                                <td>$extraRoles</td>
                                <td style='display: flex; align-items: center'><img src=$src style='width: 6px; height: 6px; margin-right: 8px;'>".ucwords($row->email_status)."<a href='#' class='viewBtn' style='display: $display; margin-left: 20px;color: #11cdef'><b>Resend OTP</b></a></td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
                    </tr>
                   ";
                }



                echo "
                        </tbody>
                    </table>
                ";

            }


        }
    }


    public function addUserView(){

        //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

        $role =  $this->getSession('selected_role');

        $data = [
            'role' => ucwords(str_replace("_"," ",$role))
        ];


        $this->view("admin/addUser",$data);
    }

    public function addExtraRoleView(){

        $userData = $this->getSession("selected_user_data");
        $userID =  preg_replace('/\D/', '', $userData[0]);
        $role =  $userData[1];

        $userRoleArr = $this->manageUserModel->getUserRoles();
        $username = $this->manageUserModel->getUsername($userID);

        $data = [
            'username' => $username,
            'role' => ucwords(str_replace("_"," ",$role)),
            'roleData' => $userRoleArr
        ];

        echo("<script>console.log('PHP: role data " . json_encode($data) . "');</script>");

        $this->view("admin/addExtraRole",$data);
    }

    public function addUser(){

        $isError = false;

        $roleID = $this->manageUserModel->getRoleID( $this->getSession('selected_role') );

        $loginTblData = [

            'username' => $this->input('UserName'),
            'roleID' => $roleID->role_ID,
            'empID' =>  preg_replace('/\D/', '', $this->input('EmployeeId')),
        ];

        if(empty($loginTblData['username']) or empty($loginTblData['empID'])){
            $isError= true;
        }
        else{
            if(!$this->manageUserModel->checkEmployeeEmail($loginTblData['empID'],$loginTblData['username'])){
                $isError= true;
            }
       }


        if(!$isError){

           //$loginTblData['password'] = password_hash($loginTblData['password'], PASSWORD_DEFAULT);

            $result = $this->manageUserModel->addUserData($loginTblData,$this->getSession('selected_role'));

            if($result['status']){

                if($result['email_msg'] == 'mail_sended'){
                    $msg = "User account is successfully created.  Authentication OTP just sent via email to ".$loginTblData['username'];
                }
                else{
                    $msg = "User account is successfully created.  Email verification OTP sending failed!\nError: ".$result['email_msg'];
                }


                echo "
                    <div id=\"alert_msg\" style=\"display: none\">$msg</div>
                    <script>
                        const msg = document.getElementById('alert_msg').innerText;
                        if(!alert(msg)) {
                            window.location.href = \"http://localhost/Richway-garment-system/manageUserController/index\"
                        }
                    </script>
                ";

            }
            else{
                echo '
            <script>
                if(!alert("This Email already have account!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView"
                }
            </script>
            ';

            }
        }
        else{
            echo '
            <script>
                if(!alert("Some required fields are missing or data mismatched! please try again.")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView"
                }
            </script>
            ';
        }



    }


    public function addExtraRole(){

        $isError = false;

        $userData = $this->getSession("selected_user_data");
        $userID =  preg_replace('/\D/', '', $userData[0]);

        $selectedExtraRole = $this->input('user_role');

        $extraRoleData = [
            'logID' => $userID,
            'empID' => preg_replace('/\D/', '', $userData[2]),
            'extraRole' => $selectedExtraRole,
        ];

        if(empty($selectedExtraRole) or empty($userData)){
            $isError= true;
        }

        if(!$isError){

            $result = $this->manageUserModel->addExtraRoleModel($extraRoleData);

            if($result['status']){

                $msg = "Extra role successfully added for the User.";

                echo "
                    <div id=\"alert_msg\" style=\"display: none\">$msg</div>
                    <script>
                        const msg = document.getElementById('alert_msg').innerText;
                        if(!alert(msg)) {
                            window.location.href = \"http://localhost/Richway-garment-system/manageUserController/index\"
                        }
                    </script>
                ";

            }
            else{
                echo '
            <script>
                if(!alert("Something went wrong. Please try again!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addExtraRoleView"
                }
            </script>
            ';

            }

        }else{
            echo '
            <script>
                if(!alert("Required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addExtraRoleView"
                }
            </script>
            ';
        }

    }

    public function loadEmployeeTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageUserData"){

                $role = $this->getSession('selected_role');

                $result = $this->manageUserModel->getEmployeeData($role);

                echo "
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>".(($role=='owner')?'Owner ID':'Employee ID')."</th>
                            <th scope=col>".(($role=='owner')?'Owner Name':'Employee Name')."</th>
                            ".(($role=='owner')?'':'<th>Employee Role</th>')."
                            <th scope=col>".(($role=='owner')?'Address':'Job Start Date')."</th>
                            <th scope=col>Contact</th>
                        </tr>
                        </thead>
                        <tbody>

                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        //echo("<script>console.log('PHP: " . json_encode($row) . "');</script>");

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid'>".(($role=='owner')?'OWN'.$row->owner_ID:'EMP'.$row->emp_ID)."</td>
                                <td>$row->name</td>
                                 ".(($role=='owner')?'':"<td>$row->employee_role</td>")."
                                <td>".(($role=='owner')?$row->address:$row->job_start_date)."</td>
                                <td>$row->contact_no</td>
                                <td style='display:none;'>$row->email</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There are no employees without a login account.</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
                    </tr>
                   ";
                }



                echo "
                        </tbody>
                    </table>
                    
                    ";

            }


        }
    }



    //profile settings

    public function changePasswordView(){
        $this->view("admin/changePassword");
    }

    public function changePassword(){

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "changePasswordData") {

                $inputData = [
                    'new_psw' => $_POST['new_psw'],
                    'confirm_psw' => $_POST['confirm_psw'],
                ];

                $msg_data = [
                    'status' => 0,
                    'msg' => ""
                ];

                if(empty($inputData['new_psw'])){
                    $msg_data['status'] = 1;
                    $msg_data['msg'] = "Enter a new password";
                }
                elseif (!preg_match('@^[^\s]+(\s+[^\s]+)*$@', $inputData['new_psw'])){
                    $msg_data['status'] = 2;
                    $msg_data['msg'] = "Your password can't start or end with a blank space";
                }
                elseif (strlen($inputData['new_psw']) < 8){
                    $msg_data['status'] = 3;
                    $msg_data['msg'] = "Use 8 characters or more for your password";
                }
                elseif (empty($inputData['confirm_psw'])){
                    $msg_data['status'] = 4;
                    $msg_data['msg'] = "Confirm your password";
                }
                else {

                    if($inputData['new_psw'] == $inputData['confirm_psw']){

                        // Validate password strength
                        $case = preg_match('@[a-zA-Z]@', $inputData['confirm_psw']);
                        $number    = preg_match('@[0-9]@', $inputData['confirm_psw']);
                        $specialChars = preg_match('@[^\w]@', $inputData['confirm_psw']);

                        if(!$case || !$number || !$specialChars || strlen($inputData['confirm_psw']) < 8) {
                            $msg_data['status'] = 6;
                            $msg_data['msg'] = "Please choose a stronger password. Try a mix of letters, numbers, and symbols.";
                        }else{
                            //change the password and account verify.
                            if($this->manageUserModel->changePasswordAndAccountVerify($inputData['confirm_psw'],$this->getSession('userId')['user_id'])){
                                $msg_data['status'] = 8;
                                $msg_data['msg'] = "Password update successful! Now you can login with the new password.";
                            }
                            else{
                                $msg_data['status'] = 7;
                                $msg_data['msg'] = "Something went wrong!";
                            }

                        }
                    }
                    else{
                        $msg_data['status'] = 5;
                        $msg_data['msg'] = "Those passwords didn't match. Try again.";
                    }
                }

                echo json_encode($msg_data);

                }
        }

    }




}
