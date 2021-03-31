<?php


class dashbordChartController extends framework{
    private $dashbordChartModel;

    public function __construct(){
        if(!$this->getSession('userId')){
            $this->redirect("loginController/loginForm");
        }
        $this->helper("link");
        $this->dashbordChartModel = $this->model('dashbordChartModel');
    }







//    public function orderEvent(){
//
//        if (isset($_POST['key'])) {
//            if ($_POST['key'] == "orderEventCalender") {
//
//                $result = $this->dashbordChartModel->loadOrderEvent();
//
//                echo json_encode($result);
//
//            }
//        }
//    }
    public function employeeCountPerType(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "empType") {
                $result=[];

                $empCount =$this->dashbordChartModel->employeeTotalCount();
                $empGroup = $this->dashbordChartModel->employeeGroup();
                foreach($empGroup as $row){

                    $result1 = $this->dashbordChartModel->loadEmpCount($row->role);


                    $result1->y =(floatval($result1->y)/floatval($empCount->empcount))*100;
                     array_push($result,$result1);
                }
              echo json_encode($result);

            }
        }
    }

    public function empCountPerYear(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "countPerYear") {

                $result =$this->dashbordChartModel->empCountPerYear();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");
                echo json_encode($result);

            }
        }
    }

    public function supDailyWorkload(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "workloadMulti") {
                $result=[];
                $complete =$this->dashbordChartModel->last5daysCompletedWorkload();
                $target =$this->dashbordChartModel->last5daysTargetWorkload();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");
                array_push($result,$complete);
                array_push($result,$target);

                echo json_encode($result);
//                echo json_encode($target);

            }
        }
    }


    public function FabricsQuantity(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "fabCount") {

                $result =$this->dashbordChartModel->FabricsQuantity();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");
                echo json_encode($result);

            }
        }
    }
    public function ButtonQuantity(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "btnCount") {

                $result =$this->dashbordChartModel->ButtonQuantity();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");
                echo json_encode($result);

            }
        }
    }
    public function NoolQuantity(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "noolCount") {

                $result =$this->dashbordChartModel->NoolQuantity();
//                echo("<script>console.log('PHP in loadSupplierTable contoller: " . json_encode($result) . "');</script>");
                echo json_encode($result);

            }
        }
    }
    public function fabricTypePie(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "pieFabric") {

                $result =$this->dashbordChartModel->fabricTypePie();
                foreach($result as $row){

                    $total = $this->dashbordChartModel->totalFabricsQuantity();


                    $row->y =(floatval($row->y)/floatval($total->c))*100;

                }


                echo json_encode($result);

            }
        }
    }
    public function noolTypePie(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "pieFabric") {

                $result =$this->dashbordChartModel->fabricTypePie();
                foreach($result as $row){

                    $total = $this->dashbordChartModel->totalFabricsQuantity();


                    $row->y =(floatval($row->y)/floatval($total->c))*100;

                }


                echo json_encode($result);

            }
        }
    }
    public function buttonColums(){

        if (isset($_POST['key'])) {
            if ($_POST['key'] == "colBtn") {

                $result =$this->dashbordChartModel->ButtonQuantity();

                echo json_encode($result);

            }
        }
    }

    //owner
    public function loadLastYearTopSalesProduct(){
        if (isset($_POST['key'])) {
            if ($_POST['key'] == "loadLastYearTopSalesProduct") {

                $result =$this->dashbordChartModel->loadLastYearTopSalesProduct();

                echo json_encode($result);

            }
        }
    }




}






?>