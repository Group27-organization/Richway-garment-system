<?php
session_start();
include "../config/config.php";
include "../system/init.php";

if (isset($_SESSION['CREATED']) AND time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minutes ago
    session_destroy();
    echo '
            <script>
                if(!alert("Your session has timed out! Please login again.")) {
                    window.location.href = "http://localhost/Richway-garment-system/loginController/loginForm"
                }
            </script>
            ';
}

?>