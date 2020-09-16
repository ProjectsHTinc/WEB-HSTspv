<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
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
								<img src="<?php echo base_url(); ?>assets/plugins/images/users/user-11.jpg" alt="user-image" class="rounded-circle" width="75px;" height="75px;"><br><span style="font-size:35px;font-weight:bold;margin-left:20px;">S.P. Velumani</span>
                        </div>
                        <div class="card login_shadows">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>
<?php if($this->session->flashdata('msg')): ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('msg'); ?>
								</div>	
<?php endif; ?>
								<form action="<?php echo base_url(); ?>admin/login_check" method="post" class="form" id="login_form" name="login_form" >
                                    <div class="form-group mb-3">
                                        <label for="emailaddress" style="font-weight:bold;">Email address</label>
                                        <input class="form-control" type="email" id="username" name="username" placeholder="Enter your email" maxlength="80">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" style="font-weight:bold;">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" maxlength="30"><span toggle="#password" class="fa fa-fw  fa-eye-slash field-icon toggle-password"></span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <p> <a href="<?php echo base_url(); ?>admin/forgot_password"  style="color:#1159a8;font-weight:bold;"><i class="fa fa-lock mr-1"></i>Forgot your password?</a></p>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
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
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$('#login_form').validate({ // initialize the plugin
     rules: {
         username:{required:true,email:true },
         password:{required:true }
     },
     messages: {
          username: "Enter Valid Email Address",
          password: "Enter Password"
         }
 });
 </script>
</html>
