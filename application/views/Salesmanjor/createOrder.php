<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/salesmanager-form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/salesmanger-orderitemtablecard.css") ?>
    <?php linkCSS("assets/css/salesmanjor-css/card-template.css") ?>

    <?php linkCSS("assets/css/stock/stock-managestock.css") ?>
    <?php linkCSS("assets/css/stock/pop-window-add-raw-matiral-item.css") ?>





    <?php linkJS("assets/js/jquery.js"); ?>
    <?php linkJS("assets/js/salesmanjor-js/createOrder.js"); ?>

</head>
<body>

<div class="grid-container" >

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>
        <div class="header-container background-gradient" id="header-gradant-form">
            <div class="header-group">
                <h1 class="text-white">Create Order</h1>
                <p class="text-lead text-white">Add new oder.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

            <div>
                <?php require('forms/create-order-form-one.php') ?>

                <?php require('forms/create-order-form-two.php') ?>
            </div>

<!--            --><?php //require('forms/order-item-bucket-table.php') ?>
        <div class="tab-content" id="bucketTable">
<!--            <div class="tab">-->
<!--                <button class="tablinks active" onclick="openEmp(event, 'RawMaterial')">Raw Material</button>-->
<!--                <button class="tablinks" onclick="openEmp(event, 'Tools')">Tools</button>-->
<!--                <button class="tablinks" onclick="openEmp(event, 'Machine')">Machine</button>-->
<!--            </div>-->

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
                        <button id="backBtn" class="three-set-btn1"  >Back</button>
                        <button id="itemTableNextTbn" class="three-set-btn2" >Next</button>

                    </div>
                </div><!--flex row-->

                <!--                table start-->

                <div class="table-responsive"  id="addItemBucketTable" >
                    <table class="table align-items-center table-flush" >
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" style="display: none">Template Id</th>
                            <th scope="col">Template</th>
                            <th scope="col"  >Size</th>
                            <th scope="col" >Fabric Type</th>
                            <th scope="col" >Fabric Design</th>
                            <th scope="col" >Fabric Design Image</th>
                            <th scope="col" >Fabric Design Code</th>
                            <th scope="col" >Fabric Color</th>
                            <th scope="col" style="display: none">Button Design </th>
                            <th scope="col" style="display: none">Button Color</th>
                            <th scope="col" style="display: none">Nool Color</th>
                            <th scope="col" >Quantity</th>
<!-- style="display: none"-->
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr></tr>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="card-footer">

                <div class="model-footer">
                    <h5>* Please select an order to get this action!</h5>
                </div>

                <div class="bottom-row">

                    <nav aria-label="...">
                        <ul class="pagination ">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <!--                                <li class="page-item">-->
                            <!--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
                            <!--                                </li>-->
                            <!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>

                    </nav>

                </div>

            </div>



    </div>
    <!-- table part end-->


    </div><!--right-->


</div>

<?php require('forms/exsisting-customer-table.php') ?>
<?php linkJS("assets/js/table.js"); ?>

<?php require('forms/new-customer-add-form.php') ?>

<?php require('forms/popupTemplateSelect.php') ?>




</body>
</html>

