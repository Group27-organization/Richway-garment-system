<?php

class dashbordChartModel extends database {


   
    public function loadOrderEvent(){
	    if($this->Query("SELECT order_description AS title,start_date AS start,order_due_date AS end,order_status AS color FROM orders WHERE order_status='starts'")){

	        return $this->fetchall();
        }
    }
    public function loadEmpCount($role){
        if($this->Query("SELECT  COUNT(`employee_role`) AS y ,employee_role AS label FROM employee WHERE employee_role=?",[$role])){

            return $this->fetch();
        }

    }
    public function employeeGroup(){
        if($this->Query("SELECT employee_role AS role FROM employee GROUP BY employee_role")){

            return $this->fetchall();
        }

    }
    public function employeeTotalCount(){
        if($this->Query("SELECT COUNT(*) AS empcount FROM employee")){

            return $this->fetch();
        }
    }
    public function empCountPerYear(){

        if($this->Query("SELECT  COUNT(*) AS y,YEAR(job_start_date) AS label FROM employee GROUP BY label ORDER BY label")){

            return $this->fetchall();
        }
    }
    public function last5daysCompletedWorkload(){

        if($this->Query("SELECT `Date` AS x ,`today_completed_workload`AS y FROM `workload` GROUP BY `Date` DESC LIMIT 5")){

            return $this->fetchall();
        }
    }
    public function last5daysTargetWorkload(){

        if($this->Query("SELECT  `Date` AS x ,`required_workload` AS y FROM `workload` GROUP BY `Date` DESC LIMIT 5")){

            return $this->fetchall();
        }
    }

    public function FabricsQuantity(){
        if($this->Query("SELECT SUM(quantity) AS y,type AS label  FROM `predefine_fabric` GROUP BY `type`")){

            return $this->fetchall();
        }

    }
    public function ButtonQuantity(){
        if($this->Query("SELECT SUM(quantity) AS y,code AS label  FROM `predefine_button` GROUP BY `code`")){

            return $this->fetchall();
        }

    }
    public function NoolQuantity(){
        if($this->Query("SELECT SUM(quantity) AS y,type AS label  FROM `predefine_nool` GROUP BY `type`")){

            return $this->fetchall();
        }

    }

    public function fabricTypePie(){
        if($this->Query("SELECT SUM(raw_material.quantity) AS y, predefine_fabric.fabric_code AS label FROM stock JOIN raw_material ON stock.stock_ID =raw_material.stock_ID JOIN stock_fabric ON stock_fabric.raw_material_ID = raw_material.raw_material_ID JOIN predefine_fabric ON predefine_fabric.ID=stock_fabric.predefind_fabricID GROUP BY predefine_fabric.ID")){

            return $this->fetchall();
        }

    }

    public function totalFabricsQuantity(){
        if($this->Query("SELECT SUM(quantity) AS c FROM `predefine_fabric`")){

            return $this->fetch();
        }

    }

    public function loadLastYearTopSalesProduct(){
        if($this->Query("SELECT SUM(order_item.quantity) AS y,order_item.p_ID AS label FROM order_item JOIN orders ON orders.order_ID =order_item.order_ID WHERE YEAR(orders.start_date) = YEAR(CURDATE()) GROUP BY order_item.p_ID")){

            return $this->fetchall();
        }

    }











}
?>



   

   

   




