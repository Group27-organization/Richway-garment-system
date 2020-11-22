<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php linkCSS("assets/css/login.css") ?>
</head>
<body>

    <div class="content">
        <div class="left-container">
            <div class="left-container-alpha">
                <img src="<?php echo BASEURL; ?>/public/assets/img/image2.png" alt="Richway_Logo">


                <div class="footer">
                    <p>All rights reserved @ Richway Garments</br>Email: contact@richwaygarments.com</p>
                    <p>Copyright © 2020 Version 1.0</p>
                </div>

            </div>
        </div>

        <div class="right-container">
            <div class="right-container-flex">
                <label class="top">
                    Sign In
                </label>

                <form action="<?php echo BASEURL; ?>/loginController/userLogin" method="POST">
                    <div class="loginfield">
                        <input name="email" type="email" class="field" placeholder="&#xf0e0;  Email Address" value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
                    </div>
                    <div class="error">
                        <?php if(!empty($data['emailError'])): echo $data['emailError']; endif; ?>
                    </div>
                    <div class="loginfield">
                        <input name="password" type="password" class="field" placeholder=" &#xf023;  Password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
                    </div>
                    <div class="error">
                        <?php if(!empty($data['passwordError'])): echo $data['passwordError']; endif; ?>
                    </div>

                    <div class="rememberme">
                        <div class="checks">
                            <input id="r1" type="checkbox" checked>
                            <label id="r2"> Remember me</label>
                        </div>
                    </div>

                    <div><input name="lginBtn" type="submit" value="Sign In" class="btn"></div>

                    <div class="forget">
                        <a href="#">Forgot Password?</a>
                    </div>


                </form>

            </div>
        </div>

    </div>

</body>
</html>