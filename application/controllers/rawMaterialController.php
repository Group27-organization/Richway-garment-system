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

        }

        $this->helper("link");
        $this->rawMaterialModel = $this->model('rawMaterialModel');
    }

    public function index()
    {
        $this->view("admin/rawMaterial");
        echo("<script>console.log('PHP in index');</script>");
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
            'QualityGrade'=>$this->input('quality_grade'),
            'Brand'=>$this->input('brand'),
            'Price'=>$this->input('price'),
            'fabric_codeError'=> '',
            'fabric_typeError'=> '',
            'quality_gradeError'=> '',
            'brandError'=> '',
            'priceError'=> '',

        ];


        if(empty( $fabricData['FabricCode'])){
            $fabricData['fabric_codeError']="Fabric Code is required";
        }

        if(empty( $fabricData['Type'])){
            $fabricData['fabric_typeError']="Type is required";
        }

        if(empty( $fabricData['QualityGrade'])){
            $fabricData[ 'quality_gradeError']="Quality Grade is required";
        }

        if(empty( $fabricData['Brand'])){
            $fabricData[ 'brandError']="Brand is required";
        }

        if(empty( $fabricData['Price'])){
            $fabricData[ 'priceError']="Price is required";
        }


        if(empty($fabricData['fabric_codeError'])&&empty($fabricData['fabric_typeError'])&&
            empty($fabricData['quality_gradeError'])&&
            empty($fabricData['brandError'])&&empty($fabricData['priceError'])) {

            $Data = [$fabricData['FabricCode'], $fabricData['Type'], $fabricData['Description'],  $fabricData['QualityGrade'], $fabricData['Brand'], $fabricData['Price'], 1];

            if ($this->rawMaterialModel->insertfabric($Data)) {

                echo '
                      <script>
                                    if(!alert("Fabric added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                    }
                      </script>

                    ';
            } else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/addFabricform"
                                }
                    </script>
                    ';

            }

        }



        else{
            $this->view("admin/addfabricform",$fabricData );

        }

    }


    public function deleteFabric(){

        $id=$_POST['ID'];
        $this->rawMaterialModel->deleteFabric($id);

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
                            <th scope=col>Description</th>   
                            <th scope=col>Button Code</th>                 
                            <th scope=col>Price</th>                        
                                                     
                                                         
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                <td>$row->Description</td>
                                <td>$row->code</td>
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

    public function addbutton(){


        $buttonData = [
            'ButtonCode'=> $this->input('button_code'),
            'Description'=>$this->input('Description'),
            'Price'=>$this->input('price'),
            'button_codeError'=> '',
            'priceError'=> '',

        ];

        // echo("<script>console.log('PHP in table select: " . json_encode($fabricData['ButtonCode']) . "');</script>");

        if(empty( $buttonData['ButtonCode'])){
            $buttonData['button_codeError']="Button Code is required";
        }

        if(empty( $buttonData['Price'])) {
            $buttonData['priceError'] = "Price is required";
        }



        if(empty($buttonData['button_codeError'])&& empty($buttonData['priceError'])) {
            $Data = [$buttonData['ButtonCode'], $buttonData['Description'], $buttonData['Price'],1];


            if ($this->rawMaterialModel->insertbutton($Data)) {

                echo '
                      <script>
                                    if(!alert("Button added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                    }
                      </script>

                    ';
            }
            else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                   window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/addButtonform"
                                }
                    </script>
                    ';

            }
        }
        else {
            $this->view("admin/addbuttonform", $buttonData);

        }



    }




    public function addThreadform(){
        $this->view("admin/addThreadform");
    }


    public function loadThreadTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {

                // echo("<script>console.log('PHP in table select: " . json_encode($role) . "');</script>");


                $result = $this->rawMaterialModel->loadThreadTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Thread ID</th>
                            <th scope=col>Type</th>   
                            <th scope=col>Color_code</th>          
                            <th scope=col>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                <td>$row->type</td>
                                <td>$row->color_code</td>
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




    public function addthread(){


        $noolData = [
            'ColorCode'=> $this->input('color_code'),
            'Type'=>$this->input('type'),
            'Price'=>$this->input('price'),
            'color_codeError'=> '',
            'typeError'=> '',
            'priceError'=>'',
        ];

        if(empty( $noolData['ColorCode'])){
            $noolData['color_codeError']="Color Code is required";
        }
        if(empty( $noolData['Type'])){
            $noolData['typeError']="Type is required";
        }

        if(empty( $noolData['Price'])){
            $noolData['priceError']="Price is required";
        }


        if(empty($noolData['color_codeError'])&&empty($noolData['typeError'])&&empty($noolData['priceError'])) {
            $Data = [$noolData['ColorCode'], $noolData['Type'],$noolData['Price'], 1];

            if ($this->rawMaterialModel->insertnool($Data)) {

                echo '
                      <script>
                                    if(!alert("Thread added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index"
                                    }
                      </script>

                    ';
            }
            else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/addThreadform"
                                }
                    </script>
                    ';

            }


        }

        else {
            $this->view("admin/addThreadform", $noolData);

        }


    }




}
?>