<?php


class supervisorController extends framework{

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");

    }



    public function index(){

        $this->view("supervisor/markAttendance");
        echo("<script>console.log('PHP in index');</script>");
    }


    public function markAttendance(){
        $this->view("supervisor/markAttendance");
    }

    public function updateWorkload(){
        $this->view("supervisor/updateWorkload");
    }


    public function loadUpdateworkloadForm(){
        $this->view("supervisor/updateWorkloadForm");

    }


    public function updateWorkloadTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "workloadTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Job Id</th>
                            <th scope=col>Name</th>           
                            <th scope=col>Order Id</th>
                            <th scope=col>Quantity</th>
                            <th scope=col>Line Id</th>                      
                            <th scope=col>Current Workload</th> 
                            <th scope=col>Today Workload</th> 
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                echo "
                         <tr>
                            <td>J12</td>
                            <td>Saman Perera</td>                          
                            <td>O12</td>                                                      
                            <td>10</td>
                            <td>L12</td>    
                            <td>34</td>
                            <td>10</td>                     
                         
                        </tr>
                        <tr>
                            <td>J32</td>
                            <td>Kavishka Madushan</td>                           
                            <td>O12</td>
                            <td>10</td>
                            <td>L12</td>    
                            <td>35</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>J53</td>
                            <td>Sadew Amantha</td>                            
                            <td>O12</td>
                            <td>10</td>
                            <td>L12</td>                                
                            <td>37</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>J46</td>
                            <td>Kusal Mendis</td>                            
                            <td>O12</td>
                            <td>10</td>
                            <td>L12</td>    
                            <td>65</td>
                            <td>25</td>
                        </tr>
                        ";

            }
            echo "
                        </tbody>
                    </table>
                    
                    ";
        }


    }


    public function attendanceTable(){
        echo("<script>console.log('PHP in ndex');</script>");
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "attendanceTableInDash") {


                echo "

                 <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                                                
                            <th scope=col>Employee Id</th>
                            <th scope=col>Name</th>           
                            <th scope=col>Arrival Time</th>
                            <th scope=col>Departure Time</th>
                            <th scope=col>OT Hours</th>                      
                            
                           
                        </tr>
                        </thead>
                        <tbody>

                ";


                echo "
                         <tr>
                            <td>emp12</td>
                            <td>Saman Perera</td>                          
                            <td>8.30 am</td>
                            <td>7.30 pm</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>emp32</td>
                            <td>Kavishka Madushan</td>                           
                            <td>9.30 am</td>
                            <td>7.00 pm</td>
                            <td>1.30</td>
                        </tr>
                        <tr>
                            <td>emp53</td>
                            <td>Sadew Amantha</td>                            
                            <td>8.00 am</td>
                            <td>6.30 pm</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>emp46</td>
                            <td>Kusal Mendis</td>                            
                            <td>8.30 am</td>
                            <td>7.30 pm</td>
                            <td>2</td>
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