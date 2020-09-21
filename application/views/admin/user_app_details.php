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
							<li class="breadcrumb-item active">Application Users</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		<div class="row">
                            <div class="col-md-8">
                                <div class="card-box">
                                    <h4 class="mt-0 mb-3 header-title">User Details</h4>

                                    <form action="<?php echo base_url(); ?>users/update_app_user" method="post" enctype="multipart/form-data" id="add_admin_user" name="add_admin_user" class="form">
                                        <div class="form-group row">
											<div class="col-sm-3"> Name</div>
                                            <div class="col-sm-5"><?php echo $users->full_name; ?></div>
											<div class="col-sm-4"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"> Email ID</div>
                                            <div class="col-sm-5"><?php echo $users->email_id; ?></div>
											<div class="col-sm-4"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"> Phone Number</div>
                                            <div class="col-sm-5"><?php echo $users->phone_number; ?></div>
											<div class="col-sm-4"></div>
                                        </div>
										 <div class="form-group row">
                                            <div class="col-sm-3"> Gender</div>
                                            <div class="col-sm-5"><?php echo $users->gender; ?></div>
											<div class="col-sm-4"></div>
                                        </div>
										 <div class="form-group row">
                                            <div class="col-sm-3"> DOB</div>
                                            <div class="col-sm-5"><?php echo date('d-m-Y', strtotime($users->dob)); ?></div>
											<div class="col-sm-4"></div>
                                        </div>
										 
										 <div class="form-group row">
                                            <div class="col-sm-3"> Status</div>
                                            <div class="col-sm-5">
											<select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
											</select><script> $('#nStatus').val('<?php echo $users->status; ?>');</script>
											</div>
											 <div class="col-sm-4"></div>
                                        </div>
										 <div class="form-group row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-5">
												<input type="hidden" name="staff_id" value="<?php echo $users->id; ?>">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
											 <div class="col-sm-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end col -->


							<div class="col-md-4">
                                <div class="card-box">

                                   
                                        <div class="form-group row" style="min-height:320px;">
											<div class="col-sm-2"></div>
                                            <div class="col-sm-8" style="text-align:center;">
											<?php
													$user_pic  = trim($users->profile_pic );
													if ($user_pic != '') {?>
														<img src="<?php echo base_url(); ?>assets/users/<?php echo $user_pic;?>" class="img-responsive" style="width:200px;">
													<?php } else { ?>
														<img src="<?php echo base_url(); ?>assets/users/default.png" class="img-responsive" style="width:200px;">
											<?php } ?>
											</div>
											<div class="col-sm-2"></div>
                                        </div>

                                </div>
                            </div>
							
                          

                        </div>

	</div> <!-- container-fluid -->
</div> <!-- content -->

<script type="text/javascript">
	$('#menu6').addClass('active');
</script>
		