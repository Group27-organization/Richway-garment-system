<!DOCTYPE html>
<html>
<title>UpdateTodayWorkload</title>
<head>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>


        <div class="header-container background-gradient">
            <div class="header-group">
                <h1 class="text-white">Update Today Workload</h1>
                <p class="text-lead text-white">Update workload</p>

            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>


<form action="<?php echo BASEURL;?>/supervisorController/insertWorkload" method="POST" >
    <div class="flexbox-container">


        <div class="inputfield">
            <label for="JOBID">JOB ID</label>
            <input type="text" id="jobID" name="jobID"  class="form-contrall-readonly" readonly value="J<?php echo $data['data']['jobID'];?>">
        </div>

        <div class="inputfield">
            <label for="total">Total Workload Workload</label>
            <input type="text" id="total" name="total" class="form-contrall-readonly" readonly value="<?php echo $data['data']['total'];?>">
        </div>

        <div class="inputfield">
            <label for="current">Current Completed Workload</label>
            <input type="text" id="current" name="current" class="form-contrall-readonly" readonly value="<?php echo $data['data']['current'];?>">
        </div>

        <div class="inputfield">
            <label for="remaining">Remaining Workload</label>
            <input type="text" id="	remaining" name="remaining" class="form-contrall-readonly" readonly  value="<?php echo $data['data']['remaining'];?>">
        </div>


        <div class="inputfield">
            <label for="today">Today Completed Workload</label>
            <input type="text" id="today" name="today"   class="form-contrall" type="number">
            <label class="error" style="color:red;">
                <?php   if($data['TodayCompletedWorkloadError']) :echo $data['TodayCompletedWorkloadError']; endif; ?>
            </label>
        </div>

        <br><div class="inputfield inputbutton">
            <input type="submit" value="Update" class="btn cripple">

        </div>

    </div>
</form>
</div>
</div>
<?php linkJS("assets/js/supervisor.js") ?>
<?php linkJS("assets/js/table.js") ?>
</body>
</html>
