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
             if ($_POST['key'] == "toolUpdate") {
                 $this->setSession("selected_tool", $_POST['tool_ID']);
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
                            <th scope=col>Name</th>
                            <th scope=col>Description</th>
                            <th scope=col>Re-order Value</th>
                            <th scope=col>ABC analysis</th>
                             <th scope=col>Price</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                ";
                foreach ($result as $row) {

                    echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                            
                                <td>$row->tool_ID</td>
                                <td>$row->Name</td>
                                <td>$row->Description</td>
                                <td>$row->ReorderValue</td>
                                <td>$row->ABCanalysis</td>
                                <td>$row->price</td>
                                
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
            'Tool ID'=> $this->input('tool_ID'),
            'Name'=> $this->input('Name'),
            'Description'=>$this->input('Description'),
            'Re-order Value'=>$this->input('ReorderValue'),
            'ABC analysis'=>$this->input('ABCanalysis'),
            'Price'=> $this->input('price'),
            'NameError'=> '',
            'DescriptionError'=> '',
            'ReorderValueError'=> '',
            'ABCanalysisError'=> '',
            'PriceError'=> '',
        ];



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

        if(empty( $toolData['Price'])){
            $toolData['PriceError']="Price is required";
        }




        if(empty($toolData['NameError'])&& empty($toolData['DescriptionError']) && empty($toolData['ReorderValueError'])&& empty($toolData['ABCanalysisError'])&& empty($toolData['PriceError'])) {
            $Data = [$toolData['Tool ID'],$toolData['Name'], $toolData['Description'], $toolData['Re-order Value'],$toolData['ABC analysis'],$toolData['Price'],1];


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

    public function loadupdateToolform(){
        $tlID = $this->getSession('selected_tool');

        $toolEdit = $this->manageToolModel->updateTool($tlID);
        //echo("<script>console.log('PHP in toolEdit controller: " . json_encode($toolEdit) . "');</script>");
        //{"tool_ID":"1","Name":"snzmn","Description":"aznmnmn","ReorderValue":"2759","ABCanalysis":"A-Low Value & High Stock","price":"1000","active":"1"}

        $data = [
            'data'=>$toolEdit,
            'NameError'=> '',
            'DescriptionError'=> '',
            'ReorderValueError'=> '',
            'ABCanalysisError'=>'',
            'PriceError'=>'',

        ];
        echo("<script>console.log('PHP in data controller: " . json_encode($data['data']) . "');</script>");

        $this->view("admin/editToolform", $data);

    }

    public function updateTool(){

       // $tool_ID= intval($this->input('hiddenID'));
        $tool_ID = $this->getSession('selected_tool');
        $toolEdit=$this->manageToolModel->updateTool($tool_ID);
        $toolData = [
            'Name'=> $this->input('Name'),
            'Description'=>$this->input('Description'),
            'Re-order Value'=>$this->input('ReorderValue'),
            'ABC analysis'=>$this->input('ABCanalysis'),
            'Price'=> $this->input('price'),
            'hiddenID'=>$this->input('hiddenID'),
            'data'=>$toolEdit,
            'NameError'=> '',
            'DescriptionError'=> '',
            'ReorderValueError'=> '',
            'ABCanalysisError'=>'',
            'PriceError'=>'',
        ];

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

        if(empty( $toolData['Price'])){
            $toolData['PriceError']="Price is required";
        }




        if (empty($toolData['NameError']) && empty($toolData['DescriptionError']) && empty($toolData['ReorderValueError']) &&  empty($toolData['ABCanalysisError']) && empty($toolData['PriceError'])) {

          //  $toolData=[$toolData['Name'],$toolData['Description'],$toolData['Re-order Value'],$toolData['ABC analysis'],$toolData['Price'],$toolData[ 'hiddenID'],];

            if ($this->manageToolModel->editTool($toolData)) {

                echo '
              <script>
                            if(!alert("Tool Updated successfully")) {
                                window.location.href = "http://localhost/Richway-garment-system/manageToolController/index";
                            }
              </script>

            ';

            } else {
                echo '

            <script>
                        if(!alert("Something went wrong! please try again.")) {
                            window.location.href = "http://localhost/Richway-garment-system/manageToolController/index";
                        }
            </script>
            ';

            }
        }

        else {
            $this->view("admin/editToolform", $toolData);


        }


    }




}
?>