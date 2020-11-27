<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Add Fabric">
    <title>Add RawMaterial</title>

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
                <h1 class="text-white">Add Raw Material</h1>
                <p class="text-lead text-white">You can add raw material's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialController/addRawmaterialform" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="fabric_type">Fabric Type</label>
                    <input type="text" id="fabric_type" name="fabric_type" class="form-contrall"  value=" ">
                </div>

                <div class="inputfield">
                    <label for="fabric_design">Fabric Design</label>
                    <select id="fabric_design"  name="fabric_design" class="form-contrall" >
                        <option value="">--SELECT--</option>
                        <option value="Design">Design</option>
                        <option value="Plane">Plane</option>
                    </select>
                </div>

                <div class="inputfield">
                    <label for="color_code">Color Code</label>
                    <input type="text" id="color_code" name="color_code" class="form-contrall" value="">
                </div>


                <div class="inputfield">
                    <label for="design_code">Design Code</label>
                    <input type="text" id="design_code" name="design_code" class="form-contrall" value="">
                </div>

                <div class="inputfield">
                    <label for="unit_price">Unit Price</label>
                    <input type="text" id="unit_price" name="unit_price" class="form-contrall" value=" ">
                </div>


                <div class="inputfield">
                    <label for="reel_price">Reel Price</label>
                    <input type="text" id="reel_price" name="reel_price"  value=""  class="form-contrall" >
                </div>

                <div class="inputfield">
                    <label for="wrinkle_resistant">Wrinkle Resistant</label>
                    <input type="text" id="wrinkle_resistant" name="wrinkle_resistant"  value=""  class="form-contrall" >
                </div>


                <div class="inputfield">
                    <label for="function">Function</label>
                    <input type="text" id="function" name="function"  value=""  class="form-contrall" >
                </div>

                <div class="inputfield">
                    <label for="machine_wash">Machine Wash</label>
                    <input type="text" id="machine_wash" name="machine_wash"  value=""  class="form-contrall" >
                </div>



                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Submit" class="btn cripple">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

</body>
</html>
