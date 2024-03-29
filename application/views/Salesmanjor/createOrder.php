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

    <meta id="nav_item" content="Create Order">

    <?php linkCSS("assets/css/salesmanger-orderitemtablecard.css") ?>
<!--    --><?php //linkCSS("assets/css/salesmanjor-css/card-template.css") ?>


    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
    <?php linkCSS("assets/css/progressbar.css") ?>




    <?php linkJS("assets/js/jquery.js"); ?>
    <?php linkJS("assets/js/salesmanjor-js/createOrder.js"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>

<div class="grid-container" >

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>

        <div class="header-container background-gradient" id="header-gradant-form">

            <div class="header-group">

                <h1 class="text-white" id="header-name">Create Order</h1>
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
        <div class="tab-content" id="bucketTable" style="display: none">


            <!--------------------------------------------Tab Content-------------------------------------------------------------------------------------- -->
            <div id="tabcontentid" class="tabcontent" style="height: 100%">
                <div style="margin-bottom: 40px;max-width: 800px">
                    <ol class="progtrckr" data-progtrckr-steps="5">
                        <li class="progtrckr-done">Order Processing</li>
                        <li class="progtrckr-done">Order Details</li>
                        <li class="progtrckr-todo">Order Schedule</li>
                        <li class="progtrckr-todo">Order Invoice</li>
                    </ol>
                </div>
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
                        <button id="backBtn" class="three-set-btn1"  style="width: 140px; height: 43px;">Add New Item</button>
                        <button id="itemTableNextTbn" style="width: 140px; height: 43px;" class="three-set-btn2" style="width: 100px">Next &raquo;</button>

                    </div>
                </div><!--flex row-->

                <!--                table start-->

                <div class="table-responsive"  id="addItemBucketTable" >
                    <table id="selectItemTable" class="table align-items-center table-flush"  >
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" style="display: none">Template Id</th>
                            <th scope="col">Template</th>
                            <th scope="col"  >Size</th>

                            <th scope="col" style="display: none" >Fabric Design ID</th>
                            <th scope="col" >Fabric Design Image</th>
                            <th scope="col" >Fabric Design </th>

                            <th scope="col" style="display: none">Button Design ID </th>
                            <th scope="col" style="display: none">Button Design Image </th>
                            <th scope="col" style="display: none">Button Design</th>

                            <th scope="col" >Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr></tr>
                        </tbody>
                    </table>
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

