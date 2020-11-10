<div class="wrapper">
    <div class="navbar">
        <div class="left">
            <ul>
                <li>
                    <a href="<?php echo BASEURL; ?>/">
                        <img src="<?php echo BASEURL; ?>/public/assets/img/image2.png"></a>
                </li>
            </ul>
        </div>

        <div class="nav_right">
            <ul>
                <li class="dp">
                    <a href="#" class="1">
                        <p>Coding Market<br> <span>Admin</span></p><img src="<?php echo BASEURL; ?>/public/assets/img/user.png" alt="Admin" width="40"><i class="fas fa-angle-down"></i>
                    </a>

                    <div class="dropdown">
                        <ul>
                            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fas fa-sliders-h"></i> Settings</a></li>

                            <?php if($this->getSession('userId')): ?>
                                <li><a href="<?php echo BASEURL; ?>/dashboardController/logout"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.querySelector(".nav_right ul .dp").addEventListener("click", function() {
        this.classList.toggle("active");
    });
</script>

