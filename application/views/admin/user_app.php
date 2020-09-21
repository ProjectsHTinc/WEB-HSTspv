
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
			<div class="col-md-12">
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
				<div class="card-box">	
					<h4 class="page-title">List Application Users</h4><hr>				
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
											<td style="text-align:center;"><a data-toggle="tooltip" title="View" href="<?php echo base_url(); ?>users/app_user_details/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a></td>
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

</script>
		