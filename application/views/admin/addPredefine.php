<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage Products">
    <title>Add Sub Product</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-addproduct.css") ?>
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
                <h1 class="text-white">Create a Predefine Product</h1>
                <p class="text-lead text-white">Create new item related to the predefine product <?php echo $data['product']?>.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/manageProductController/addPredefine" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="Type">Type</label>
                    <input type="text" id="Type" maxlength="100" name="Type" class="form-contrall-special" readonly value="<?php echo $data['product'] ?>">
                </div>

                <div class="inputfield">
                    <label for="HandType">Hand Type</label>
                    <input type="text" id="HandType" maxlength="100" name="HandType" class="form-contrall" value="<?php if($data['ButtonCode']) :echo $data['ButtonCode']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="CollarType">Collar Type</label>
                    <input type="text"  maxlength="100" id="CollarType" name="CollarType" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="NormalTailoringCost">Normal Tailoring Cost</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100" id="NormalTailoringCost" name="NormalTailoringCost" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" maxlength="250" name="Description" rows="4" cols="50" class="form-contrall" value="<?php if($data['Description']) :echo $data['Description']; endif; ?>"></textarea>
                    <label class="error" style="color:red;">
                        <?php   if($data['DescriptionError']) :echo $data['DescriptionError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="RatePerHourFromLine">Rate Per Hour From Line</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100" id="RatePerHourFromLine" name="RatePerHourFromLine" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="MinimumProfitMargin">Minimum Profit Margin</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100" id="MinimumProfitMargin" name="MinimumProfitMargin" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="Style">Style</label>
                    <input type="text" min="0.00" step="0.01" maxlength="100" id="Style" name="Style" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="Sizes">Sizes</label>
                    <input type="number" maxlength="100" id="Sizes" name="Sizes" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['priceError']) :echo $data['priceError']; endif; ?>
                    </label>
                </div>
                <div class="inputfield">
                    <label for="Image_Url">Image Url</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100" id="Image_Url" name="Image_Url" class="form-contrall" value="<?php if($data['Price']) :echo $data['Price']; endif; ?>">
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

<?php linkJS("assets/js/admin-addproduct.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>

