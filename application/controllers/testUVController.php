 <?php

 class addSupplierController extends framework {


     public function templateCardGenarator2(){

         if(isset($_POST['key'])){
             if($_POST['key'] == "PredefinePopup"){

                 $result = $this->createOrderModel->getPredifineCard($_POST['Type']);
                 //echo("<script>console.log('PHP: " . json_encode($result) . "');</script>");

                 $count = 0;
                 if($result !== -1){

                     foreach($result as $row){

                         if($count == 0){
                             echo '<div class="first-row">';
                         }
                         elseif ($count == 2){
                             echo '<div class="second-row">';
                             $count = -2;
                         }
                         $imagel="http://localhost/Richway-garment-system/public/assets/img/";


                         echo "
                                <div class=\"product-container\">
                                <div class=\"product\">
                                    <div class=\"product-preview\">
                                        <img src=$imagel$row->image_url style=\"width: 100%; height: 100%; object-fit: scale-down;\">
                                    </div>
                                    <div class=\"product-info\">
                                        <div class=\"product-top\">
                                            <h6>Description</h6>
                                            <h4 id='desc'>$row->description</h4>
                                        </div>
                                        <div class=\"product-bottom\">
                                            <button type=\"button\" class=\"slctbtn cripple option-card\" onclick='selectedCard(this);'>Select
                                            </button>
                                        </div>
                                    </div>
                                    <input type=text  class='preID' value='$row->p_ID' style='display: none;'>
                                     <input type=text class='pImageURL'  value='$imagel$row->image_url' style='display: none;'>
                            
                                </div>
                            </div>
                            
                            ";

                         $count += 1;
                     }
                 }
                 else{
                     echo "
                        <br><p  style=\"text-align: center;\">There is no design template to the display!</p>
                   ";
                 }


             }


         }

     }
}
?>
 