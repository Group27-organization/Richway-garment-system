<!DOCTYPE html>
<html>
<head>
    <title>Stock Issue Form</title>
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
                <h1 class="text-white">Stock Issue</h1>
                <p class="text-lead text-white">Stock issue.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
                <div class="flexbox-container">
                    <div class="inputfield">
                        <label for="Date">Date</label>
                        <select id="Date" name="date" class="form-contrall">
                            <option value="p">2020-02-14</option>
                            <option value="on">2020-02-14</option>
                            <option value="s">2020-02-14</option>
                            <option value="e">2020-02-14</option>
                        </select>
                    </div>

                    <div class="inputfield">
                        <label for="Address">Order Id</label>
                        <input type="text" id="orderId" name="orderid" class="form-contrall-readonly" readonly>
                    </div>


                    <div class="inputfield">
                        <label for="OrderName">Order Name</label>
                        <input type="text" id="OrderName" class="form-contrall-readonly" value="John Keells" readonly>
                    </div>

                    <div class="inputfield">
                        <label for="Job">Order Item ID</label>
                        <select id="Job" name="Job" class="form-contrall">
                            <option value="p">1</option>
                            <option value="on">2</option>
                            <option value="s">3</option>
                            <option value="e">4</option>
                        </select>
                    </div>
                    <div class="inputfield">
                        <label for="Job">Job</label>
                        <select id="Job" name="Job" class="form-contrall">
                            <option value="p">1-A</option>
                            <option value="on">2-B</option>
                            <option value="s">3-C</option>
                            <option value="e">4-D</option>
                        </select>
                    </div>

                    <div class="inputfield inputbutton">
                        <input type="submit" value="Issue" class="btn cripple" >
                    </div>

                </div><!--flexbox-container -->



    </div><!--right-->


</div>  <!-- grid-container-->


</body>
</html>

