<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .notification-div {
        margin-top: 10px;
    }

    .icon-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        color: #333333;
        background: #dddddd;
        border: none;
        outline: none;
        border-radius: 50%;
    }

    .icon-button:hover {
        cursor: pointer;
    }

    .icon-button:active {
        background: #cccccc;
    }

    .icon-button__badge {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 15px;
        height: 15px;
        background: red;
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }

</style>

<div class="wrapper" id="head">
    <div class="navbar">
        <div class="left">
            <ul>
                <li>
                    <a href="<?php echo BASEURL; ?>/">
                        <img src="<?php echo BASEURL; ?>/public/assets/img/image2.png"></a>
                </li>
            </ul>
        </div>
<!--onclick="setTimeout(myFunction, 100);"-->
        <div style="margin-left: 10px">
            <button id="CIN" type="button" class="icon-button" >
                <span class="material-icons">notifications</span>
                <span id="notifycount" class="icon-button__badge">0</span>
            </button>
            <script>
                // let x=0;
                // function myFunction() {
                //     $.ajax({
                //         type: 'POST',
                //         url: "http://localhost/Richway-garment-system/notificationController/getNotificationCount",
                //         data: {   key: "notify"},
                //         success: function(data){
                //             // document.getElementById('notifycount').innerText=1
                //             console.log(data);
                //             // alert(data);
                //         },
                //         error       : function() {
                //             console.log("error");
                //         }
                //     });
                //
                //
                //     // x =x+1;
                //     // document.getElementById('notifycount').innerText=x
                // }
            </script>
        </div>

        <div class="nav_right">



            <ul>
                <li class="dp">

                    <a href="#" class="1">
                        <p><?php echo $this->getSession('userId')['user_name'] ?><br> <span><?php echo ucwords(str_replace("_"," ",$this->getSession('userId')['role'])); ?></span></p><img src="<?php echo BASEURL; ?>/public/assets/img/contacts_n.svg" height="32" width="32"><i class="fas fa-angle-down"></i>
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
