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
    <?php linkCSS("assets/css/stockkeeper-form.css") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

    </style>
</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Add Fabric</h1>
                <p class="text-lead text-white">You can add fabric's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>


        <form id="fabForm"  action="<?php echo BASEURL;?>/rawMaterialToStockController/addfabric" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="fabric_code">Fabric Code</label>
                    <select id="ItemType" name="fabric_code_id" class="form-contrall" required>
                        <option  value="0" selected="" disabled="">--SELECT--</option>
                                     <?php if(!empty($data)): ?>
                                          <?php foreach($data  as $c):?>
                                                 <option value="<?php echo $c->ID ; ?>"><?php echo $c->fabric_code ; ?></option>
                                          <?php endforeach;?>
                                     <?php endif; ?>
                    </select>
<!--                    <label id="A" class="error" style="color:red; display: none">-->
<!--                       This Field required-->
<!--                    </label>-->
                </div>

                <div class="inputfield">
                    <label for="fabric_type">Quantity</label>
                    <input type="text" id="fabQuantity" name="quantity" class="form-contrall"  value="" required>
<!--                    <label id="B" class="error" style="color:red; display: none">-->
<!--                        This Field required-->
<!--                    </label>-->
                </div>


                <div class="inputfield">
                    <label for="Description">Description</label>
                    <textarea id="Description" name="description" rows="4" cols="50" class="form-contrall" required></textarea>
<!--                    <label id="C" class="error" style="color:red; display: none">-->
<!--                        This Field required-->
<!--                    </label>-->
                </div>


                <div class="inputfield" >
                    <label>Select Supplies</label>
                    <select id='supplierDrop' name="supplierOptions" style='width: 100%;'>
                        <!--            <option  value="0"   selected="" disabled="">--SELECT--</option>-->
                    </select>

                </div>



                <br><div class="inputfield inputbutton">
<!--                    <input id="fabsubmitBtn" type='button' style="width: 100px; height: 43px; "  value="Submit"  class="btn cripple">-->
                    <input  type="submit" value="Submit" style="width: 100px; height: 43px;" class="btn cripple">

                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->
<?php require('supplier-popup-table.php') ?>

<?php linkJS("assets/js/table.js") ?>
<?php linkJS("assets/js/addfabric-to-stock.js") ?>
</body>
</html>
