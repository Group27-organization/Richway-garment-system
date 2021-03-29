<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

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

       $this->helper("link");
       $this->manageProductModel = $this->model('manageProductModel');
    }

    public function index(){
        $types = $this->manageProductModel->getProductTypes();
        $this->view("admin/manageProducts",$types);
    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageProductData") {
                $this->setSession("selected_product", $_POST['productName']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadTable(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "manageProductData"){
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
                            <th scope=col></th>
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
                                 <th>
                                 <a href='#' class='viewBtn' style='margin: 4px;color: #11cdef'> View </a>
                                </th>
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


    public function addProductView(){

        $product =  $this->getSession('selected_product');

        //echo("<script>console.log('PHP: " . json_encode($product) . "');</script>");

        $tblclmns = $this->manageProductModel->getProductTableColumns($product);

        $data = [
            'product' => ucwords(str_replace("_","-",$product)),
            'table_columns' => $tblclmns,
        ];


        $this->view("admin/addProduct",$data);
    }


    public function loadDesignTemplates(){

        if(isset($_POST['key'])){
            if($_POST['key'] == "loadDesignTemplateData"){

                $result = $this->manageProductModel->loadDesignTemplateData($this->getSession('selected_product'));

                //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

                $count = 0;
                if($result !== -1){

                    foreach($result as $row){

                        if($count == 0){
                            echo '<div class="first-row">';
                        }
                        elseif ($count == 2){
                            echo '<div class="second-row">';
                            $count = -2;
                        }

                        $imgurl = str_replace('.png','',$row->image_url);
                        $imgurl = $imgurl."-trans.png";
// <div id='productSizes' style='display: none'>$row->size</div>

                        $sizesStr = $this->manageProductModel->getRemainedSizes($this->getSession('selected_product'),$row->p_ID);

                        echo "
                                <div class=\"product-container\">
                                <div class=\"product\">
                                    <div class=\"product-preview\">
                                        <img src=\"".BASEURL."/public/assets/img/$imgurl\" style=\"width: 100%; height: 100%; object-fit: scale-down;\">
                                    </div>
                                    <div class=\"product-info\">
                                        <div class=\"product-top\">
                                            <h6>Description</h6>
                                            <h4 id='desc'>$row->description</h4>
                                        </div>
                                        <div class=\"product-bottom\">
                                            <button type=\"button\" class=\"slctbtn cripple\" onclick=\"selectPID(event,'$row->p_ID','$row->description','$sizesStr')\">Select
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ";

                        $count += 1;
                    }
                }
                else{
                    echo "
                        <br><p  style=\"text-align: center;\">There is no design template to the display!</p>
                   ";
                }


            }


        }

    }


    public function addProduct(){

        $product =  $this->getSession('selected_product');

        $result = $this->manageProductModel->getNextProductID($product);

        $tblclmns = $this->manageProductModel->getProductTableColumns($product);

        $pid = preg_replace('/[^0-9]/', '', $this->input('Select_Design_Category'));

        $prdTableData = [
            $result,
            $pid,
        ];

        $emptyFlag = false;

        foreach ($tblclmns as $col){
            $col = $col->COLUMN_NAME;
            echo("<script>console.log('PHP: " . json_encode($col) . "');</script>");
            $value = $this->input($col);
            if(!empty($value)){
               array_push($prdTableData,$value);
            }
            else{
                $emptyFlag = true;
            }
        }


        if(!$emptyFlag){


            if($this->manageProductModel->addSubProductData($prdTableData,$product)){
                echo '
                    <script>
                        if(!alert("Product details saved successfully.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageProductController/index"
                        }
                    </script>
            ';
            }
            else{
                echo '
            <script>
                if(!alert("Something went wrong! please try again.")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageProductController/addProductView"
                }
            </script>
            ';

            }
        }
        else{
            echo '
            <script>
                if(!alert("Some required fields are missing!")) {
                    window.location.href = "http://localhost/Richway-garment-system/manageProductController/addProductView"
                }
            </script>
            ';
        }

    }



    public function addPredefineView(){
        $product =  $this->getSession('selected_product');
        echo("<script>console.log('PHP in addPredefine: " . json_encode($product) . "');</script>");
        $data = [
            'product' => $product
        ];
        $this->view("admin/addPredefine",$data);

    }




    public function addPredefine(){
        $product =  $this->getSession('selected_product');
        $predefineProduct=[
            $product,
            $this->input('HandType'),
            $this->input('CollarType'),
            $this->input('NormalTailoringCost'),
            $this->input('Description'),
            $this->input('RatePerHourFromLine'),
            $this->input('MinimumProfitMargin'),
            $this->input('Style'),
            $this->input('Sizes'),
            $this->input('Image_Url'),

        ]
        ;


        if ($this->manageProductModel->addPredefine($predefineProduct)) {

            echo '
                              <script>
                                            if(!alert("New predefine product added successfully")) {
                                                window.location.href = "http://localhost/Richway-garment-system/manageProductController/index"
                                            }
                              </script>
        
                            ';
        }
        else {
            echo '

                            <script>
                                        if(!alert("Something went wrong! please try again.")) {
                                            window.location.href = "http://localhost/Richway-garment-system/manageProductController/addPredefineView"
                                        }
                            </script>
                            ';

        }
    }


}
