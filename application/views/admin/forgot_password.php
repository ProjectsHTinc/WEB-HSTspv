<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Reset Password</title>
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

    </head>
    <body>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                         <div class="text-center" style="padding-bottom:50px;">
								<img src="<?php echo base_url(); ?>assets/plugins/images/spv_pic.png" alt="user-image" class="rounded-circle" width="80px;" height="80px;"><br><span style="font-size:35px;font-weight:bold;margin-left:20px;">S.P. Velumani</span>
                        </div>
                        <div class="card login_shadows">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0 mb-3">Reset Password</h4>
                                    <p class="mb-0 font-13" style="color:#adb5bd;">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                                </div>
<?php 
$status = $this->session->flashdata('msg');

if($status == 'Updated') { ?>
								<div class="alert alert-success alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                Password Reset. please check your mail and <a href="<?php echo base_url(); ?>admin/">Login</a>.
                                </div>
<?php  } 
if($status == 'Error') { ?>
								<div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                Sorry!.. Your Email id is incorrect!..
                                            </div>
<?php } ?>
                                <form action="<?php echo base_url(); ?>admin/reset_password" method="post" class="form" id="forgot_form" name="forgot_form" >
                                    <div class="form-group mb-3">
                                        <label for="emailaddress" style="font-weight:bold;">Email address</label>
                                        <input class="form-control" type="email" id="user_name" name="user_name" placeholder="Enter your email" maxlength="80">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                                    </div>
                                </form>        
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="<?php echo base_url(); ?>admin/" class="text-dark ml-1"><b>Login</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets/plugins/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/plugins/js/app.min.js"></script>
		 <script src="<?php echo base_url(); ?>assets/plugins/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/js/jquery/jquery.validate.min.js"></script>
        
    </body>

<script type="text/javascript">

$('#forgot_form').validate({ // initialize the plugin
     rules: {
         user_name:{required:true,email:true }
     },
     messages: {
          user_name: "Enter Valid Email Address"
         }
 });
 </script>
</html>
