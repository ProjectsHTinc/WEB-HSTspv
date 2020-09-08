<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SPV - Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/favicon.ico">
	   
	   <!-- Plugins css -->
	   	<link href="<?php echo base_url(); ?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
		
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/admin/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
	   
	   <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
	
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
		
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery/additional-methods.min.js"></script>

    </head>

    <body data-layout="horizontal" data-topbar="dark">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">

                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <div class="container-fluid">
                        <ul class="list-unstyled topnav-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/admin/images/users/user-11.jpg" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name ml-1">Admin <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                    <!-- item-->
                                    <a href="<?php echo base_url(); ?>admin/profile/" class="dropdown-item notify-item">
                                        <i class="fe-user"></i>
                                        <span>Profile Update</span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?php echo base_url(); ?>admin/changepassword/" class="dropdown-item notify-item">
                                        <i class="fe-settings"></i>
                                        <span>Change Password</span>
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="<?php echo base_url(); ?>/admin/logout/" class="dropdown-item notify-item">
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                            

                        </ul>

                        <!-- LOGO -->
                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/admin/images/logo-light.png" alt="" height="16">
                                </span>
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/admin/images/logo-sm.png" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <div class="clearfix"></div>
                    </div> <!-- end container-fluid-->
                </div>
                <!-- end Topbar -->

                <div class="topbar-menu">
                    <div class="container-fluid">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">

                                <li id="menu1" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>admin/index/"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                                </li>
								
								<li id="menu2" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>newsfeed/list_news/"> <i class="mdi mdi-newspaper"></i>News Feed <div class="arrow-down"></div></a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>newsfeed/">Add News Feed</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>newsfeed/list_news/">List News Feed</a>
                                        </li>
                                    </ul>
                                </li>

								<li id="menu3" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>enquiry/enquiry_history/"> <i class="mdi mdi-comment-question-outline"></i>Enquiry  <div class="arrow-down"></div></a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>enquiry/enquiry_latest/">Latest Enquiry</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>enquiry/enquiry_history/">Enquiry History</a>
                                        </li>
                                    </ul>
                                </li>
                               
							  <li id="menu4" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>spv/"> <i class="mdi mdi-invert-colors"></i>About SPV  <div class="arrow-down"></div></a>
                                    <ul class="submenu megamenu">
                                        <li>
                                            <ul>
                                                <li>
													<a href="<?php echo base_url(); ?>spv/">Personal Life</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/political/">Political Career</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/position/">Position Held</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/awards/">Awards</a>
												</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
													<a href="<?php echo base_url(); ?>spv/notableworks/">Notable Works</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/namakkaga/">Namakkaga Initiatives</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/ammaias/">Amma IAS Academy</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>spv/socialmedia/">Social Media</a>
												</li>
                                            </ul>
                                        </li>
                                      
                                    </ul>
                                </li>
								
								 <li id="menu5" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>party/history/"> <i class="mdi mdi-castle"></i>About Party  <div class="arrow-down"></div></a>
                                    <ul class="submenu">
										<li>
                                            <a href="<?php echo base_url(); ?>party/history/">History</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>party/ideology/">Ideology</a>
                                        </li>
										<li>
                                            <a href="<?php echo base_url(); ?>party/election/">Election</a>
                                        </li>
                                    </ul>
                                </li>

								<li id="menu6" class="has-submenu">
                                    <a href="#"> <i class="mdi mdi-account-multiple"></i>User Management  <div class="arrow-down"></div></a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>users/application/">Application Users</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>users/admin/">Admin Users</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            <!-- End navigation menu -->

                            <div class="clearfix"></div>
                        </div>
                        <!-- end #navigation -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end navbar-custom -->

            </header>
            <!-- End Navigation Bar-->
			
		  <div class="content-page">