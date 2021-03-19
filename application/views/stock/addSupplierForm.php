<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier Form</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <h1 class="text-white">Add New Supplier</h1>
                            <p class="text-lead text-white">Add New Supplier.</p>
                        </div>
                        <div class="separator separator-bottom separator-skew zindex-100">
                            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                            </svg>
                        </div>
                    </div>

                    <div class="flexbox-container">

                        <form  action="<?php echo BASEURL;?>/addSupplierController/addSupplier" method="POST" id="addSupplier">

                  <div class="inputfield">
                    <label for="SuplierName">Suplier Name</label>
                    <input type="text" id="SuplierName" name="suplierName" class="form-contrall" placeholder="EX: R.M.Kavishka Bandara">

                  </div>

                <div class="inputfield">
                    <label for="EmailAddress">Email Address</label>
                    <input type="email" id="EmailAddress" name="emailaddress" class="form-contrall" placeholder="example@gmail.com">

                </div>


                <div class="inputfield">
                    <label for="Address">Address</label>
                    <input type="text" id="Address" name="address" class="form-contrall"placeholder="EX: 198/B,Molligoda,Wadduwa">

                </div>


                <div class="inputfield">
                    <label for="ContactNo">Contact No</label>
                    <input type="text" id="ContactNo" name="contactno" class="form-contrall" placeholder="EX: 0714534565">

                </div>

                <div class="inputfield inputbutton">
                    <input type="submit" value="Submit" class="btn cripple" >
                </div>
            </form>
            </div>


    </div>






    </div><!--right-->


</div>  <!-- grid-container-->


</body>
</html>
