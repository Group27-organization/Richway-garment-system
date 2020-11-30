<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage Products">
    <title>Manage Products</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-manageproduct.css") ?>
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
                    <a href="#!" style="color:#8898aa;"> / Manage Products</a>
                </div>
            </div>
        </div>

        <!----------------------------------tab pane start--------------------------------------------------------------------------------------- -->

        <div class="right-content">

            <div class="tab-content">

                <div class="tabrow">

                    <div class="tab">

                        <?php
                        $first = true;
                        foreach($data as $product):
                            $product = $product->type;
                            if($first): ?>
                                <button id="firsttab" class="tablinks active" onclick="openProduct(event,'<?php echo $product;?>')"><?php echo ucwords(str_replace("_","-",$product))?></button>
                                <?php   $first = false;
                                continue;
                            endif;
                            ?>
                            <button class="tablinks" onclick="openProduct(event,'<?php echo $product;?>')"><?php echo ucwords(str_replace("_","-",$product))?></button>
                        <?php   endforeach; ?>

                    </div>

                    <button id="add_new_design" class="create-button" onclick="createProduct(event,$product)">
                        <img src="<?php echo BASEURL; ?>/public/assets/img/plus-circle.svg" style="width: 24px; height: 24px;">
                        <span id="add_new_design_text"></span>
                    </button>

                </div>

                <!--------------------------------------------Tab Content-------------------------------------------------------------------------------------- -->
                <div id="tabcontentid" class="tabcontent">

                    <div id="product_tabview_msg" class="model-footer">
                        <h5>* Please select an sub product item to get this action!</h5>
                    </div>

                    <div class="flex-row-tab">
                        <div class="SearchBtnWap">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="#Product ID?">
                                <button type="submit" class="searchButton cripple">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="BtnWap">
                            <button id="addproduct" class="three-set-btn1 cripple" onclick="location.href"  >Add</button>

                            <button class="three-set-btn2 cripple">Update</button>

                            <button class="three-set-btn3 cripple">Remove</button>
                        </div>
                    </div><!--flex row-->

                    <!--                table start-->

                    <div class="table-responsive" id="table-responsive">

                    </div>
                    <div class="card-footer">

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

            <div class="side-cards-container" >

                <div id="product_img" class="cardview">
                </div>

                <div class="cardview">
                    <div class="size-container" >
                        <span style="font-size: 60px; font-weight: bold; margin-bottom: -40px">size</span>
                        <h1 style="color: #ffd600;  font-size: 140px; font-weight: bold;" id="product_size"></h1>
                    </div>
                </div>

            </div>


        </div>


    </div><!--right-->


</div>


<?php linkJS("assets/js/manageproduct.js") ?>
<?php //linkJS("assets/js/table.js") ?>


</body>
</html>