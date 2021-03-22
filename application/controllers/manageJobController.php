<?php

//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

class manageJobController extends framework {

    /**
     * @var mixed
     */
    private $manageJobModel;

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("loginController/loginForm");

      }

       $this->helper("link");
       $this->manageJobModel = $this->model('manageJobModel');
    }


    public function setNewSession(){
        if(isset($_POST['key'])) {
            if ($_POST['key'] == "manageUserData") {
                $this->setSession("selected_role", $_POST['role']);
                return "Successfully set the session.";
            }
        }
        return "error";
    }


    public function loadOrderTable(){
        if(isset($_POST['key'])){
            if($_POST['key'] == "manageJobData"){

                $result = $this->manageJobModel->loadOrdTable();

                echo " 
                        <table class=\"table align-items-center table-flush\">
                        <thead class=\"thead-light\">
                        <tr>
                            <th scope=col>Order Item ID</th>
                            <th scope=col>Quantity</th>
                            <th scope=col>Order ID</th>
                            <th scope=col>Order Description</th>
                            <th scope=col>Predefined ID</th>
                            <th scope=col>Order Due Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                ";

                if($result['status'] === 'ok'){

                    foreach($result['data'] as $row){

                        echo "
                            <tr class='tblrow' onclick='selectRow(event)'>
                                <td>OITM$row->order_item_ID</td>
                                <td>$row->quantity</td>
                                <td>ORD$row->order_ID</td>
                                <td>$row->description</td>
                                <td>$row->p_ID</td>
                                <td>$row->order_due_date</td>                           
                            </tr>
                        ";

                    }
                }
                else if($result['status'] === 'tableIsEmpty') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">There is no any data to the display!</td>
                    </tr>
                   ";
                }
                else if($result['status'] === 'error') {
                    echo "
                    <tr class=active-row>
                        <td colspan=5 style=\"text-align: center;\">Something went wrong!</td>
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


    public function createJobView(){
        $this->view("admin/createJob");
    }


//  {
//      {
//            order_id: 122,
//            quantity: 5000,
//            p_ID: 2,
//      }
//      {
//            order_id: 103,
//            quantity: 2000,
//            p_ID: 1,
//      }
//  }

    //Calculate Order Due Date Process
    public function calculateOrderDueDate($data){
        $ttt = $this->calculateTotalTailoringTime($data);
        $this->calculateNormalDueDate($ttt);
        return 0;
    }

    public function calculateTotalTailoringTime($data){
        $ttt = 0;
        foreach ($data as $item ){
            $lph =  $this->manageJobModel->getLPH($item['p_ID']);
            $ttt += $item['quantity'] / $lph;
        }
        return $ttt;
    }


    public function calculateNormalDueDate($ttt){
        $sortedLinesArr = $this->sortAvailableLines();
        return 0;
    }

    //job-shop scheduling (use earliest available lines)
    public function sortAvailableLines(){
        return $this->manageJobModel->getSortedAvailableLinesArr();
    }

    //job-shop scheduling (use earliest available lines)
    public function useStandByLines(){
        $this->calculateNormalDueDate();
        return 0;
    }

    public function optimize(){
        return 0;
    }

    //remove available lines hours
    public function getRemainingHoursOfNewOrd(){
        return 0;
    }
}
