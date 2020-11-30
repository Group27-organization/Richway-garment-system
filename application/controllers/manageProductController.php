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


    public function addProductView(){

        $product =  $this->getSession('selected_product');

        //echo("<script>console.log('PHP: " . json_encode($product) . "');</script>");

        $result = $this->manageProductModel->getNextProductID($product);

        $tblclmns = $this->manageProductModel->getProductTableColumns($product);

        $data = [
            'product_ID' => "ID".($result),
            'product' => ucwords(str_replace("_","-",$product)),
            'table_columns' => $tblclmns,
        ];


        $this->view("admin/addProduct",$data);
    }

    public function addProduct(){

        $product =  $this->getSession('selected_product');

        $result = $this->manageProductModel->getNextProductID($product);

        $tblclmns = $this->manageProductModel->getProductTableColumns($product);

        $prdTableData = [
            $result,
            $this->input('p_ID'),
        ];

        $emptyFlag = false;

        foreach ($tblclmns as $col){
            $col = $col->COLUMN_NAME;
            $value = $this->input($col);
            if(empty($value)){
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


}