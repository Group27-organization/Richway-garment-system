<?php


class productionManagerController extends framework{
    private $manageSupplierModel;
    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");

    }



    public function index(){

        $this->view("productionManager/createJob");
        echo("<script>console.log('PHP in index');</script>");



    }


    public function createJob(){
        $this->view("productionManager/createJob");
    }

    public function loadcreateJobform(){
        $this->view("productionManager/createJobform");
    }

    public function updateJob(){
        $this->view("productionManager/updateJob");
    }

    public function loadupdateJobform(){
        $this->view("productionManager/updateJobform");
    }


    public function cancelJob(){
        $this->view("productionManager/cancelJob");
    }


    public function loadJobTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "jobTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Order Id</th>
                            <th scope=col>Name</th>                            
                            <th scope=col>Item Count</th>
                            <th scope=col>Customer</th>
                            <th scope=col>Due Date</th>
                            
                            
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                    echo "
                         <tr>
                            <td>o12</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Sampath Perera</td>
                            <td>2020-10-23</td>
                        </tr>
                        <tr>
                            <td>o13</td>
                            <td>John Keels</td>
                            <td>12</td>
                            <td>Sadew Amantha</td>
                            <td>2020-11-01</td>
                        </tr>
                        <tr>
                            <td>O14</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Kavishka Madhushan</td>
                            <td>2020-11-04</td>
                        </tr>
                        <tr>
                            <td>O15</td>
                            <td>John Keels</td>
                            <td>10</td>
                            <td>Sithum Dulanjana</td>
                            <td>2020-11-10</td>
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






?>