<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Employee">
    <title>Update Employee</title>

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
                <h1 class="text-white">Update Employee</h1>
                <p class="text-lead text-white">You can update employee's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

 <form  action="<?php echo BASEURL;?>/manageEmployeeController/updateEmployee" method="POST" >
     <div class="flexbox-container">
        <div class="inputfield">
            <label for="role">Employee Role</label>
            <select id="employee_role"  name="employee_role" class="form-contrall" >
                <option value="Owner" <?=$data['data']->employee_role == 'Owner' ? ' selected="selected"' : '';?>>Owner</option>
                <option value="Sales Manager" <?=$data['data']->employee_role == 'Sales Manager' ? ' selected="selected"' : '';?>>Sales Manager</option>
                <option value="Production Manager" <?=$data['data']->employee_role == 'Production Manager' ? ' selected="selected"' : '';?>>Production Manager</option>
                <option value="Stock Keeper" <?=$data['data']->employee_role == 'Stock Keeper' ? ' selected="selected"' : '';?>>Stock Keeper</option>
                <option value="Accountant" <?=$data['data']->employee_role == 'Accountant' ? ' selected="selected"' : '';?>>Accountant</option>
                <option value="Supervisor" <?=$data['data']->employee_role == 'Supervisor' ? ' selected="selected"' : '';?>>Supervisor</option>
                <option value="Tailor" <?=$data['data']->employee_role == 'Tailor' ? ' selected="selected"' : '';?>>Tailor</option>
            </select>
        </div>

        <div class="inputfield">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-contrall"  value="<?php echo $data['data']->name;?>">
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
            <input type="text" id="address" name="address" class="form-contrall" value="<?php echo $data['data']->address;?>">
            <label class="error" style="color:red;">
                <?php   if($data['addressError']) :echo $data['addressError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="contact_no">Contact Number</label>
            <input type="tel" id="contact_no" name="contact_no" class="form-contrall" value="<?php echo $data['data']->contact_no;?>">
            <label class="error" style="color:red;">
                <?php   if($data['contact_noError']) :echo $data['contact_noError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="email">Email Address</label>
            <input id="email" maxlength="100" name="email" class="form-contrall" value="<?php echo $data['data']->email;?> ">
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
                    <option value="A+" <?=$data['data']->blood_group == 'A+' ? ' selected="selected"' : '';?>>A+</option>
                    <option value="A-" <?=$data['data']->blood_group == 'A-' ? ' selected="selected"' : '';?>>A-</option>
                    <option value="B+" <?=$data['data']->blood_group == 'B+' ? ' selected="selected"' : '';?>>B+</option>
                    <option value="B-" <?=$data['data']->blood_group == 'B-' ? ' selected="selected"' : '';?>>B-</option>
                    <option value="O+" <?=$data['data']->blood_group == 'O+' ? ' selected="selected"' : '';?>>O+</option>
                    <option value="O-" <?=$data['data']->blood_group == 'O-' ? ' selected="selected"' : '';?>>O-</option>
                    <option value="AB+" <?=$data['data']->blood_group == 'AB+' ? ' selected="selected"' : '';?>>AB+</option>
                    <option value="AB-" <?=$data['data']->blood_group == 'AB-' ? ' selected="selected"' : '';?>>AB-</option>
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
            <input type="text" id="bank_account_name" maxlength="100" name="bank_account_name" class="form-contrall" value="<?php echo $data['data']->acc_name;  ?>">
            <label class="error" style="color:red;">
                <?php   if($data['bank_account_nameError']) :echo $data['bank_account_nameError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="bank_branch">Bank Branch</label>
            <input type="text" id="bank_branch" name="bank_branch" maxlength="100"  class="form-contrall" value="<?php echo $data['data']->branch; ?>">
            <label class="error" style="color:red;">
                <?php   if($data['bank_branchError']) :echo $data['bank_branchError']; endif; ?>
            </label>
         </div>

        <div class="inputfield">
            <label for="account_no" >Account Number</label>
            <input type="text" id="account_no" name="account_no" maxlength="50" class="form-contrall" value="<?php echo $data['data']->ac_number; ?>">
            <label class="error" style="color:red;">
                <?php   if($data['account_noError']) :echo $data['account_noError']; endif; ?>
            </label>
       </div>


        <div class="inputfield">
            <label for="salary_basic">Salary Basic</label>
            <input type="text" id="salary_basic" name="salary_basic" class="form-contrall"  value="<?php echo $data['data']->salary_basic;?>">
            <label class="error" style="color:red;">
                <?php   if($data['salary_basicError']) :echo $data['salary_basicError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="startJobDate">Job Start Date</label>
            <input type="date" id="startJobDate" name="startJobDate" class="form-contrall"  value="<?php echo $data['data']->job_start_date;?>">
            <label class="error" style="color:red;">
                <?php   if($data['job_start_dateError']) :echo $data['job_start_dateError']; endif; ?>
            </label>
        </div>

        <br><div class="inputfield inputbutton">
            <input type="submit" value="Update" class="btn cripple">
            <input type="hidden" name="hiddenID" value="<?php echo $data['data']->emp_ID;?>">
        </div>




    </div>
</form>
</div><!--    right-->
</div>  <!--    grid container-->

</body>
</html>
