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


<form>
    <div class="flexbox-container">

        <div class="inputfield">
            <label for="JobId">Job ID</label>
            <input type="text" id="JobId" name="JobId" value="0001201" class="form-contrall-readonly" readonly>
        </div>

        <div class="inputfield">
            <label for="Name">Name</label>
            <input type="text" id="Name" name="Name" class="form-contrall">
        </div>

        <div class="inputfield">
            <label for="ItemId">Job ID</label>
            <input type="text" id="ItemId" name="ItemId" value="0001201" class="form-contrall-readonly" readonly>
        </div>

        <div class="inputfield">
            <label for="Line">Line</label>
            <select id="Line" name="JobId"  class="form-contrall">
                <option value="">--SELECT--</option>
                <option value="line1">01</option>
                <option value="line2">02</option>
                <option value="line3">03</option>
            </select>
        </div>

        <div class="inputfield">
            <label for="CompletedWorkload">Current Completed Workload</label>
            <input type="number" id="CompletedWorkload" name="CompletedWorkload" value="23000" class="form-contrall-readonly" readonly>
        </div>

        <div class="inputfield">
            <label for="RemainingWorkload">Remaining Workload</label>
            <input type="number" id="RemainingWorkload" name="RemainingWorkload" value="22000" class="form-contrall-readonly" readonly>
        </div>

        <div class="inputfield">
            <label for="RequiredTodayWorkload">Required Today Workload</label>
            <input type="number" id="RequiredTodayWorkload" name="RequiredTodayWorkload" value="1050" class="form-contrall-readonly" readonly>
        </div>


        <div class="inputfield">
            <label for="TodayCompletedWorkload">Today Completed Workload</label>
            <input type="text" id="TodayCompletedWorkload" name="TodayCompletedWorkload" class="form-contrall">
        </div>

        <br><div class="inputfield inputbutton">
            <input type="submit" value="Save" class="btn cripple">
        </div>

    </div>
</form>
</div>
</div>
</body>
</html>
