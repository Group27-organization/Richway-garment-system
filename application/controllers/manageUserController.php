<?php 

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
      elseif ($this->getSession('userId')['role'] != 'admin'){
          //$this->redirect("somePage");
          echo "You cannot access this page.";
          die();
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
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>lid$row->login_ID</td>
                                <td>".(($_POST['tableName']=='owner')?$row->owner_ID:$row->emp_ID)."</td>
                                <td>".(($_POST['tableName']=='owner')?$row->name:$row->password)."</td>
                                <td>$row->user_name</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">Something went wrong!</td>
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

        $result = $this->manageUserModel->getNextLoginID();

        //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

        $role =  $this->getSession('selected_role');

        $data = [
            'login_ID' => "lid".($result),
            'role' => ucwords(str_replace("_"," ",$role))
        ];


        $this->view("admin/addUser",$data);
    }

    public function addUser(){

        $isEmpty = false;

        $roleID = $this->manageUserModel->getRoleID( $this->getSession('selected_role') );

        $loginTblData = [

            'username' => $this->input('UserName'),
            'password' => $this->input('Password'),
            'roleID' => $roleID->role_ID,
            'empID' =>  $this->input('EmployeeId'),
        ];

        foreach ($loginTblData as $key => $value){
            if(empty($value)){
                $isEmpty= true;
            }
        }

        if(!$isEmpty){

            $loginTblData['password'] = password_hash($loginTblData['password'], PASSWORD_DEFAULT);

            if($this->manageUserModel->addUserData($loginTblData,$this->getSession('selected_role'))){
                echo '
                    <script>
                        if(!alert("User account is successfully created.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageUserController/index"
                        }
                    </script>
            ';
            }
            else{
                echo '
            <script>
                if(!alert("Something went wrong! please try again.")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView"
                }
            </script>
            ';

            }
        }
        else{
            echo '
            <script>
                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageUserController/addUserView"
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
                                <td id='empid'>".(($role=='owner')?$row->owner_ID:$row->emp_ID)."</td>
                                <td>$row->name</td>
                                 ".(($role=='owner')?'':"<td>$row->employee_role</td>")."
                                <td>".(($role=='owner')?$row->address:$row->job_start_date)."</td>
                                <td>$row->contact_no</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">There are no employees without a login account.</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=4 style=\"text-align: center;\">Something went wrong!</td>
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


}