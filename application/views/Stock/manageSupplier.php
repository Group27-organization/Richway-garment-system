<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/createOrderAdvance.css">


    <script src="js/createOrder.js"></script>
    <?php linkCSS("assets/css/Form.css") ?>
    <?php linkCSS("assets/css/stock-css/gridculms3.css") ?>
    <?php linkCSS("assets/css/stock-css/nav.css") ?>
    <?php linkJS("assets/js/jquery.js"); ?>


</head>
<body>

<?php require('components/nav.php') ?>



<div class="grid-container" >

    <div class="sidebar-flex-box-container">

        <?php linkCSS("assets/css/stock-css/sidebar.css") ?>
        <?php require('components/sidebar_navigation.php') ?>
    </div>

    <!- -----------------------middle start------------------------ -->
    <div class="middle" id="right">

                                    <h1>Manage Supplier</h1>
                                    <!- ----------------mange supllier card---------------------------- -->

                                    <?php linkCSS("assets/css/middle-table-load-card.css") ?>
                                    <?php linkCSS("assets/css/stock-css/table.css") ?>
                                    <?php require('components/supplier-table-in-card.php') ?>
                                    <?php linkJS("assets/js/stock-keeper-js/manageSupplier.js"); ?>



    </div><!--middle-->

    <div class="last" style="padding:50px 20px;">
        <?php require('components/last.php') ?>
    </div><!--    last-->

</div>  <!-- grid-container-->


<?php linkJS("assets/js/select-raw-highlighted.js"); ?>




</body>
</html>


