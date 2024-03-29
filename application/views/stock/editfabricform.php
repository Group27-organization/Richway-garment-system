<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Add Fabric">
    <title>Add Fabric</title>

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
                <h1 class="text-white">Edit Fabric</h1>
                <p class="text-lead text-white">You can add fabric's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>


        <form  action="<?php echo BASEURL;?>/rawMaterialToStockController/addfabric" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="fabric_code">Fabric Code</label>
                    <select id="ItemType" name="fabric_code_id" class="form-contrall">-->
                        <option  value="0" selected="" disabled="">--SELECT--</option>
                                     <?php if(!empty($data)): ?>
                                          <?php foreach($data  as $c):?>
                                                 <option value="<?php echo $c->ID ; ?>"><?php echo $c->fabric_code ; ?></option>
                                          <?php endforeach;?>
                                     <?php endif; ?>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['FabricCodeIDError']) :echo $data['FabricCodeIDError']; endif; ?>
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
                    <textarea id="Description" name="description" rows="4" cols="50" class="form-contrall"></textarea>
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
