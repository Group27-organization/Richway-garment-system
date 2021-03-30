<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accountant Dashboard</title>
    <script src="https://kit.fontawesome.com/7b78bec8ea.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/calendar.css") ?>
    <?php linkJS("assets/js/calendar.js") ?>
    <?php linkCSS("assets/css/dashboard.css") ?>
</head>
<body>

<div class="grid-container">

    <div class="navigation-container" id="js_navigation-container">

        <div class="navigation">
            <!-- LOGO -->
            <a class="navigation-logo" href="#">
                <img src="<?php echo BASEURL; ?>/public/assets/img/Contacts.svg" height="38" width="38">
                <span class="navigation-logo__name js_navigation-item-name">
                   Accountant
        </span>
            </a>

            <!-- NAVIGATION -->
            <nav role="navigation">
                <ul>
                    <li style="display:block;">
                        <a class="navigation-link active" href="#">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Dashboard
              </span>
                        </a>
                    </li>

                    <li style="display:block;">
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/AccountantController/managePayments">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Payments
              </span>
                        </a>
                    </li>
                    </a>
                    </li>

                    <li style="display:block;">
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/AccountantController/viewReports">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                View Reports
              </span>
                        </a>
                    </li>
                    </a>
                    </li>

                    <li style="display:block;">
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/AccountantController/updateEmployee">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Update Employee
              </span>
                        </a>
                    </li>
                    </a>
                    </li>
                    <li style="display:block;">
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/AccountantController/viewReports">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Notification
              </span>
                        </a>
                    </li>
                    </a>
                    </li>




                </ul>
            </nav>

            <!-- LOGOUT -->

            <a class="navigation-link logout" href="<?php if($this->getSession('userId')) { echo BASEURL."/dashboardController/logout"; } ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-power">
                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                    <line x1="12" y1="2" x2="12" y2="12"></line>
                </svg>
                <span class="navigation-link__name js_navigation-item-name">
          Logout
        </span>
            </a>
        </div>
    </div>


    <div class="right" id="right">

        <?php include "components/nav.php"; ?>

        <div class="page-header">
            <div class="block">
                <div class="page-header-routetext">
                    <a href="#"><img src="<?php echo BASEURL; ?>/public/assets/img/home%20(2).svg" ></i></a>
                    <a href="#!" style="color:#5e72e4;"> / Dashboard Analytics</a>
                </div>
            </div>
        </div>


        <div class="box-container-top">

            <div class="box-top">

                <div class="content-r">
                    <p class="cr1">Total Sessions</p>
                    <p class="cr2">14k</p>
                    <div class="cr3">
                        <p class="gr">2.3%</p>
                        <p >than last year</p>
                    </div>
                </div><!--content-r-->
                <div class="image-l">
                    <img src="<?php echo BASEURL; ?>/public/assets/img/box_top_img1.svg"">
                </div><!--image-l-->
            </div><!--top box-->

            <div class="box-top">

                <div class="content-r">
                    <p class="cr1">Total Bounce Rate</p>
                    <p class="cr2">56%</p>
                    <div class="cr3">
                        <p class="gr">2.1%</p>
                        <p >than last year</p>
                    </div>
                </div><!--content-r-->
                <div class="image-l">
                    <img src="<?php echo BASEURL; ?>/public/assets/img/box_top_img2.svg"">
                </div><!--image-l-->
            </div><!--top box-->

            <div class="box-top">

                <div class="content-r">
                    <p class="cr1">Total Revenues</p>
                    <p class="cr2">768,342</p>
                    <div class="cr3">
                        <p class="gr">1.8%</p>
                        <p >than last year</p>
                    </div>
                </div><!--content-r-->
                <div class="image-l">
                    <img src="<?php echo BASEURL; ?>/public/assets/img/box_top_img3.svg"">
                </div><!--image-l-->
            </div><!--top box-->

            <div class="box-top">

                <div class="content-r">
                    <p class="cr1">Total Users</p>
                    <p class="cr2">20k</p>
                    <div class="cr3">
                        <p class="gr">2.3%</p>
                        <p >than last year</p>
                    </div>
                </div><!--content-r-->
                <div class="image-l">
                    <img src="<?php echo BASEURL; ?>/public/assets/img/box_top_img4.svg"">
                </div><!--image-l-->
            </div><!--top box-->

        </div><!--box container-->

        <div class="flex-box-two-three">
            <div class="fbtt-two" >
                <div id="lineChart" style="height: auto; width: 100%;"></div>

            </div>
            <div class="fbtt-three">

                <h3>Account & Monthly Recurring Revenue Growth</h3>
                <div class="flex-box-reanue-chart">
                    <div class="f-c">
                        <p class="fr1">MRR Growth</p>
                        <p class="fr2">$710,015</p>
                        <p class="fr3">Measure How Fast You’re Growing Monthly Recurring Revenue.</p>
                    </div>
                    <div class="s-c">
                        <p class="fr1">MRR Growth</p>
                        <p class="fr2">$710,015</p>
                        <p class="fr3">Measure How Fast You’re Growing Monthly Recurring Revenue.</p>
                    </div>

                </div>

                <div id="revenueGrowth" style="height: 250px; width: auto;"></div>

            </div>
        </div><!--flex-box-two-three-->

        <div class="box-container-monthly-sales" >

            <div id="barChart" style="height: auto; width: 100%;"></div>
        </div>



        <h3 class="calendar-title">Order Calender</h3>
        <div class="flex-container-calender">

            <div>
                <div id="calendar"> </div>
                <!--calender-->

                <?php linkJS("assets/js/calendar_data.js") ?>
            </div>

        </div>
        <!--lex-container-calender-->

    </div><!--right-->



</div>

<?php linkJS("assets/js/js-chart/on_load_charts.js") ?>

</body>
</html>