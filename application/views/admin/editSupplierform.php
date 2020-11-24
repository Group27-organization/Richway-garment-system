<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Supplier">
    <title>Update Supplier</title>

    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>

 
</head>
<body>
<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Update Supplier Form</h1>
                <p class="text-lead text-white">Update supplier</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

 <form  action="<?php echo BASEURL;?>/manageSupplierController/updateSupplier" method="POST" id="addSupplier" >
  
<div class="flexbox-container">


    
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





    <div class="inputfield inputbutton">
        <input type="submit" value="Update" class="btn cripple" >
    </div>

</div><!--    form controll-->
</form>
</div><!--    right-->
</div>  <!--    grid container-->
</body>
</html>
