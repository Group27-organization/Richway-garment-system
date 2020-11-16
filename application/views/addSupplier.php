<!DOCTYPE html>
<html>
<head>
    <?php linkCSS("assets/css/Form.css") ?>
  <!-- <?php //linkJS("assets/js/jquary.js")?>
  <?php// linkIS("assets/js/validdator.js" )?>
  <?php //("assets/js/formvalidation.js")?> -->
 
</head>
<body>

 <form  action="<?php echo BASEURL;?>/addSupplierController/addSupplier" method="POST" id="addSupplier" >
  
<div class="flexbox-container">

    <div class="inputfield">
      <h2>Add Supllier</h2>
      
    </div>

    
    
    <div class="inputfield"> 
          <label for="SuplierName">Suplier Name</label>
          <input type="text" id="SuplierName" name="suplierName" class="form-contrall" placeholder="EX: R.M.Kavishka Bandara">
        
    </div>

    <div class="inputfield"> 
          <label for="EmailAddress">Email Address</label>
          <input type="email" id="EmailAddress" name="Eemailaddress" class="form-contrall" placeholder="example@gmail.com">
          
   </div>


    <div class="inputfield">  
      <label for="Address">Address</label>
      <input type="text" id="Address" name="address" class="form-contrall"placeholder="EX: 198/B,Molligoda,Wadduwa">
     
    </div>

    
    <div class="inputfield">  
        <label for="ContactNo">Contact No</label>
        <input type="text" id="ContactNo" name="contactno" class="form-contrall" placeholder="EX: 0714534565">
        
    </div>  

    <div class="inputfield">
        <input type="submit" value="Submit" class="btn" >
    </div>

</div>
</form> 
</body>
</html>
