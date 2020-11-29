<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Add Nool">
    <title>Add Nool</title>

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
                <h1 class="text-white">Add Nool</h1>
                <p class="text-lead text-white">You can add nool's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialController/addnool" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="color_code">Color Code</label>
                    <input type="text" id="color_code" maxlength="100" name="color_code" class="form-contrall" value="<?php if($data['ColorCode']) :echo $data['ColorCode']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['color_codeError']) :echo $data['color_codeError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="type">Type</label>
                    <input type="text" id="type" maxlength="100" name="type" class="form-contrall" value="<?php if($data['Type']) :echo $data['Type']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['typeError']) :echo $data['typeError']; endif; ?>
                    </label>
                </div>

                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Submit" class="btn cripple">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

<?php linkJS("assets/js/admin-rawMaterial.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
