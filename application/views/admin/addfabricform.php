<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Raw Materials">
    <title>Add New Fabric</title>

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
                <h1 class="text-white">Add New Fabric</h1>
                <p class="text-lead text-white">You can add fabric's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/rawMaterialController/addfabric" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="fabric_code">Fabric Code</label>
                    <input type="text" id="fabric_code" name="fabric_code" class="form-contrall"  value=" <?php if($data['FabricCode']) :echo $data['FabricCode']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['fabric_codeError']) :echo $data['fabric_codeError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="fabric_type">Type</label>
                    <input type="text" id="type" name="type" class="form-contrall"  value=" <?php   if($data['Type']) :echo $data['Type']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['fabric_typeError']) :echo $data['fabric_typeError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" name="Description" rows="4" cols="50" class="form-contrall"></textarea>
                </div>

                <div class="inputfield">
                    <label for="quality_grade">Quality Grade</label>
                    <input type="text" id="quality_grade" name="quality_grade" class="form-contrall" value="<?php   if($data['QualityGrade']) :echo $data['QualityGrade']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['quality_gradeError']) :echo $data['quality_gradeError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="brand">Brand</label>
                    <input type="text" id="brand" name="brand"  value="<?php   if($data['Brand']) :echo $data['Brand']; endif; ?>"  class="form-contrall" >
                    <label class="error" style="color:red;">
                        <?php   if($data['brandError']) :echo $data['brandError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="price">Price</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100"  id="price" name="price"  value="<?php   if($data['Price']) :echo $data['Price']; endif; ?>"  class="form-contrall" >
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
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
