<!DOCTYPE html>
<html>
<head>
    <title>Add Tool Form</title>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <?php linkCSS("assets/css/stockkeeper-form.css") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <?php linkJS("assets/js/addtool-form-stock.js") ?>
</head>
<body>
<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Add Tool</h1>
                <p class="text-lead text-white">add tool's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form id="btnForm" action="<?php echo BASEURL;?>/manageToolController/addTool" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="button_code">Select Category</label>
                    <select id='selecttooldopdown' name="category" style='width: 100%;'>
                       <option  value="0" data-value="0" selected="" disabled="">--SELECT--</option>
                    </select>
                    <label for="A"  class="error" style="color: red; display:none" >This Field Required!</label>
                </div>

                <div class="inputfield">
                    <label for="fabric_type">Quantity</label>
                    <input type="text" id="toolQuantity" name="quantity" class="form-contrall"  value="">
                    <label id="B" class="error" style="color:red; display: none">
                        This Field required
                    </label>
                </div>

                <div class="inputfield">
                    <label for="fabric_type">Price</label>
                    <input type="text" id="toolprice" name="price" class="form-contrall"  value="">
                    <label id="C" class="error" style="color:red; display: none">
                        This Field required
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" maxlength="500" name="description" rows="4" cols="50" class="form-contrall" ></textarea>
                    <label id="D" class="error" style="color:red; display: none">
                        This Field required
                    </label>
                </div>


                <div class="inputfield">
                    <label for="button_code">Select Supplies</label>
                    <select id='selectsupplierdopdown' name="supplier" style='width: 100%;'>
                        <option  value="0" data-value="0" selected="" disabled="">--SELECT--</option>
                    </select>
                    <label for="E"  class="error" style="color: red; display:none" >This Field Required!</label>
                </div>


                <br><div class="inputfield inputbutton">
                    <input id="btnsubmitBtn" type='button' style="width: 100px; height: 43px; " value="Submit" class="btn cripple">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div



</body>
</html>
