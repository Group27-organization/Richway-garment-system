<?php


class manageCustomerController extends framework{
private $manageCustomerModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->manageCustomerModel = $this->model('manageCustomerModel');
        $this->customerModel = $this->model('customerModel');
    }

public function index(){
    
 $this->view("admin/manageCustomer",$data);
echo("<script>console.log('PHP in index');</script>");


    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "customerUpdate") {
                $this->setSession("selected_customer", $_POST['customer_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }



    public function loadCustomerTable(){
        echo("<script>console.log('PHP in index');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "customerTableInDash") {
                $result = $this->manageCustomerModel->loadCustomerTable();
                 echo("<script>console.log('PHP in loadCustomerTable contoller: " . json_encode($result) . "');</script>");

                echo "
                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">                        
                        <tr>
                        
                            <th scope=col>Customer ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Address</th>
                            <th scope=col>Contact Number</th>
                            <th scope=col>Gender</th>
                            <th scope=col>Email</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event),selectCustomer()'>
                                <td id='customer_ID'>$row->customer_ID  </td>
                                <td>$row->name</td>
                                <td>$row->address</td>
                                <td>$row->contact_no</td>
                                <td>$row->Gender</td>
                                <td>$row->email</td>
                              


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

    

    public function deleteCustomer(){
        $id=$_POST['customer_ID'];
       
       if($this->manageCustomerModel->deleteCustomer($id)){
        //echo "Customer Removed successfully";
         echo '
          <script>
                        if(!alert("Customer removed successfully")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageCustomerController/index"
                        }
                    </script>
      
        ';

       }
          
        

}


public function loadupdateCustomerform(){
    $customer_ID = $this->getSession('selected_customer');
  
    $data = $this->customerModel->updateCustomer($customer_ID);
    
    $this->view("admin/editCustomerform",$data);
     
 }

  public function updateCustomer(){
      $customer_ID= $this->input('hiddenID');
      $customerEdit=$this->customerModel->updateCustomer($customer_ID);
      $customerData = [
       'name'=>$this->input('name'),
       'address'=>$this->input('address'),
       'data'=>$customerEdit,
       'hiddenID'=>$this->input('hiddenID'),
       'contact_no'=>$this->input('contact_no'),
       'Gender'=>$this->input('Gender'),
       'email'=>$this->input('email'),
    ];



    foreach ($customerData as $key => $value){
        if(empty($value)){
            $isEmpty= true;
        }


        $updateData=[$customerData['name'],$customerData['address'],$customerData['contact_no'],$customerData['Gender'],$customerData['email'],$customerData[ 'hiddenID'],];

        if(!$isEmpty){
            if($this->customerModel->editCustomer($updateData)){

            echo '
              <script>
                            if(!alert("Customer Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageCustomerController/index";
                            }
              </script>

            ';

            }

            else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/editCustomerController/index";
                        }
            </script>
            ';

            }

        }//if(!isempty)
        else{
            echo '
          <script>
              if(!alert("Some required fields are missing!")) {
                  window.location.href = "http://localhost/Richway-garment-system/editCustomerController/index";
              }
          </script>
          ';
        }


    }

}





}






?>