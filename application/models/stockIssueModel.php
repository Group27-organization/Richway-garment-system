<?php


class stockIssueModel extends database {

    public function getRawMaterialData(){
        if($this->Query("SELECT orders.order_description, orders.order_ID, job.job_ID FROM orders JOIN order_item ON orders.order_ID = order_item.order_ID JOIN job ON job.order_item_ID = order_item.order_item_ID")){

            return $this->fetchall();
        }

    }
    public function  getRequestJob($status="start"){
        if($this->Query("SELECT 
                                job.job_ID AS job_ID,
                                job.name AS name,
                                job.description AS job_description,
                                orders.order_ID AS order_ID,
                                orders.order_description AS order_description,
                                order_item.order_item_ID AS order_item_ID
                                
                                FROM orders
                                    JOIN order_item
                                        ON orders.order_ID = order_item.order_ID 
                                    JOIN job
                                         ON job.order_item_ID   = order_item.order_item_ID
                                WHERE   job.status=?",[$status])){

            return $this->fetchall();
        }
    }

    public function getOrderItemIdinJob($JID){

        if($this->Query("SELECT order_Item_Id FROM job WHERE job_ID=?",[$JID])){
            $orderItemId = $this->fetch()->order_Item_Id;
            if($this->Query("SELECT quantity FROM order_item WHERE order_item_ID=?",[$orderItemId])){
                    $quantity=$this->fetch()->quantity;
                if($this->Query("SELECT p_ID FROM order_item WHERE order_item_ID=?",[$orderItemId])){
                    $predefineId=$this->fetch()->p_ID;
                    if($this->Query("SELECT fabric_quantity  FROM predefine WHERE p_ID =?",[$predefineId])){
                        $fabric_quantity =$this->fetch()->fabric_quantity;
                        return $fabric_quantity*$quantity;
                    }else{
                        return -1;
                    }
                }
            }
        }
    }

    public function stockIssueDetails($JobID){


        if($this->Query("SELECT order_Item_Id FROM job WHERE job_ID=?",[$JobID])){


            $orderItemId = $this->fetch()->order_Item_Id;
//            echo("<script>console.log('PHP in orderItemId model: " . json_encode($orderItemId) . "');</script>");

            if($this->Query("SELECT * FROM order_item WHERE order_item_ID=?",[$orderItemId])){

                $ot =$this->fetch();
                $order_item_ID =$ot->order_item_ID;
                $quantity=$ot->quantity;

                if($this->Query("SELECT * FROM order_item WHERE order_item_ID=?",[$orderItemId])){

                    $x =$this->fetch();

                    $fId        = $x->fabric_ID ;
                    $bId        = $x->button_ID;
                    $predefineId = $x->p_ID;



                    if($this->Query("SELECT ID FROM predefine_nool WHERE fID=?",[$fId])){
                        $nId=$this->fetch()->ID;
                    }




                    if($this->Query("SELECT type FROM predefine WHERE p_ID =?",[$predefineId])){
                        $type = $this->fetch()->type;

                        if($type=="shirt"){
                            if($this->Query("SELECT *  FROM shirt WHERE p_ID  =?",[$predefineId])){
                                $y=$this->fetch();
                                $fabric_quantity = $y->fabric_quantity;
                                $button_quantity = $y->button_quantity;
                                $real_thread_quantity = $y->real_thread_quantity;
                               array("fabricQuantity"=>$fabric_quantity*$quantity,"buttonQuantity"=>$button_quantity*$quantity,"noolQuantity"=>$real_thread_quantity*$quantity);

                                return array("order_item_ID"=>$order_item_ID ,"fabricID"=>$fId ,"fabricQuantity"=>$fabric_quantity*$quantity,"buttonID"=>$bId ,"buttonQuantity"=>$button_quantity*$quantity,"noolID"=>$nId,  "noolQuantity"=>$real_thread_quantity*$quantity);

                            }

                        }elseif ($type=="t_shirt"){
                            if($this->Query("SELECT fabric_quantity,button_quantity,real_thread_quantity   FROM t_shirt WHERE p_ID  =?",[$predefineId])){
                                $y=$this->fetch();
                                $fabric_quantity = $y->fabric_quantity;
                                $button_quantity = $y->button_quantity;
                                $real_thread_quantity = $y->real_thread_quantity;
                                return array($fabric_quantity*$quantity, $button_quantity*$quantity, $real_thread_quantity*$quantity);

                            }

                        }
                    }


                }
            }
        }else{
            return -1;
        }

    }

    public function isStockAvailable($fabricID,$fquantity,$buttonID,$bquantity,$noolID,$nquantity){




        if($this->Query("SELECT quantity FROM predefine_fabric  WHERE ID=?",[$fabricID])){
            $fq = $this->fetch()->quantity;



            if($fq>$fquantity){
               if($this->Query("SELECT quantity FROM predefine_button  WHERE ID=?",[$buttonID])){
                    $bq = $this->fetch()->quantity;
                    if($bq>$bquantity){
                        if($this->Query("SELECT quantity FROM predefine_nool WHERE ID=?",[$noolID])) {
                            $nq = $this->fetch()->quantity;
                            if($nq>$nquantity){
                                return 1;
                            }else{
                                return -1;
                            }

                        }
                    }else{
                        return -2;
                    }
                }

            }else{
                return -3;
            }


        }else{
            return -4;
        }
    }



    public function  issueRawMaterial($fabricID,$fquantity,$buttonID,$bquantity,$noolID,$nquantity){

       if($this->Query("UPDATE predefine_fabric SET quantity =quantity - ? WHERE ID=?",[$fquantity ,$fabricID])){
            if($this->Query("UPDATE predefine_button SET quantity =quantity - ? WHERE ID=?",[$bquantity ,$buttonID])){
                if($this->Query("UPDATE predefine_nool SET quantity =quantity - ? WHERE ID=?",[$nquantity ,$noolID])){
                    return 1;
                }
            }
        }else{
            return -1;
        }


    }


}
