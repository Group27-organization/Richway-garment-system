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

        <?php require('forms/stock-issue-form.php') ?>

    </div><!--middle-->

    <div class="last" style="padding:50px 20px;">
        <?php require('components/last.php') ?>
    </div><!--    last-->

</div>  <!-- grid-container-->




<?php require('forms/stock-issue-form.php') ?>
<?php require('forms/stock-issue-form.php') ?>

</body>
</html>
