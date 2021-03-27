<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-tabview.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>

    <?php linkCSS("assets/css/popup-window-form.css") ?>


    <?php linkJS("assets/js/salesmanjor-js/updateOrder-forms.js") ?>
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
                    <a href="#!" style="color:#8898aa;"> / Update Order Item</a>
                </div>
            </div>
        </div>

        <!----------------------------------tab pane start--------------------------------------------------------------------------------------- -->

        <div class="tab-content" >
            <div class="tab">
                <!--                <button class="tablinks active" onclick="openEmp(event,'sales_manager')">Sales Managers</button>-->
                <!--                <button class="tablinks" onclick="openEmp(event,'production_manager')">Production Managers</button>-->
                <!--                <button class="tablinks" onclick="openEmp(event,'supervisor')">Supervisors</button>-->
                <!--                <button class="tablinks" onclick="openEmp(event,'accountant')">Accountants</button>-->
                <!--                <button class="tablinks" onclick="openEmp(event,'stock_keeper')">Stock Keepers</button>-->
                <!--                <button class="tablinks" onclick="openEmp(event,'owner')">Owners</button>-->
            </div>

            <!--------------------------------------------Tab Content-------------------------------------------------------------------------------------- -->
            <div id="tabcontentid" class="tabcontent" >
                <div class="flex-row-tab">
                    <div class="SearchBtnWap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="">
                            <button class="three-set-btn2" onclick="back()" > << Back</button>
                    </div>
                </div><!--flex row-->

                <!--                table start-->

                <div class="table-responsive" id="orderedItemTable" >

                </div>
                <div class="card-footer">

                    <div class="model-footer">
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


<?php //linkJS("assets/js/table.js") ?>
<div class="bg-modal" id="updateForm" >
    <div class="modal-contents">

        <div id="close" class="close" onclick="closeModel()">+</div>

        <div class="model-header">
            <h2>Update Order Item</h2>
        </div>
        <div class="flexbox-container-popup" >


            <div class="inputfield2">
                <label for="Address" id="lbl5">Update Size</label>
                <select id="UpdateSize" name="" class="form-contrall"></select>
                <label for="US"  class="error" style="color: mediumspringgreen; display:none" >You Change Size</label>
<!--                <input id="myText" type="text" style="display: none;">-->
            </div>

            <div class="inputfield2">
                <label for="Address" id="lbl5">Update Order Description</label>
<!--                <input type="text" id="CustomerAddress" name="Address" class="form-contrall">-->
                <textarea id="Description" rows="4" cols="50" name="comment" class="form-contrall">Enter text here...</textarea>
                <label for="OD"  class="error" style="color: red; display:none" >This Field Required!</label>
                <label for="UD"  class="error" style="color: mediumspringgreen; display:none" >You Change Order Description</label>
            </div>

        </div><!--   flexbox-container-popup  -->

        <div class="model-footer" id="model-footer-newcustomer">
            <h5 id="newcustomer-error">* Something  to assign!</h5>
        </div>
        <div class="bottom-row2">
            <div class="BtnWap2">

                <button  class="model-btn2 cripple close" onclick="closeModel()">Close</button>
                <button id="addnewCustomerBtn" class="model-btn cripple" onclick="UpdateItem()">Add</button>
            </div>
        </div>
    </div><!--    modal-contents-->
</div><!--bg-modal-->

</body>
</html>