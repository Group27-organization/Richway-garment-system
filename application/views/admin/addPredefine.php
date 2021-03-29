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
                <h1 class="text-white">Add New <?php echo $data['product']?> Design</h1>
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
                    <input type="text" id="Type" maxlength="50" name="Type" class="form-contrall-special" readonly  value="<?php echo $data['product'] ?>">
                </div>

                <div class="inputfield">
                    <label for="HandType">Hand Type</label>
                    <input type="text" id="HandType" maxlength="50" name="HandType" class="form-contrall" required>
                </div>

                <div class="inputfield">
                    <label for="CollarType">Collar Type</label>
                    <input type="text"  maxlength="50" id="CollarType" name="CollarType" class="form-contrall"required>
                </div>

                <div class="inputfield">
                    <label for="NormalTailoringCost">Normal Tailoring Cost</label>
                    <input maxlength="13" id="NormalTailoringCost"  name="NormalTailoringCost" class="form-contrall" required >
                </div>

                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" maxlength="200" name="Description" rows="4" cols="50"  class="form-contrall" required ></textarea>
                </div>

                <div class="inputfield">
                    <label for="RatePerHourFromLine">Rate Per Hour From Line</label>
                    <input maxlength="100" id="RatePerHourFromLine" name="RatePerHourFromLine" class="form-contrall"required>
                </div>

                <div class="inputfield">
                    <label for="MinimumProfitMargin">Minimum Profit Margin</label>
                    <input  maxlength="13" id="MinimumProfitMargin" name="MinimumProfitMargin" class="form-contrall"required>
                </div>

                <div class="inputfield">
                    <label for="Style">Style</label>
                    <input type="text" maxlength="50" id="Style" name="Style" class="form-contrall" required>
                </div>

                <div class="inputfield">
                    <label for="Sizes">Sizes</label>
                    <input maxlength="200" id="Sizes" name="Sizes" class="form-contrall" required>
                </div>

                <div class="inputfield">
                    <form action="<?php echo BASEURL;?>/manageProductController/uploadImage" method="post" enctype="multipart/form-data" required>
                        <label for="Sizes">Upload Image</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
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

