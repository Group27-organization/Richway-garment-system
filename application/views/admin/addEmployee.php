<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Employee">
    <title>Add Employee</title>
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
                <h1 class="text-white">Add Employee</h1>
                <p class="text-lead text-white">You can add employee's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

<form  action="<?php echo BASEURL;?>/manageEmployeeController/addEmployee" method="POST" >
    <div class="flexbox-container">

        <div class="inputfield">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-contrall">
        </div>


        <div class="inputfield">
            <label for="contact_no">Contact Number</label>
            <input type="tel" id="contact_no" name="contact_no" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="blood_group">Blood Group</label>
            <input type="text" id="blood_group" name="blood_group" class="form-contrall">
        </div>


        <div class="inputfield">
            <label for="role">Role</label>
            <input type="text" id="role" name="role" value="<?php echo $data['role']?>" class="form-contrall-readonly" readonly>
        </div>

        <div class="inputfield">
            <label for="bank_account_name">Bank Account Name</label>
            <input type="text" id="bank_account_name" name="bank_account_name" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="bank_ID">Bank ID</label>
            <input type="text" id="bank_ID" name="bank_ID" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="bank_branch">Bank Branch</label>
            <input type="text" id="bank_branch" name="bank_branch" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="account_no">Account Number</label>
            <input type="text" id="account_no" name="account_no" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="salary_basic">Salary Basic</label>
            <input type="text" id="salary_basic" name="salary_basic" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="job_start_date">Job Start Date</label>
            <input type="date" id="job_start_date" name="job_start_date" class="form-contrall">
        </div>

        <br><div class="inputfield inputbutton">
            <input type="submit" value="Submit" class="btn cripple">
        </div>




    </div>
</form>
</div><!--    right-->
</div>  <!--    grid container-->

<?php linkJS("assets/js/admin-manageEmployee.js") ?>
<?php linkJS("assets/js/table.js") ?>

</body>
</html>
