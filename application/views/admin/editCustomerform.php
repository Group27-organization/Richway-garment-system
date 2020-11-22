<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php linkCSS("assets/css/nav.css") ?>
    <?php linkCSS("assets/css/admin-managecustomer.css") ?>
    <?php linkCSS("assets/css/admin-adduser.css") ?>
    <?php linkCSS("assets/css/form.css") ?>
    <?php linkCSS("assets/css/admin-table.css") ?>
     <?php //linkJS("assets/js/jquary.js")?>

</head>
<body>
<?php include "components/nav.php"; ?>

<div class="grid-container">

    <div class="navigation-container" id="js_navigation-container">
        <div class="navigation-collapse-trigger">
      <span class="navigation-collapse-trigger__orb" id="js_navigation-collapse-trigger">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </span>
        </div>
        <div class="navigation">
            <!-- LOGO -->
            <a class="navigation-logo" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box navigation-logo__icon">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <span class="navigation-logo__name js_navigation-item-name">
          Admin
        </span>
            </a>

            <!-- NAVIGATION -->
            <nav role="navigation">
                <ul>
                    <li>
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/adminDashboardController"">
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
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancel Order
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Cancel Job
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link active" href="<?php echo BASEURL; ?>/manageCustomerController">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Customer
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/manageSupplierController">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Suppliers
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link" href="ManageEmployee.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage Employee
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link" href="AddDeprecatedStockItems.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Add Stock Items
              </span>
                        </a>
                    </li>

                    <li>
                        <a class="navigation-link" href="<?php echo BASEURL; ?>/manageUserController">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="navigation-link__name js_navigation-item-name">
                Manage User
              </span>
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- LOGOUT -->

            <a class="navigation-link logout" href="#">
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
        <h1>Manage Customer</h1>

        <!----------------------------------form start--------------------------------------------------------------------------------------- -->

 <form  action="<?php echo BASEURL;?>/manageCustomerController/updateCustomer" method="POST" id="addCustomer" >
<div class="flexbox-container">

    <div class="inputfield">
        <h2>Update Customer</h2>
    </div>

      
    
      <div class="inputfield">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" class="form-contrall" value="<?php echo $data->name;?>">
      
      </div>

      <div class="inputfield">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" class="form-contrall" value="<?php echo $data->address;?>">

      </div> 

      <div class="inputfield">
        <label for="contact_no">Contact Number</label>
        <input type="tel" id="contact_no" name="contact_no" class="form-contrall" value="<?php echo $data->contact_no;?>">

        <input type="hidden" name="hiddenID" value="<?php echo $data->customer_ID;?>">
    </div> 

    <div class="inputfield">
        <label for="Gender">Gender</label>
        <input type="text" id="Gender" name="Gender" class="form-contrall" value="<?php echo $data->Gender;?>">

    </div>
    
    <div class="inputfield">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-contrall" value="<?php echo $data->email;?>">

    </div>

    <br><div class="inputfield inputbutton"> 
            <input type="submit" value="Update" class="btn cripple">
    </div> 

</div>
</form>
    </div>
</div>
</body>
</html>
