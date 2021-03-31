<?php
$temp = $this->getSession('userRolesList');
?>


<div class="navigation-container" id="js_navigation-container">

    <div class="navigation">

        <a class="navigation-logo" href="#">
            <img src="<?php echo BASEURL; ?>/public/assets/img/Contacts.svg" height="38" width="38">
            <span class="navigation-logo__name js_navigation-item-name">
                    <?php echo ucwords(str_replace("_"," ",$this->getSession('userId')['role'])); ?>
                </span>
        </a>

        <!-- NAVIGATION -->
        <nav role="navigation">
            <ul>
                <li style="display:block;">
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/dashboardController">

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

                <li <?php if($temp['data']->cancel_order){
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

                <li <?php if($temp['data']->cancel_job){
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

                <li <?php if($temp['data']->manage_customer){
                    echo "style=\"display:block;\"";
                } ?> >
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/manageCustomerController">
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


                <li <?php if($temp['data']->add_customer){
                    echo "style=\"display:block;\"";
                } ?> >
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/addCustomerController">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="24" height="24"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                        </svg>
                        <span class="navigation-link__name js_navigation-item-name">
                Add Customers
              </span>
                    </a>
                </li>

                <li <?php if($temp['data']->manage_suppliers){
                    echo "style=\"display:block;\"";
                } ?> >
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/manageSupplierController">
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

                <li <?php if($temp['data']->manage_employee){
                    echo "style=\"display:block;\"";
                } ?> >
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/manageEmployeeController">
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

                <li <?php if($temp['data']->manage_raw_materials){
                    echo "style=\"display:block;\"";
                } ?> >

                    <a class="navigation-link" href="<?php echo BASEURL; ?>/rawMaterialController">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="24" height="24"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                        </svg>
                        <span class="navigation-link__name js_navigation-item-name">
                 Manage Raw Materials
              </span>
                    </a>
                </li>

                <li <?php if($temp['data']->manage_user){
                    echo "style=\"display:block;\"";
                } ?> >

                    <a class="navigation-link" href="<?php if($this->getSession('userId')) { echo BASEURL."/manageUserController"; } ?>">
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

                <li <?php if($temp['data']->manage_product){
                    echo "style=\"display:block;\"";
                } ?> >

                    <a class="navigation-link" href="<?php if($this->getSession('userId')) { echo BASEURL."/manageProductController"; } ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="24" height="24"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                        </svg>
                        <span class="navigation-link__name js_navigation-item-name">
                Manage Products
              </span>
                    </a>
                </li>

                <!--                    sales manager -->

                <li <?php if($temp['data']->create_order){
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

                <li <?php if($temp['data']->update_order){
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

                <li <?php if($temp['data']->cancle_order){
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

                <li <?php if($temp['data']->salesmanager_viewReport){
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

                <li <?php if($temp['data']->create_job){
                    echo "style=\"display:block;\"";
                } ?> >

                    <a class="navigation-link" href="<?php if($this->getSession('userId')) { echo BASEURL."/manageJobController/createJobView"; } ?>">
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

                <li <?php if($temp['data']->update_job){
                    echo "style=\"display:block;\"";
                } ?> >

                    <a class="navigation-link" href="<?php if($this->getSession('userId')) { echo BASEURL."/manageJobController/updateJob"; } ?>">
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

                <li <?php if($temp['data']->cancle_job){
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

                <li <?php if($temp['data']->productionmanager_viewReport){
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

                <li <?php if($temp['data']->manage_payments){
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

                <li <?php if($temp['data']->update_employee){
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

                <li <?php if($temp['data']->accountant_view_report){
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

                <li <?php if($temp['data']->manage_payroll){
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

                <li <?php if($temp['data']->stock_usage){
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

                <li <?php if($temp['data']->owner_view_report){
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

                <li <?php if($temp['data']->mark_attendance){
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

                <li <?php if($temp['data']->update_workload){
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

                <li <?php if($temp['data']->stock_issue){
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

                <li <?php if($temp['data']->manage_stock){
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

                <li <?php if($temp['data']->manage_supplier_stockkeeper){
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

                <li <?php if($temp['data']->stockKeeper_UsageReport){
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


<?php linkJS("assets/js/side_nav.js") ?>
