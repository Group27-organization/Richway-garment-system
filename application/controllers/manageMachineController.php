<?php


class manageMachineController extends framework{
    private $manageMachineModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->manageMachineModel = $this->model('manageMachineModel');

    }

    public function index(){

        $this->view("admin/manageMachine");
        echo("<script>console.log('PHP in index');</script>");


    }

    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "MachineUpdate") {
                $this->setSession("selected_machine", $_POST['stock_ID']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadMachineTable(){

        echo("<script>console.log('PHP in index');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "machineTableInDash") {
                $result = $this->manageMachineModel->loadMachineTable();
                echo("<script>console.log('PHP in loadMachineTable controller: " . json_encode($result) . "');</script>");

                echo "
                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">                        
                        <tr>
                         <th scope=col>".ucwords(str_replace("_","-",$tblname))."ID</th>
                         <th scope=col>Stock ID</th>
                         <th scope=col>Line ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Description</th>
                            <th scope=col>Re-order Value</th>
                            <th scope=col>ABC analysis</th>
                            <th scope=col>Warrenty</th>
                           
                             
                            
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td id='ID'>$row->ID  </td>
                                 <td>$row->stock_ID</td>
                                  <td>$row->line_ID</td>
                                <td>$row->Name</td>
                                <td>$row->Description</td>
                                <td>$row->ReorderValue</td>
                                <td>$row->ABCanalysis</td>
                                <td>$row->Warrenty</td>
                              
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

    public function addmachine(){


        $machineData = [
            'stock_ID'=> $this->input('stock_ID'),
            'line_ID'=> $this->input('line_ID'),
            'Name'=> $this->input('Name'),
            'Description'=>$this->input('Description'),
            'Re-order Value'=>$this->input('ReorderValue'),
            'ABC analysis'=>$this->input('ABCanalysis'),
            'Warrenty'=> $this->input('Warrenty'),
            'stock_IDError'=> '',
            'line_IDError'=> '',
            'NameError'=> '',
            'DescriptionError'=> '',
            'ReorderValueError'=> '',
            'ABCanalysisError'=> '',
            'WarrentyError'=> '',

        ];



        if(empty( $machineData['stock_ID'])){
            $machineData['stock_IDError']="stock_ID is required";
        }


        if(empty( $machineData['line_ID'])){
            $machineData['line_IDError']="line_ID is required";
        }

        if(empty( $machineData['Name'])){
            $machineData['NameError']="Name is required";
        }

        if(empty( $machineData['Description'])){
            $machineData['DescriptionError']="Description is required";
        }

        if(empty( $machineData['Re-order Value'])){
            $machineData['ReorderValueError']="Re-order Value is required";
        }

        if(empty( $machineData['ABC analysis'])){
            $machineData['ABCanalysisError']="ABC analysis is required";
        }

        if(empty( $machineData['Warrenty'])){
            $machineData['WarrentyError']="Warrenty is required";
        }




        if(empty($machineData['stock_IDError'])&&empty($machineData['line_IDError'])&&empty($machineData['NameError'])&& empty($machineData['DescriptionError']) && empty($machineData['ReorderValueError'])&& empty($machineData['ABCanalysisError'])&& empty($machineData['WarrentyError'])){
            $Data = [$machineData['stock_ID'],$machineData['line_ID'],$machineData['Name'], $machineData['Description'], $machineData['Re-order Value'],$machineData['ABC analysis'],$machineData['Warrenty'],1];


            if ($this->manageMachineModel->insertmachine($Data)) {

                echo '
                      <script>
                                    if(!alert("Machine added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/manageMachineController/index"
                                    }
                      </script>

                    ';
            }
            else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                   window.location.href = "http://localhost/Richway-garment-system/manageMachineController/addmachineform"
                                }
                    </script>
                    ';

            }
        }
        else {
            $this->view("admin/addmachineform", $machineData);

        }



    }



}
?>
