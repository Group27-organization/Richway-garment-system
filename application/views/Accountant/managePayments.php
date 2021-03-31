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
    <?php linkCSS("assets/css/admin-tabview.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/accountant-uploadingExcel.css") ?>




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



                        if(x.length!=0)
                        {
                            $("#pay").hide();
                            $("#generate").show();

                            document.getElementById("generate").onclick = function(){generateSalary(x)};

                        }

                        else{
                            console.log('nothing in the file');
                        }

                    })
                };

                reader.onerror = function(ex) {
                    console.log(ex);
                };

                reader.readAsBinaryString(file);
            };
        };
        function generateSalary(x) {
            $.ajax({

                type: 'POST',
                url: "http://localhost/Richway-garment-system/AccountantController/generateMonthlySalary",
                data: {paymentReport: x, key: "payement"},
                dataType: 'html',
                success: function (data) {
                    console.log(data);
                    $("#pay").hide();
                    $("#generate").hide();
                    alert("Salary generated Successfully");
                    location.href = "http://localhost/Richway-garment-system/AccountantController/managePayments";

                },

            });
    }


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



        <div class="tab-content">
<!--------------------------------------------Tab Content-------------------------------------------------------------------------------------- -->


            <div class="tabcontent">
                <div class="flex-row-tab">
                    <div class="SearchBtnWap">
<!--                        <div class="search">-->
<!--                            <input type="text" class="searchTerm" placeholder="What are you looking for?">-->
<!--                            <button type="submit" class="searchButton">-->
<!--                                <i class="fa fa-search"></i>-->
<!--                            </button>-->
<!--                        </div>-->
                    </div>
                    <div class="BtnWap">
                        <button id="generate-salary-btn" class="three-set-btn2" onclick="">Generate Monthly Salary </button>
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


    </div><!--right-->


</div>

<div class="bg-modal">
    <div class="modal-contents">

        <div class="close">+</div>

        <div class="card">

            <div class="container2">
                <label id="up" style="display: none;color:#4BB543" >Uploaded Payment Sheet</label>
                <label id="pay" for="upload" style="display:class="et_pb_contact_form_label">Upload Payment Sheet</label>
                <label id="generatedmsg" style="display: none;color:#4BB543" >Generated Payment Sheet</label>

                <form enctype="multipart/form-data">
                    <input type="file" id="upload" class="file-upload" name="files[]">

                </form>

                <script>
                    document.getElementById('upload').addEventListener('change', handleFileSelect, false);

                </script>

            </div>
            <div id="generate" style="display: none">
                <button name="generate" id="generate" class="three-set-btn1" onclick=" " style=" margin-top: 150px;" >Generate Salary</button>

            </div>
`



            <div class="card-footer">

                <div class="bottom-row">

                    <div class="BtnWap">
                        <button id="close" class="model-btn2 cripple" onclick="closeModel()">Close</button>

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