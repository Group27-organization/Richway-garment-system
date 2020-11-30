<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage Products">
    <title>Add Sub Product</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-addproduct.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Create a sub product</h1>
                <p class="text-lead text-white">Create new item related to the product <?php echo $data['product']?>.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

        <form action="<?php echo BASEURL; ?>/manageProductController/addProduct" method="POST">
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="Product">Product</label>
                    <input type="text" id="Product" name="Product" value="<?php echo $data['product']?>" class="form-contrall-special" readonly>
                </div>

                <div class="inputfield">
                    <label for="Select_Design_Category">Select Design Template</label>
                    <div class="inputbutton">
                        <input type="text" id="Select_Design_Category" name="Select_Design_Category" class="form-contrall-readonly" readonly required>
                        <button id="selectbtn" onclick="location.href" type="button"  class="btn2 input2 cripple">Select</button>
                    </div>

                </div>

                <?php
                foreach($data['table_columns'] as $col):
                    $colname = $col->COLUMN_NAME;
                    $datatype = $col->DATA_TYPE; ?>
                    <div class="inputfield">
                        <label for="<?php echo $colname;?>"><?php echo ucwords(str_replace("_"," ",$colname))?></label>

                        <?php if($datatype == 'int' or $datatype == 'double' or $datatype == 'float' or $datatype == 'currency'): ?>
                            <input type="number" step="0.01" min="0" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" required>
                        <?php
                        elseif ($datatype == 'char'):?>
                            <input type="text" maxlength="3" onkeypress="return /[A-Z]/i.test(event.key)" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" style=" text-transform: uppercase;" required>
                        <?php
                        elseif ($datatype == 'varchar'):?>
                            <input type="text" maxlength="20" id="<?php echo $colname;?>" name="<?php echo $colname;?>" class="form-contrall" style=" text-transform: capitalize;" required>
                        <?php endif; ?>
                    </div>
                <?php   endforeach; ?>

                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Create sub product" class="btn cripple">
                </div>

            </div>
        </form>


    </div><!--right-->

</div>

    <!-- Select design category section -->
    <div class="bg-modal">
        <div class="modal-contents">

            <div class="close">+</div>

            <div class="card">
                <div class="card-header">
                    <div class="left-card-header">
                        <h3 class="title">Select Design Template</h3>
                    </div>
                </div>
                <div class="table-responsive" id="table-responsive">

<!--                        <div class="first-row">-->
<!---->
<!--                            <div class="product-container">-->
<!--                                <div class="product">-->
<!--                                    <div class="product-preview">-->
<!--                                        <img src="--><?php //echo BASEURL; ?><!--/public/assets/img/c-neck-tshirt-trans.png" style="width: 100%; height: 100%; object-fit: scale-down;">-->
<!--                                    </div>-->
<!--                                    <div class="product-info">-->
<!--                                        <div class="product-top">-->
<!--                                            <h6>Description</h6>-->
<!--                                            <h4>Mens POLO C neck short sleeves T-Shirt.</h4>-->
<!--                                        </div>-->
<!--                                        <div class="product-bottom">-->
<!--                                            <button type="button" class="slctbtn cripple">Select-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!---->
<!--                            <div class="product-container">-->
<!--                                <div class="product">-->
<!--                                    <div class="product-preview">-->
<!--                                        <img src="--><?php //echo BASEURL; ?><!--/public/assets/img/up-collar-tshirt-trans.png" style="width: 100%; height: 100%; object-fit: scale-down;">-->
<!--                                    </div>-->
<!--                                    <div class="product-info">-->
<!--                                        <div class="product-top">-->
<!--                                            <h6>Description</h6>-->
<!--                                            <h4>Default material is cotton 95%.</h4>-->
<!--                                        </div>-->
<!--                                        <div class="product-bottom">-->
<!--                                            <button type="button" class="slctbtn cripple">Select-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="second-row">-->
<!--                            <div class="product-container">-->
<!--                                <div class="product">-->
<!--                                    <div class="product-preview">-->
<!--                                        <img src="--><?php //echo BASEURL; ?><!--/public/assets/img/long-sleeves-shirt-trans.png" style="width: 100%; height: 100%; object-fit: scale-down;">-->
<!--                                    </div>-->
<!--                                    <div class="product-info">-->
<!--                                        <div class="product-top">-->
<!--                                            <h6>Description</h6>-->
<!--                                            <h4>Callbacks & Closures</h4>-->
<!--                                        </div>-->
<!--                                        <div class="product-bottom">-->
<!--                                            <button type="button" class="slctbtn cripple">Select-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!---->
<!--                            <div class="product-container">-->
<!--                                <div class="product">-->
<!--                                    <div class="product-preview">-->
<!--                                        <img src="--><?php //echo BASEURL; ?><!--/public/assets/img/short-sleeves-shirt-trans.png" style="width: 100%; height: 100%; object-fit: scale-down;">-->
<!--                                    </div>-->
<!--                                    <div class="product-info">-->
<!--                                        <div class="product-top">-->
<!--                                            <h6>Description</h6>-->
<!--                                            <h4>Callbacks & Closures</h4>-->
<!--                                        </div>-->
<!--                                        <div class="product-bottom">-->
<!--                                            <button type="button" class="slctbtn cripple">Select-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->

                </div>
                <div class="card-footer">

                    <div class="model-footer">
                        <h5>* Please select an employee to assign!</h5>
                    </div>

                    <div class="bottom-row footer-align-items-center">

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


<?php linkJS("assets/js/admin-addproduct.js") ?>

</body>
</html>