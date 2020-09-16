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
							<li class="breadcrumb-item active">Proile Update</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Proile Update</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>admin/profile_update" method="post" enctype="multipart/form-data" id="profile_update" name="profile_update" class="form">

						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="col-form-label">Full Name</label>
								<input type="text" class="form-control" placeholder="Full Name" id="name" name="name" value="<?php echo $users->full_name; ?>">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Email Id</label>
							   <input type="email" class="form-control" placeholder="Email Id" id="email" name="email" value="<?php echo $users->email_id; ?>" <?php if ($role_id !='1'){ echo "readonly"; } ?>>
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Phone Number</label>
								<input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" maxlength="10" value="<?php echo $users->phone_number; ?>">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Gender </label><br>
								<?php $sgender = $users->gender; ?>
									<input type="radio" name="gender" value="Male" <?php if($sgender =='Male'){ echo "checked"; }?> style="margin-top:10px;"> &nbsp; Male &nbsp; <input type="radio" name="gender" value="Female" <?php if($sgender =='Female'){ echo "checked";} ?>> Female
							</div>
						</div>

						<div class="form-row">

							<div class="form-group col-md-3">
								<label class="col-form-label">Qualification </label>
							   <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification" value="<?php echo $users->qualification; ?>">
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Address </label>
								<input type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php echo $users->address; ?>">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Profile Picture</label>
							   <input type="file" class="form-control" id="profilePic" name="profilePic">
							</div>	
											
						</div>

						<div class="form-row">

							<div class="form-group col-md-3"></div>
								
							<div class="form-group col-md-3">
								<input type="hidden" name="staff_id" value="<?php echo $users->id; ?>">
								<input type="hidden" name="user_old_pic" value="<?php echo $users->profile_pic; ?>">
								<button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>
							</div>
							<div class="form-group col-md-3"></div>
							<div class="form-group col-md-3">
								<?php
									$user_pic  = trim($users->profile_pic );
									if ($user_pic != '') {?>
										<img src="<?php echo base_url(); ?>assets/users/<?php echo $user_pic;?>" class="img-responsive" style="width:150px;">
									<?php } else { ?>
										<img src="<?php echo base_url(); ?>assets/users/default.png" class="img-responsive" style="width:150px;">
							<?php } ?>
							</div>
												
						</div>

					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

<script type="text/javascript">

$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');
	
$('#profile_update').validate({ // initialize the plugin
     rules: {
		 name:{required:true },
		 email:{
			required:true,
			email: true,
			remote: {
				 url: "<?php echo base_url(); ?>users/admin_checkemail_edit/<?php echo base64_encode($users->id*98765); ?>",
				 type: "post"
			}
		 },
		 phone:{
			 required: true,
			 maxlength: 10,
			 minlength:10,
			 number:true,
			 remote: {
						 url: "<?php echo base_url(); ?>users/admin_checkphone_edit/<?php echo base64_encode($users->id*98765); ?>",
						 type: "post"
			}
		 },
		 qualification:{required:true },
		 profilePic:{required:false,accept: "jpg,jpeg,png",filesize: 1048576}
     },
     messages: {
		  name: "Enter Name",
		  email: {
				 required: "Enter the email ID",
				 email: "Enter the valid  email ID",
				 remote: "Email ID already in use!"
			},

		  phone: {
				required: "Enter the phone number",
				maxlength:"Invalid phone number",
				minlength:"Invalid phone number",
				number:"Invalid phone number",
				remote: "Phone number already in use!"
			},
		  qualification: "Enter Qualification",
		  profilePic:{
				  required:"",
				  accept:"Please upload .jpg or .png",
				  filesize:"File must be JPG or PNG, less than 1MB"
			}
         }
 });


</script>
		