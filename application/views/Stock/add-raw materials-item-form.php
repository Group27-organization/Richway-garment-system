<!DOCTYPE html>
<html lang="">
<head>

    <?php linkCSS("assets/css/stock-css/gridculms3.css") ?>
    <?php linkCSS("assets/css/stock-css/all-stock-form.css") ?>

    <?php linkCSS("assets/css/stock-css/pop-window-add-raw-matiral-item.css") ?>
    <?php linkCSS("assets/css/stock-css/popup-window-order-item-table.css") ?>
    <?php linkCSS("assets/css/stock-css/table.css") ?>
    <?php linkJS("assets/js/jquery.js"); ?>


</head>
<body>


<?php require('components/nav.php') ;?>
<?php linkCSS("assets/css/stock-css/nav.css") ;?>

<div class="grid-container" >

    <div class="sidebar-flex-box-container">

        <?php linkCSS("assets/css/stock-css/sidebar.css") ?>
        <?php require('components/sidebar_navigation.php') ?>
    </div>

    <!- -----------------------middle start------------------------ -->
    <div class="middle" id="right">

        <?php require('forms/raw-material-add-form.php') ?>








    </div><!--middle-->

    <div class="last" style="padding:50px 20px;">
        <?php require('components/last.php') ?>
    </div><!--    last-->

</div>  <!-- grid-container-->


<!------------------------ Find button fabric nool Modal Section ------------------------------------------------>
<?php require('forms/add-raw-material-item-popup.php') ?>
<?php linkJS("assets/js/stock-keeper-js/pop-window-add-raw-matiral-item.js"); ?>
<!---------- End Find raw material Modal Section ------------------------------------------------------------>

<!--------------------start order item find tables--------------------------------------------------------->
<?php require('forms/order-item-table-popup-window.php') ?>
<?php linkJS("assets/js/stock-keeper-js/popup-window-order-item-table-form.js"); ?>
<!-- --><?php //linkJS("assets/js/stock-keeper-js/popup-order-Items-Ids-tables-data.js"); ?>

<?php linkJS("assets/js/select-raw-highlighted.js"); ?>
<!--------------------------------------------end order item find tables-------------------------------------------------->

<?php linkCSS("assets/css/dynamically-add-item-table.css") ?>
<?php //linkJS("assets/js/stock-keeper-js/button-fabric-nool-dynamically-add-table.js"); ?>
</body>
</html>
