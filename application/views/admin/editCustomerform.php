<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage Customer">
    <title>Update Customer</title>

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
                <h1 class="text-white">Update Customer Form</h1>
                <p class="text-lead text-white">Update customer</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->


 <form  action="<?php echo BASEURL;?>/manageCustomerController/updateCustomer" method="POST" id="addCustomer" >
<div class="flexbox-container">

    <div class="inputfield">
        <h2>Update Customer</h2>
    </div>

      
    
      <div class="inputfield">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" class="form-contrall" value="<?php echo $data->name;?>">
      
      </div>

      <div class="inputfield">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" class="form-contrall" value="<?php echo $data->address;?>">

      </div> 

      <div class="inputfield">
        <label for="contact_no">Contact Number</label>
        <input type="tel" id="contact_no" name="contact_no" class="form-contrall" value="<?php echo $data->contact_no;?>">

        <input type="hidden" name="hiddenID" value="<?php echo $data->customer_ID;?>">
    </div> 

    <div class="inputfield">
        <label for="Gender">Gender</label>
        <input type="text" id="Gender" name="Gender" class="form-contrall" value="<?php echo $data->Gender;?>">

    </div>
    
    <div class="inputfield">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-contrall" value="<?php echo $data->email;?>">

    </div>

    <br><div class="inputfield inputbutton"> 
            <input type="submit" value="Update" class="btn cripple">
    </div> 

</div>
</div>
</form>
</div>
</div>
</body>
</html>
