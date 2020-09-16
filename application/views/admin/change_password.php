<?php foreach($res as $users){
	$role_id = $users->admin_role_type;
} ?>
<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">User Management</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
							<li class="breadcrumb-item active">Change Password</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Change Password</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					
					<form action="<?php echo base_url(); ?>admin/password_update" method="post" enctype="multipart/form-data" id="frmPassword" name="frmPassword" class="form">

						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="col-form-label">Current Password</label>
								<input type="password" placeholder="Enter Current Password" name="old_password" id="old_password" class="form-control" value="" maxlength="10"><span toggle="#old_password" class="fa fa-fw  fa-eye-slash field-icon-inner toggle-password" style="cursor: pointer;"></span>
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">New Password</label>
							   <input type="password" placeholder="Enter New Password" id="new_password" name="new_password" class="form-control input-sm" value="" maxlength="10"><span toggle="#new_password" class="fa fa-fw  fa-eye-slash field-icon-inner toggle-password" style="cursor: pointer;"></span>
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Confirm New Password</label>
								<input type="password" placeholder="Confirm New Password" id="retype_password" name="retype_password" class="form-control input-sm" value="" maxlength="10"><span toggle="#retype_password" class="fa fa-fw  fa-eye-slash field-icon-inner toggle-password" style="cursor: pointer;"></span>
							</div>
							<div class="form-group col-md-3">
								<input type="hidden" name="user_id" value="<?php echo $users->id; ?>">
								<button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

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

  $("#frmPassword").validate({
         rules: {
             old_password:{
               required: true,
                remote: {
                       url: "<?php echo base_url(); ?>admin/check_password_match/<?php echo $users->id; ?>",
                       type: "post"
                    }
             },
             new_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6
             },
             retype_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6,equalTo: '[name="new_password"]'
             }
         },
         messages: {
               old_password: {
                    required: "Enter your current password",
                    remote: "Current password doesn't match!"
                },
                new_password: {
                  required: "Enter a new password",
                  maxlength:"Maximum 10 digits",
                  minlength:"Minimum 6 digits"

                },
               retype_password: {
                 required: "Please confirm the new password.",
                 maxlength:"Maximum 10 digits",
                 minlength:"Minimum 6 digits",
                 equalTo:"This doesn't match your new password!"

                }
             }
     });

</script>
		