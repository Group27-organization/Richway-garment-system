<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Update Machine">
    <title>Update machine </title>

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
                <h1 class="text-white">Update Machine</h1>
                <p class="text-lead text-white">You can update machine's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/manageMachineController/updateMachine" method="POST" >
            <div class="flexbox-container">



                <div class="inputfield">
                    <label for="Name">Machine Name</label>
                    <input type="text" id="Name" maxlength="100" name="Name" class="form-contrall" value="<?php echo  $data['data']->Name;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['NameError']) :echo $data['NameError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Description">Description</label>
                    <input id="Description" maxlength="250" name="Description" rows="4" cols="50" class="form-contrall" value="<?php echo  $data['data']->Description;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="ReorderValue">Re-order Value</label>
                    <input type="ReorderValue" min="0.00" step="0.01" maxlength="100" id="ReorderValue" name="ReorderValue" class="form-contrall" value="<?php echo  $data['data']->ReorderValue;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['ReorderValueError']) :echo $data['ReorderValueError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="ABCanalysis">ABC analysis</label>
                    <select id="ABCanalysis"  name="ABCanalysis" class="form-contrall" value="<?php echo  $data['data']->ABCanalysis;?>">

                        <option value="A-High Value & Low Stock">A-High Value & Low Stock</option>
                        <option value="A-Moderate Value & Moderate Stock">A-Moderate Value & Moderate Stock</option>
                        <option value="A-Low Value & High Stock">A-Low Value & High Stock</option>
                        <option value="B-High Value & Low Stock">B-High Value & Low Stock</option>
                        <option value="B-Moderate Value & Moderate Stock">B-Moderate Value & Moderate Stock</option>
                        <option value="B-Low Value & High Stock">B-Low Value & High Stock</option>
                        <option value="C-High Value & Low Stock">C-High Value & Low Stock</option>
                        <option value="C-Moderate Value & Moderate Stock">C-Moderate Value & Moderate Stock</option>
                        <option value="C-Low Value & High Stock">C-Low Value & High Stock</option>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['ABCanalysisError']) :echo $data['ABCanalysisError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Warranty">Warranty</label>
                    <input type="text" id="Warranty" maxlength="100" name="Warranty" class="form-contrall" value="<?php echo  $data['data']->Warranty;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['WarrantyError']) :echo $data['WarrantyError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Price">Price</label>
                    <input type="text" id="Price" maxlength="100" name="Price" class="form-contrall" value="<?php echo  $data['data']->Price;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['PriceError']) :echo $data['PriceError']; endif; ?>
                    </label>
                </div>



                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Update" class="btn cripple">
                    <input type="hidden" name="hiddenID" value="<?php echo $data['data']->machine_ID;?>">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

<?php linkJS("assets/js/admin-manageMachine.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>

