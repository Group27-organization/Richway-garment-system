<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Tool">
    <title>Add new tool category</title>

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
                <h1 class="text-white">Add new tool category</h1>
                <p class="text-lead text-white">You can add tool's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/manageToolController/addtool" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="Name">Category Name</label>
                    <input type="text" id="Name" maxlength="100" name="Name" class="form-contrall" value="<?php if($data['Name']) :echo $data['Name']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['NameError']) :echo $data['NameError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Description">Category Description</label>
                    <textarea id="Description" maxlength="250" name="Description" rows="4" cols="50" class="form-contrall" value="<?php if($data['Description']) :echo $data['Description']; endif; ?>"></textarea>
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="ReorderValue">Re-orderValue</label>
                    <input type="ReorderValue" min="0.00" step="0.01" maxlength="100" id="ReorderValue" name="ReorderValue" class="form-contrall" value="<?php if($data['ReorderValue']) :echo $data['ReorderValue']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['ReorderValueError']) :echo $data['ReorderValueError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="ABCanalysis">ABC analysis</label>
                    <select id="ABCanalysis"  name="ABCanalysis" class="form-contrall" >
                        <option value="">--SELECT--</option>
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



                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Submit" class="btn cripple">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

<?php linkJS("assets/js/admin-manageTool.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
