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
                    <label for="role">Employee Role</label>
                    <input type="text" id="role"  name="role" value=" <?php echo $data['employeeRole'] ?>" class="form-contrall-special" readonly>
                </div>

                <div class="inputfield">
                    <label for="name">Full Name</label>
                    <input type="text"  maxlength="100" id="name" name="name" class="form-contrall" value="<?php if($data['FullName']) :echo $data['FullName']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php
                        if ($data['nameError']) {
                            echo $data['nameError'];
                        }

                        elseif($data['nameErrorCheckFormat']) {
                            echo $data['nameErrorCheckFormat'];
                        }
                        ?>
                    </label>

                </div>


                <div class="inputfield">
                    <label for="address">Address</label>
                    <input type="text" id="address" maxlength="100" name="address" class="form-contrall" value="<?php if($data['Address']) :echo $data['Address']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['addressError']) :echo $data['addressError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="contact_no">Contact Number</label>
                    <input type="tel" title="ex:-0714325432" id="contact_no" maxlength="100" name="contact_no" class="form-contrall" value="<?php if($data['ContactNumber']) :echo $data['ContactNumber']; endif; ?>" pattern="[0-9]{10}">
                    <label class="error" style="color:red;">
                        <?php   if($data['contact_noError']) :echo $data['contact_noError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="email">Email Address</label>
                    <input id="email" maxlength="100" name="email" class="form-contrall" value="<?php if($data['email']) :echo $data['email']; endif; ?>">
                    <label class="error" style="color:red;">

                        <?php
                        if ($data['emailError']) {
                            echo $data['emailError'];
                        }

                        elseif($data['emailErrorFormat']) {
                            echo $data['emailErrorFormat'];
                        }
                        ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="blood_group">Blood Group</label>
                    <select id="blood_group"  name="blood_group" class="form-contrall" >
                        <option value="" disabled selected>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['blood_groupError']) :echo $data['blood_groupError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="bank_name">Bank Name</label>
                    <select id="bank_name"  name="bank_name" class="form-contrall" >
                        <option value="" disabled selected>Select Bank</option>
                        <option value="People's Bank">People's Bank</option>
                        <option value="Bank of Ceylon.">Bank of Ceylon.</option>
                        <option value="DFCC Bank PLC">DFCC Bank PLC.</option>
                        <option value="Sampath Bank PLC">Sampath Bank PLC</option>
                        <option value="National Development Bank PLC">National Development Bank PLC</option>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['bank_nameError']) :echo $data['bank_nameError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="bank_account_name">Bank Account Name</label>
                    <input type="text" id="bank_account_name" maxlength="100" name="bank_account_name" class="form-contrall" value="<?php if($data['BankAccName']) :echo $data['BankAccName']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['bank_account_nameError']) :echo $data['bank_account_nameError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="bank_branch">Bank Branch</label>
                    <input type="text" id="bank_branch" name="bank_branch" maxlength="100"  class="form-contrall" value="<?php if($data['BankBranch']) :echo $data['BankBranch']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['bank_branchError']) :echo $data['bank_branchError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="account_no" >Account Number</label>
                    <input type="text" id="account_no" name="account_no" maxlength="50" class="form-contrall" value="<?php if($data['AccountNumber']) :echo $data['AccountNumber']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['account_noError']) :echo $data['account_noError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="salary_basic">Salary Basic</label>
                    <input type="number" min="0.00" step="0.01" maxlength="100"  id="salary_basic" name="salary_basic" class="form-contrall" value="<?php if($data['SalaryBasic']) :echo $data['SalaryBasic']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['salary_basicError']) :echo $data['salary_basicError']; endif; ?>
                    </label>
                </div>

                <div class="inputfield">
                    <label for="job_start_date">Job Start Date</label>
                    <input type="date" id="job_start_date" name="job_start_date" class="form-contrall"  value="<?php if($data['job_start_date']) :echo $data['job_start_date']; endif; ?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['job_start_dateError']) :echo $data['job_start_dateError']; endif; ?>
                    </label>
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
