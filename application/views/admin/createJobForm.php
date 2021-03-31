<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="nav_item" content="Create Job">
    <title>Create Job</title>
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
                <h1 class="text-white">Create a Job</h1>
                <p class="text-lead text-white">Create job for start the order item.</p>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

        <form action="<?php echo BASEURL; ?>/manageJobController/createJobMethod" method="POST" >
            <div class="flexbox-container">

                <div class="inputfield">
                    <label for="itemID">Order Item ID</label>
                    <input type="text" id="itemID" name="itemID" value="<?php echo $data['itemID']?>" class="form-contrall-special" readonly>
                </div>

                <div class="inputfield">
                    <label for="LineIds">Assigned Line IDs</label>
                    <div class="inputbutton">
                        <input type="text" id="LineIds" name="LineIds" class="form-contrall-readonly" readonly>
                        <button id="linAssignbtn" onclick="location.href" type="button"  class="btn2 input2 cripple">Assign</button>
                    </div>

                </div>

                <div class="inputfield">
                    <label for="lineCount">Lines Count</label>
                    <input type="email" id="lineCount" name="lineCount" class="form-contrall-readonly" readonly>
                </div>

                <div class="inputfield">
                    <label for="startDate">Job Start Date</label>
                    <input type="text" id="startDate" name="startDate" class="form-contrall-readonly" readonly>
                </div>

                <div class="inputfield">
                    <label for="endDate">Job End Date</label>
                    <input type="text" id="endDate" name="endDate" class="form-contrall-readonly" readonly>
                </div>

                <div class="inputfield">
                    <label for="supervisorId">Assigned Supervisor ID</label>
                    <div class="inputbutton">
                        <input type="text" id="supervisorId" name="supervisorId" class="form-contrall-readonly" readonly>
                        <button id="supAssignbtn" onclick="location.href" type="button"  class="btn2 input2 cripple">Assign</button>
                    </div>

                </div>

                <div class="inputfield">
                    <label for="description">Add Description</label>
                    <input type="text" id="description" name="description" class="form-contrall" >
                </div>

                <br><div class="inputfield inputbutton">
                    <button id="create_job_form_btn" type="submit" class="btn cripple">Create Job
                    </button>
                </div>

            </div>
        </form>


    </div><!--right-->

</div>

<!-- Find lines Modal Section -->
<div class="bg-modal" id="linebgmodal">
    <div class="modal-contents" style="width: 50vw !important;">

            <div class="card">
                <div class="card-header">
                    <div class="left-card-header">
                        <h3 class="title">Assign Lines</h3>
                    </div>
                </div>
                <div class="table-responsive table-body" id="table-responsive">

                </div>
                <div class="card-footer">

                    <div class="model-footer">
                        <h5>* Please select line or lines to assign!</h5>
                    </div>

                    <div class="bottom-row">



                        <div class="BtnWap">
                            <button id="close" class="model-btn2 cripple" onclick="closeModel()">Close</button>
                            <button id="assign" class="model-btn cripple" onclick="assignLines()"  >Assign</button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
</div>

<div class="bg-modal" id="supbgmodal">
    <div class="modal-contents" style="width: 50vw !important;">

        <div class="card">
            <div class="card-header">
                <div class="left-card-header">
                    <h3 class="title">Assign Supervisor</h3>
                </div>
                <div class="right-card-header">
                    <div class="SearchBtnWap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="#Supervisor ID">
                            <button type="submit" class="searchButton cripple">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="table-responsive2">

            </div>
            <div class="card-footer">

                <div class="model-footer" id="jobFormMsgView" style="display: none">
                    <h5>* Please select a supervisor to get this action!</h5>
                </div>

                <div class="bottom-row">



                    <div class="BtnWap">
                        <button id="close" class="model-btn2 cripple" onclick="closeModel()">Close</button>
                        <button id="assign" class="model-btn cripple" onclick="assignSupervisor()"  >Assign</button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


<?php linkJS("assets/js/createjobform.js") ?>
<?php linkJS("assets/js/table.js") ?>


</body>
</html>
