<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Notification Manager">
    <title>Manage Employee</title>
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
                    <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/home%20(2).svg" ></i></a>
                    <a href="#!" style="color:#8898aa;"> / Notification Manager</a>
                </div>
            </div>
        </div>

        <!----------------------------------tab pane start--------------------------------------------------------------------------------------- -->

        <div class="tab-content">


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
                        <!--                        <button id="addRawmaterial" class="three-set-btn1" onclick="openRaw()">Add</button>-->

                        <!--                        <button id="updateRawmaterial" class="three-set-btn2" onclick="updateRM()">Update</button>-->

                        <!--                        <button id="deleteRawmaterial" class="three-set-btn3" onclick="deleteRawMaterial()">Remove</button>-->
                    </div>
                </div><!--flex row-->

                <!--                table start-->

                <div class="table-responsive" id="Notification">

                </div>
                <div class="card-footer">

                    <div class="model-footer" id="Notification">
                        <h5>* Please select an employee to get this action!</h5>
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


<?php linkJS("assets/js/table.js") ?>
<?php linkJS("assets/js/notification.js") ?>

</body>
</html>
