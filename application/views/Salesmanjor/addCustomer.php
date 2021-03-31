<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Add Button">
    <title>Add Button</title>

    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <?php linkCSS("assets/css/salesmanjor-css/addCustomer-form.css") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

    </style>
</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Add Customer</h1>
                <p class="text-lead text-white">add new customer.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form id="cstaddForm" action="<?php echo BASEURL;?>/addCustomerController/addCustomer" method="POST" >
            <div class="flexbox-container">


                <div class="inputfield">
                    <label for="name">Full Name</label>
                    <input type="text" id="CustomerName" name="name" class="form-contrall" placeholder="MK kamal" required>
<!--                    <label id="A" class="error" style="color:red; display: none" >-->
<!--                        This Field required-->
<!--                    </label>-->
                </div>

                <div class="inputfield">
                    <label for="address">Address</label>
                    <input type="address" id="Address" name="address" class="form-contrall" placeholder="eg:no 37 galle road,dikkumbura">
<!--                    <label id="B" class="error" style="color:red; display: none">-->
<!--                        This Field required-->
<!--                    </label>-->
                </div>
                <div class="inputfield" id="selectSupplier">
                    <label for="contact_no">Contact Number</label>
                    <input type="number" id="CustomerContactNumber" name="contact_no" class="form-contrall" minlength="10" placeholder="eg:0414561231" required>
<!--                    <label id="C" class="error" style="color:red; display: none">This Field required</label>-->
                </div>


                <div class="inputfield">
                    <label for="Gender">Gender</label>
                    <select id="gender" name="gender">
                        <option  value="0" selected="" disabled="">--SELECT--</option>
                        <option value="male" data-value="male">Male</option>
                        <option value="female"  data-value="female">Female</option>
                    </select>
<!--                    <label id="D" class="error" style="color:red; display: none">This Field required</label>-->
                </div>

                <div class="inputfield">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-contrall" placeholder="kmal32@gmail.com" required>
<!--                    <label id="E" class="error" style="color:red; display: none">This Field required</label>-->
                </div>


                <br><div class="inputfield inputbutton">
<!--                    <input id="btnsubmitC" type='button' style="width: 100px; height: 43px; " value="Submit" class="btn cripple">-->

                        <input  type="submit" value="Submit" style="width: 100px; height: 43px;" class="btn cripple">

                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

<?php //linkJS("assets/js/addbutton-to-stock.js") ?>
<?php //require('supplier-popup-table.php') ?>

<?php linkJS("assets/js/salesmanjor-js/salesmanager-addCustomer.js") ?>

</body>
</html>