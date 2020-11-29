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
                $this->setSession("selected_role", $_POST['type']);
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
                            <th scope=col> ID</th>
                            <th scope=col>Fabric Code</th>   
                            <th scope=col>Band</th> 
                            <th scope=col>Quality Grade</th>
                            <th scope=col>Uint Price</th> 
                            <th scope=col>Description</th> 
                            <th scope=col>Quantity</th> 
                            <th scope=col>Date</th> 
                              
                               
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                 <td>$row->ID</td>
                                 <td>$row->fabric_code</td>   
                                 <td>$row->band</td>                                
                                 <td>$row->quality_grade</td>                                
                                 <td>$row->unit_price</td>
                                 <td>$row->description</td>
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

    public function addfabric2(){
        $fabricData = [
            'FabricCodeID'=> $this->input('fabric_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),



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
          }else{
              foreach ($fabricData as $key => $value){
                  if(empty($value)){
                      $isEmpty= true;
                  }
              }


              /*if(empty($fabricData['fabric_codeError'])&&empty($fabricData['fabric_typeError'])&&
                  empty($fabricData['DescriptionError'])&&empty($fabricData['colorError'])&&
                  empty($fabricData['bandError'])&&empty($fabricData['quality_gradeError'])&&
                  empty($fabricData['brandError'])&&empty($fabricData['priceError'])) {*/
              echo("<script>console.log('PHP in     : " . json_encode($fabricData['Quantity']) . "');</script>");

              $Data = [ intval($fabricData['Quantity']), $fabricData['Description'], $fabricData['Date'],intval($fabricData['FabricCodeID'])];

              if(!$isEmpty){
                  if ($this->rawMaterialModel->insertfabrictostock($Data)) {

                      echo '
                      <script>
                                    if(!alert("Fabric added successfully")) {
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

    }


    public function addfabric(){
        $fabricData = [
            'FabricCodeID'=> $this->input('fabric_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),


        ];


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

            $Data = [ intval($fabricData['Quantity']), $fabricData['Description'], $fabricData['Date'],intval($fabricData['FabricCodeID'])];

            if ($this->rawMaterialModel->insertfabrictostock($Data)) {

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




    public function loadButtonTable(){

        if (isset($_POST['key'])) {

            if ($_POST['key'] == "rawMaterialData2") {



                $result = $this->rawMaterialModel->loadButtonTable();


                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>ID</th> 
                             <th scope=col>Code</th> 
                             <th scope=col>Unit Price</th> 
                            <th scope=col>Description</th>   
                            <th scope=col>Quantity</th>                        
                            <th scope=col>Date</th> 
                             
                            
                             
                        </tr>
                        </thead>
                        <tbody>
                        
                ";


                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->ID</td>
                                 <td>$row->code</td>
                                 <td>$row->unit_price</td>
                                 <td>$row->description</td>
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



        ];
        echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($fabricData) . "');</script>");




        if(empty( $fabricData['ButtonCodeID']) || empty( $fabricData['Quantity']) || empty( $fabricData['Description'])){


        }else{





            $Data = [ intval($fabricData['Quantity']), $fabricData['Description'], $fabricData['Date'],intval($fabricData['ButtonCodeID'])];


                if ($this->rawMaterialModel->insertbuttonstock($Data)) {

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
                            <th scope=col>Thread ID</th>
                            <th scope=col>Type</th>   
                            <th scope=col>Color_code</th>                        
                            <th scope=col>Unit Price</th> 
                            <th scope=col>Description</th>   
                            <th scope=col>Quantity</th>                        
                            <th scope=col>Date</th>                             
                                                         
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
                                <td>$row->unit_price</td>
                                 <td>$row->description</td>
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
            'ButtonCodeID'=> $this->input('thread_code_id'),
            'Quantity'=>$this->input('quantity'),
            'Description'=>$this->input('description'),
            'Date'=>date('Y-m-d'),



        ];




        if(empty( $threadData['ButtonCodeID'])|| empty( $threadData['Quantity']) || empty( $threadData['Description'])){

        }else{




            $Data = [ intval($threadData['Quantity']), $threadData['Description'], $threadData['Date'],intval($threadData['ButtonCodeID'])];


                if ($this->rawMaterialModel->insertthreadstock($Data)) {

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



////////////////////////////////////////////////////
//editfabric






}
?>