<?php 

class manageProductController extends framework {

    /**
     * @var mixed
     */
    private $manageProductModel;

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
       $this->manageProductModel = $this->model('manageProductModel');
    }

    public function index(){
        $types = $this->manageProductModel->getProductTypes();
        $this->view("admin/manageProducts",$types);
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
            if($_POST['key'] == "manageProduct"){
                $tblname = $_POST['tableName'];
                $result = $this->manageProductModel->loadTable($tblname);

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>".ucwords(str_replace("_","-",$tblname))." ID</th>
                            <th scope=col>Product ID</th>
                            <th scope=col>Size</th>
                            <th scope=col>Hand Type</th>
                            <th scope=col>Collar Type</th>
                            <th scope=col>Description</th>
                            <th scope=col>Style</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    $first = true;
                    foreach($result['data'] as $row){
                        if($first){
                            echo "
                                <tr class='tblrow active-row' onclick=\"selectRow(event,'$row->image_url','$row->size')\">
                            ";
                            $first = false;
                        }
                        else{
                           echo "
                                <tr class='tblrow' onclick=\"selectRow(event,'$row->image_url','$row->size')\">
                           ";
                        }
                        echo "
                                <td>ID$row->ID</td>
                                <td>PID$row->p_ID</td>
                                <td>$row->size</td>
                                <td>$row->hand_type</td>
                                <td>$row->collar_type</td>
                                <td>$row->description</td>
                                <td>$row->style</td>
                                <td style='display:none;'>$row->image_url</td>
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=7 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=7 style=\"text-align: center;\">Something went wrong!</td>
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


}