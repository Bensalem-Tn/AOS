
<!doctype html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <title>AOS SYSTEME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= Utils::generateLink('assets/images/favicon.ico'); ?>">

        <!-- jquery.vectormap css 
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->

        <!-- DataTables -->
        <link href="<?= Utils::generateLink('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?= Utils::generateLink('assets/libs/select2/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= Utils::generateLink('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
        <!-- Responsive datatable examples -->
        <link href="<?= Utils::generateLink('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />  
        <link href="<?= Utils::generateLink('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?= Utils::generateLink('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="<?= Utils::generateLink('assets/css/bootstrap.min.css" id="bootstrap-style'); ?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= Utils::generateLink('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= Utils::generateLink('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?= Utils::generateLink(''); ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= Utils::generateLink('assets/images/logo-sm.png'); ?>" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= Utils::generateLink('assets/images/logo-dark.png'); ?>" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="<?= Utils::generateLink(''); ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= Utils::generateLink('assets/images/logo-sm.png'); ?>" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= Utils::generateLink('assets/images/logo-light.png'); ?>" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                      

                      
                    </div>

                    <div class="d-flex">

                        

                        

                       

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                       

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= Utils::generateLink('assets/images/users/avatar-1.jpg'); ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1"><?=strtoupper($_SESSION['login']) ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?= Utils::generateLink('logout'); ?>"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="ri-settings-2-line"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="<?= Utils::generateLink('assets/images/users/avatar-1.jpg'); ?>" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1"><?=ucwords($_SESSION['first_name'])."  ".ucwords($_SESSION['last_name']) ?></h4>
                           <!-- <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
--> </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span>ITEMS</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= Utils::generateLink('article'); ?>">ITEM LIST</a></li>
                                    <li><a href="<?= Utils::generateLink('partial'); ?>">PARTIALS</a></li>
                                    <li><a href="<?= Utils::generateLink('analytical'); ?>">ANALYTICAL</a></li>
                                    <li><a href="<?= Utils::generateLink('unit'); ?>">UNIT</a></li>
                                    <li><a href="<?= Utils::generateLink('unit_mouv'); ?>">UNIT OF MOVEMENT</a></li>
                                    <li><a href="<?= Utils::generateLink('state'); ?>">STATE</a></li>
                                    <li><a href="<?= Utils::generateLink('location'); ?>">LOCATION</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?= Utils::generateLink('transfert'); ?>" class=" waves-effect">
                                    <i class="ri-folder-shared-fill"></i>
                                    <span>TRNSFERT</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Utils::generateLink('receipt'); ?>" class=" waves-effect">
                                    <i class="ri-folder-received-fill"></i>
                                    <span>RECEIPT</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Utils::generateLink('daily'); ?>" class=" waves-effect">
                                    <i class=" ri-exchange-box-fill"></i>
                                    <span>DAILY MOVEMENT</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Utils::generateLink('final'); ?>" class=" waves-effect">
                                    <i class="ri-calendar-check-fill"></i>
                                    <span>FINAL REPORT</span>
                                </a>
                            </li>
                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html">Login</a></li>
                                    <li><a href="auth-register.html">Register</a></li>
                                    <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>

                           
                               
                               

                           

                           
                          
                           

                          
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
         





