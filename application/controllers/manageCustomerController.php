<?php


class manageCustomerController extends framework{
    private $manageCustomerModel;
    /**
     * @var mixed
     */
    private $customerModel;

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
                            <tr class='tblrow' onclick='selectRow(event)'>
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
            echo "200";

        }



    }


    public function loadupdateCustomerform(){
        $customer_ID = $this->getSession('selected_customer');

        $customerEdit = $this->customerModel->updateCustomer($customer_ID);
        $data = [
            'data'=>$customerEdit,
            'nameError'=> '',
            'nameErrorCheckFormat'=>'',
            'addressError'=> '',
            'contact_noError'=> '',
            'GenderError'=>'',
            'emailError'=>'',
            'emailErrorFormat'=>'',


        ];

        $this->view("admin/editCustomerform", $data);

    }

    public function updateCustomer()
    {
        $customer_ID = $this->input('hiddenID');
        $customerEdit = $this->customerModel->updateCustomer($customer_ID);
        $customerData = [
            'FullName' => $this->input('name'),
            'Address' => $this->input('address'),
            'contact_no' => $this->input('contact_no'),
            'Gender' => $this->input('Gender'),
            'email' => $this->input('email'),
            'hiddenID' => $this->input('hiddenID'),
            'data' => $customerEdit,
            'nameError' => '',
            'nameErrorCheckFormat' => '',
            'addressError' => '',
            'contact_noError' => '',
            'GenderError' => '',
            'emailError' => '',
            'emailErrorFormat' => '',
        ];


        if (empty($customerData['FullName'])) {
            $customerData['nameError'] = "Full name is required";
        }
        if (!preg_match("/^([a-zA-Z' ]+)$/", $customerData['FullName'])) {
            $customerData['nameErrorCheckFormat'] = "Only letters allowed";
        }
        if (empty($customerData['Address'])) {
            $customerData['addressError'] = "Address is required";
        }
        if (empty($customerData['contact_no'])) {
            $customerData['contact_noError'] = "Contact Number is required";
        }
        if (empty($customerData['Gender'])) {
            $customerData['GenderError'] = "Gender is required";
        }

        if (empty($customerData['email'])) {
            $customerData['emailError'] = "Email address is required";
        }
        if (!filter_var($customerData['email'], FILTER_VALIDATE_EMAIL)) {
            $customerData['emailErrorFormat'] = "Invalid email address ";
        }

       // echo("<script>console.log('PHP in edit: " . json_encode($customerData) . "');</script>");

        if (empty($customerData['nameError']) && empty($customerData['addressError']) && empty($customerData['contact_noError']) && empty($customerData['GenderError']) && empty($customerData['emailError']) && empty($customerData['emailErrorFormat'])) {

            if ($this->customerModel->editCustomer($customerData)) {

                echo '
              <script>
                            if(!alert("Customer Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageCustomerController/index";
                            }
              </script>

            ';

            } else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/editCustomerController/index";
                        }
            </script>
            ';

            }
        }

        else {
                $this->view("admin/editCustomerform", $customerData);


            }


        }




}






?>