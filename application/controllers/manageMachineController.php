<?php


class manageMachineController extends framework
{
    private $manageMachineModel;

    public function __construct()
    {
        if (!$this->getSession('userId')) {
            $this->redirect("loginController/loginForm");
        }


        $this->helper("link");
        $this->manageMachineModel = $this->model('manageMachineModel');

    }

    public function index()
    {

        $this->view("admin/manageMachine");
        echo("<script>console.log('PHP in index');</script>");


    }

    public function setNewSession()
    {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "MachineUpdate") {
                $this->setSession("selected_machine", $_POST['machine_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadMachineTable()
    {

        echo("<script>console.log('PHP in index');</script>");
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "machineTableInDash") {
                $result = $this->manageMachineModel->loadMachineTable();
                echo("<script>console.log('PHP in loadMachineTable controller: " . json_encode($result) . "');</script>");

                echo "
                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">                        
                        <tr>
                           <th scope=col>Machine ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Description</th>
                            <th scope=col>Re-order Value</th>
                            <th scope=col>ABC analysis</th>
                            <th scope=col>Warranty</th>
                            <th scope=col>Price</th>
                             
                            
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>$row->machine_ID</td>
                                <td>$row->Name</td>
                                <td>$row->Description</td>
                                <td>$row->ReorderValue</td>
                                <td>$row->ABCanalysis</td>
                                <td>$row->Warranty</td>
                                <td>$row->Price</td>
                              
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

    public function addmachineform()
    {
        $this->view("admin/addmachineform");
    }

    public function addmachine()
    {


        $machineData = [
            'Machine ID' => $this->input('machine_ID'),
            'Name' => $this->input('Name'),
            'Description' => $this->input('Description'),
            'Re-order Value' => $this->input('ReorderValue'),
            'ABC analysis' => $this->input('ABCanalysis'),
            'Warranty' => $this->input('Warranty'),
            'Price' => $this->input('Price'),
            'NameError' => '',
            'DescriptionError' => '',
            'ReorderValueError' => '',
            'ABCanalysisError' => '',
            'WarrantyError' => '',
            'PriceError' => '',

        ];


        if (empty($machineData['Name'])) {
            $machineData['NameError'] = "Name is required";
        }

        if (empty($machineData['Description'])) {
            $machineData['DescriptionError'] = "Description is required";
        }

        if (empty($machineData['Re-order Value'])) {
            $machineData['ReorderValueError'] = "Re-order Value is required";
        }

        if (empty($machineData['ABC analysis'])) {
            $machineData['ABCanalysisError'] = "ABC analysis is required";
        }

        if (empty($machineData['Warranty'])) {
            $machineData['WarrantyError'] = "Warranty is required";
        }

        if (empty($machineData['Price'])) {
            $machineData['PriceError'] = "Price is required";
        }


        if (empty($machineData['NameError']) && empty($machineData['DescriptionError']) && empty($machineData['ReorderValueError']) && empty($machineData['ABCanalysisError']) && empty($machineData['WarrantyError']) && empty($machineData['PriceError'])) {
            $Data = [$machineData['Machine ID'], $machineData['Name'], $machineData['Description'], $machineData['Re-order Value'], $machineData['ABC analysis'], $machineData['Warranty'], $machineData['Price'], 1];


            if ($this->manageMachineModel->insertmachine($Data)) {

                echo '
                      <script>
                                    if(!alert("Machine added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/manageMachineController/index"
                                    }
                      </script>

                    ';
            } else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                   window.location.href = "http://localhost/Richway-garment-system/manageMachineController/addmachineform"
                                }
                    </script>
                    ';

            }
        } else {
            $this->view("admin/addmachineform", $machineData);

        }


    }

    public function loadupdateMachineform(){
        $machine_ID = $this->getSession('selected_machine');

        $machineEdit = $this->manageMachineModel->updateMachine($machine_ID);
        $data = [
            'data'=>$machineEdit,
            'NameError' => '',
            'DescriptionError' => '',
            'ReorderValueError' => '',
            'ABCanalysisError' => '',
            'WarrantyError' => '',
            'PriceError' => '',


        ];

        $this->view("admin/editMachineform", $data);

    }

    public function updateMachine()
    {
        $machine_ID = $this->input('hiddenID');
        $machineEdit = $this->manageMachineModel->updateMachine($machine_ID);
        $machineData = [
           // 'Machine ID' => $this->input('machine_ID'),
            'Name' => $this->input('Name'),
            'Description' => $this->input('Description'),
            'Re-order Value' => $this->input('ReorderValue'),
            'ABC analysis' => $this->input('ABCanalysis'),
            'Warranty' => $this->input('Warranty'),
            'Price' => $this->input('Price'),
            'hiddenID' => $this->input('hiddenID'),
            'data' => $machineEdit,
            'NameError' => '',
            'DescriptionError' => '',
            'ReorderValueError' => '',
            'ABCanalysisError' => '',
            'WarrantyError' => '',
            'PriceError' => '',
        ];


        if (empty($machineData['Name'])) {
            $machineData['NameError'] = "Name is required";
        }

        if (empty($machineData['Description'])) {
            $machineData['DescriptionError'] = "Description is required";
        }

        if (empty($machineData['Re-order Value'])) {
            $machineData['ReorderValueError'] = "Re-order Value is required";
        }

        if (empty($machineData['ABC analysis'])) {
            $machineData['ABCanalysisError'] = "ABC analysis is required";
        }

        if (empty($machineData['Warranty'])) {
            $machineData['WarrantyError'] = "Warranty is required";
        }

        if (empty($machineData['Price'])) {
            $machineData['PriceError'] = "Price is required";
        }

        // echo("<script>console.log('PHP in edit: " . json_encode($customerData) . "');</script>");

        if (empty($machineData['NameError']) && empty($machineData['DescriptionError']) && empty($machineData['ReorderValueError']) && empty($machineData['ABCanalysisError']) && empty($machineData['WarrantyError']) && empty($machineData['PriceError'])) {
           // $updateData = [$machineData['Machine ID'], $machineData['Name'], $machineData['Description'], $machineData['Re-order Value'], $machineData['ABC analysis'], $machineData['Warranty'], $machineData['Price'], $machineData[ 'hiddenID'],];

            if ($this->manageMachineModel->editMachine($machineData)) {

                echo '
              <script>
                            if(!alert("Machine Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageMachineController/index";
                            }
              </script>

            ';

            } else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageMachineController/loadupdateMachineform";
                        }
            </script>
            ';

            }
        }

        else {
            $this->view("admin/editMachineform", $machineData);


        }


    }




}

    ?>
