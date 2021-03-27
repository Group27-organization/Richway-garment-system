 <?php

 class addSupplierController extends framework {

     
    private $supplierModel;

     public function templateCardGenarator(){
         if(isset($_POST['key'])) {
             if ($_POST['key'] == "PredefinePopup") {
                 $result = $this->createOrderModel->getPredifineCard($_POST['Type']);


                 foreach($result as $row){
                     $imagel="http://localhost/Richway-garment-system/public/assets/img/";
                     echo "
                    <div class='option-card'  onclick='selectedCard(this);' style='margin: 10px;'>
                            <img src=$imagel$row->image_url style='width:100%;  opacity: 0.5; background-color: purple;' class=card-thumb>
                            
                                <div class='card-description'>
                                     <h4 ><b class='template-type'> $row->type</b></h4>
                                     <p class='template-handtype'></span>$row->hand_type</p>
                                     <p class='template-collartype'>$row->collar_type </p>
                                </div>
                                <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                <input type=text class='pImageURL'  value='$imagel$row->image_url' style='display: none;'>
                            
                    </div>
                    ";
                 }
             }
         }
     }




}
?>
 