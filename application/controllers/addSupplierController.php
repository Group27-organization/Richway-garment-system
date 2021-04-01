 <?php

 class addSupplierController extends framework {

     
    private $supplierModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }
      elseif ($this->getSession('userId')['role'] != 'stock_keeper'){
          $this->redirect("somePage");
          echo "You cannot access this page.";
          die();
      }

       
       $this->supplierModel = $this->model('supplierModel');
       $this->helper("link");
      }

      public function index(){
        echo("<script>console.log('PHP add sup');</script>");
        $this->view("addSupplier");
      }



      public function addSupplier(){
          echo("<script>console.log('PHP in addSupplier');</script>");
        
          $supplierData = [
            
            'supplierName'=> $this->input('suplierName'),
            'emailAddress'=>$this->input('emailaddress'),
            'address'=>$this->input('address'),
            'contactNo'=>$this->input('contactno'),
            'active' =>1,
            ];

            foreach ($supplierData as $key => $value){
                if(empty($value)){
                    $isEmpty= true;
                }
            }

            $Data=[$supplierData['supplierName'],$supplierData['emailAddress'],$supplierData['address'],$supplierData['contactNo'],1];

            if(!$isEmpty){
                  if($this->supplierModel->insertSupplier($Data)){

                    echo '
                      <script>
                                    if(!alert("Supplier added successfully")) {
                                        
                                        window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/addSupplierForm";
                                    }
                                </script>

                    ';

                  }

                  else {

                    echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                   
                                    window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/addSupplierForm";
                                }
                    </script>
                    ';

                   }

            }//if(!isempty)
            else{
                  echo '
                  <script>
                      if(!alert("Some required fields are missing!")) {
                        
                          window.location.href = "http://localhost/Richway-garment-system/manageSupplierController/addSupplierForm";
                      }
                  </script>
                  ';
            }




  }
}
?>
 