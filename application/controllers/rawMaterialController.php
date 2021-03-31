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

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "fabricUpdate") {
                $this->setSession("selected_rawMaterial", $_POST['ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadFabricTable()
    {

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData2") {



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

    public function loadupdateFabricform(){
        echo("<script>console.log('PHP inupdate fabricData load called ');</script>");

        $fabID = $this->getSession('selected_rawMaterial');
        echo("<script>console.log('PHP in selected_rawMaterial : " . json_encode($fabID) . "');</script>");



        $fabricEdit = $this->rawMaterialModel->loadupdateFabric($fabID);
        $data = [
            'data'=>$fabricEdit,
            'fabric_codeError'=> '',
            'fabric_typeError'=> '',
            'DescriptionError'=>'',
            'quality_gradeError'=> '',
            'brandError'=> '',
            'priceError'=> '',
        ];

        echo("<script>console.log('PHP in load fabricdata : " . json_encode($data['data']) . "');</script>");
        $this->view("admin/editFabricform",$data);
    }


    public function updateFabric(){
        echo("<script>console.log('PHP in fabricData contoller called ');</script>");
        //$ID=intval($this->input('hiddenID'));
        $ID = $this->input('hiddenID');
        $fabricEdit=$this->rawMaterialModel->loadupdateFabric( $ID);
        $fabricData = [
            'FabricCode'=> $this->input('fabric_code'),
            'Type'=>$this->input('type'),
            'Description'=>$this->input('Description'),
            'QualityGrade'=>$this->input('quality_grade'),
            'Brand'=>$this->input('brand'),
            'Price'=>$this->input('price'),
            'hiddenID' => $this->input('hiddenID'),
            'data'=> $fabricEdit,
            'fabric_codeError'=> '',
            'fabric_typeError'=> '',
            'DescriptionError'=>'',
            'quality_gradeError'=> '',
            'brandError'=> '',
            'priceError'=> '',

        ];
        echo("<script>console.log('PHP in fabricData contoller: " . json_encode($fabricData) . "');</script>");


        if(empty( $fabricData['FabricCode'])){
            $fabricData['fabric_codeError']="Fabric Code is required";
        }

        if(empty( $fabricData['Type'])){
            $fabricData['fabric_typeError']="Type is required";
        }

        if(empty( $fabricData['Description'])){
            $fabricData[ 'DescriptionError']="Description is required";
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


        if(empty($fabricData['fabric_codeError'])&&empty($fabricData['fabric_typeError'])&& empty($fabricData['DescriptionError']) && empty($fabricData['quality_gradeError'])&& empty($fabricData['brandError'])&&empty($fabricData['priceError'])) {

            //$fabricData = [$fabricData['FabricCode'], $fabricData['Type'], $fabricData['Description'],  $fabricData['QualityGrade'], $fabricData['Brand'], $fabricData['Price'],$fabricData['hiddenID'], ];

           // $updateData=[$supplierData['supplierName'],$supplierData['emailAddress'],$supplierData['address'],$supplierData['contactNo'],$supplierData[ 'hiddenID'],];

            if($this->rawMaterialModel->editFabric($fabricData)){

                echo '
                  <script>
                                if(!alert("Fabric Updated successfully")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                                }
                  </script>

                ';

            }

            else {
                echo '

                <script>
                            if(!alert("Something went wrong! please try again.")) {
                                window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                            }
                </script>
                ';

            }


        }


        else{
            $this->view("admin/editFabricform", $fabricData);
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
            'ButtonCode'=> $this->input('code'),
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


    public function loadupdateButtonform(){
        echo("<script>console.log('PHP inupdate fabricData load called ');</script>");

        $btnID = $this->getSession('selected_rawMaterial');
        echo("<script>console.log('PHP in selected_rawMaterial : " . json_encode($btnID) . "');</script>");



        $buttonEdit = $this->rawMaterialModel->loadupdateButton($btnID);
        $data = [
            'data'=>$buttonEdit,
            'button_codeError'=> '',
            'priceError'=> '',
            'DescriptionError'=>'',

        ];

        echo("<script>console.log('PHP in load buttondata : " . json_encode($data['data']) . "');</script>");
        $this->view("admin/editButtonform",$data);
    }

    public function updateButton(){
        echo("<script>console.log('PHP in buttonData contoller called ');</script>");
        //$ID=intval($this->input('hiddenID'));
        $ID = $this->input('hiddenID');
        $buttonEdit=$this->rawMaterialModel->loadupdateButton( $ID);
        $buttonData = [
            'ButtonCode'=> $this->input('code'),
            'Description'=>$this->input('Description'),
            'Price'=>$this->input('price'),
            'hiddenID' => $this->input('hiddenID'),
            'data'=> $buttonEdit,
            'button_codeError'=> '',
            'priceError'=> '',
            'DescriptionError'=>'',


        ];
        echo("<script>console.log('PHP in buttonData controller: " . json_encode($buttonData) . "');</script>");


        if(empty( $buttonData['ButtonCode'])){
            $buttonData['button_codeError']="Button Code is required";
        }

        if(empty( $buttonData['Price'])) {
            $buttonData['priceError'] = "Price is required";
        }

        if(empty( $buttonData['Description'])) {
            $buttonData['DescriptionError'] = "Description is required";
        }


        if(empty($buttonData['button_codeError'])&& empty($buttonData['priceError'])&& empty($buttonData['DescriptionError'])){

            if($this->rawMaterialModel->editButton($buttonData)){

                echo '
                  <script>
                                if(!alert("Button Updated successfully")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                                }
                  </script>

                ';

            }

            else {
                echo '

                <script>
                            if(!alert("Something went wrong! please try again.")) {
                                window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                            }
                </script>
                ';

            }


        }


        else{
            $this->view("admin/editButtonform", $buttonData);
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
                            <th scope=col>Color Code</th>          
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
            'FabricID'=>$this->input('options'),
            'ColorCode'=> $this->input('color_code'),
            'Type'=>$this->input('type'),
            'Price'=>$this->input('price'),
            'fabric_codeError'=> '',
            'color_codeError'=> '',
            'typeError'=> '',
            'priceError'=>'',
        ];

        if(empty( $noolData['FabricID'])){
            $noolData['fabric_codeError']="Fabric Code is required";
        }

        if(empty( $noolData['ColorCode'])){
            $noolData['color_codeError']="Color Code is required";
        }
        if(empty( $noolData['Type'])){
            $noolData['typeError']="Type is required";
        }

        if(empty( $noolData['Price'])){
            $noolData['priceError']="Price is required";
        }
        echo("<script>console.log('PHP in add thread: ". json_encode($noolData). "');</script>");

        if(empty($noolData['fabric_codeError'])&& empty($noolData['color_codeError']) &&empty($noolData['typeError'])&&empty($noolData['priceError'])) {
            $Data = [intval($noolData['FabricID']),$noolData['ColorCode'], $noolData['Type'],$noolData['Price'], 1];

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
    public function fabric_codeDropdown()
    {


        if (isset($_POST['key'])) {
            if ($_POST['key'] == "fabric_code") {

                $result = $this->rawMaterialModel->loadFabricTable();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach ($result as $row) {
                    echo '<option value="' . $row->ID . '" data-value="' . $row->ID . '"  >' . $row->fabric_code . '-' . $row->type . '</option>';
                }
            }
        }
    }



    public function loadupdateThreadform(){
        echo("<script>console.log('PHP inupdate threadData load called ');</script>");

        $btnID = $this->getSession('selected_rawMaterial');
        echo("<script>console.log('PHP in selected_rawMaterial : " . json_encode($btnID) . "');</script>");


//        $fabDetails = $this->rawMaterialModel->loadFabricTable();
//        $fd = array('fabArr' => $fabDetails);
        $threadEdit = $this->rawMaterialModel->loadupdateThread($btnID);
//        $threadEdit2 =$threadEdit+$fd;
//        echo("<script>console.log('PHP in threadEdit2 : " . json_encode($threadEdit2) . "');</script>");
        $data = [
            'data'=>$threadEdit,
            'color_codeError'=> '',
            'typeError'=> '',
            'priceError'=>'',

        ];

        echo("<script>console.log('PHP in load nooldata : " . json_encode($data['data']) . "');</script>");
        $this->view("admin/editThreadform",$data);
    }

    public function updateThread(){
        echo("<script>console.log('PHP in noolData contoller called ');</script>");
        //$ID=intval($this->input('hiddenID'));
        $ID = $this->input('hiddenID');
        $threadEdit=$this->rawMaterialModel->loadupdateThread( $ID);
        $noolData = [
            'ColorCode'=> $this->input('color_code'),
            'Type'=>$this->input('type'),
            'Price'=>$this->input('price'),
            'hiddenID' => $this->input('hiddenID'),
            'data'=> $threadEdit,
            'color_codeError'=> '',
            'typeError'=> '',
            'priceError'=>'',


        ];
        echo("<script>console.log('PHP in noolData controller: " . json_encode($noolData) . "');</script>");


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

            if($this->rawMaterialModel->editThread($noolData)){

                echo '
                  <script>
                                if(!alert("Thread Updated successfully")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                                }
                  </script>

                ';

            }

            else {
                echo '

                <script>
                            if(!alert("Something went wrong! please try again.")) {
                                window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/index";
                            }
                </script>
                ';

            }


        }


        else{
            $this->view("admin/editThreadform", $noolData);
        }




    }





}
?>