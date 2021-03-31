<?php


class addCustomerController extends framework{
private $manageCustomerModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");

        $this->manageCustomerModel = $this->model('addCustomerModel');
    }

public function index(){
    
 $this->view("Salesmanjor/addCustomer");
//echo("<script>console.log('PHP in index');</script>");


    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "customeradd") {
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

                <table class=content-table>
                        <thead>
                        <tr>
                        
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Gender</th>
                            <th>Email</th>
                            
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

    public function addCustomer()
    {
        echo("<script>console.log('PHP addCustomer');</script>");
        $customerData = [
            'name' => $this->input('name'),
            'address' => $this->input('address'),

            'contact_no' => $this->input('contact_no'),
            'Gender' => $this->input('gender'),
            'email' => $this->input('email'),
        ];
        //customer_ID
//name
//contact_no
//email
//address
//active
        $addData = [$customerData['name'],intval($customerData['contact_no']),$customerData['email'], $customerData['address'], $customerData['Gender'],1];


        echo("<script>console.log('PHP in  contoller: " . json_encode($addData) . "');</script>");



                if ($this->manageCustomerModel->insertCustomer($addData)) {
                    echo("<script>console.log('true');</script>");
                    echo '
              <script>
                            if(!alert("Customer Added successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/addCustomerController";
                            }
              </script>

            ';

                } else {
                    echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/addCustomerController";
                        }
            </script>
            ';

                }


        }





}






?>