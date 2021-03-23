<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Payments</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/side_nav.css") ?>
    <?php linkCSS("assets/css/admin-manageuser.css") ?>
    <?php linkCSS("assets/css/admin-managepayment.css") ?>

    <?php linkCSS("assets/css/admin-tabview.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>

    <script>




    var ExcelToJSON = function() {

            this.parseExcel = function(file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });
                    workbook.SheetNames.forEach(function (sheetName) {
                        // Here is your object
                        var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        var json_object = JSON.stringify(XL_row_object);
                        //console.log(JSON.parse(json_object));

                        let x = JSON.parse(json_object);
                        if (x) {
                            $('#up').show();
                        }



                        $.ajax({
                            type: 'POST',
                            url: "http://localhost/Richway-garment-system/AccountantController/generateMonthlySalary",
                            data: {paymentReport: x, key: "payement"},
                            dataType: 'html',
                            success: function (data) {
                                 console.log(data);

                            },

                        });
                    })
                };

                reader.onerror = function(ex) {
                    console.log(ex);
                };

                reader.readAsBinaryString(file);
            };
        };


        function handleFileSelect(evt) {

            var files = evt.target.files; // FileList object
            var xl2json = new ExcelToJSON();
            xl2json.parseExcel(files[0]);
        }



    </script>

</head>
<body>

<div class="grid-container">

    <?php include "components/side_nav.php"; ?>

    <div class="right" id="right">

        <?php include "components/nav.php"; ?>



        <div class="page-header">
            <div class="block">
                <div class="page-header-routetext">
                    <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/home%20(2).svg" ></i></a>
                    <a href="#!" style="color:#8898aa;"> / Manage Payments</a>
                </div>
            </div>
        </div>


            <div class="tabcontent1">
                <div class="flex-row-tab">
                    <div class="SearchBtnWap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="tabrow">
                        <div class="BtnWap">
                            <button id="generate-salary-btn" onclick="location.href" class="create-button" >
                                Generate Monthly Salary
                            </button>
                        </div>
                    </div>
                </div><!--flex row-->

                <!--                table start-->

                <div class="table-responsive" id="table-responsive">

                </div>
                <div class="card-footer">

                    <div class="model-footer">
                        <h5>* Please select an employee to get this action!</h5>
                    </div>

                    <div class="bottom-row">

                        <nav aria-label="...">
                            <ul class="pagination ">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <!--                                <li class="page-item">-->
                                <!--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
                                <!--                                </li>-->
                                <!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>

            </div>
        </div>

        </div>


    </div><!--right-->


</div>

<div class="bg-modal">
    <div class="modal-contents">

        <div class="close">+</div>

        <div class="card">

<!--            <div style="display: ">-->
<!--                <form action="--><?php //echo BASEURL;?><!--/AccountantController/upload" enctype="multipart/form-data"  method="POST" id="fileUpload">-->
<!--                    <p><input type="file" name="file"/></p>-->
<!--                    <p><input type="submit" name="upload" value="upload file" id="upload"/></p>-->
<!--                </form>-->
<!--            </div>-->
<!--            <div>-->
            <style>
                .et_pb_contact_form_label {
                    display: block;
                    color: black;
                    font-weight: bold;
                    letter-spacing: 1.2px;
                    font-size: 18px;
                    padding-bottom: 5px;
                }
                input[id="upload"] {
                    display: none;
                }
                label[for="upload"] {
                    background: #fff;
                    height: 145px;
                    background-image: url('https://image.flaticon.com/icons/svg/126/126477.svg');
                    background-repeat: no-repeat;
                    background-position: top 18px center;
                    position: absolute;
                    background-size: 7%;
                    color: transparent;
                    margin: auto;
                    width: 450px;
                    top: 50%;
                    left: 0;
                    right: 0;
                    transform: translateY(-50%);
                    border: 1px solid #a2a1a7;
                    box-sizing: border-box;
                }
                label[for="upload"]:before {
                    content: "Drag and Drop a file here";
                    display: block;
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    font-size: 14px;
                    color: #202020;
                    font-weight: 400;
                    left:0;
                    right:0;
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                }
                label[for="upload"]:after {
                    display: block;
                    content: 'Browse';

                    background: #16a317;
                    width: 86px;
                    height: 27px;
                    line-height: 27px;
                    position: absolute;
                    bottom: 19px;
                    font-size: 14px;
                    color: white;
                    font-weight: 500;
                    left:0;
                    right:0;
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                }
                label[for="et_pb_contact_brand_request_0"]:after {
                    content: " (Provide link or Upload files if you already have guidelines)";
                    font-size: 12px;
                    letter-spacing: -0.31px;
                    color: #7a7a7a;
                    font-weight: normal;
                }
                label[for="et_pb_contact_design_request_0"]:after {
                    content: " (Provide link or Upload design files)";
                    font-size: 12px;
                    letter-spacing: -0.31px;
                    color: #7a7a7a;
                    font-weight: normal;
                }
                label[for="upload"].changed, label[for="upload"]:hover {
                    background-color: #e3f2fd;
                }
                label[for="upload"] {
                    cursor: pointer;
                    transition: 400ms ease;
                }
                .file_names {
                    display: block;
                    position: absolute;
                    color: black;
                    left: 0;
                    bottom: -30px;
                    font-size: 13px;
                    font-weight: 300;
                }
                .file_names {
                    text-align: center;
                }
            </style>
            <div class="container2">
                <label id="up" style="display: none" >Uploaded Payment Sheet</label>
                <label for="upload" class="et_pb_contact_form_label">Upload Payment Sheet</label>
                <form enctype="multipart/form-data">
                    <input type="file" id="upload" class="file-upload" name="files[]">

                </form>
                <script>
                    document.getElementById('upload').addEventListener('change', handleFileSelect, false);

                </script>

            </div>

<!--            <form enctype="multipart/form-data">-->
<!--                <input id="upload" type=file  name="files[]">-->
<!--            </form>-->






            <div class="BtnWap" style="display: none">
                <button id="calculate" class="model-btn2 cripple" onclick="calculate()">Calculate</button>
                <!--                    <button id="assign" class="model-btn cripple" onclick="assignEmployee()"  >Assign</button>-->
            </div>

            <div class="card-footer">

                <div class="bottom-row">

                    <div class="BtnWap">
                        <button id="close" class="model-btn2 cripple" onclick="closeModel()">Close</button>
                        <!--                    <button id="assign" class="model-btn cripple" onclick="assignEmployee()"  >Assign</button>-->
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


<?php linkJS("assets/js/accountant.js") ?>
<?php linkJS("assets/js/table.js") ?>
<?php linkJS("assets/js/accountant-genarateSalary.js") ?>
</body>
</html>