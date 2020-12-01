<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Manage User">
    <title>Add User</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
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
                <h1 class="text-white">Create an user account</h1>
                <p class="text-lead text-white">Create new account for employee.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

        <form action="<?php echo BASEURL; ?>/manageUserController/addUser" method="POST" onsubmit="return createAccount()">
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="Role">Role</label>
                    <input type="text" id="role" name="role" value="<?php echo $data['role']?>" class="form-contrall-special" readonly>
                </div>

                <div class="inputfield">
                    <label for="EmployeeId">Assign Employee ID</label>
                    <div class="inputbutton">
                        <input type="text" id="EmployeeId" name="EmployeeId" class="form-contrall-readonly" readonly>
                        <button id="findbtn" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
                    </div>

                </div>

                <div class="inputfield">
                    <label for="UserName">User Name</label>
                    <input type="email" id="UserName" name="UserName" class="form-contrall-readonly" readonly>
                </div>

                <br><div class="inputfield inputbutton">
                    <button id="create_account_btn" type="submit" class="btn cripple">Create account
                    </button>
                </div>

            </div>
        </form>


    </div><!--right-->

</div>

<!-- Find employee Modal Section -->
<div class="bg-modal">
    <div class="modal-contents">

        <div class="close">+</div>

            <div class="card">
                <div class="card-header">
                    <div class="left-card-header">
                        <h3 class="title">Assign Employee</h3>
                    </div>
                    <div class="right-card-header">
                        <div class="SearchBtnWap">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="#Employee ID">
                                <button type="submit" class="searchButton cripple">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" id="table-responsive">

                </div>
                <div class="card-footer">

                    <div class="model-footer">
                        <h5>* Please select an employee to assign!</h5>
                    </div>

                    <div class="bottom-row">

                        <nav aria-label="...">
                            <ul class="pagination justify-content-start">
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


                        <div class="BtnWap">
                            <button id="close" class="model-btn2 cripple" onclick="closeModel()">Close</button>
                            <button id="assign" class="model-btn cripple" onclick="assignEmployee()"  >Assign</button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
</div>


<?php linkJS("assets/js/admin-adduser.js") ?>
<?php linkJS("assets/js/table.js") ?>


</body>
</html>