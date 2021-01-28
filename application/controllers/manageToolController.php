<?php


class manageToolController extends framework{
    private $manageToolModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->manageToolModel = $this->model('manageToolModel');

    }

    public function index(){

        $this->view("admin/manageTool");
        echo("<script>console.log('PHP in index');</script>");


    }

     public function setNewSession(){
         if(isset($_POST['key'])) {
             if ($_POST['key'] == "ToolUpdate") {
                 $this->setSession("selected_tool", $_POST['stock_ID']);
                 return "Successfully set the session.";
             }
         }
         return "error";
     }


    public function loadToolTable(){

        echo("<script>console.log('PHP in index');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "toolTableInDash") {
                $result = $this->manageToolModel->loadToolTable();
                echo("<script>console.log('PHP in loadToolTable controller: " . json_encode($result) . "');</script>");

                echo "
                <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">                        
                        <tr>
                         
                            <th scope=col>Tool ID</th>
                          <th scope=col>Stock ID</th>
                            <th scope=col>Name</th>
                            <th scope=col>Description</th>
                            <th scope=col>Re-order Value</th>
                            <th scope=col>ABC analysis</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                            
                                <td>tool_ID$row->tool_ID</td>
                                <td>$row->stock_ID</td>
                                <td>$row->Name</td>
                                <td>$row->Description</td>
                                <td>$row->ReorderValue</td>
                                <td>$row->ABCanalysis</td>
                                
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

    public function addtoolform()
    {
        $this->view("admin/addtoolform");
    }

    public function addtool(){


        $toolData = [
            'stock_ID'=> $this->input('stock_ID'),
            'Name'=> $this->input('Name'),
            'Description'=>$this->input('Description'),
            'Re-order Value'=>$this->input('ReorderValue'),
            'ABC analysis'=>$this->input('ABCanalysis'),
            'stock_IDError'=> '',
            'NameError'=> '',
            'DescriptionError'=> '',
            'ReorderValueError'=> '',
            'ABCanalysisError'=> '',

        ];

        if(empty( $toolData['stock_ID'])){
            $toolData['stock_IDError']="stock_ID is required";
        }

        if(empty( $toolData['Name'])){
            $toolData['NameError']="Name is required";
        }

        if(empty( $toolData['Description'])){
            $toolData['DescriptionError']="Description is required";
        }

        if(empty( $toolData['Re-order Value'])){
            $toolData['ReorderValueError']="Re-order Value is required";
        }

        if(empty( $toolData['ABC analysis'])){
            $toolData['ABCanalysisError']="ABC analysis is required";
        }




        if(empty($toolData['stock_IDError'])&&empty($toolData['NameError'])&& empty($toolData['DescriptionError']) && empty($toolData['ReorderValueError'])&& empty($toolData['ABCanalysisError'])) {
            $Data = [$toolData['stock_ID'],$toolData['Name'], $toolData['Description'], $toolData['Re-order Value'],$toolData['ABC analysis'],1];


            if ($this->manageToolModel->inserttool($Data)) {

                echo '
                      <script>
                                    if(!alert("Tool added successfully")) {
                                        window.location.href = "http://localhost/Richway-garment-system/manageToolController/index"
                                    }
                      </script>

                    ';
            }
            else {

                echo '

                    <script>
                                if(!alert("Something went wrong! please try again.")) {
                                   window.location.href = "http://localhost/Richway-garment-system/manageToolController/addtoolform"
                                }
                    </script>
                    ';

            }
        }
        else {
            $this->view("admin/addtoolform", $toolData);

        }



    }



}
?>