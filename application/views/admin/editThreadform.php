<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Raw Materials">
    <title>Update Thread</title>

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
                <h1 class="text-white">Update Thread</h1>
                <p class="text-lead text-white">You can update thread's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialController/updateThread" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="fabric_code">Select Fabric Code</label>
                    <select id="fabricCodeDrop" name="options" class="form-contrall"  >
<!--                        <option  value="" selected="" >--SELECT--</option>-->
                        <option value="<?php echo  $data['data']->fabID;?>" selected="" > <?php echo$data['data']->fabType ; ?>- <?php echo $data['data']->fabricCode ; ?></option>
<!--                        --><?php //if(!empty($data->fabArr)): ?>
<!--                            --><?php //foreach($data->fabArr  as $c):?>
<!--                                <option value="--><?php //echo $c->ID; ?><!--"> --><?php //echo $c->type ; ?><!--"-" --><?php //echo $c->fabric_code ; ?><!--</option>-->
<!--                            --><?php //endforeach;?>
<!--                        --><?php //endif; ?>

                    </select>
                    <!--                        --><?php //  if($data['color_codeError']) :echo $data['color_codeError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="color_code">Color Code</label>
                    <input type="text" id="color_code" maxlength="100" name="color_code" class="form-contrall" value="<?php echo  $data['data']->color_code;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['color_codeError']) :echo $data['color_codeError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="type">Type</label>
                    <input type="text" id="type" maxlength="100" name="type" class="form-contrall" value="<?php echo  $data['data']->type;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['typeError']) :echo $data['typeError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="price">Price</label>
                    <input type="text" id="price" maxlength="100" name="price" class="form-contrall" value="<?php echo  $data['data']->price;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>

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
