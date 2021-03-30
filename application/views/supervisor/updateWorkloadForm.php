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


<form action="<?php echo BASEURL;?>/supervisorController/updateWorkload" method="POST" >
    <div class="flexbox-container">



        <div class="inputfield">
            <label for="Name">Name</label>
            <input type="text" id="Name" name="Name"  class="form-contrall-readonly" readonly value="<?php echo $data['data']->Name;?>">
            <label class="error" style="color:red;">
                <?php   if($data['NameError']) :echo $data['NameError']; endif; ?>
            </label>
        </div>


        <div class="inputfield">
            <label for="Date">Date</label>
            <input type="text" id="Date" name="Date"  class="form-contrall-readonly" readonly value="<?php echo $data['data']->Date;?>">
            <label class="error" style="color:red;">
                <?php   if($data['DateError']) :echo $data['DateError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="Line">Line</label>
            <input type="text" id="Line" name="Line"  class="form-contrall-readonly" readonly value="<?php echo $data['data']->Line;?>">
            <label class="error" style="color:red;">
                <?php   if($data['LineError']) :echo $data['LineError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="current_completed_workload">Current Completed Workload</label>
            <input type="text" id="current_completed_workload" name="current_completed_workload" class="form-contrall-readonly" readonly value="<?php echo $data['data']->current_completed_workload;?>">
            <label class="error" style="color:red;">
                <?php   if($data['CurrentCompletedWorkloadError']) :echo $data['CurrentCompletedWorkloadError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="remaining_workload">Remaining Workload</label>
            <input type="text" id="	remaining_workload" name="remaining_workload" class="form-contrall-readonly" readonly  value="<?php echo $data['data']->remaining_workload;?>">
            <label class="error" style="color:red;">
                <?php   if($data['RemainingWorkloadError']) :echo $data['RemainingWorkloadError']; endif; ?>
            </label>
        </div>

        <div class="inputfield">
            <label for="required_workload">Required Today Workload</label>
            <input type="text" id="required_workload" name="required_workload"  class="form-contrall-readonly" readonly value="<?php echo $data['data']->required_workload;?>">
            <label class="error" style="color:red;">
                <?php   if($data['RequiredTodayWorkloadError']) :echo $data['RequiredTodayWorkloadError']; endif; ?>
            </label>
        </div>


        <div class="inputfield">
            <label for="today_completed_workload">Today Completed Workload</label>
            <input type="text" id="today_completed_workload" name="today_completed_workload"   class="form-contrall" value="<?php echo $data['data']->today_completed_workload;?>">
            <label class="error" style="color:red;">
                <?php   if($data['TodayCompletedWorkloadError']) :echo $data['TodayCompletedWorkloadError']; endif; ?>
            </label>
        </div>

        <br><div class="inputfield inputbutton">
            <input type="submit" value="Update" class="btn cripple">
            <input type="hidden" name="hiddenID" value="<?php echo $data['data']->ID;?>">
        </div>

    </div>
</form>
</div>
</div>
<?php linkJS("assets/js/supervisor.js") ?>
<?php linkJS("assets/js/table.js") ?>
</body>
</html>
