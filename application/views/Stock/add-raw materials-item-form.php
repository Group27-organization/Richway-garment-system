<!DOCTYPE html>
<html lang="">
<head>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <?php linkCSS("assets/css/stock/add-rawmaterial-form.css") ?>

    <?php linkCSS("assets/css/stock/pop-window-add-raw-matiral-item.css") ?>




</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Add New Raw Material</h1>
                <p class="text-lead text-white">Add new raw material to stock.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <div class="flexbox-container">

                <div class="inputfield">
                    <label for="">Order Id </label>
                    <label for="OrderIdLabel" ><?php echo $data ?></label>
<!--                    <input type="text" id="" name="" class="form-contrall" value="--><?php //echo $data ?><!--">-->
                </div>

<!--            <div class="inputfield">-->
<!--                <label for="OrderId">Order Id</label>-->
<!--                <select id="OrderId" name="orderId"  class="form-contrall">-->
<!--                    <option value="0" selected="" disabled="">--SELECT--</option>-->
<!--                    --><?php //if(!empty($data)): ?>
<!--                        --><?php //foreach($data  as $c):?>
<!--                            <option data-value="--><?php //echo $c->order_ID; ?><!--" value="--><?php //echo $c->order_ID; ?><!--">--><?php //echo $c->order_ID."-".$c->order_name ?><!--</option>-->
<!--                        --><?php //endforeach;?>
<!--                    --><?php //endif; ?>
<!--                </select>-->
<!---->
<!--                <label for='FM1' class="error"></label>-->
<!--            </div>-->




            <div class="inputfield">
                <label for="">Select Order Item</label>
                <div class="inputbutton">
<!--                    <label for='OrderItemsID' class="txtOIField"></label>-->
                    <input type="text" id="OrderItemsID" name="EmployeeId" class="form-contrall">
                    <button id="slt-orderitems" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
                </div>
                <label for='FM2' class="error"></label>
            </div>


            <div class="inputfield " id="bfn-btnid">
                <label>Add Material</label>
                <div class="btn3-flex">
                    <div><button id="buttonbtn" onclick="location.href" type="button"  class = "btn3 cripple cbn"  >Button</button></div>
                    <div><button id="fabricbtn" onclick="location.href" type="button"  class = "btn3 cripple cbn" >Fabric</button></div>
                    <div><button id="noolbtn" onclick="location.href" type="button"    class = "btn3 cripple cbn" >Nool</button></div>
                </div>
                <label for='FM3' class="error"></label>
            </div>


            <!--   -----------------------nool fabric button  label box---------------------    -->


            <!--table load-->
            <div id="BFNAddTable" class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Order Item Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Style</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Supplier Id</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr></tr>

                    </tbody>
                </table>
            </div>


            <!--   -----------------------nool fabric button in after label box---------------------    -->
            <br><div class="inputfield inputbutton">
                <button id="submitForm" class="btn cripple" >Submit</button>
            </div>



        </div><!--flexbox-container-->








    </div><!--right-->


</div>  <!-- grid-container-->


<!------------------------ Find button fabric nool Modal Section ------------------------------------------------>
<?php require('forms/add-raw-material-item-popup.php') ?>
<?php linkJS("assets/js/stock-keeper-js/pop-window-add-raw-matiral-item.js"); ?>
<!---------- End Find raw material Modal Section ------------------------------------------------------------>

<!--------------------start order item find tables--------------------------------------------------------->
<?php require('forms/order-item-table-popup-window.php') ?>
<?php linkJS("assets/js/stock-keeper-js/popup-window-order-item-table-form.js"); ?>

<!--------------------------------------------end order item find tables-------------------------------------------------->

<?php linkCSS("assets/css/dynamically-add-item-table.css") ?>
<?php linkJS("assets/js/stock-keeper-js/raw-material-form.js"); ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
