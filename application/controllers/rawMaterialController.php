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


    public function loadFabricTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {

                echo("<script>console.log('PHP in table select: " . json_encode($role) . "');</script>");


                $result = $this->rawMaterialModel->loadFabricTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Fabric ID</th>
                            <th scope=col>Fabric Code</th>   
                            <th scope=col>Type</th>                        
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
                                <td>$row->fabric_code</td>   
                                <td>$row->type</td>    
                                <td>$row->Description</td>                         
                                <td>$row->color</td>
                                <td>$row->band</td>                                
                                <td>$row->quality_grade</td>                                
                                <td>$row->brand</td>
                                <td>$row->price</td>                               



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

    public function addFabricform()
    {
        $this->view("admin/addfabricform");
    }




    public function addfabric(){
        $fabricData = [
            'FabricCode'=> $this->input('fabric_code'),
            'Type'=>$this->input('type'),
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

                echo '
                      <script>
                                    if(!alert("Fabric added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                    }
                      </script>

                    ';
            }

            else {

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



    public function deleteFabric(){

        $id=$_POST['ID'];
        if($this->rawMaterialModel->deleteFabric($id)){
            echo "200";

        }

    }


    public function addButtonform(){
        $this->view("admin/addButtonform");

    }


    public function loadButtonTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {

                echo("<script>console.log('PHP in table select: " . json_encode($role) . "');</script>");


                $result = $this->rawMaterialModel->loadButtonTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Button ID</th>
                            <th scope=col>Button Code</th>                    
                            <th scope=col>Description</th>   
                            <th scope=col>Price</th>                        
                            <th scope=col>Image</th>                            
                                                         
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->button_ID</td>
                                <td>$row->Description</td>
                                <td>$row->button_code</td>
                                <td>$row->price</td>
                                <td>$row->image</td>
                                



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


    public function addNoolform(){
        $this->view("admin/addNoolform");
    }


    public function loadNoolTable(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {

                echo("<script>console.log('PHP in table select: " . json_encode($role) . "');</script>");


               // $result = $this->rawMaterialModel->loadNoolTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Button Code</th>
                            <th scope=col>Description</th>   
                            <th scope=col>Price</th>                        
                            <th scope=col>Image</th>                            
                                                         
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


//                foreach ($result as $row) {
//
//                    echo "
//                            <tr class='tblrow' onclick='selectRow(event)'>
//                                <td>$row->ID</td>
//                                <td>$row->fabric_code</td>
//                                <td>$row->type</td>
//                                <td>$row->Description</td>
//                                <td>$row->color</td>
//                                <td>$row->band</td>
//                                <td>$row->quality_grade</td>
//                                <td>$row->brand</td>
//                                <td>$row->price</td>
//
//
//
//                            </tr>
//                        ";
//
//                }


                echo "
                        </tbody>
                    </table>
                ";

            }


        }

    }









}
?>