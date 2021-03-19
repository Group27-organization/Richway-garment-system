<!DOCTYPE html>
<html>
<head>
    <title>Stock Issue Form</title>
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
                <h1 class="text-white">Stock Issue</h1>
                <p class="text-lead text-white">Stock issue.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
                <div class="flexbox-container">
                    <div class="inputfield">
                        <label for="Address">Order Item Id</label>
                        <input type="text" id="orderItemId" name="orderid" class="form-contrall-readonly" value="ordItem000<?php echo $data['order_item_ID'];?>"  readonly>
                    </div>


                    <div class="inputfield">
                        <label for="OrderName">Fabric Code</label>
                        <input type="text" id="FabricCode" class="form-contrall-readonly" value="pfc000<?php echo $data['fabricID'];?>"  readonly>
                    </div>
                    <div class="inputfield">
                        <label for="OrderName">Fabric Quantity</label>
                        <input type="text" id="FabricQuantity" class="form-contrall-readonly" value="<?php echo $data['fabricQuantity'];?>" >
                    </div>

                    <div class="inputfield">
                        <label for="OrderName">Button Code</label>
                        <input type="text" id="ButtonCode" class="form-contrall-readonly" value="pbc000<?php echo $data['buttonID'];?>" >
                    </div>


                    <div class="inputfield">
                        <label for="OrderName">Button Quantity</label>
                        <input type="text" id="ButtonQuantity" class="form-contrall-readonly" value="<?php echo $data['buttonQuantity'];?>"   readonly>
                    </div>

                    <div class="inputfield">
                        <label for="">Nool Code</label>
                        <input type="text" id="NoolCode" class="form-contrall-readonly" value="pnc000<?php echo $data['noolID'];?>" readonly >
                    </div>


                    <div class="inputfield">
                        <label for="">Nool Quantity</label>
                        <input type="text" id="NoolQuantity" class="form-contrall-readonly" value="<?php echo $data['noolQuantity'];?>"   readonly>
                    </div>




                    <div class="inputfield inputbutton">
                        <input id="btnIssue" type="submit" value="Issue" class="btn cripple" >
                    </div>

                </div><!--flexbox-container -->



    </div><!--right-->


</div>  <!-- grid-container-->

<?php linkJS("assets/js/stockIssue-form.js") ?>
</body>
</html>

