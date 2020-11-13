<!DOCTYPE html>
<html>
<head>
    <?php linkCSS("assets/css/form.css") ?>
  <!-- <?php //linkJS("assets/js/jquary.js")?>
  <?php// linkIS("assets/js/validdator.js" )?>
  <?php //("assets/js/formvalidation.js")?> -->
 
</head>
<body>

 <form  action="<?php echo BASEURL;?>/manageSupplierController/updateSupplier" method="POST" id="addSupplier" >
  
<div class="flexbox-container">

    <div class="inputfield">
      <h2>Edit Supllier</h2>
      
    </div>

    
    <div class="inputfield"> 
          <label for="SuplierName">Suplier Name</label>
          <input type="text" id="SuplierName" name="suplierName" class="form-contrall" value="<?php echo $data->name;?>">
        
    </div>

    <div class="inputfield"> 
          <label for="EmailAddress">Email Address</label>
          <input type="email" id="EmailAddress" name="Eemailaddress" class="form-contrall" value="<?php echo $data->email;?>">
          
   </div>


    <div class="inputfield">  
      <label for="Address">Address</label>
      <input type="text" id="Address" name="address" class="form-contrall" value="<?php echo $data->address;?>">
     
    </div>

    
    <div class="inputfield">  
        <label for="ContactNo">Contact No</label>
        <input type="text" id="ContactNo" name="contactno" class="form-contrall"value="<?php echo $data->contact_no;?>">
        <input type="hidden" name="hiddenID" value="<?php echo $data->supplier_ID;?>">
    </div>





    <div class="inputfield">
        <input type="submit" value="Update" class="btn" >
    </div>

</div>
</form> 
</body>
</html>
