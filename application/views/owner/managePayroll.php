<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Payroll</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-managepayment.css") ?>

    <?php linkCSS("assets/css/admin-tabview.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>



        <div class="page-header">
            <div class="block">
                <div class="page-header-routetext">
                    <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/home%20(2).svg" ></i></a>
                    <a href="#" style="color:#8898aa;"> / Manage Payroll</a>
                </div>
            </div>
        </div>

        <!----------------------------------tab pane start--------------------------------------------------------------------------------------- -->

        <div class="tab-content">
            <div class="tabrow">
                <div class="tab">
                    <button class="tablinks active" onclick="openEmp(event,'sales_manager')">Sales Managers</button>
                    <button class="tablinks" onclick="openEmp(event,'production_manager')">Production Managers</button>
                    <button class="tablinks" onclick="openEmp(event,'supervisor')">Supervisors</button>
                    <button class="tablinks" onclick="openEmp(event,'accountant')">Accountants</button>
                    <button class="tablinks" onclick="openEmp(event,'stock_keeper')">Stock Keepers</button>
                    <button class="tablinks" onclick="openEmp(event,'tailor')">Tailors</button>

                </div>


            <!--------------------------------------------Tab Content-------------------------------------------------------------------------------------- -->
                <div id="tabcontentid" class="tabcontent">

                    <div class="flex-row-tab">
                        
                        <div class="SearchBtnWap">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="BtnWap">
                            <button id="approvepay" class="three-set-btn1" onclick="location.href"  >Approve and Pay</button>
                        </div>

                    </div><!--flex row-->
                    <div class=" " id=" ">

                    </div>



<?php linkJS("assets/js/owner.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>