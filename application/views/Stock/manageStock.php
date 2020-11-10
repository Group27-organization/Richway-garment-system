<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Calendar</title>
  

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php linkCSS("assets/css/stock-css/gridculms3.css") ?>

    <?php linkJS("assets/js/jquery.js"); ?>
</head>
<body>

    <?php require('components/nav.php') ?>
     <?php linkCSS("assets/css/stock-css/nav.css") ?>

<div class="grid-container" >

    <div class="sidebar-flex-box-container">

        <?php linkCSS("assets/css/stock-css/sidebar.css") ?>
        <?php require('components/sidebar_navigation.php') ?>
    </div>

       <!- -----------------------middle start------------------------ -->
    <div class="middle" id="right">
        <h1>Mange Stock</h1>
        <!- ----------------tabstart---------------------------- -->

        <?php linkCSS("assets/css/stock-css/tabpane.css") ?>
        <?php linkCSS("assets/css/stock-css/table.css") ?>
        <?php require('components/RTM-TabPane.php') ?>
        <?php linkJS("assets/js/tabpane.js"); ?>


   </div><!--middle-->

    <div class="last" style="padding:50px 20px;">
        <?php require('components/last.php') ?>

    </div><!--    last-->

</div>  <!-- grid-container-->

</body>
</html>
