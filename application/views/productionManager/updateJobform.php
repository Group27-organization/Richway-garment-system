<html>
<head>
    <title>Create Job</title>

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
                <h1 class="text-white">Update Job Form</h1>
                <p class="text-lead text-white">Update job</p>

            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->
        <form>
            <div class="flexbox-container" >

                <div class="inputfield">
                    <label>Order Item Id</label>
                    <div class="inputbutton">
                        <input type="text" id="findbtn"  class="form-contrall">
                        <button id="slt-orderitems" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>
                    </div>
                    <label for='' class="error"></label>
                </div>
                <div class="inputfield">
                    <label>Job Name</label>
                    <input type="text" id="Name" name="name" class="form-contrall">
                </div>
                <div class="inputfield">
                    <label>Assign Lines</label>
                    <div class="inputbutton">
                        <input type="text" id="findbtn"  class="form-contrall">
                        <button id="slt-orderitems" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>

                    </div>
                    <label for='' class="error"></label>
                </div>

                <div class="inputfield">
                    <label>Assign Supervisors</label>
                    <div class="inputbutton">
                        <input type="text" id="findbtn"  class="form-contrall-readonly">
                        <button id="" onclick="location.href" type="button"  class="btn2 input2 cripple">Find</button>

                    </div>
                    <label for='' class="error"></label>
                </div>

                <div class="inputfield">
                    <label for="">Lines Count</label>
                    <div class="inputbutton">

                        <input type="text" id="LinesCount" name="name" class="form-contrall-readonly">

                    </div>
                </div>


                <div class="inputfield">
                    <label for="StartDate">Start Date</label>
                    <input type="datetime-local" id="StartDate" name="StartDate" class="form-contrall">
                </div>

                <div class="inputfield">
                    <label for="EndDate">End Date</label>
                    <input type="datetime-local" id="EndDate" name="EndDate" class="form-contrall">
                </div>

                <div class="inputfield">
                    <label for="JobDescription">Description</label>
                    <textarea id="JobDescription" name="description" rows="4" cols="50" class="form-contrall"></textarea>
                </div>



                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Update Job" class="btn cripple">
                </div>
            </div>

        </form>
    </div>
</div>
</body>
</html>