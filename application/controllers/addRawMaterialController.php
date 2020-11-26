<?php 

class addRawMaterialController extends framework {

    /**
     * @var mixed
     */
    private $addItemModel;

    public function __construct(){
      if(!$this->getSession('userId')){
        $this->redirect("loginController/loginForm");
      }
         $this->helper("link");
         $this->addItemModel = $this->model('addRawMaterialModel');
    }





    public function index(){
        $orderids = $this->addItemModel->getData();

        $this->view("Stock/add-raw materials-item-form",$orderids);
    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "") {
                 $this->setSession("selected_role", $_POST[' role']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function addItemToStock(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "ButtonDetails"){
                $arrayList = $_POST['RawMaterial'];
                foreach ($arrayList as  $array){
                         $orderId = $array[0];
                         $orderItemId = intval($array[1]);
                         $mainThreeType = $array[2];
                         $style = $array[3];
                         $stylePart  = explode ("-", $style);

                         $quantity = intval($array[4]);
                         $unitPrice = floatval($array[5]);
                         $supplierId =intval($array[6]);

                        $loginID = $this->getSession('userId');

                        $stockKeeperId = intval($this->addItemModel->getStockKeeperId($loginID));

                        $date =date("Y-m-d");

                        $stockData = ['raw material',$date,$stockKeeperId,$supplierId];
                        $rmData = [$mainThreeType,$quantity,$unitPrice,$orderItemId,0];
                        $subTableData=[];



                        if($mainThreeType=="button"){

                            $type =$stylePart[0];
                            $colorCode =$stylePart[1];

                            $subTableData=[$type,$colorCode,0];


                            if($this->addItemModel->addNewItem($stockData,$rmData,$subTableData)){
                                echo("200");
                            }else{
                                echo("404");
                            }

                        }else if($mainThreeType=="fabric"){
                            $type =$stylePart[0];
                            $typeStyle = $stylePart[1];
                            $colorCode = $stylePart[2];

                            //fabric_ID	type style	color_code	raw_material_ID
                            $subTableData = [$type,$typeStyle,$colorCode,0];

                            if($this->addItemModel->addNewItem($stockData,$rmData,$subTableData)){
                                echo("200");
                            }else{
                                echo("404");
                            }

                        }else if($mainThreeType=="nool"){
                            $type =$stylePart[0];
                            $colorCode = $stylePart[1];
                             //nool_ID	type	color_code	raw_material_ID
                            $subTableData = [$type,$colorCode,0];

                            if($this->addItemModel->addNewItem($stockData,$rmData,$subTableData)){
                                echo("200");
                            }else{
                                echo("404");
                            }
                        }
                    }
                }
            }
    }










    public function loadOrderItemsTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "OrderId"){



                $result = $this->addItemModel->getOrderItemTable($_POST['role']);
                echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");
                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>order Item ID</th>
                            <th scope=col>Item type</th>
                            <th scope=col>Predefine Id</th>
                            <th scope=col>Type</th>
                            <th scope=col>Size</th>
                        </tr>
                        </thead>
                        <tbody>

                ";



                    foreach($result as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='empid' >$row->order_item_ID </td>
                                <td>$row->Item_type</td>
                                <td>$row->p_ID </td>
                                <td>$row->material</td>
                                <td>$row->material_design</td>
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

    public function loadOrderedbuttons()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "orderItemId") {

                $result = $this->addItemModel->getOrderedButtonStyle($_POST['role']);
               echo ' <option value="0" selected="" disabled="">--SELECT--</option>';


                foreach($result as $row){
                    echo '<option value="100" data-value="'.$row->button_shape.'-'.$row->button_color.'">'.$row->button_shape.'-'.$row->button_color.'</option>';
                }

            }
        }else{
            echo("<script>console.log('PHP: error" . "');</script>");
        }

    }
    public function loadOrderedfabric()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "orderItemId") {
               $result = $this->addItemModel->getOrderedFabricStyle($_POST['role']);
                 echo ' <option value="0" selected="" disabled="">--SELECT--</option>';


                foreach($result as $row){
                   echo '<option>'.$row->material.'-'.$row->material_design.'-'.$row->material_color.'</option>';
                }

            }
        }else{
            echo("<script>console.log('PHP: error" . "');</script>");
        }

    }
    public function loadOrderedNoolColor()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "orderItemId") {
                $result = $this->addItemModel->getOrderedNoolColor($_POST['role']);
                echo ' <option value="0" selected="" disabled="">--SELECT--</option>';


                foreach($result as $row){
                   echo '<option>'.$row->material.'-'.$row->nool_color.'</option>';
                }

            }
        }else{
            echo("<script>console.log('PHP: error" . "');</script>");
        }

    }
    public function setsuppliertable(){
           if(isset($_POST['key'])) {
               if ($_POST['key'] == "supliertablepop") {
                   $result = $this->addItemModel->getsuplliersDetails();

                   echo "

                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                        
                            <th scope=col>Supplier ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Contact Number</th>
                           
                        </tr>
                        </thead>
                        <tbody>

                ";
                   foreach ($result as $row) {

                       echo "
                            <tr class='tblrow' onclick='selectRow(event),selectSupplier()'>
                                <td id='supid'>$row->supplier_ID  </td>
                                <td>$row->name</td>
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
    public function loadButtonQuantity()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "orderItemId") {
                $result = $this->addItemModel->getEstimateQuantity($_POST['role']);
                $numerOfButton = number_format($result->nool_color)*number_format($result->quantity);
                //echo("<script>console.log('PHP in loadButtonQuantity contoller-result: " . json_encode($numerOfButton) . "');</script>");
                echo $numerOfButton;


            }
        }else{
            echo("<script>console.log('PHP: error" . "');</script>");
        }

    }










    public function logout(){

        $this->destroy();
        $this->redirect("loginController/loginForm");

    }

}


?>