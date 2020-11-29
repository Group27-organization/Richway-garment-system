<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Add Thread">
    <title>Add Thread</title>

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
                <h1 class="text-white">Add Thread</h1>
                <p class="text-lead text-white">You can thread's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialToStockController/addthread" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="button_code">Thread Code</label>
                    <select id="ItemType" name="thread_code_id" class="form-contrall">-->
                        <option  value="0" selected="" disabled="">--SELECT--</option>
                        <?php if(!empty($data)): ?>
                            <?php foreach($data  as $c):?>
                                <option value="<?php echo $c->ID ; ?>"><?php echo $c->color_code ; ?></option>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['button_codeError']) :echo $data['button_codeError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="fabric_type">Quantity</label>
                    <input type="text" id="" name="quantity" class="form-contrall"  value=" ">
                    <label class="error" style="color:red;">
                        <?php   if($data['QuantityError']) :echo $data['QuantityError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" maxlength="500" name="description" rows="4" cols="50" class="form-contrall" value="<?php if($data['Description']) :echo $data['Description']; endif; ?>"></textarea>
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
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
