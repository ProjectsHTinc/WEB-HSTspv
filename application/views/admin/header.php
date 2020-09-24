<?php
	$user_pic = $this->session->userdata('user_pic');
	$user_type = $this->session->userdata('user_type');
	$disp_name = $this->session->userdata('name');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SPV - Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/plugins/images/favicon.ico">
	   
		<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

	   <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/plugins/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/plugins/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/plugins/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
	
		<!-- Plugins css -->
	   	<link href="<?php echo base_url(); ?>assets/plugins/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/plugins/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/plugins/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/plugins/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
		
		<script src="<?php echo base_url(); ?>assets/plugins/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/js/jquery/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/js/jquery/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/js/jquery/jquery-disable-with.js"></script>

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
                                    <img src="<?php echo base_url(); ?>assets/users/<?php echo $user_pic; ?>" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name ml-1"><?php echo $disp_name; ?><i class="mdi mdi-chevron-down"></i> </span>
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
                            <a href="<?php echo base_url(); ?>/admin" class="logo logo-light" style="font-size:30px;color:#ffffff;">
                                <span class="logo-lg">SP Velumani</span>
                                <span class="logo-sm">SPV</span>
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
                                    <a href="<?php echo base_url(); ?>newsfeed/list_news/"> <i class="mdi mdi-newspaper-variant"></i>News Feed <div class="arrow-down"></div></a>
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
                                    <a href="<?php echo base_url(); ?>enquiry/enquiry_history/"> <i class="mdi mdi-message-text"></i>Enquiry  <div class="arrow-down"></div></a>
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
                                    <a href="<?php echo base_url(); ?>spv/"> <i class="mdi mdi-account"></i>About SPV  <div class="arrow-down"></div></a>
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
                                    <a href="<?php echo base_url(); ?>party/history/"> <i class="mdi mdi-alpha-p-circle-outline"></i>About Party  <div class="arrow-down"></div></a>
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
<?php if ($user_type =='1'){ ?>
								<li id="menu6" class="has-submenu">
                                    <a href="<?php echo base_url(); ?>users/admin/"> <i class="mdi mdi-account-group"></i>User Management  <div class="arrow-down"></div></a>
                                    <ul class="submenu">
										<li>
                                            <a href="<?php echo base_url(); ?>users/admin/">Admin Users</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>users/application/">Application Users</a>
                                        </li>
                                        
                                    </ul>
                                </li>
<?php } ?>
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