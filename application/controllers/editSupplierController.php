<?php

class editSupplierController extends framework {

    // *
    //  * @var mixed

    private $supplierModel;

    public function __construct()
    {
        if(!$this->getSession('userId')){

            $this->redirect("loginController/loginForm");

        }
        elseif ($this->getSession('userId')['role'] != 'admin'){
            $this->redirect("somePage");
            echo "You cannot access this page.";
            die();
        }


        $this->supplierModel = $this->model('supplierModel');
        $this->helper("link");
    }

    public function index(){

        echo("<script>console.log('PHP add sup');</script>");
        $this->view("admin/editSupplierform");
    }



    public function updateSupplier(){

        $supplierData = [

            'supplierName'=> $this->input('suplierName'),
            'emailAddress'=>$this->input('Eemailaddress'),
            'address'=>$this->input('address'),
            'contactNo'=>$this->input('contactno'),

        ];

        foreach ($supplierData as $key => $value){
            if(empty($value)){
                $isEmpty= true;
            }


            $Data=[$supplierData['supplierName'],$supplierData['emailAddress'],$supplierData['address'],$supplierData['contactNo']];

            if(!$isEmpty){
                if($this->supplierModel->insertSupplier($Data)){

                    echo '
                  <script>
                                if(!alert("Supplier Updated successfully")) {
                                    window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/index";
                                }
                            </script>
              
                ';

                }

                else {
                    echo '

                <script>
                            if(!alert("Something went wrong! please try again.")) {
                                window.location.href = "http://localhost/Richway-garment-system/editSupplierController/index";
                            }
                </script>
                ';

                }

            }//if(!isempty)
            else{
                echo '
              <script>
                  if(!alert("Some required fields are missing!")) {
                      window.location.href = "http://localhost/Richway-garment-system/editSupplierController/index";
                  }
              </script>
              ';
            }


        }

    }
}
?>
