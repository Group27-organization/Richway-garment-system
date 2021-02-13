<!DOCTYPE html>
<html>
<head>
    <meta id="nav_item" content="Manage Payroll">
    <title>Pay</title>

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
                <h1 class="text-white">Payment Details</h1>
                <p class="text-lead text-white">You can make payment's details in here</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <form  action="<?php echo BASEURL;?>/ownerController/managePayroll" method="POST" >
            <div class="flexbox-container">
                <div class="inputfield">
                    <label for="role">Employee Role</label>
                    <input type="text" id="role" name="role"  value="<?php echo $data['data']->employee_role;?>"  class="form-contrall-readonly" readonly>
                </div>

                <div class="inputfield">
                    <label for="name">Employee Name</label>
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
                    <label for="payment_type">Payment Type</label>
                    <select id="payment_type"  name="payment_type" class="form-contrall" >
                        <option value="">Select Payment method</option>
                        <option value="cheque">Cheque</option>
                        <option value="cash">Cash</option>
                    </select>
                    <label class="error" style="color:red;">
                        <?php   if($data['payment_typeError']) :echo $data['payment_typeError']; endif; ?>
                    </label>

                </div>

                <div class="inputfield">
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" class="form-contrall" value="<?php echo $data['data']->amount;?>">
                    <label class="error" style="color:red;">
                        <?php   if($data['amountError']) :echo $data['amountError']; endif; ?>
                    </label>
                </div>


                <div class="inputfield">
                    <label for="bank_name">Bank Name</label>
                    <select id="bank_name"  name="bank_name" class="form-contrall" >
                        <option value="">Select Bank</option>
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



                <br><div class="inputfield inputbutton">
                    <input type="submit" value="Pay" class="btn cripple">
                    <input type="hidden" name="hiddenID" value="<?php echo $data['data']->emp_ID;?>">
                </div>




            </div>
        </form>
    </div><!--    right-->
</div>  <!--    grid container-->

</body>
</html>
