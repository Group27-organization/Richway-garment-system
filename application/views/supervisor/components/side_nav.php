<div class="navigation-container" id="js_navigation-container">

    <div class="navigation">
        <!-- LOGO -->
        <a class="navigation-logo" href="#">
            <img src="<?php echo BASEURL; ?>/public/assets/img/Contacts.svg" height="38" width="38">
            <span class="navigation-logo__name js_navigation-item-name">
                   Supervisor
        </span>
        </a>

        <!-- NAVIGATION -->
        <nav role="navigation">
            <ul>
                <li>
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


                <li>
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/supervisorController/markAttendance">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="24" height="24"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                        </svg>
                        <span class="navigation-link__name js_navigation-item-name">
                Mark Attendance
                        </span>
                    </a>
                </li>

                <li>
                    <a class="navigation-link" href="<?php echo BASEURL; ?>/supervisorController/updateWorkload">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="24" height="24"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9e9fa4"><path d="M35.83333,21.5c-7.83362,0 -14.33333,6.49972 -14.33333,14.33333v100.33333c0,7.83362 6.49972,14.33333 14.33333,14.33333h100.33333c7.83362,0 14.33333,-6.49972 14.33333,-14.33333v-100.33333c0,-7.83362 -6.49972,-14.33333 -14.33333,-14.33333zM35.83333,35.83333h100.33333v100.33333h-100.33333zM74.7181,50.25065l-10.13411,10.13411l25.61524,25.61523l-25.67123,25.67122l10.13412,10.13412l35.80533,-35.80534z"></path></g></g>
                        </svg>
                        <span class="navigation-link__name js_navigation-item-name">
               Update Workload
                        </span>
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