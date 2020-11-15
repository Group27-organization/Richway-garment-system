<?php


class manageCustomerModel extends database
{

    public function loadCustomerTable(){
        if($this->Query("SELECT * FROM customer WHERE active=1")){

            return $this->fetchall();
        }
    }

    public function deleteCustomer($id){
     	
        if($this->Query("UPDATE customer SET active = ? WHERE customer_ID=?", [0,$id])){
          return true;
      
      
        }

       
  }

}


?>