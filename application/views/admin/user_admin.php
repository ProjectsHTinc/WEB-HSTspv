
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
					<form action="<?php echo base_url(); ?>users/add_admin_user" method="post" enctype="multipart/form-data" id="add_admin_user" name="add_admin_user" class="form">

						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="col-form-label">Full Name</label>
								<input type="text" class="form-control" placeholder="Full Name" id="name" name="name">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Email Id</label>
							   <input type="email" class="form-control" placeholder="Email Id" id="email" name="email">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Phone Number</label>
								<input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" maxlength="10">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Gender </label><br>
								<input type="radio" name="gender" value="Male" checked="" style="margin-top:10px;"> Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female"> Female
							</div>
						</div>

						<div class="form-row">
							
							
							<div class="form-group col-md-3">
								<label class="col-form-label">Qualification </label>
							   <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Id Proof Type </label>
								<select id="idProoftype" name="idProoftype" class="form-control">
										<option value="">Select Proof Type</option>
										<?php foreach($proof_type as $rows){ 
											echo '<option value='.$rows->id.'>'.$rows->doc_name.'</option>';
										}
										?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Id Proof</label>
							   <input type="file" class="form-control" id="idFile" name="idFile">
							</div>	
							<div class="form-group col-md-3">
								<label class="col-form-label">Profile Picture</label>
							   <input type="file" class="form-control" id="profilePic" name="profilePic">
							</div>							
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Address </label>
								<input type="text" class="form-control" placeholder="Address" id="address" name="address">
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
														
						</div>				 
					

					   
					</form>
				</div>
			</div>
		</div>




		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">	
					<h4 class="page-title">List Admin Users</h4>	<hr>				
							<table id="datatable" class="table table-bordered  nowrap">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
											<th width="30%">Full Name</th>
											<th width="30%">Email ID</th>
											<th width="20%">Phone</th>
											<th width="10%">Status</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1; foreach($user_result as $rows){ 
										$status = $rows->status;
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $rows->full_name; ?></td>
											<td><?php echo $rows->email_id; ?></td>
											<td><?php echo $rows->phone_number; ?></td>
											<td><span <?php if ($status == 'Active') { ?>class="staus_active"<?php } else {?>class="staus_inactive"<?php } ?>><?php echo $rows->status; ?></span></td>
											<td style="text-align:center;"><a data-toggle="tooltip" title="View" href="<?php echo base_url(); ?>users/admin_user_details/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a></td>
                                        </tr>
										<?php $i++; } ?>
                                        </tbody>
                                    </table>

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
				 url: "<?php echo base_url(); ?>users/admin_checkemail",
				 type: "post"
			}
		 },
		 phone:{
			 required: true,
			 maxlength: 10,
			 minlength:10,
			 number:true,
			 remote: {
						 url: "<?php echo base_url(); ?>users/admin_checkphone",
						 type: "post"
			}
		 },
		 qualification:{required:true },
		 idProoftype:{required:true },
		 idFile:{required:true,accept: "jpg,jpeg,png",filesize: 1048576},
		 profilePic:{required:true,accept: "jpg,jpeg,png",filesize: 1048576}
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
		