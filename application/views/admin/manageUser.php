<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage User">
    <title>Manage User</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-tabview.css") ?>
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
                    <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/home%20(2).svg" ></a>
                    <a href="#!" style="color:#8898aa;"> / Manage User</a>
                </div>
            </div>
        </div>

        <!----------------------------------tab pane start--------------------------------------------------------------------------------------- -->

        <div class="tab-content">
            <div class="tab">
                <button class="tablinks active" onclick="openEmp(event,'sales_manager')">Sales Managers</button>
                <button class="tablinks" onclick="openEmp(event,'production_manager')">Production Managers</button>
                <button class="tablinks" onclick="openEmp(event,'supervisor')">Supervisors</button>
                <button class="tablinks" onclick="openEmp(event,'accountant')">Accountants</button>
                <button class="tablinks" onclick="openEmp(event,'stock_keeper')">Stock Keepers</button>
                <button class="tablinks" onclick="openEmp(event,'owner')">Owners</button>
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
                        <button id="adduser" class="three-set-btn1" onclick="location.href"  >Add</button>

                        <button id="addextrarole" class="three-set-btn2" style="width: 150px !important;" onclick="addExtraRole()">Add Extra Role</button>

                        <button class="three-set-btn3">Remove</button>
                    </div>
                </div><!--flex row-->

<!--                table start-->

                <div class="table-responsive" id="table-responsive">

                </div>
                <div class="card-footer">

                    <div class="model-footer" id="userMsgView" style="display: none">
                        <h5>* Please select an user to get this action!</h5>
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


    </div><!--right-->


</div>


<?php linkJS("assets/js/manageuser.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
