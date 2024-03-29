<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Raw Materials">
    <title>Update Button</title>

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
                <h1 class="text-white">Update Button</h1>
                <p class="text-lead text-white">You can update button's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialController/updatebutton" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="code">Button Code</label>
                    <input type="text" id="code" maxlength="100" name="code" class="form-contrall" value="<?php echo  $data['data']->code;?>" >
                    <label class="error" style="color:red;">
                        <?php   if($data['button_codeError']) :echo $data['button_codeError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Description">Description</label>
                    <input id="Description" maxlength="250" name="Description" rows="4" cols="50" class="form-contrall" value="<?php echo  $data['data']->Description;?>" >
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="price">Price</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100" id="price" name="price" class="form-contrall" value="<?php echo  $data['data']->price;?>" >
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>

                <!--                <div class="inputfield">-->
                <!--                    <label for="image">Image</label>-->
                <!--                    <input type="text" id="image" maxlength="100" name="image" class="form-contrall" value="--><?php //if($data['image']) :echo $data['image']; endif; ?><!--">-->
                <!--                    <label class="error" style="color:red;">-->
                <!--                        --><?php //  if($data['imageError']) :echo $data['imageError']; endif; ?>
                <!--                    </label>-->
                <!--                </div>-->

                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Update" class="btn cripple">
                    <input type="hidden" name="hiddenID" value="<?php echo $data['data']->ID;?>">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

<?php linkJS("assets/js/admin-rawMaterial.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
