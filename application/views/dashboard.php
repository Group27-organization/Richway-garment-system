<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/calendar.css") ?>
    <?php linkJS("assets/js/calendar.js") ?>
    <?php linkCSS("assets/css/dashboard.css") ?>
</head>
<body>
<?php include "components/nav.php"; ?>

<div class="grid-container">

    <div class="navigation-container" id="js_navigation-container">

        <div class="navigation">
            <!-- LOGO -->
            <a class="navigation-logo" href="#">
                <img src="<?php echo BASEURL; ?>/public/assets/img/Contacts.svg" height="38" width="38">
                <span class="navigation-logo__name js_navigation-item-name">
                    <?php
                     echo ucwords(str_replace("_"," ",$data['data']->title));
                    ?>
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

                    <li <?php if($data['data']->cancel_order){
                        echo "style=\"display:block;\"";
                    } ?> >
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancel Order
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->cancel_job){
                        echo "style=\"display:block;\"";
                    } ?> >
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancel Job
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_customer){
                        echo "style=\"display:block;\"";
                    } ?> >
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Customers
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_suppliers){
                        echo "style=\"display:block;\"";
                    } ?> >
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Suppliers
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_employee){
                        echo "style=\"display:block;\"";
                    } ?> >
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Employee
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->add_stock_items){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Add Stock Items
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_user){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage User
              </span>
                        </a>
                    </li>

                <!--                    sales manager -->

                    <li <?php if($data['data']->create_order){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Create Order
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->update_order){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Update Order
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->cancle_order){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancle Order
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->salesmanager_viewReport){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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

<!--                    production manger-->

                    <li <?php if($data['data']->create_job){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Create Job
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->update_job){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Update Job
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->cancle_job){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancle Job
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->productionmanager_viewReport){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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


<!--                    accountant-->

                    <li <?php if($data['data']->manage_payments){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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

                    <li <?php if($data['data']->update_employee){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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

                    <li <?php if($data['data']->accountant_view_report){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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

<!--                    owner-->

                    <li <?php if($data['data']->manage_payroll){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
               	Manage Payroll
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->stock_usage){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
               Stock Usage
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->owner_view_report){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
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

<!--                    Supervisor-->

                    <li <?php if($data['data']->mark_attendance){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
               	Mark Attendance
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->update_workload){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
               Update Workload
              </span>
                        </a>
                    </li>

<!--                    stock keeper-->

                    <li <?php if($data['data']->stock_issue){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Stock Issues
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_stock){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Stock
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->manage_supplier_stockkeeper){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Suppliers
              </span>
                        </a>
                    </li>

                    <li <?php if($data['data']->stockKeeper_UsageReport){
                        echo "style=\"display:block;\"";
                    } ?> >

                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Usage Reports
              </span>
                        </a>
                    </li>


                </ul>
            </nav>

            <!-- LOGOUT -->

            <a class="navigation-link logout" href="<?php if($this->getSession('userId')) { echo BASEURL."/dashboardController/logout"; } ?>" >
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
        <h1>Analytices Overview</h1>
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
                    <svg id="Icons_Widget_Illustration" data-name="Icons / Widget Illustration" xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62">
                        <g id="ic-sessions">
                            <g id="Oval" fill="rgba(0,88,255,0.1)" stroke="rgba(0,88,255,0.1)" stroke-miterlimit="10" stroke-width="1">
                                <circle cx="31" cy="31" r="31" stroke="none"/>
                                <circle cx="31" cy="31" r="30.5" fill="none"/>
                            </g>
                            <g id="refresh" transform="translate(19 19)">
                                <path id="Path_446" data-name="Path 446" d="M0,0H24V24H0Z" fill="none"/>
                                <path id="Path_447" data-name="Path 447" d="M20,11A8.1,8.1,0,0,0,4.5,9M4,4V9H9" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path id="Path_448" data-name="Path 448" d="M4,13a8.1,8.1,0,0,0,15.5,2m.5,5V15H15" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </g>
                        </g>
                    </svg>



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
                    <svg id="Icons_Widget_Illustration" data-name="Icons / Widget Illustration" xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62">
                        <g id="ic-bounce_rate" data-name="ic-bounce rate">
                            <g id="Oval" fill="rgba(0,88,255,0.1)" stroke="rgba(0,88,255,0.1)" stroke-miterlimit="10" stroke-width="1">
                                <circle cx="31" cy="31" r="31" stroke="none"/>
                                <circle cx="31" cy="31" r="30.5" fill="none"/>
                            </g>
                            <g id="chart-bar" transform="translate(19 19)">
                                <path id="Path_449" data-name="Path 449" d="M0,0H24V24H0Z" fill="none"/>
                                <g id="percent" transform="translate(4 4)">
                                    <line id="Line_34" data-name="Line 34" x1="14" y2="14" transform="translate(1 1)" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <circle id="Ellipse_9" data-name="Ellipse 9" cx="2.5" cy="2.5" r="2.5" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <circle id="Ellipse_10" data-name="Ellipse 10" cx="2.5" cy="2.5" r="2.5" transform="translate(11 11)" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </g>
                            </g>
                        </g>
                    </svg>


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
                    <svg id="Icons_Widget_Illustration" data-name="Icons / Widget Illustration" xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62">
                        <g id="ic-revenues">
                            <g id="Oval" fill="rgba(0,88,255,0.1)" stroke="rgba(0,88,255,0.1)" stroke-miterlimit="10" stroke-width="1">
                                <circle cx="31" cy="31" r="31" stroke="none"/>
                                <circle cx="31" cy="31" r="30.5" fill="none"/>
                            </g>
                            <path id="usd-circle" d="M11.909,9.727h4.364a1.091,1.091,0,1,0,0-2.182H14.091V6.455a1.091,1.091,0,0,0-2.182,0V7.545a3.273,3.273,0,0,0,0,6.545h2.182a1.091,1.091,0,1,1,0,2.182H9.727a1.091,1.091,0,0,0,0,2.182h2.182v1.091a1.091,1.091,0,0,0,2.182,0V18.455a3.273,3.273,0,0,0,0-6.545H11.909a1.091,1.091,0,0,1,0-2.182ZM13,1A12,12,0,1,0,25,13,12,12,0,0,0,13,1Zm0,21.818A9.818,9.818,0,1,1,22.818,13,9.818,9.818,0,0,1,13,22.818Z" transform="translate(18 18)" fill="#0058ff"/>
                        </g>
                    </svg>


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
                    <svg id="Icons_Widget_Illustration" data-name="Icons / Widget Illustration" xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62">
                        <g id="ic-users">
                            <g id="Oval" fill="rgba(0,88,255,0.1)" stroke="rgba(0,88,255,0.1)" stroke-miterlimit="10" stroke-width="1">
                                <circle cx="31" cy="31" r="31" stroke="none"/>
                                <circle cx="31" cy="31" r="30.5" fill="none"/>
                            </g>
                            <g id="users" transform="translate(19 19)">
                                <path id="Path_450" data-name="Path 450" d="M0,0H24V24H0Z" fill="none"/>
                                <circle id="Ellipse_11" data-name="Ellipse 11" cx="4" cy="4" r="4" transform="translate(5 3)" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path id="Path_451" data-name="Path 451" d="M3,21V19a4,4,0,0,1,4-4h4a4,4,0,0,1,4,4v2" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path id="Path_452" data-name="Path 452" d="M16,3.13a4,4,0,0,1,0,7.75" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <path id="Path_453" data-name="Path 453" d="M21,21V19a4,4,0,0,0-3-3.85" fill="none" stroke="#0058ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </g>
                        </g>
                    </svg>

                </div><!--image-l-->
            </div><!--top box-->

        </div><!--box container-->




        <div class="box-container-revenue-growth">

            <p>Account & Monthly Recurring Revenue Growth</p>
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
                <div></div>
                <div></div>

            </div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'MRRGrowth', 'AVG Customer'],
                        ['Jan',  1000,      400],
                        ['Feb',  1170,      460],
                        ['March',  660,       1120],
                        ['April',  1030,      540],
                        ['Juny',  30,      240],
                        ['July',  530,      640],
                    ]);

                    var options = {
                        title: '',
                        hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                        vAxis: {minValue: 0},

                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_rev'));
                    chart.draw(data, options);
                }
            </script>

            <div id="chart_rev" style="width: 99%; height: 500px;"></div>
        </div><!--box-container-revenue-growth-->

        <div class="flex-box-two-three">
            <div class="fbtt-two" >
                <p class="dev-hed-para">Payment Status</p>
                <div id="donutchart" style="width: 100%; height: 100%;"></div>
                <script type="text/javascript" src="chartLibrary/http_www.gstatic.com_charts_loader.js"></script>
                <?php linkJS("assets/js/js-chart/piechart_3d.js") ?>

            </div>
            <div class="fbtt-three">
                <p class="dev-hed-para">Last 3 Month Payment</p>
                <div id="chart_div" style="width: 100%; height: 100%;"></div>
                <script type="text/javascript" src="chartLibrary/http_www.gstatic.com_charts_loader.js"></script>
                <?php linkJS("assets/js/js-chart/corechart.js") ?>
            </div>


        </div><!--flex-box-two-three-->

        <h3>Order Calender</h3>
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

</body>
</html>