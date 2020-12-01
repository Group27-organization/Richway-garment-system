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
    <?php linkCSS("assets/css/admin-changepassword.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
</head>
<body>

<div class="main-container">
    <?php include "components/nav.php"; ?>

    <div class="header-container background-gradient">
        <div class="header-group">
            <h1 class="text-white">Set new password</h1>
            <p class="text-lead text-white">Set strong password to your account.</p>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <!----------------------------------form start--------------------------------------------------------------------------------------- -->

    <form action="" method="POST" id="changePasswordForm">
        <div class="flexbox-container">

            <div class="inputfield">
                <label for="new_password">New password</label>
                <input type="password" id="new_password" name="new_password" value="" class="form-contrall">
            </div>

            <div class="error_msg" id="msgv1">
                <img src="<?php echo BASEURL; ?>/public/assets/img/exclamation-circle-solid.svg" width="12px" height="12px" style="margin-top: 2px; margin-right: 5px">
                <span id="error_msg1"></span>
            </div>

            <div class="inputfield">
                <label for="confirm_password">Confirm password</label>
                <input type="password" id="confirm_password" name="confirm_password" value="" class="form-contrall">
            </div>

            <div class="error_msg" id="msgv2">
                <img src="<?php echo BASEURL; ?>/public/assets/img/exclamation-circle-solid.svg" width="12px" height="12px" style="margin-top: 2px; margin-right: 5px">
                <span id="error_msg2"></span>
            </div>

            <br><div class="inputfield inputbutton">
                <button id="change_password_btn" type="submit" class="btn cripple">Change password
                </button>
            </div>

        </div>
    </form>


</div>


<?php linkJS("assets/js/admin-changepassword.js") ?>



</body>
</html>