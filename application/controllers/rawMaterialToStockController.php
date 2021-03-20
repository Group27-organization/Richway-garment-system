<?php

class  rawMaterialToStockController extends  framework
{

    /**
     * @var mixed
     */
    private $rawMaterialModel;

//    public function __construct()
//    {
//        if (!$this->getSession('userId')) {
//
//            $this->redirect("loginController/loginForm");
//
//        } elseif ($this->getSession('userId')['role'] != 'stock_keeper') {
//
//            echo "You cannot access this page.";
//            die();
//        }
//
//        $this->helper("link");
//        $this->rawMaterialModel = $this->model('rawMaterialToStockModel');
//    }

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->rawMaterialModel = $this->model('rawMaterialToStockModel');
    }


    public function index()
    {
        $this->view("stock/addRawMaterialToStock");
        echo("<script>console.log('PHP in index controller');</script>");
    }
    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData") {
                $this->setSession("selected_rawId", $_POST['rawID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


//////////////////////////////////////////////////load fabric

    public function loadFabricTable(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData1") {



                $result = $this->rawMaterialModel->loadFabricTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col style='display: none'> ID</th>
                            <th scope=col>Fabric Code</th>   
                            <th scope=col>Band</th> 
                            <th scope=col>Quality Grade</th>
                            <th scope=col>Uint Price</th> 
                           <th scope=col>Quantity</th> 
                            <th scope=col>Date</th> 
                              
                               
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                 <td style='display: none'>$row->ID</td>
                                 <td>$row->FC</td>   
                                 <td>$row->Brand</td>                                
                                 <td>$row->QG</td>                                
                                 <td>$row->Price</td>
                                  <td>$row->quantity</td>   
                                 <td>$row->date</td>                                



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
    public function addFabricform(){
        $fabriccode = $this->rawMaterialModel->getpredefinefabricdata();
        $this->view("stock/addfabricform",$fabriccode);

    }





    public function addfabric(){
        $fabricData = [
            'FabricCodeID'=> $this->input('fabric_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),
            'Supplier_id' =>$this->input('supplierid'),


        ];
        echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($fabricData) . "');</script>");


        if(empty( $fabricData['FabricCodeID'])){
            $fabricData['FabricCodeIDError']="Fabric Code is required";
        }

        if(empty( $fabricData['Quantity'])){
            $fabricData['QuantityError']="Quantity is required";
        }

        if(empty( $fabricData['Description'])){
            $fabricData['DescriptionError']="Description is required";
        }


        if(empty($fabricData['FabricCodeIDError'])&&empty($fabricData['QuantityError'])&&empty($fabricData['DescriptionError'])) {

            //type,date,stock_keeper_ID,supplier_ID
            $loginID = $this->getSession('userId');
            $stockKeeperId = intval($this->rawMaterialModel->getStockKeeperId($loginID));
            $stockData=["raw material",$fabricData['Date'],$stockKeeperId,intval($fabricData['Supplier_id'])];

            //type, quantity,description, stock_ID
            $rmData=["fabric",intval($fabricData['Quantity']), $fabricData['Description'],0];

            //fabric_Id, raw_material_id
            $subTableData=[intval($fabricData['FabricCodeID']),0];


            $Data = [ intval($fabricData['Quantity']), $fabricData['Description'], $fabricData['Date'],intval($fabricData['FabricCodeID']),intval($fabricData['Supplier_id'])];

            if ($this->rawMaterialModel->insertfabrictostock($stockData,$rmData,$subTableData)) {

                echo '
                      <script>
                                     if(!alert("Fabric added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController"
                                    }
                      </script>

                    ';
            } else {

                echo '

                    <script>
                                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialController/addRawmaterialform"
                }
                    </script>
                    ';

            }

        }



        else{
            $this->view("stock/addfabricform",$fabricData );

        }

    }

//    public function editFabricDetals(){
//        $fabricData =$this->rawMaterialModel->loadButtonTable();
//        $this->view("stock/addfabricform",$fabricData );
//    }
//    update fabric

    public function loadupdateFabricform(){

        $rawMId = $this->getSession('rawMaterialData');
        $data = $this->rawMaterialModel->setFabricData($rawMId);
        $this->view("stock/editfabricform",$data);
    }






    public function loadButtonTable(){

        if (isset($_POST['key'])) {

            if ($_POST['key'] == "rawMaterialData2") {



                $result = $this->rawMaterialModel->loadButtonTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col style='display: none'>ID</th> 
                             <th scope=col>Code</th> 
                             <th scope=col>Unit Price</th> 
                              <th scope=col>Quantity</th>                        
                             <th scope=col>Date</th> 
                             
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td style='display: none'>$row->ID</td>
                                 <td>$row->code</td>
                                 <td>$row->price</td>
                                 <td>$row->quantity</td>
                                <td>$row->date</td>    
                                              
                              
                               


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
    public function addButtonform(){
        $buttonccode = $this->rawMaterialModel->getpredefinebuttondata();

        $this->view("stock/addButtonform",$buttonccode);

    }
    public function addbutton(){
        $fabricData = [
            'ButtonCodeID'=> $this->input('fabric_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),
            'Supplier_id' =>$this->input('supplierid'),



        ];
        echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($fabricData) . "');</script>");




        if(empty( $fabricData['ButtonCodeID']) || empty( $fabricData['Quantity']) || empty( $fabricData['Description'])){


        }else{




//            $Data = [ intval($fabricData['Quantity']), $fabricData['Description'], $fabricData['Date'],intval($fabricData['ButtonCodeID']),intval($fabricData['Supplier_id'])];
//
            //type,date,stock_keeper_ID,supplier_ID
            $loginID = $this->getSession('userId');
            $stockKeeperId = intval($this->rawMaterialModel->getStockKeeperId($loginID));
            $stockData=["raw material",$fabricData['Date'],$stockKeeperId,intval($fabricData['Supplier_id'])];

            //type, quantity,description, stock_ID
            $rmData=["button",intval($fabricData['Quantity']), $fabricData['Description'],0];

            //btn_Id, raw_material_id
            $subTableData=[intval($fabricData['ButtonCodeID']),0];





                if ($this->rawMaterialModel->insertbuttonstock($stockData,$rmData,$subTableData)) {

                    echo '
                      <script>
                                    if(!alert("Button added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController"
                                    }
                      </script>

                    ';
                }

                else {

                    echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController"
                                }
                    </script>
                    ';

                }






        }

    }

/////////////////////////////////////////////////////////////////////////////////////

    public function loadThreadTable(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "rawMaterialData3") {


                $result = $this->rawMaterialModel->loadThreadTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col style='display: none'>Thread ID</th>
                            <th scope=col>Type</th>   
                            <th scope=col>Color_code</th>                        
                            <th scope=col>Unit Price</th> 
                           
                            <th scope=col>Quantity</th>                        
                            <th scope=col>Date</th>                             
                                                         
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td style='display: none'>$row->ID</td>
                                <td>$row->type</td>
                                <td>$row->code</td>
                                <td>$row->price</td>
                                <td>$row->quantity</td>   
                                 <td>$row->date</td>                             

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
    public function addThreadform(){
        $threadccode = $this->rawMaterialModel->getpredefinethreaddata();

        $this->view("stock/addThreadform",$threadccode);

    }
    public function addthread(){
        $threadData = [
            'threadCodeID'=> $this->input('thread_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),
            'Supplier_id' =>$this->input('supplierid'),



        ];




        if(empty( $threadData['threadCodeID'])|| empty( $threadData['Quantity']) || empty( $threadData['Description'])){

        }else{




            $Data = [ intval($threadData['Quantity']), $threadData['Description'], $threadData['Date'],intval($threadData['threadCodeID']),intval($threadData['Supplier_id'])];

            $loginID = $this->getSession('userId');
            $stockKeeperId = intval($this->rawMaterialModel->getStockKeeperId($loginID));
            $stockData=["raw material",$threadData['Date'],$stockKeeperId,intval($threadData['Supplier_id'])];

            //type, quantity,description, stock_ID
            $rmData=["thread",intval($threadData['Quantity']), $threadData['Description'],0];

            //btn_Id, raw_material_id
            $subTableData=[intval($threadData['threadCodeID']),0];

                if ($this->rawMaterialModel->insertthreadstock($stockData,$rmData,$subTableData)) {

                    echo '
                      <script>
                                    if(!alert("Threads added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController"
                                    }
                      </script>

                    ';
                }

                else {

                    echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                    window.location.href = "http://localhost/Richway-garment-system/rawMaterialToStockController"
                                }
                    </script>
                    ';

                }






        }

    }

    public function supplierDropdown(){
//        echo("<script>console.log('PHP in supplierDropdown called contoller: ');</script>");

        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierinstock") {

                $result = $this->rawMaterialModel->loadSupplierTable();
                echo ' <option  value="0" selected="" disabled="">--SELECT--</option>';
                foreach($result as $row){
//                        echo("<script>console.log('PHP in loadOrderItemsTable contoller: " . json_encode($row->predefine_button) . "');</script>");
                    echo '<option value="'.$row->supplier_ID .'" data-value="'.$row->supplier_ID.'"  >'.$row->name.'-'.$row->contact_no.'</option>';
                }
            }
        }
    }




    public function loadSupplierTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "supplierinstock2") {
                $result = $this->rawMaterialModel->loadSupplierTable();

                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col style='display: none'>Supplier ID</th>
                            <th scope=col>Name</thl>
                            <th scope=col>Email Address</th>
                            <th scope=col style='display: none'>Address</th>
                            <th scope=col>Contact Number</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='supid' style='display: none'>$row->supplier_ID  </td>
                                <td>$row->name</td>
                                 <td>$row->email</td>
                                  <td style='display: none'>$row->address</td>
                                <td>$row->contact_no</td>
                                
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
?>