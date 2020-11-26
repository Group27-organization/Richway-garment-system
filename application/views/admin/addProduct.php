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
                <h1 class="text-white">Create a sub product</h1>
                <p class="text-lead text-white">Create new item related to the product <?php echo $data['product']?>.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

        <form action="<?php echo BASEURL; ?>/manageProductController/addProduct" method="POST">
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="ProductId"><?php echo $data['product']?> ID</label>
                    <input type="text" id="ProductId" name="ProductId" value= "<?php echo $data['product_ID']?>" class="form-contrall-readonly" readonly>
                </div>

                <div class="inputfield">
                    <label for="Product">Product</label>
                    <input type="text" id="Product" name="Product" value="<?php echo $data['product']?>" class="form-contrall-readonly" readonly>
                </div>


                <?php
                foreach($data['table_columns'] as $col):
                    $colname = $col->COLUMN_NAME;
                    $datatype = $col->DATA_TYPE; ?>
                    <div class="inputfield">
                        <label for="<?php echo $colname;?>"><?php echo ucwords(str_replace("_"," ",$colname))?></label>

                        <?php if($datatype == 'int' or $datatype == 'double' or $datatype == 'float' or $datatype == 'currency'): ?>
                            <input type="number" step="0.01" min="0" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" required>
                        <?php
                        elseif ($datatype == 'char'):?>
                            <input type="text" maxlength="3" onkeypress="return /[A-Z]/i.test(event.key)" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" style=" text-transform: uppercase;" required>
                        <?php
                        elseif ($datatype == 'varchar'):?>
                            <input type="text" maxlength="20" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" style=" text-transform: capitalize;" required>
                        <?php endif; ?>
                    </div>
                <?php   endforeach; ?>

                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Create sub product" class="btn cripple">
                </div>

            </div>
        </form>


    </div><!--right-->

</div>


<?php linkJS("assets/js/admin-addproduct.js") ?>

</body>
</html>