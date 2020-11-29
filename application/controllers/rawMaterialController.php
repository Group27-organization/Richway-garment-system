<?php

class  rawMaterialController extends  framework
{

    /**
     * @var mixed
     */
    private $rawMaterialModel;

    public function __construct()
    {
        if (!$this->getSession('userId')) {

            $this->redirect("loginController/loginForm");

        } elseif ($this->getSession('userId')['role'] != 'admin') {
            //$this->redirect("somePage");
            echo "You cannot access this page.";
            die();
        }

        $this->helper("link");
        $this->rawMaterialModel = $this->model('rawMaterialModel');
    }

    public function index()
    {
        $this->view("admin/rawMaterial", $data);
        echo("<script>console.log('PHP in index');</script>");
    }

    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData") {
                $this->setSession("selected_role", $_POST['type']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }

    public function NewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "employeeUpdate") {
                $this->setSession("selected_employee", $_POST['emp_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {
              //  $role = $_POST['employeerole'];

                echo("<script>console.log('PHP in table select: " . json_encode($role) . "');</script>");
                $data = [
                    'role' =>  $role,
                ];


                $result = $this->rawMaterialModel->loadTable($data);


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Fabric ID</th>
                            <th scope=col>Type</th>
                            <th scope=col>Fabric Code</th>                        
                            <th scope=col>Description</th> 
                            <th scope=col>Color</th> 
                             <th scope=col>Band</th> 
                            <th scope=col>Quality Grade</th>  
                            <th scope=col>Brand</th>                             
                            <th scope=col>Price</th>    
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                <td>$row->fabric_type</td>
                                <td>$row->fabric_code</td>                              
                                <td>$row->color</td>
                                <td>$row->band</td>
                                <td>$row->Description</td>
                                <td>$row->quality_grade</td>
                                <td>$row->price</td>
                                <td>$row->brand</td>
                                 <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #00B4CC'> View </a>
                                </th>



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

    public function addRawmaterialform()
    {

        $this->view("admin/addfabricform", $data);
    }

    public function buttonform()
    {

        $this->view("admin/addbuttonform", $data);
    }

    public function noolform()
    {

        $this->view("admin/addnoolform", $data);
    }



    public function addfabric(){


        $fabricData = [
            'FabricCode'=> $this->input('fabric_code'),
            'Type'=>$this->input('fabric_type'),
            'Description'=>$this->input('Description'),
            'Color'=>$this->input('color'),
            'Band'=>$this->input('band'),
            'QualityGrade'=>$this->input('quality_grade'),
            'Brand'=>$this->input('brand'),
            'Price'=>$this->input('price'),
            /*'fabric_codeError'=> '',
            'fabric_typeError'=> '',
            'DescriptionError'=> '',
            'colorError'=> '',
            'bandError'=> '',
            'quality_gradeError'=> '',
            'brandError'=> '',
            'priceError'=> '',*/

        ];

        echo("<script>console.log('PHP in table select: " . json_encode($fabricData['FabricCode']) . "');</script>");


      /*  if(empty( $fabricData['FabricCode'])){
            $fabricData['fabric_codeError']="Fabric Code is required";
        }

        if(empty( $fabricData['Type'])){
            $fabricData['fabric_typeError']="Type is required";
        }

        if(empty( $fabricData['Description'])){
            $fabricData['DescriptionError']="Description is required";
        }

        if(empty( $fabricData['Color'])){
            $fabricData['colorError']="Color is required";
        }
        if(empty( $fabricData['Band'])){
            $fabricData[ 'bandError']="Band is required";
        }

        if(empty( $fabricData['Quality Grade'])){
            $fabricData[ 'quality_gradeError']="Quality Grade is required";
        }

        if(empty( $fabricData['Brand'])){
            $fabricData[ 'brandError']="Brand is required";
        }

        if(empty( $fabricData['Price'])){
            $fabricData[ 'priceError']="Price is required";
        }*/


        foreach ($fabricData as $key => $value){
            if(empty($value)){
                $isEmpty= true;
            }
        }


        /*if(empty($fabricData['fabric_codeError'])&&empty($fabricData['fabric_typeError'])&&
            empty($fabricData['DescriptionError'])&&empty($fabricData['colorError'])&&
            empty($fabricData['bandError'])&&empty($fabricData['quality_gradeError'])&&
            empty($fabricData['brandError'])&&empty($fabricData['priceError'])) {*/

            $Data = [$fabricData['FabricCode'], $fabricData['Type'], $fabricData['Description'],$fabricData['Color'], $fabricData['Band'], $fabricData['QualityGrade'],$fabricData['Brand'], $fabricData['Price'], 1];

           if(!$isEmpty){
            if ($this->rawMaterialModel->insertfabric($Data)) {
             // echo "Hii";
                echo '
                      <script>
                                    if(!alert("Fabric added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                    }
                      </script>

                    ';
            }

            else {
                echo "Hello";
                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                }
                    </script>
                    ';

            }


        }


           else{
               echo '
            <script>
                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/addRawmaterialform"
                }
            </script>
            ';
           }


    }

    public function addbutton(){


        $buttonData = [
            'ButtonCode'=> $this->input('button_code'),
            'Description'=>$this->input('Description'),
            'Price'=>$this->input('price'),
            'Image'=>$this->input('image'),
            'button_codeError'=> '',
            'DescriptionError'=> '',
            'priceError'=> '',
            'imageError'=> '',
        ];

       // echo("<script>console.log('PHP in table select: " . json_encode($fabricData['ButtonCode']) . "');</script>");

        if(empty( $buttonData['ButtonCode'])){
            $buttonData['button_codeError']="Button Code is required";
        }
        if(empty( $buttonData['Description'])){
            $buttonData['DescriptionError']="Description is required";
        }
        if(empty( $buttonData['Price'])){
            $buttonData['priceError']="Price is required";
        }
        if(empty( $buttonData['Image'])){
            $buttonData[ 'imageError']="Image is required";
        }




        if(empty($buttonData['button_codeError'])&&empty($buttonData['DescriptionError'])&& empty($buttonData['priceError'])&&empty($buttonData['imageError'])) {
            $Data = [$buttonData['ButtonCode'], $buttonData['Description'], $buttonData['Price'], $buttonData['Image'], 1];


            if ($this->rawMaterialModel->insertbutton($Data)) {
                // echo "Hii";
                echo '
                      <script>
                                    if(!alert("Button added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/buttonform"
                                    }
                      </script>

                    ';
            } else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/buttonform"
                                }
                    </script>
                    ';

            }
        }
        else {
            $this->view("admin/addbuttonform", $buttonData);

        }



        }


    public function addnool(){


        $noolData = [
            'ColorCode'=> $this->input('color_code'),
            'Type'=>$this->input('type'),
            'color_codeError'=> '',
            'typeError'=> '',
        ];

        if(empty( $noolData['ColorCode'])){
            $noolData['color_codeError']="Color Code is required";
        }
        if(empty( $noolData['Type'])){
            $noolData['typeError']="Type is required";
        }

        if(empty($noolData['color_codeError'])&&empty($noolData['typeError'])) {
            $Data = [$noolData['ColorCode'], $noolData['Type'], 1];

            if ($this->rawMaterialModel->insertnool($Data)) {

                echo '
                      <script>
                                    if(!alert("Nool added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/noolform"
                                    }
                      </script>

                    ';
            } else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/noolform"
                                }
                    </script>
                    ';

            }


        }

        else {
            $this->view("admin/addnoolform", $noolData);

        }


    }




    public function loadupdateEmployeeform()
    {

        $empID = $this->getSession('selected_employee');
        $data = $this->manageEmployeeModel->updateEmployee($empID);
        $this->view("admin/editEmployeeform", $data);
    }

    public function updateEmployee()
    {
        $employee_ID = $this->input('hiddenID');


        $employeeData = [

            'FullName' => $this->input('name'),
            'Address' => $this->input('address'),
            'ContactNumber' => $this->input('contact_no'),
            'BloodGroup' => $this->input('blood_group'),
            'employeeRole' => $this->input('role'),
            'bank_ID' => $this->input('bank_ID'),
            'BankName' => $this->input('bank_account_name'),
            'BankBranch' => $this->input('bank_branch'),
            'AccountNumber' => $this->input('account_no'),
            'SalaryBasic' => $this->input('salary_basic'),
            'job_startdate' => $this->input('startJobDate'),
            'hiddenID' => $this->input('hiddenID'),

        ];
        foreach ($employeeData as $key => $value) {
            if (empty($value)) {
                $isEmpty = true;
            }
        }


        $updateData = [$employeeData['FullName'], $employeeData['Address'], $employeeData['ContactNumber'], $employeeData['BloodGroup'], $employeeData['bank_ID'], $employeeData['BankName'], $employeeData['BankBranch'], $employeeData['AccountNumber'], $employeeData['SalaryBasic'], $employeeData['job_startdate'], $employeeData['hiddenID']];

        if (!$isEmpty) {

            if ($this->manageEmployeeModel->editEmployee($updateData)) {


                echo '
              <script>
                            if(!alert("Employee Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/index"
                            }
              </script>

            ';

            } else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform"
                        }
            </script>
            ';

            }

        }//if(!isempty)
        else {
            echo '
            <script>
                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageEmployeeController/loadupdateEmployeeform"
                }
            </script>
            ';


        }


    }


    public function deleteEmployee()
    {
        $id=$_POST['emp_ID'];
        if($this->manageEmployeeModel->deleteEmployee($id)){
            echo "200";

        }

    }
}
?>