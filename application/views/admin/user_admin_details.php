<?php foreach($res as $users){} ?>
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
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Admin Users</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Admin User</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>users/update_admin_user" method="post" enctype="multipart/form-data" id="add_admin_user" name="add_admin_user" class="form">

						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="col-form-label">Full Name</label>
								<input type="text" class="form-control" placeholder="Full Name" id="name" name="name" value="<?php echo html_escape($users->full_name);?>">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Email Id</label>
							   <input type="email" class="form-control" placeholder="Email Id" id="email" name="email" value="<?php echo $users->email_id; ?>">
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
							   <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification" value="<?php echo html_escape($users->qualification);?>">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Id Proof Type </label>
								<select id="idProoftype" name="idProoftype" class="form-control">
										<option value="">Select Proof Type</option>
										<?php foreach($proof_type as $rows){ 
											echo '<option value='.$rows->id.'>'.$rows->doc_name.'</option>';
										}
										?>
								</select><script> $('#idProoftype').val('<?php echo $users->id_proof_type; ?>');</script>
							</div>
							
							<div class="form-group col-md-6">
								<label class="col-form-label">Address </label>
								<input type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php echo html_escape($users->address);?>">
							</div>
													
						</div>

						<div class="form-row">
							
							
							<div class="form-group col-md-3">
								<label class="col-form-label">Profile Picture</label>
							   <input type="file" class="form-control" id="profilePic" name="profilePic">
							</div>	
							<div class="form-group col-md-3">
								<label class="col-form-label">Id Proof</label>
							   <input type="file" class="form-control" id="idFile" name="idFile">
							</div>	
							<div class="form-group col-md-3">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select><script> $('#nStatus').val('<?php echo $users->status; ?>');</script>
							</div>
							<div class="form-group col-md-3">
								<input type="hidden" name="staff_id" value="<?php echo $users->id; ?>">
								<input type="hidden" name="user_old_file" value="<?php echo $users->id_proof_file; ?>">
								<input type="hidden" name="user_old_pic" value="<?php echo $users->profile_pic; ?>">
								<button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
														
						</div>

						<div class="form-row">
						
						<div class="form-group col-md-3">
								<?php
									$user_pic  = trim($users->profile_pic );
									if ($user_pic != '') {?>
										<img src="<?php echo base_url(); ?>assets/users/<?php echo $user_pic;?>" class="img-responsive" style="width:150px;">
									<?php } else { ?>
										<img src="<?php echo base_url(); ?>assets/users/default.png" class="img-responsive" style="width:150px;">
							<?php } ?>
							</div>	
							
						<div class="form-group col-md-3">
								<?php $proof_file  = trim($users->id_proof_file);
									if ($proof_file != '') {  ?>
										<a href="<?php echo base_url(); ?>assets/users/<?php echo $proof_file;?>" target="_blank"><?php echo $proof_file; ?></a>
								<?php }?>
							</div>	
							
							
							
														
						</div>								
					

					   
					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

 <script type="text/javascript">
 
$('#menu6').addClass('active');

$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');
	
$('#add_admin_user').validate({ // initialize the plugin
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
		 idProoftype:{required:true },
		 idFile:{required:false,accept: "jpg,jpeg,png,pfd",filesize: 1048576},
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
		  idProoftype: "Select ID Proof",
		  idFile:{
				  required:"Select ID Proof File",
				  accept:"Please upload .jpg or .png",
				  filesize:"File must be JPG or PNG, less than 1MB"
			},
		  profilePic:{
				  required:"Select User Picture",
				  accept:"Please upload .jpg or .png",
				  filesize:"File must be JPG or PNG, less than 1MB"
			}
         }
 });


</script>
		